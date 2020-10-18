<?php

namespace App\Mail;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReceiptPayment extends Mailable
{
    use Queueable, SerializesModels;


    public $receipt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->receipt = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Here is a transation for your customer')->markdown('email.receipt-payment');
    }
}
