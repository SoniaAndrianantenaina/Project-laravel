<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandesConges extends Model
{
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

    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

    public function motifperm(){
        return $this->belongsTo(MotifPermission::class, 'idMotifPermission');
    }

    public function typeconge(){
        return $this->belongsTo(TypeConge::class, 'idTypeConge');
    }

    public function mesDemandesCongé(){
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            $liste = DemandesConges::where('idEmploye', '=', $employe_id)->get();
            return $liste;
        }
    }

    public function nbJour($date_debut, $date_fin){
        $jourDebut = date('j', strtotime($date_debut));
        $jourFin = date('j', strtotime($date_fin));
        $nbjour = $jourFin - $jourDebut;
        return $nbjour;
    }
}
