<?php

namespace App\Services\SurveyManagement;

use App\Models\Survey;
use App\Events\SubmitSurveyForm;
use App\Exceptions\SurveyFormException;
use App\Services\SurveyManagement\FormInterface;

class SurveyForm implements FormInterface
{
    public function store($request) : Survey
    {
        try {
            $auth = auth()->id();
            $survey = Survey::create(array_merge($request, ['user_id' => $auth]));
            event(new SubmitSurveyForm($survey));
            return $survey;
        } catch (\Exception $exception) {
            throw new SurveyFormException($exception->getMessage());
        }
    }
}