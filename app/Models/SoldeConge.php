<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

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

    public function employe()
    {
        return $this->belongsTo(Employes::class, 'idEmploye');
    }

    public function soldeCongé()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            $solde = DB::select('select * from solde_conge where idEmploye = ?', [$employe_id]);
            return $solde;
        }
    }

    public function permConsommées()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            $nb_perm = DB::select('select solde_perm from solde_conge where idEmploye = ?', [$employe_id]);
            $solde_perm = $nb_perm[0]->solde_perm;
            $permconsommée = 10 - $solde_perm;
            return $permconsommée;
        }
    }

    public function addTwoDays()
    {
        if (auth()->guard('employee')->check()) {
            if (!session('twoDaysAdded')) {
                $jourActuel = date('j');
                $dernierJourDuMois = date('t');

                if ($jourActuel == $dernierJourDuMois) {
                    $addTwo = 2;
                    $soldes = SoldeConge::all();

                    foreach ($soldes as $solde) {
                        $solde->update([
                            'solde_réel' => $solde->solde_réel + $addTwo,
                            'solde_previsionnel' => $solde->solde_previsionnel + $addTwo,
                        ]);
                    }
                    session(['twoDaysAdded' => true]);
                }
            }
        }
    }

    public function aPlanifier($solde_reel)
    {
        if (auth()->guard('employee')->check()) {
            if ($solde_reel >= 7) {
                $aplanifier = $solde_reel - 7;
            } elseif ($solde_reel <= 6) {
                $aplanifier = 0;
            }
            return $aplanifier;
        }
    }
}
