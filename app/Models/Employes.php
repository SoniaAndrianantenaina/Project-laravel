<?php

namespace App\Models;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    protected $fillable = [
        'idCandidat',
        'identifiant',
        'mdp'
    ];

    protected $table = "employes";

    protected $primaryKey = 'idEmploye';

    public $timestamps = false;

    public function candidat(){
        return $this->belongsTo(Candidats::class, 'idCandidat');
    }

}
