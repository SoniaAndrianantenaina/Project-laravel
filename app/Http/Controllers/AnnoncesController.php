<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    //
    public function allDayAnnouncement()
    {
        $announcement = new Annonces();
        $annonces = $announcement->allDayAnnouncements();
        return view('annonces.listeAnnoncesDuJour', compact('annonces'));
    }

    public function allUpcomingAnnouncement()
    {
        $announcement = new Annonces();
        $annonces = $announcement->allUpcomingAnnouncements();
        return view('annonces.listeAnnoncesAvenir', compact('annonces'));
    }

    public function supprimerAnnonce($idAnnonce)
    {
        if (auth()->guard('web')->check()) {
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
        if (auth()->guard('web')->check()) {
            $titre = $request->input('titre');
            $contenu = $request->input('contenu');
            $date_parution = $request->input('date_parution');
            $date_debut = $request->input('date_debut');
            $date_fin = $request->input('date_fin');
            $photo = $request->file('photo');

            if (!$photo->isValid()) {
                return redirect()->back()->with('error', 'Fichier de téléchargement invalide.');
            }
            if ($photo->getSize() > 2048 * 1024) {
                return redirect()->back()->with('error', 'Le fichier dépasse la taille maximale de 2 Mo.');
            }

            $annonce = new Annonces();
            $path = $annonce->storePhotos($photo);

            $compareHeure = $annonce->compareHeure($date_debut, $date_fin);

            if ($path && $compareHeure == 0) {
                $annonce->photo = $path;

                $annonce->titre = $titre;
                $annonce->contenu = $contenu;
                $annonce->date_parution = $date_parution;
                $annonce->date_debut = $date_debut;
                $annonce->date_fin = $date_fin;
                $annonce->save();

                return redirect()->back()->with('success', 'Annonce ajoutée avec succès');
            } elseif ($compareHeure == -1) {
                return redirect()->back()->with('error', 'Veuillez revérifier car votre Heure début est supérieure à votre heure fin');
            } elseif ($compareHeure == -2) {
                return redirect()->back()->with('error', 'Veuillez revérifier car votre Date début est supérieure à votre date fin');
            } else {
                return redirect()->back()->with('error', 'Re-vérifier les éléments que vous avez entré');
            }
        }
    }

    public function modifierAnnonce($idAnnonce)
    {
        if (auth()->guard('web')->check()) {
            $annonce = Annonces::find($idAnnonce);
            session()->put('annonce', $annonce);

            return view('admin.modifierAnnonce', compact('annonce'));
        }
    }

    public function validerModifAnnonce(Request $request)
    {
        if (auth()->guard('web')->check()) {
            $annonce = session()->get('annonce');
            $titre = $request->input('titre');
            $contenu = $request->input('contenu');
            $date_parution = $request->input('date_parution');
            $date_debut = $request->input('date_debut');
            $date_fin = $request->input('date_fin');
            $photo = $request->file('file');

            if ($photo) {

                if (!$photo->isValid()) {
                    return redirect()->back()->with('error', 'Fichier de téléchargement invalide.');
                }
                if ($photo->getSize() > 2048 * 1024) {
                    return redirect()->back()->with('error', 'Le fichier dépasse la taille maximale de 2 Mo.');
                }
            }

            $path = $annonce->storePhotos($photo);

            $compareHeure = $annonce->compareHeure($date_debut, $date_fin);

            if ($path === false) {
                return redirect()->back()->with('error', 'Erreur lors de la gestion de la photo.');
            }

            if ($compareHeure == -1) {
                return redirect()->back()->with('error', 'Veuillez revérifier car votre Heure début est supérieure à votre heure fin');
            }
            if ($compareHeure == -2) {
                return redirect()->back()->with('error', 'Veuillez revérifier car votre Date début est supérieure à votre');
            }

            if ($path !== null) {
                $annonce->photo = $path;
            }

            $annonce->titre = $titre;
            $annonce->contenu = $contenu;
            $annonce->date_parution = $date_parution;
            $annonce->date_debut = $date_debut;
            $annonce->date_fin = $date_fin;

            $annonce->update();

            return redirect()->back()->with('success', 'Annonce modifiée avec succès');
        }
    }
}
