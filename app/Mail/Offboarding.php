<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Offboarding extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $prenom;
    public $poste;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom, $prenom, $poste)
    {
        //
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->poste = $poste;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.cessationEmploi');
    }
}
