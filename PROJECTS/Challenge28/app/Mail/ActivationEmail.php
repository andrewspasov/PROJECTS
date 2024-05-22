<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $token;
    public $activationUrl;

    public function __construct($user, $activationUrl)
    {
        $this->user = $user;
        $this->activationUrl = $activationUrl;
    }

    public function build()
    {
        return $this->view('emails.activation')
            ->with([
                'url' => $this->activationUrl
            ]);
    }

}
