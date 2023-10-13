<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidats;


class CandidatController extends Controller
{
    public function listeCandidats()
    {
        $candidats = Candidats::where('statut', '!=', 3)->paginate(10);
        return view('admin.listeCandidats', compact('candidats'));
    }

    public function afficherCV($idCandidat)
    {
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

    public function afficherLM($idCandidat)
    {
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

    public function profilCandidat($idCandidat){
        $candidat = Candidats::find($idCandidat);
        return view('admin.profilCandidat', compact('candidat'));
    }

}
