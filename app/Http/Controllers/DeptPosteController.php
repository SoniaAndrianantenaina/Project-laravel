<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeptPosteController extends Controller
{
    //
    public function getPostesByDepartement($idDepartement)
    {
        $postes = DB::select('SELECT d.idDepartement, p.idPoste, p.nom
                     FROM departements d
                     JOIN departement_poste dp ON dp.idDepartement = d.idDepartement
                     JOIN poste p ON p.idPoste = dp.idPoste
                     WHERE d.idDepartement = :idDepartement', ['idDepartement' => $idDepartement]);

        return response()->json(['postes' => $postes]);
    }
}
