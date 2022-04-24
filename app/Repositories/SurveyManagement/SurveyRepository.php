<?php

namespace App\Repositories\SurveyManagement;

use App\Models\Survey;

class SurveyRepository
{
    public function getAll()
    {
        // use withCount or with
        return Survey::withCount('likes')->orderBy('id', 'desc')->get();
    }
}