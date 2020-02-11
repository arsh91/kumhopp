<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendDealerPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailContent)
    {
        $this->emailContent = $emailContent;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@kumhopartner.co.uk')
					->subject('Welcome')
                    ->view('email.dealerPassword')
                    ->with([
                        'name' => $this->emailContent['name'],
                        'email' => $this->emailContent['email'],
                        'password' => $this->emailContent['password']
                    ]);
    }
}
