<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SplSubject;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $identifiant;
    public $mdp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($identifiant, $mdp)
    {
        $this->identifiant = $identifiant;
        $this->mdp = $mdp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.identifiants');
    }
}
