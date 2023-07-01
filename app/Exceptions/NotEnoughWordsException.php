<?php

namespace App\Exceptions;

use Exception;
use Inertia\Inertia;
use Inertia\Response;

class NotEnoughWordsException extends Exception {
    public function render($request) {
        $message = $this->getMessage();
        if ($message === null || $message === '') return Inertia::render('Exception/GenericException');
        else return Inertia::render('Exception/GenericException', [ 'message' => $message ]);
    }    
}