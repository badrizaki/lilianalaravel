<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HumanCapitalMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    protected $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data     = $data;
        $this->Config   = new \Config();
        $this->mail     = $this->Config::get('mail');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address    = $this->mail['alias_mail']['email'];
        $name       = $this->mail['alias_mail']['name'];
        $subject    = "Apply for a vacancy";

        $message = $this->view('admin.emails.humancapital', $this->data);
        $message = $message->from($address, $name);
        if ($this->data['cvUrl'])
        {
            $message->attach($this->data['cvUrl']);
        }
        /*foreach ($this->files as $file) { 
            $message->attach($file['imageUrlKtp']);
            $message->attach($file['imageUrlDevice']);
        }*/
        $message = $message->subject($subject);
        return $message;
    }
}
