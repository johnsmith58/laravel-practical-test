<?php

namespace App\Exceptions;

use Exception;

class SurveyFormException extends Exception
{
    public function report()
    {
        //
    }

    public function render($request)
    {
        return view('errors.500');
    }
}
