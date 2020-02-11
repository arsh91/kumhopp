<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendSalesPersonPassword extends Mailable
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
					->subject('Kumhopp: Password for you account!')
                    ->view('email.salespersonPassword')
                    ->with([
                        'name' => $this->emailContent['name'],
                        'password' => $this->emailContent['password']
                    ]);
    }
}
