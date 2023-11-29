<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mail;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $UserMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($UserMail)
    {
        $this->UserMail = $UserMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');

        return $this->view('user_mail',['UserMail'=>$this->UserMail]);
    }
}
