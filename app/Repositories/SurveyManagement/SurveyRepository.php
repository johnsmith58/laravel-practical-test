<?php

namespace App\Repositories\SurveyManagement;

use App\Models\Survey;
use App\Repositories\SurveyManagement\GetAllInterface;
use App\Repositories\SurveyManagement\ShowDetailInterface;

class SurveyRepository implements GetAllInterface, ShowDetailInterface
{
    public function getAll()
    {
        // use withCount or with
        return Survey::withCount('likes')->orderBy('id', 'desc')->get();
    }

    public function getDetail(int $id)
    {
        try {
            return Survey::findOrFail($id)->withCount('likes')->first();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
            // throw new \Exception('Survey not found by id' . $id);
        }
    }
}