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

//HEADER

//ADMINISTRATEUR
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

Route::get('/anniv-collaborateur', function () {
    return view('admin/annivCollaborateur');
})->name('anniv-collaborateur');

Route::get('/off-boarding', function () {
    return view('admin/offBoarding');
})->name('off-boarding');




