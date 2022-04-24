<?php

namespace App\Listeners;

use App\Events\SubmitSurveyForm;
use App\Jobs\SubmitSurveyFormMailJob;
use App\Mail\SubmitSurveyFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSurveyMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SubmitSurveyForm  $event
     * @return void
     */
    public function handle(SubmitSurveyForm $event)
    {
        // Mail::to($event->survey->email)->send(new SubmitSurveyFormMail($event->survey));
        SubmitSurveyFormMailJob::dispatch($event->survey);
    }
}
