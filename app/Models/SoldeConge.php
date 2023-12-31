<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldeConge extends Model
{
    protected $fillable = [
        'idEmploye',
        'solde'
    ];

    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

}
