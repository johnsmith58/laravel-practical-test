<?php

namespace App\Repositories\SurveyManagement;

use App\Models\Survey;

class SurveyRepository
{
    public function getAll()
    {
        return Survey::all();
    }
}