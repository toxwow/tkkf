<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class changePassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $email, $password, $name;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct($password, $email, $name)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this

            ->view('emails.changePassword')
            ->subject("Dostęp do panelu kapitana ")
            ->attach(public_path('files/panel-kapitana.pdf'))
            ->with([
                'email' => $this->email,
                'password' => $this->password,
                'name' => $this->name,
            ]);
    }
}
