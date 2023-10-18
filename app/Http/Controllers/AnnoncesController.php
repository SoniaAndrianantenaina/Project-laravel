<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    //
    public function allDayAnnouncement()
    {
        if (auth()->check()) {
            $announcement = new Annonces();
            $annonces = $announcement->allDayAnnouncements();
            return view('admin.listeAnnoncesDuJour', compact('annonces'));
        }
    }

    public function allUpcomingAnnouncement()
    {
        if (auth()->check()) {
            $announcement = new Annonces();
            $annonces = $announcement->allUpcomingAnnouncements();
            return view('admin.listeAnnoncesAvenir', compact('annonces'));
        }
    }

    public function supprimerAnnonce($idAnnonce)
    {
        if (auth()->check()) {
            $announcement = new Annonces();
            $result = $announcement->deleteAnnouncement($idAnnonce);
            if ($result == true) {
                return redirect()->back()->with('success', 'Annonce supprimée');
            } else {
                return redirect()->back()->with('error', 'Erreur');
            }
        }
    }

    public function ajoutAnnonces(Request $request)
    {
        if (auth()->check()) {
            $titre = $request->input('titre'); // Récupérez le titre ici
            $contenu = $request->input('contenu');
            $date_parution = $request->input('date_parution');
            $date_debut = $request->input('date_debut');
            $date_fin = $request->input('date_fin');
            $photo = $request->file('photo');

            if ($photo->getSize() > 2048 * 1024) {
                return redirect()->back()->with('error', 'Le fichier dépasse la taille maximale de 2 Mo.');
            }

            // Créez une nouvelle annonce et attribuez les valeurs, y compris le titre
            $annonce = new Annonces();
            $annonce->titre = $titre;
            $annonce->contenu = $contenu;
            $annonce->date_parution = $date_parution;
            $annonce->date_debut = $date_debut;
            $annonce->date_fin = $date_fin;

            if ($annonce->storePhotos($photo)) {
                $annonce->save(); // Enregistrez l'annonce avec les valeurs attribuées
                return redirect()->back()->with('success', 'Annonce ajoutée avec succès');
            } else {
                return redirect()->back()->with('error', 'Erreur');
            }
        }
    }
}
