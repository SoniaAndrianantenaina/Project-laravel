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

    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }
}
