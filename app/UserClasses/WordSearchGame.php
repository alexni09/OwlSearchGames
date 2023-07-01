<?php

namespace App\UserClasses;

use App\Models\Word;
use App\Models\Locale;
use Illuminate\Support\Facades\App;
use App\Models\Background;
use App\Models\Category;
use App\UserClasses\Misc;
use App\Exceptions\NotEnoughWordsException;

class WordSearchGame {
    protected const PLUS_PERCENTAGE = 20;  /* How many more words are theoretically needed, on top of those many requested; category and difficulty considered. */
    protected $category = null;  /* category name, if any */
    protected $grid;
    protected $maxX;
    protected $maxY;
    protected $chosen;
    public function __construct(int $maxX = 15, int $maxY = 10, int $maxWords = 20, 
                                bool $difficultyWords = null, bool $directions = false, bool $allWordsFromLocale = false) {
        /* Init's */
        $this->maxX = $maxX;
        $this->maxY = $maxY;
        $maxAttempts = 5 * $maxWords * $maxWords;
        for ($j=0; $j<$this->maxY; $j++)
            for ($i=0; $i<$this->maxX; $i++)
                $this->grid[$j][$i] = null;
        $locale_id = Locale::getIdFromLocale(App::getLocale());
        /* Grab all available words, given the conditions, from the database. */
        if ($allWordsFromLocale === true) $allWords = Word::fetchAllWordsByLocaleId($locale_id);
        else {
            $neededWords = intval(ceil((1 + static::PLUS_PERCENTAGE / 100) * $maxWords));
            if ($neededWords > Word::maxWordsFromCategoryByLocaleId($locale_id))
                throw new NotEnoughWordsException("Not Enough Words('".App::getLocale()."')");
            $category_id = null;
            if ($difficultyWords !== null) $category_id = Word::getRandomCategoryWithSuchMinimumWordsAndLocale($locale_id, $neededWords, $difficultyWords);
            $both = false;
            if ($category_id === null) { $category_id = Word::getRandomCategoryWithSuchMinimumWordsAndLocale($locale_id, $neededWords, null); $both = true; }
            if ($category_id === null) $allWords = Word::fetchAllWordsByLocaleId($locale_id);
            else if ($both) $allWords = Word::fetchAllWordsByCategoryId($category_id);
            else $allWords = Word::fetchWordsByDifficultyAndCategoryId($category_id, $difficultyWords);
            if ($category_id !== null) $this->category = Category::getCategoryById($category_id);
        }
        /* Fill in the words and the grid */
        $this->chosen = [];
        $qty = 0; 
        $attempts = 0;
        $directions ? $direction = rand(1,4) : $direction = rand(2,3);
        while (($qty < $maxWords) && ($attempts < $maxAttempts)) {
            $x = rand(0,$maxX-1);
            $y = rand(0,$maxY-1);
            $word = 'abcdefghijklmnopqrstuvwxyza';
            do {
                $word = $allWords[rand(0,count($allWords)-1)];
            } while(Misc::strposReduceAllWords($this->chosen,$word));
            $flag = true;
            switch($direction) {
                case 1: /* upwards */
                    $y2 = strlen($word);
                    if (($y - $y2) < 0) break;
                    for ($k = 0; $k < $y2; $k++) 
						if (isset($this->grid[$y-$k][$x]) && ($this->grid[$y-$k][$x] != mb_substr($word,$k,1))) { $flag = false; break; }
                    if ($flag) {
                        for ($k = 0; $k < $y2; $k++) $this->grid[$y-$k][$x] = mb_substr($word,$k,1);
                        $this->chosen[] = $word;
                        $qty++;
                        $direction = 2 * rand(1,2);
                    } else $attempts++;
                    break;
                case 2: /* towards the right */
                    $x2 = strlen($word);
                    if (($x + $x2) > $this->maxX) break;
                    for ($k = 0; $k < $x2; $k++) 
                        if (isset($this->grid[$y][$x+$k]) && ($this->grid[$y][$x+$k] != mb_substr($word,$k,1))) { $flag = false; break; }
                    if ($flag) {
                        for ($k = 0; $k < $x2; $k++) $this->grid[$y][$x+$k] = mb_substr($word,$k,1);
                        $this->chosen[] = $word;
                        $qty++;
                        $directions ? $direction = 2 * rand(1,2) - 1 : $direction = 3;
                    } else $attempts++;
                    break;
                case 3: /* downwards */
                    $y2 = strlen($word);
                    if (($y + $y2) > $this->maxY) break;
                    for ($k = 0; $k < $y2; $k++) 
                        if (isset($this->grid[$y+$k][$x]) && ($this->grid[$y+$k][$x] != mb_substr($word,$k,1))) { $flag = false; break; }
                    if ($flag) {
                        for ($k = 0; $k < $y2; $k++) $this->grid[$y+$k][$x] = mb_substr($word,$k,1);
                        $this->chosen[] = $word;
                        $qty++;
                        $directions ? $direction = 2 * rand(1,2) : $direction = 2;
                    } else $attempts++;
                    break;
                case 4: /* towards the left */
                    $x2 = strlen($word);
                    if (($x - $x2) < 0) break;
                    for ($k = 0; $k < $x2; $k++) 
                        if (isset($this->grid[$y][$x-$k]) && ($this->grid[$y][$x-$k] != mb_substr($word,$k,1))) { $flag = false; break; }
                    if ($flag) {
                        for ($k = 0; $k < $x2; $k++) $this->grid[$y][$x-$k] = mb_substr($word,$k,1);
                        $this->chosen[] = $word;
                        $qty++;
                        $direction = 2 * rand(1,2) - 1;
                    } else $attempts++;
                    break;
            } 
        }
        /* Fill in any empty spaces left on the grid */
        for ($j=0; $j<$this->maxY; $j++)
            for ($i=0; $i<$this->maxX; $i++)
                if (!isset($this->grid[$j][$i]) || $this->grid[$j][$i] === '') $this->grid[$j][$i] = chr(rand(97,122));
    }
    public function getAll() { 
        return [
            'grid' => $this->getGrid(),
            'words' => $this->getChosenWords(),
            'category' => $this->getCategory()
        ]; 
    }
    public function getCategory() { return $this->category; }
    public function getChosenWords() { return $this->chosen; }
    public function getGrid() { return $this->grid; }
}