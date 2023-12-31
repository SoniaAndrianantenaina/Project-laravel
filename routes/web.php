<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('connexion');
});

//Côté administrateur
Route::get('/accueil-admin', function () {
    return view('admin.accueilAdmin');
})->name('accueil-admin');

Route::get('/profil-admin', function () {
    return view('admin.profilAdmin');
})->name('profil-admin');


    //CANDIDATS
    Route::get('/ajout-candidat', function () {
        return view('admin.ajoutCandidat');
    })->name('ajout-candidat');

    Route::get('/liste-candidats', function () {
        return view('admin/listeCandidats');
    })->name('liste-candidats');

    Route::get('/profil-candidat', function () {
        return view('admin/profilCandidat');
    })->name('profil-candidat');

    //CONTRATS
    Route::get('/convention-stage', function () {
        return view('admin/contrat/conventionStage');
    })->name('convention-stage');

    Route::get('/contrat-cdi', function () {
        return view('admin/contrat/CDI');
    })->name('contrat-cdi');

    Route::get('/contrat-cdd', function () {
        return view('admin/contrat/CDD');
    })->name('contrat-cdd');

    Route::get('/ajout-collaborateur', function () {
        return view('admin.ajoutCollaborateur');
    })->name('ajout-collaborateur');

    Route::get('/envoyer-identifiant', function () {
        return view('admin/envoyerIdentifiant');
    })->name('envoyer-identifiant');

    //EMPLOYÉS
    Route::get('/anniv-collaborateur', function () {
        return view('admin/annivCollaborateur');
    })->name('anniv-collaborateur');

    Route::get('/off-boarding', function () {
        return view('admin/offBoarding');
    })->name('off-boarding');

    Route::get('/liste-employes', function () {
        return view('admin/listeEmployés');
    })->name('liste-employes');

    Route::get('/profil-employe', function () {
        return view('admin/profilEmployé');
    })->name('profil-employe');

    //ANNONCES
    Route::get('/liste-annonces', function () {
        return view('admin/listeAnnonces');
    })->name('liste-annonces');

    Route::get('/ajout-annonce', function () {
        return view('admin/ajoutAnnonce');
    })->name('ajout-annonce');

    Route::get('/modifier-annonce', function () {
        return view('admin/modifierAnnonce');
    })->name('modifier-annonce');


    //DÉPARTEMENTS
    Route::get('/plan-departements', function () {
        return view('admin/planDépartements');
    })->name('plan-departements');

    Route::get('/ajout-departement', function () {
        return view('admin/ajoutDépartement');
    })->name('ajout-departement');

    Route::get('/liste-departements', function () {
        return view('admin/listeDépartements');
    })->name('liste-departements');

    //CONGÉS
    Route::get('/planning-conge', function () {
        return view('admin/planningCongés');
    })->name('planning-conge');

    Route::get('/demande-employe-conge', function () {
        return view('admin/demandesEmployésCongés');
    })->name('demande-employe-conge');


//Côté employé
Route::get('/accueil-employe', function () {
    return view('employé.accueilEmployé');
})->name('accueil-employe');

    //congés
    Route::get('/solde-conge', function () {
        return view('employé.soldeCongé');
    })->name('solde-conge');

    Route::get('/demande-conge', function () {
        return view('employé.demandeCongé');
    })->name('demande-conge');

    Route::get('/liste-demande-conge', function () {
        return view('employé.listeDemandesCongé');
    })->name('liste-demande-conge');

    Route::get('/liste-annonces-employe', function () {
        return view('employé.listeAnnonces');
    })->name('liste-annonces-employe');

    Route::get('/liste-collaborateurs', function () {
        return view('employé.listeEmployés');
    })->name('liste-collaborateurs');

    Route::get('/profil-collaborateur', function () {
        return view('employé.profilCollaborateur');
    })->name('profil-collaborateurs');

    //profil
    Route::get('/mon-profil', function () {
        return view('employé.monProfil');
    })->name('mon-profil');

