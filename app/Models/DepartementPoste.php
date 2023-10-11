<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartementPoste extends Model
{
    protected $fillable = [
        'idDepartement',
        'idPoste'
    ];

    public function dept(){
        return $this->belongsTo(Departements::class, 'idDepartement');
    }

    public function poste(){
        return $this->belongsTo(Poste::class, 'idPoste');
    }
}
