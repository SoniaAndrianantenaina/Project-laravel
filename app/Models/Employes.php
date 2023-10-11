<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    protected $fillable = [
        'idCandidat',
        'identifiant',
        'mdp'
    ];

    public function candidat(){
        return $this->belongsTo(Candidats::class, 'idCandidat');
    }

}
