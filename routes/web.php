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
