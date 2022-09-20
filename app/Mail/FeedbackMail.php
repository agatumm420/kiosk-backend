<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Feedback;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     *
     */
    private $feedback;
    public function __construct(Feedback $feedback_inp)
    {
        $this->feedback=$feedback_inp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->theme = 'mobile'; //yet the theme
		return $this->subject('Formularz kontaktowy')
			->replyTo('agnieszka@sofine.pl')
			->markdown('emails.support')
			->with([
				'kiosk_id'=>$this->feedback->display_id,
				'message' => $this->feedback->message,
                'ranking'=>$this->feedback->ranking
			]);
    }
}
