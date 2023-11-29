<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Candidats;
use App\Models\Departements;
use App\Models\Genre;
use App\Models\Poste;
use App\Models\StatutMarital;
use App\Models\TypeContrat;
use Illuminate\Support\Facades\Storage;

class CandidatController extends Controller
{
    public function listeCandidats(Request $request)
    {
        if (auth()->check()) {
            $departements = Departements::all();
            $postes = Poste::all();

            // Filtres par défaut
            $statut = $request->input('statut', null);
            $departementId = $request->input('dept', null);
            $posteId = $request->input('poste', null);

            $query = Candidats::with(['deptposte.dept', 'deptposte.poste'])
                ->where('statut', '!=', 3)
                ->where('statut', '!=', 4);

            if ($statut !== null) {
                $query->where('statut', $statut);
            }

            if ($departementId !== null) {
                $query->whereHas('deptposte.dept', function ($query) use ($departementId) {
                    $query->where('idDepartement', $departementId);
                });
            }

            if ($posteId !== null) {
                $query->whereHas('deptposte.poste', function ($query) use ($posteId) {
                    $query->where('idPoste', $posteId);
                });
            }

            if ($request->has('effacer_filtres')) {
                $candidats = $query->paginate(4);
            } else {
                $candidats = $query->paginate(4)->appends($request->except('page'));
            }

            return view('admin.listeCandidats', compact('candidats', 'departements', 'postes'));
        } else {
            return view('connexion');
        }
    }

    public function afficherCV($idCandidat)
    {
        if (auth()->check()) {
            $candidat = Candidats::find($idCandidat);

            if ($candidat) {
                $cvPathPublic = public_path('assets/candidats/CV/' . $candidat->CV);
                $cvPath = public_path('storage/dossier/candidats/CV/' . $candidat->CV);


                if (file_exists($cvPathPublic)) {
                    return response()->file($cvPathPublic, ['Content-Disposition' => 'inline']);
                } elseif (file_exists($cvPath)) {
                    return response()->file($cvPath, ['Content-Disposition' => 'inline']);
                } else {
                    // Si le fichier CV n'est pas trouvé, retournez une réponse 404
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
            session()->put('candidat', $candidat);
            return view('admin.profilCandidat', compact('candidat'));
        }
    }



    public function modifierCandidat()
    {
        if (auth()->check()) {
            $candidat = session()->get('candidat');
            $genre = Genre::all();
            $statut = StatutMarital::all();
            $dept = Departements::all();
            $poste = Poste::all();
            $typecontrat = TypeContrat::all();
            return view('admin.modifierCandidat', compact('candidat', 'genre', 'statut', 'dept', 'poste', 'typecontrat'));
        }
    }

    public function validerModifierCandidat(Request $request)
    {
        $candidat = session()->get('candidat');
        $candidatItem = new Candidats();
        $idDept = $request->input('idDept');
        $idPoste = $request->input('idPoste');
        $deptPoste = DB::select('select idDeptPoste from departement_poste where idDepartement = ? and idPoste = ?', [$idDept, $idPoste]);
        $idDeptPoste = $deptPoste[0]->idDeptPoste;

        if (!$candidat) {
            // Gérer le cas où le candidat n'est pas trouvé
            return redirect()->back()->with('error', 'Candidat non trouvé.');
        }

        // Mettre à jour les champs du candidat
        $candidat->nom = $request->input('nom');
        $candidat->prenom = $request->input('prenom');
        $candidat->idGenre = $request->input('idGenre');
        $candidat->datenaissance = $request->input('datenaissance');
        $candidat->contact = $request->input('contact');
        $candidat->adresse = $request->input('adresse');
        $candidat->email = $request->input('email');
        $candidat->idStatutMarital = $request->input('idStatutMarital');
        $candidat->nb_enfants = $request->input('nbre_enfants');
        $candidat->idDeptPoste = $idDeptPoste;
        $candidat->statut = $request->input('statut');

        // Si une nouvelle photo est téléchargée, la traiter
        if ($request->hasFile('file')) {
            $photo = $request->file('file');
            $path = $candidatItem->sauverImage($photo);
            $candidat->photo = $path;
        }
        if ($request->hasFile('CV')) {
            $cv = $request->file('CV');
            $path = $candidatItem->modifierCV($cv);
            if ($path) {
                $candidat->CV = $path;
                session()->flash('success', 'CV mis à jour avec succès.');
            } else {
                return redirect()->back()->with('error', 'Erreur lors de la mise à jour du CV. Veuillez télécharger un fichier PDF, DOC ou DOCX.');
            }
        }
        if ($request->hasFile('LM')) {
            $lm = $request->file('LM');
            $path = $candidatItem->modifierLM($lm);
            if ($path) {
                $candidat->LM = $path;
                session()->flash('success', 'CV mis à jour avec succès.');
            } else {
                return redirect()->back()->with('error', 'Erreur lors de la mise à jour du CV. Veuillez télécharger un fichier PDF, DOC ou DOCX.');
            }
        }

        // Enregistrez les modifications dans la base de données
        $candidat->save();
        if ($candidat->save()) {
            return redirect()->route('liste-candidats')->with('success', 'Candidat mis à jour avec succès.');
        } else {
            return redirect()->route('liste-candidats')->with('error', 'Erreur.');
        }
    }

    public function supprimerCandidat()
    {
        $candidat = session()->get('candidat');
        $candidat->statut = 4;
        $candidat->save();
        if ($candidat->save()) {
            return redirect()->route('liste-candidats')->with('success', 'Candidat(e) supprimé(e) avec succès.');
        } else {
            return redirect()->route('liste-candidats')->with('error', 'Erreur.');
        }
    }

    public function ajoutCandidat()
    {
        if (auth()->check()) {
            $genres = Genre::all();
            $statut_marital = StatutMarital::all();
            $departements = Departements::all();
            $type_contrat = TypeContrat::all();
            return view('admin.ajoutCandidat', compact('genres', 'statut_marital', 'departements', 'type_contrat'));
        }
    }

    public function ajouterCandidat(Request $request)
    {
        if (auth()->check()) {
            $candidat = new Candidats();

            // Récupération des données du formulaire
            $candidat->nom = $request->input('nom');
            $candidat->prenom = $request->input('prenom');
            $candidat->datenaissance = $request->input('date_naissance');
            $candidat->idGenre = $request->input('idGenre');
            $candidat->contact = $request->input('contact');
            $candidat->adresse = $request->input('adresse');
            $candidat->email = $request->input('email');
            $candidat->idStatutMarital = $request->input('statut_marital');
            $candidat->nb_enfants = $request->input('nbrEnfants');
            $candidat->idTypeContrat = $request->input('idTypeContrat');

            $idPoste = $request->input('idPoste');
            $idDepartement = $request->input('idDepartement');

            $deptPoste = DB::select('select idDeptPoste from departement_poste where idDepartement = ? and idPoste = ?', [$idDepartement, $idPoste]);
            $idDeptPoste = $deptPoste[0]->idDeptPoste;

            $candidat->idDeptPoste = $idDeptPoste;

            // Traitement du fichier photo
            if ($request->hasFile('file')) {
                $photo = $request->file('file');
                $path = $candidat->sauverImage($photo);
                $candidat->photo = $path;
            }

            // Traitement du fichier CV
            if ($request->hasFile('CV')) {
                $cv = $request->file('CV');
                $cvPath = $candidat->modifierCV($cv);

                if ($cvPath) {
                    $candidat->CV = $cvPath;
                    session()->flash('success', 'CV mis à jour avec succès.');
                } else {
                    return redirect()->back()->with('error', 'Erreur lors de la mise à jour du CV. Veuillez télécharger un fichier PDF, DOC ou DOCX.');
                }
            }

            // Traitement du fichier LM
            if ($request->hasFile('LM')) {
                $lm = $request->file('LM');
                $lmPath = $candidat->modifierLM($lm);

                if ($lmPath) {
                    $candidat->LM = $lmPath;
                    session()->flash('success', 'Lettre de motivation mise à jour avec succès.');
                } else {
                    return redirect()->back()->with('error', 'Erreur lors de la mise à jour de la lettre de motivation. Veuillez télécharger un fichier PDF, DOC ou DOCX.');
                }
            }

            // Enregistrement du candidat dans la base de données
            $candidat->statut = 0; // Ou la valeur que vous souhaitez pour le statut initial
            $candidat->save();
            if ($candidat->save()) {
                return redirect()->back()->with('success', 'Candidat(e) ajouté(e) avec succès.');
            } else {
                return redirect()->back()->with('error', 'Erreur.');
            }
        }
    }
}
