<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SurveyResource;
use App\Repositories\SurveyManagement\SurveyRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    use ApiResponser;

    /**
     * @var SurveyRepository
     */
    private $surveyRepository;

    public function __construct(SurveyRepository $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function index()
    {
        $surveys = $this->surveyRepository->getAll();
        return $this->success(200, SurveyResource::collection($surveys));
    }

    public function show($id)
    {
        $survey = $this->surveyRepository->getDetail($id);
        return $this->success(200, new SurveyResource($survey));
    }
}
