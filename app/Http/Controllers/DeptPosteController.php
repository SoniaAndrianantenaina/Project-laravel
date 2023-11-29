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

    public function listeDepartements(Request $request)
    {
        if (auth()->check()) {
            $query = DepartementPoste::select('dp.idDepartement', 'dp.idPoste', 'd.nom as nomDepartement', 'p.nom as nomPoste')
                ->from('departement_poste as dp')
                ->join('departements as d', 'd.idDepartement', '=', 'dp.idDepartement')
                ->join('poste as p', 'p.idPoste', '=', 'dp.idPoste');

            if ($request->has('sort')) {
                $sortOrder = $request->input('sort');
                $query->orderBy('nomDepartement', $sortOrder);
            }

            $departements = $query->get()->groupBy('idDepartement');

            return view('admin.listeDépartements', compact('departements'));
        }
    }

    public function searchdepartements(Request $request)
    {
        if (auth()->check()) {
            $query = DepartementPoste::select('idDepartement', 'idPoste')
                ->with('poste', 'dept');

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->whereHas('dept', function ($subQ) use ($searchTerm) {
                        $subQ->where('nom', 'like', '%' . $searchTerm . '%');
                    })
                        ->orWhereHas('poste', function ($subQ) use ($searchTerm) {
                            $subQ->where('nom', 'like', '%' . $searchTerm . '%');
                        });
                });
            }

            $departements = $query->get()->groupBy('idDepartement');

            return view('admin.listeDépartements', compact('departements'));
        }
    }

    public function updateDept($idDepartement)
    {
        if (auth()->check()) {
            $departement = Departements::find($idDepartement);
            session()->put('departement', $departement);
            $postes = DB::select('select d.idDepartement, d.nom, p.* from departements d join departement_poste dp on dp.idDepartement  = d.idDepartement 
                    join poste p on p.idPoste = dp.idPoste where d.idDepartement = ?', [$idDepartement]);
            return view('admin.modifierDepartement', compact('departement', 'postes'));
        }
    }

    public function modifierDeptPoste(Request $request)
    {
        if (auth()->check()) {
            $departement = session()->get('departement');
            $idDepartement = $departement->idDepartement;

            if ($request->has('nomDepartement')) {
                // ... (le code reste inchangé)
            }

            // Vérifiez si les clés 'nomPoste', 'salairePoste', et 'degrePoste' existent dans la requête
            if (
                $request->has('nomPoste') &&
                $request->has('salairePoste') &&
                $request->has('degrePoste')
            ) {
                $nomsPoste = $request->input('nomPoste');
                $salairesPoste = $request->input('salairePoste');
                $degresPoste = $request->input('degrePoste');

                $postes = DB::select('SELECT p.* FROM poste p JOIN departement_poste dp ON dp.idPoste = p.idPoste WHERE dp.idDepartement = ?', [$idDepartement]);

                foreach ($postes as $index => $poste) {
                    $posteModel = Poste::find($poste->idPoste);

                    $posteModel->nom = $nomsPoste[$index];
                    $posteModel->salaire = $salairesPoste[$index];
                    $posteModel->degre = $degresPoste[$index];

                    $posteModel->save();
                }

                return redirect()->route('update-department', ['idDepartement' => $idDepartement])->with('success', 'Modifié avec succès');
            }
        }
    }


    public function deleteDepartementPoste($idDepartement, $idPoste)
    {
        if (auth()->check()) {
            echo $idDepartement . $idPoste;
            $idDeptPoste = DB::select('select idDeptPoste from departement_poste where idDepartement = ? and idPoste = ?', [$idDepartement, $idPoste]);
            if (!empty($idDeptPoste)) {
                $id = $idDeptPoste[0]->idDeptPoste;
                $item = DepartementPoste::find($id);
                $item->delete();
                return redirect()->back()->with('success', 'Suppression réussie.');
            } else {
                return redirect()->back()->with('error', 'Le poste n\'a pas été trouvée.');
            }
        }
    }

    public function deletePoste($idPoste)
    {
        if (auth()->check()) {
            if (!empty($idPoste)) {
                DepartementPoste::where('idPoste', $idPoste)->delete();
                $item = Poste::find($idPoste);
                $item->delete();
                return redirect()->back()->with('success', 'Suppression réussie.');
            } else {
                return redirect()->back()->with('error', 'Le poste n\'a pas été trouvée.');
            }
        }
    }

    public function listePostes()
    {
        if (auth()->check()) {
            $postes = Poste::pluck('nom', 'idPoste')->toArray();
            return response()->json($postes);
        }
    }

    public function ajoutDépartement()
    {
        $postes = Poste::all();
        return view('admin.ajoutDépartement', compact('postes'));
    }

    public function ajoutPosteDepartement($idDepartement, $idPoste)
    {
        if (auth()->check()) {

            echo $idDepartement . $idPoste;
            $departementPoste = new DepartementPoste();

            $departementPoste->idDepartement = $idDepartement;
            $departementPoste->idPoste = $idPoste;

            $departementPoste->save();

            if ($departementPoste->save()) {
                return redirect()->back()->with('success', 'Poste ajoutée avec succès.');
            } else {
                return redirect()->back()->with('error', 'Erreur.');
            }
        }
    }

    public function deleteDept($idDepartement)
    {
        if (auth()->check()) {
            dd($idDepartement);
            DepartementPoste::where('idDepartement', $idDepartement)->delete();
            $item = Departements::find($idDepartement);
            $item->delete();
            return redirect()->route('update-department', ['idDepartement' => $idDepartement])->with('success', 'Suppression réussie.');
        } else {
            return redirect()->route('update-department', ['idDepartement' => $idDepartement])->with('error', 'Le poste n\'a pas été trouvée.');
        }
    }

    public function addDeptPoste(Request $request)
    {
        if (auth()->check()) {
            $nomDepartement = $request->input('nomDepartement');
            $nomPoste = $request->input('nomPoste');
            $salairePoste = $request->input('salairePoste');
            $degrePoste = $request->input('degrePoste');
            $poste = $request->input('poste');

            if ($nomDepartement) {

                $idDepartement = Departements::insertGetId([
                    'nom' => $nomDepartement,
                ]);

                // Associer chaque poste au département
                foreach ($poste as $idPoste) {
                    DepartementPoste::insert([
                        'idDepartement' => $idDepartement,
                        'idPoste' => $idPoste,
                    ]);
                }

                $departement = Departements::find($idDepartement);

                if ($departement) {
                    return redirect()->back()->with('success', 'Ajout département réussi.');
                } else {
                    return redirect()->back()->with('error', 'Erreur lors de l\'ajout du département.');
                }
            } elseif ($nomPoste) {
                $poste = new Poste();
                $poste->nom = $nomPoste;
                $poste->salaire = $salairePoste;
                $poste->degre = $degrePoste;
                if ($poste->save()) {
                    return redirect()->back()->with('success', 'Ajout département réussie.');
                } else {
                    return redirect()->back()->with('error', 'Erreur');
                }
            }
        }
    }

    public function pageAjoutDeptPoste()
    {
        $postes = Poste::all();
        $dept = Departements::all();
        return view('admin.ajoutDépartement', compact('postes', 'dept'));
    }
}
