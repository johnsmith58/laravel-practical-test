<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyFormStoreRequest;
use App\Repositories\SurveyManagement\SurveyRepository;
use App\Services\SurveyManagement\SurveyForm;
use Illuminate\Http\Request;

class SurveyFormController extends Controller
{
    public function index(SurveyRepository $surveyRepository)
    {
        $surveys = $surveyRepository->getAll();
        return view('surveys.survey_list', compact('surveys'));
    }

    public function form()
    {
        return view('surveys.survey_form');
    }

    public function store(SurveyFormStoreRequest $request, SurveyForm $surveyForm)
    {
        $surveyForm->store($request->validated());
        return redirect()->route('survey-forms')->with('success', 'Survey Form Submitted Successfully');
    }
}
