<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendJobNotification extends Mailable
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
					->subject('Kumhopp: A new job is created!')
                    ->view('email.jobNotification')
                    ->with([
                        'user_name' => $this->emailContent['user_name'],
                        'job_name' => $this->emailContent['job_name'],
						'job_id' => $this->emailContent['job_id'],
                    ]);
    }
}
