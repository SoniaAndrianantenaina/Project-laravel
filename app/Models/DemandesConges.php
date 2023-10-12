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
        'etat'
    ];

    protected $table = "demandes_conges";


    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

    public function motifperm(){
        return $this->belongsTo(MotifPermission::class, 'idMotifPermission');
    }

    public function typeconge(){
        return $this->belongsTo(TypeConge::class, 'idTypeConge');
    }
}
