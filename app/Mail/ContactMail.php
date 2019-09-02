<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_balasan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email_balasan = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->subject('Balasan Dari Insive')
                    ->from('bariq.2nd.rodriguez@gmail.com')
                    ->to($request->from_customer)
                    ->view('partial.contact_mail');
    }
}
