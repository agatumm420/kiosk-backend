<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrinterErrorr extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $display_name;
    private $display_level;
    private $location;
    private $status;
    public function __construct(Display $display)
    {
        $this->display_name=$display->name;
        $this->display_level=$display->level;
        $this->location=$display->location;

        $this->status=$display->printer==0?'disabled':'out of paper';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('GLXYkiosk@support.com')->subject('Błąd: Błąd drukarki w kiosku')->markdown('emails.PrinterError', [
            'display'          => $this->user,
            'level'        => $this->status,
            'location'    => $this->documentID,
            'status' =>$this->status
        ]);
    }
}
