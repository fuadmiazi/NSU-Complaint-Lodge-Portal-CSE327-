<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CriminalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details3;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details3)
    {
        $this->details3 = $details3;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('NSU Complaint Lodge Portal')->view('emails.mailToConvict');
    }
}
