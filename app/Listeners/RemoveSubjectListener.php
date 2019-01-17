<?php

namespace App\Listeners;

use App\Events\RemoveSubjectEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuizScore;

class RemoveSubjectListener
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
     * @param  RemoveSubjectEvent  $event
     * @return void
     */
    public function handle(RemoveSubjectEvent $event)
    {
        Mail::to(auth()->user())->send(new QuizScore($event->topic));
    }
}
