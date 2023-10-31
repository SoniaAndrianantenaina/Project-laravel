<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationConge extends Mailable
{
    use Queueable, SerializesModels;

    public $date_debut;
    public $date_fin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date_debut, $date_fin)
    {
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.confirmationConge');
    }
}
