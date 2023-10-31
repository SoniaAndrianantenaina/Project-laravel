<?php

namespace App\Models;

use DateTime;
use App\Mail\ConfirmationConge;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DemandesConges extends Model
{
    use HasFactory;

    protected $fillable = [
        'idEmploye',
        'idMotifPermission',
        'idTypeConge',
        'date_debut',
        'date_fin',
        'etat',
        'date_demande'
    ];

    protected $table = "demandes_conges";

    protected $primaryKey = 'idDemandeConge';

    public $timestamps = false;

    public function employe()
    {
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

    public function motifperm()
    {
        return $this->belongsTo(MotifPermission::class, 'idMotifPermission');
    }

    public function typeconge()
    {
        return $this->belongsTo(TypeConge::class, 'idTypeConge');
    }

    public function mesDemandesCongé()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            $liste = DemandesConges::where('idEmploye', '=', $employe_id)->get();
            return $liste;
        }
    }

    public function lastLeaves()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;

            return $this->with('employe', 'motifperm', 'typeconge')
                ->where('idEmploye', $employe_id)
                ->orderBy('date_debut', 'desc')
                ->limit(3)
                ->get();
        }
    }

    public function nbJour($date_debut, $date_fin)
    {
        $joursFeries = array(
            '2024-01-01',
            '2023-12-31',
            '2023-12-25',
            '2023-11-01',
            '2023-08-15'
        );

        $jourDebut = new DateTime($date_debut);
        $jourFin = new DateTime($date_fin);
        $interval = $jourDebut->diff($jourFin);

        $nbJour = $interval->days + 1;

        for ($i = 0; $i <= $interval->days; $i++) {
            $jour = $jourDebut->format('N'); // 1 (lundi) à 7 (dimanche)
            $dateActuelle = $jourDebut->format('Y-m-d');

            if ($jour === '6' || $jour === '7' || in_array($dateActuelle, $joursFeries)) {
                $nbJour--;
            }

            $jourDebut->modify('+1 day');
        }

        return $nbJour;
    }

    public function mailConfirmation($date_debut, $date_fin, $email)
    {
        $mail = new ConfirmationConge($date_debut, $date_fin);
        $mail->to($email);
        Mail::send($mail);

        if (count(Mail::failures()) > 0) {
            return 0;
        } else {
            return 1;
        }
    }

}
