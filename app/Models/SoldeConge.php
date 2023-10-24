<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldeConge extends Model
{
    protected $fillable = [
        'idEmploye',
        'solde_réel',
        'solde_previsionnel',
        'solde_perm',
        'a_planifier'
    ];

    protected $primaryKey = 'idSoldeConge';

    public $timestamps = false;

    protected $table = "solde_conge";

    public function employe(){
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

    public function soldeCongé()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            $jour = 1;
            $permDeBase = 10;
            $soldeReel = 24;

        }
    }
}
