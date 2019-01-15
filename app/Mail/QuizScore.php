<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuizScore extends Mailable
{
    use Queueable, SerializesModels;

    public $topic_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($topic_name)
    {
        $this->topic_name = $topic_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('adam@langleyfoxall.co.uk')
                    ->view('emails.quiz_score');
    }
}
