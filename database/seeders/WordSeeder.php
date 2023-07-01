<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;
use App\Models\Category;
use App\Models\User;

class WordSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $uid1 = User::getIdFromUserId('anonymous');
        $vegetable = Category::getIdByCategory('vegetables');
        $legume = Category::getIdByCategory('legumes');
        $verdura = Category::getIdByCategory('verduras');
        $fruta = Category::getIdByCategory('frutas');
        $flor = Category::getIdByCategory('flores');
        $fruit = Category::getIdByCategory('fruits');
        $spice = Category::getIdByCategory('spices');
        $animal = Category::getIdByCategory('animals');

        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'artichoke' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'asparagus' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'eggplant' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'beetroot' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'pepper' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'broccoli' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'cabbage' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'carrot' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'cauliflower' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'celery' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'courgette' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'cucumber' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'onion' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'potato' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'pumpkin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'radish' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'squash' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'tomato' 
        ]);
        Word::create([
            'user_id' => 2,
            'category_id' => $vegetable,
            'word' => 'zucchini' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'abóbora' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'abobrinha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'aipim'
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'amendoim'
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'arroz' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'aveia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'avelã' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'azeitona' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'baroa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'batata' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'berdana' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'berinjela' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'beterraba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'cebola' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'cenoura' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'centeio' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'cevada' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'chuchu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'couve' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'ervilha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'feijão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'gengibre' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'gergelim' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'girassol' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'inhame' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'lentilha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'linhaça' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'malagueta' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'mandioca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'mandioquinha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'maxixe' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'milho' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'moranga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'oliva' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'palmito' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'pepino' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'pimenta' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'pimentão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'pinhão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'pistache' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'quiabo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'quinoa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'rabanete' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'taioba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'tomate' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'tremoço' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'trigo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'urucum' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'word' => 'vagem' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'acelga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'agrião' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'alcachofra' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'alcaparra' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'alecrim' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'alface' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'alfafa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'alfavaca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'alho-poró' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'almeirão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'aspargo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'azedinha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'berdana' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'bertalha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'brócolis' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'capuchinha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'cebolinha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'chicória' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'coentro' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'couve' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'endívia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'erva-cidreira' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'erva-doce' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'erva-mate' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'escarola' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'espinafre' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'estragão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'funcho' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'hibisco' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'hortelã' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'inhame' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'louro' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'madressilva' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'manjericão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'manjerona' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'ora-pro-nobis' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'orégano' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'radicchio' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'repolho' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'rúcula' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'ruibarbo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'salsa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'salsão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'sálvia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'taioba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'word' => 'tomilho' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'amaranto' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'andu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'arachachá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'cabotchan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'cará' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'caxi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'celósia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'chalota' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'chichá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'cumaru' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'dendê' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'escorcioneira' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'gobô' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'goya' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'grumixama' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'guandu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'inajá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'jicama' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'jalapeño' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'kohlrabi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'labaca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'macassá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'malte' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'mendubiguaçu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'mitsubá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'mogango' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'monguba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'paru' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'pau-rei' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'pé-de-anta' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'pelega' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'pequi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'rábano' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'raiz-forte' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'rutabaga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'shissô' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'sorgo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => false,
            'word' => 'soja' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'taro' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'tonka' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'tupinambo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'wasabi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'xixá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'xoconostle' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $legume,
            'difficult' => true,
            'word' => 'zizânia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'beldroega' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'bredo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'cambuquira' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'capeba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'capiçoba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'caruru' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'catalonha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'celósia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'chaya' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'comelina' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'dill' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'echalota' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'embaúba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'gobô' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'guasca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'kohlrabi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'labaca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'major-gomes' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'maria-gorda' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => false,
            'word' => 'mostarda' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'palma' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'picão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'quina' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'rutabaga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'serralha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'shissô'
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'taro' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'tingensai' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'trapoeraba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'trevo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'urtiga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'vinagreira' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $verdura,
            'difficult' => true,
            'word' => 'wasabi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'abacate' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'abacaxi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'abiu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'abricó' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'abrunho' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'açaí' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'acerola' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'akee' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'alfarroba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'ameixa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'amêndoa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'amora' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'ananás' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'anona' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'araçá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'arando' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'araticum' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'atemoia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'avelã' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'babaco' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'babaçu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'bacaba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'bacuri' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'bacupari' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'banana' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'baru' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'bergamota' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'biribá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'buriti' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'butiá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'cacau' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'cagaita' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'caimito' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'cajá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'caju' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'calabaça' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'calabura' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'calamondin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'cambucá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'cambuci' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'camu-camu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'caqui' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'carambola' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'carnaúba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'castanha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'cereja' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'ciriguela' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'ciruela' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'coco' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'cupuaçu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'cranberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'damasco' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'dekopon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'dendê' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'dióspiro' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'dovyalis' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'durião' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'embaúba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'embaubarana' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'engkala' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'escropari' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'figo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'framboesa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'fruta-do-conde' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'fruta-pão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'gabiroba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'glicosmis' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'goiaba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'granadilla' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'gravatá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'graviola' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'groselha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'grumixama' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'guabiju' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'guabiroba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'guaraná' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'heisteria' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'hilocéreo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'ibacurupari' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'ilama' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'imbe' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'imbu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'inajá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'ingá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'inharé' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'jabuticaba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'jaca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'jambo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'jamelão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'jaracatiá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'jatobá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'jenipapo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'jerivá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'kiwi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'kinkan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'kino' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'kiwano' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'kabosu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'karité' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'laranja' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'limão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'lima' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'lichia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'longan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'lucuma' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'lacucha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'lulo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'lobeira' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'mabolo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'macadâmia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'macaúba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'mamão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'mamoncillo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'maná-cubiu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'manga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'mangaba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'mangostão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'maracujá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'marmelo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'marolo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'marula' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'massala' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'melancia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'melão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'meloa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'mexerica' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'mirtilo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'morango' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'murici' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'naranjilla' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'nectarina' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'nêspera' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'noni' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'oiti' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'oxicoco' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'orangelo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'pera' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'pêssego' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'pitanga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'pinha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'pitaia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pitomba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pitangatuba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pindaíba' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pequiá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'physalis' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pulasan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pomelo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pupunha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'puçá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'patauá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pajurá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'pixirica' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'pistache' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'quina' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'quiuí' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'romã' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'rambai' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'rambutão' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'rukam' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'saguaraji' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'salak' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'santol' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'sapoti' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'sapucaia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'saputá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'seriguela' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'sorvinha' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'tangerina' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'tamarindo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'word' => 'tâmara' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'toranja' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'tucumã' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'taiuva' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'tapiá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'tarumã' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'tangor' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'tucujá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'umbu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'uvaia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'uchuva' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'vacínio' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'vergamota' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'wampi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'xixá' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'yamamomo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'yuzu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruta,
            'difficult' => true,
            'word' => 'zimbro' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'bromélia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'crisântemo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'hibisco' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'celósia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'helicônia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'rosa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'alpínia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'ave-do-paraíso' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'bastões-do-imperador' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'ciclame' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'orquídea' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'camélia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'dália' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'gérbera' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'cravo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'cravina'
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'melissa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'íris' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'daisy' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'hortênsia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'antúrio' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'acácia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'magnólia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'jasmim' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'dama-da-noite' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'lírio' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'tulipa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'margarida' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'gerânio' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'girassol' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'violeta' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'gardênia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'delfino' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'agerato' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'alamanda' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'álisso' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'astromélia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'difficult' => true,
            'word' => 'astilbe' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $flor,
            'word' => 'azaleia' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'apple' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'apricot' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'banana' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'atemoya' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'avocado' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'blueberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'blackcurrant' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'ackee' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'cranberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'cantaloupe' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'cherry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'black sapote' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'drangonfruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'date' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'cherimoya' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'finger lime' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'coconut' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'inca berry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'physalis' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'grapefruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'gooseberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'custard apple' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'sugar apple' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'sweetsop' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'champedak' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'hazelnut' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'honeyberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'durian' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'horned melon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'hog plum' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'egg fruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'feijoa' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'guavasteen' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'indian fig' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'ice apple' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'guava' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'jackfruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'jujube' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'honeydew melon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'jenipapo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'kiwi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'kabosu' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'kiwano' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'kaffir lime' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'makrut lime' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'lime' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'lychee' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'longan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'longsat' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'mango' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'mulberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'pear' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'lucuma' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'muskmelon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'naranjilla' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'passion fruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'mangosteen' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'nectarine' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'nance' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'quince' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'medlar fruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'orange' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'olive' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'ramphal' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'mouse melon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'papaya' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'peach' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'rose apple' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'water apple' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'noni' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'pomegranate' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'pineapple' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'rambutan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'snake fruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'salak' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'raspberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'strawberry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'starfruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'carambola' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'soursop' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'tangerine' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'watermelon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'sapota' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'blood orange' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'lemon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'sweet lime' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'pomelo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'ugli fruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'yuzu fruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'tangelo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'kumquat' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'mandarin orange' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'word' => 'grape' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'persimmon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'husk cherry' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'bread fruit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'jocote' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'chayote' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $fruit,
            'difficult' => true,
            'word' => 'osage orange' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'asafoetida' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'allspice' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'anise' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'aniseed' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'bay leaf' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'basil' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'black cumin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'black mustard' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'black pepper' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'caraway' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'cardamon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'cumin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'corainder' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'chives' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'cayenne pepper' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'chicory' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'clove' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'dill' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'fennel' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'fenugreek' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'lemon grass' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'difficult' => true,
            'word' => 'mace' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'nutmeg' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'oregano' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'pepper' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'peppermint' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'paprika' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'parsley' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'poppyseed' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'rosemary' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'saffron' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'sage' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'savory' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'sesame seed' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'star anise' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'thyme' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'turmeric' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'vanilla' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'white mustard' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'white pepper' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'brinjal' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'mushroom' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'brocolli' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'capsicum' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'bitter gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'ash gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'turnip' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'ginger' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $spice,
            'word' => 'ginger' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'apple gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'ridged gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'chow chow' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'snake gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'ivy gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'scarlet gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'spinach' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'black bean' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'white bean' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'azuki bean' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'green papaya' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'bottle gourd' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'snake bean' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'yard long bean' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'okra' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'white pumpkin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'field bean' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'coriander leaf' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'banana flower' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'zucchini flower' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'mint' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'spring onion' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'bok choy' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'romaine lettuce' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'rapini' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'kale' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'daikon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'celeriac' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'rutabaga' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'swede' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'sugar beet' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'parsnip' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'horseradish' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'tapioca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'mandioca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'elephant yam' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'greater yam' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'purple yam' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'chinese potato' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'arrowroot' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'word' => 'leek' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'aspargus' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'kohlrabi' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'celtuce' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'rhubarb' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'swiss chard' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $vegetable,
            'difficult' => true,
            'word' => 'cardoon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'horse' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'hare' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'donkey' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'tiger' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'lion' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'panther' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'leopard' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'cheetah' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'bear' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'elephant' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'polar bear' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'turtle' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'tortoise' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'crocodile' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'rabbit' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'porcupine' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'pigeon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'dove' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'albatross' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'crow' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'dolphin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'frog' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'whale' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'alligator' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'eagle' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'flying squirrel' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'ostrich' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'goat' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'jackal' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'hiena' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'armadillo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'goose' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'arctic fox' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'wolf' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'beagle' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'gorilla' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'chimpanzee' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'monkey' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'beaver' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'orangutan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'antelope' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'badger' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'giraffe' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'hermit crab' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'giant panda' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'hamster' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'cobra' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'naja' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'hammerhead shark' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'camel' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'hawk' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'falcon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'deer' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'chameleon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'king cobra' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'ibex' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'lizard' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'koala' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'kangaroo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'iguana' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'llama' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'alpaca' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'chinchillas' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'dodo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'jellyfish' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'rhinocerus' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'hedgehog' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'zebra' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'possum' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'wombat' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'bison' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'bull' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'buffalo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'sheep' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'meekrat' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'mouse' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'otter' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'sloth' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'vulture' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'flamingo' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'racoon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'mole' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'duck' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'swan' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'lynx' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'monitor lizard' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'boar' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'lemur' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'mule' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'baboon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'mammoth' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'blue whale' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'snake' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'peacock' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'rooster' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'chicken' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'salamander' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'toad' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'newt' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'worm' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'vermin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'walrus' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'basilisk' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'water moccasin' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'gecko' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'herring' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'crab' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'brill' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'haddock' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'salmon' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'tuna' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'sardine' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'pike' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'carp' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'shark' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'pufferfish' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'difficult' => true,
            'word' => 'blue tang' 
        ]);
        Word::create([
            'user_id' => $uid1,
            'category_id' => $animal,
            'word' => 'penguin' 
        ]);
    }
}