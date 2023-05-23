<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class BadRequestException extends Exception
{
    public function report(){
        Log::alert('Bad Request Exception');
    }

    public function render(){
        return redirect("/post/create")->with('message', 'OpenAI error - cant generate photo! Try again!');
    }
}
