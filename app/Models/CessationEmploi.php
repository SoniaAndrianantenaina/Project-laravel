<?php

namespace App\Models;

use App\Mail\Offboarding;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class CessationEmploi extends Model
{
    protected $fillable = [
        'idTypeDepart',
        'idEmploye',
        'motif',
        'date_depart'
    ];

    protected $table = "cessation_emploi";

    protected $primaryKey = 'idCessationEmploi';

    public $timestamps = false;

    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

    public function typedepart(){
        return $this->belongsTo(TypeDepart::class, 'idTypeDepart');
    }

    public function mailOffboarding($nom, $prenom, $poste, $adressesEmail){
        $mail = new Offboarding($nom, $prenom, $poste);
        $mail->to($adressesEmail);
        Mail::send($mail);
        if (count(Mail::failures()) > 0) {
            return 0;
        } else {
            return 1;
        }
    }
}
