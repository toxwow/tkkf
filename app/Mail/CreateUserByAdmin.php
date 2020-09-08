<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateUserByAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $random_password, $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($random_password, $email)
    {
        $this->password = $random_password;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.TempPasswordAdmin')
            ->subject("Twoje konto zostało stworzone")
            ->with([
                'email' => $this->email,
                'password' => $this->password
            ]);
    }
}
