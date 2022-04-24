<?php

namespace App\Services\SurveyManagement;

use App\Models\Survey;
use App\Exceptions\SurveyFormException;
use App\Services\SurveyManagement\FormInterface;

class SurveyForm implements FormInterface
{
    public function store($request) : Survey
    {
        try {
            $auth = auth()->id();
            return Survey::create(array_merge($request, ['user_id' => $auth]));
        } catch (\Exception $exception) {
            throw new SurveyFormException($exception->getMessage());
        }
    }
}