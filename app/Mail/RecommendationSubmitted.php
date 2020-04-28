<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecommendationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $recommendation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recommendation)
    {
        $this->recommendation = $recommendation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A new recommendation submitted')
                    ->markdown('emails.recommendation.submitted');
    }
}
