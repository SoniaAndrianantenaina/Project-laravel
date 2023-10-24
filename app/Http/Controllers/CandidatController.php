<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Candidats;
use App\Models\Departements;
use App\Models\Genre;
use App\Models\StatutMarital;
use App\Models\TypeContrat;

class CandidatController extends Controller
{
    public function listeCandidats()
    {
        //  dd(auth()->check());
        if (auth()->check()) {
            $util = auth()->user();
            $candidats = Candidats::where('statut', '!=', 3)->paginate(10);
            return view('admin.listeCandidats', compact('candidats', 'util'));
        } else {
            return view('connexion');
        }
    }

    public function afficherCV($idCandidat)
    {
        if (auth()->check()) {
            $candidat = Candidats::find($idCandidat);

            if ($candidat) {
                $cvPath = public_path('assets/candidats/CV/' . $candidat->CV);

                if (file_exists($cvPath)) {
                    return response()->file($cvPath, ['Content-Disposition' => 'inline']);
                } else {
                    return response('Fichier CV introuvable', 404);
                }
            } else {
                return response('Candidat introuvable', 404);
            }
        }
    }

    public function afficherLM($idCandidat)
    {
        if (auth()->check()) {
            $candidat = Candidats::find($idCandidat);

            if ($candidat) {
                $cvPath = public_path('assets/candidats/LM/' . $candidat->LM);

                if (file_exists($cvPath)) {
                    return response()->file($cvPath, ['Content-Disposition' => 'inline']);
                } else {
                    return response('Fichier CV introuvable', 404);
                }
            } else {
                return response('Candidat introuvable', 404);
            }
        }
    }

    public function profilCandidat($idCandidat)
    {
        if (auth()->check()) {
            $candidat = Candidats::find($idCandidat);
            return view('admin.profilCandidat', compact('candidat'));
        }
    }

    public function ajoutCandidat()
    {
        if (auth()->check()) {
            $genres = Genre::all();
            $statut_marital = StatutMarital::all();
            $departements = Departements::all();
            $type_contrat = TypeContrat::all();
            return view('admin.ajoutCandidat', compact('genres', 'statut_marital', 'departements','type_contrat'));
        }
    }

    public function ajouterCandidat(Request $request)
    {
        if (auth()->check()) {
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $date_naissance = $request->input('date_naissance');
            $idGenre = $request->input('idGenre');
            $contact = $request->input('contact');
            $adresse = $request->input('adresse');
            $email = $request->input('email');
            $statut_marital = $request->input('statut_marital');
            $nbrEnfants = $request->input('nbrEnfants');

            $idPoste = $request->input('idPoste');
            $idDepartement = $request->input('idDepartement');
            $idDeptPoste = DB::table('departements as d')
                ->join('departement_poste as dp', 'dp.idDepartement', '=', 'd.idDepartement')
                ->join('poste as p', 'p.idPoste', '=', 'dp.idPoste')
                ->select('dp.idDeptPoste')
                ->where('d.idDepartement', $idDepartement)
                ->where('p.idPoste', $idPoste)
                ->first();

            if ($idGenre != 0) {
                $candidat = Candidats::create([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'datenaissance' => $date_naissance,
                    'adresse' => $adresse,
                    'contact' => $contact,
                    'email' => $email,
                    'idGenre' => $idGenre,
                    'idStatutMarital' => $statut_marital,
                    'nb_enfants' => $nbrEnfants,
                    'idDeptPoste' => $idDeptPoste,
                    'statut' => 0
                ]);
            }
        }
    }

}
