<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address    = 'admin@minnapadi.com';
        $name       = 'Minna Padi';
        $subject    = 'Contact Us - Minna Padi';

        return $this->view('admin.emails.contact', $this->data)
                    ->from($address, $name)
                    ->subject($subject);
    }
}
