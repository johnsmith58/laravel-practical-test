<?php

use App\Http\Controllers\SurveyFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('survey-list', [SurveyFormController::class, 'index'])->name('survey-list');
    Route::get('/survey-forms', [SurveyFormController::class, 'form'])->name('survey-forms');
    Route::post('/survey-forms', [SurveyFormController::class, 'store'])->name('survey-forms-store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
