<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CessationEmploi extends Model
{
    protected $fillable = [
        'idEmploye',
        'motif',
        'date_depart',
        'etat'
    ];

    protected $table = "cessation_emploi";

    protected $primaryKey = 'idCessationEmploi';

    public $timestamps = false;

    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }
}
