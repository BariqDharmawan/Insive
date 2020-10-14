<?php

namespace App\Mail;

use App\Models\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageFromCustomer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Initiate message from customer with $contactUs
     *
     * @var Order
     */
    public $contactUs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contactUs)
    {
        $this->contactUs = $contactUs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Message From Customer')
                    ->replyTo($this->contactUs->email_customer)
                    ->markdown('email.message_customer');
    }
}
