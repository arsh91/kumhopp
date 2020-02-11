<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $emailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    /*public function build()
    {
        return $this->from('vjksharma37@gmail.com')
        ->view('email.orderEmail');
    }*/

    public function build()
    {
        return $this->from('noreply@kumhopartner.co.uk', 'KUMHOPP')
                    ->subject('ORDER GENERATED SUCCESSFULLY !!')
                    ->view('email.orderEmail')
                    ->with([
                        'dealerName' => $this->emailData['dealerInfo']['first_name'],
                        'cart' => $this->emailData['cartItems'],
                        'price' => $this->emailData['cartItems']['totalCartValue'],
                        'shippingAddress' => $this->emailData['shipping']
                    ]);
    }
}
