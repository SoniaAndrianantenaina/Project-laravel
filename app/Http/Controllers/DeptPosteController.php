<?php

namespace App\Http\Controllers;

use App\Models\DepartementPoste;
use App\Models\Departements;
use App\Models\Poste;
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

    public function listeDepartements()
    {
        $departements = DepartementPoste::select('idDepartement', 'idPoste')
            ->with('poste', 'dept')
            ->get()
            ->groupBy('idDepartement');
        return view('admin.listeDépartements', compact('departements'));
    }

    public function updateDept($idDepartement)
    {
        $departement = Departements::find($idDepartement);
        $idDepartement = $departement->idDepartement;
        $postes = DB::select('select d.idDepartement, d.nom, p.* from departements d join departement_poste dp on dp.idDepartement  = d.idDepartement 
        join poste p on p.idPoste = dp.idPoste where d.idDepartement = ?', [$idDepartement]);
        return view('admin.modifierDepartement', compact('departement', 'postes'));
    }

    public function getPosteSalaire($idPoste){
        $postes = Poste::find($idPoste);
        return response()->json($postes);
    }

    public function pageAjoutDeptPoste(){
        $postes = Poste::all();
        $dept = Departements::all();
        return view('admin.ajoutDépartement', compact('postes', 'dept'));
    }
}
