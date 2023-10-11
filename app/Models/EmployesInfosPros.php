<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployesInfosPros extends Model
{
    protected $fillable = [
        'idEmploye',
        'idDeptPoste',
        'idTypeContrat',
        'date_debut',
        'date_fin'
    ];

    public function deptposte(){
        return $this->belongsTo(DepartementPoste::class, 'idDeptPoste');
    }

    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

    public function typecontrat(){
        return $this->belongsTo(TypeContrat::class, 'idTypeContrat');
    }
}
