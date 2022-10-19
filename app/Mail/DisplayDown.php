<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Display;

class DisplayDown extends Mailable
{
    use Queueable, SerializesModels;
    private $display_name;
    private $display_level;
    private $location;
    private $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Display $display)
    {
        $this->display_name=$display->name;
        $this->display_level=$display->level;
        $this->location=$display->location;

        $this->status='Kiosk jest odłączony od systemu';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('GLXYkiosk@support.com')->subject('Kiosk został odłączony')->markdown('emails.DisplayDown', [
            'display'          => $this->user,
            'level'        => $this->status,
            'location'    => $this->documentID,
            'status' =>$this->status
        ]);
    }
}
