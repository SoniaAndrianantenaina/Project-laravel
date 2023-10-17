<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\DeptPosteController;
use App\Http\Controllers\EmployeController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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
Route::post('login-admin', [LogController::class, 'loginAdmin'])->name('login-admin');

    Route::get('/accueil-admin', function () {
        return view('admin.accueilAdmin');
    })->name('accueil-admin');

    //PROFIL
    Route::get('/profil-admin', function () {
        return view('admin.profilAdmin');
    })->name('profil-admin');


    //CANDIDATS
    Route::get('liste-candidats', [CandidatController::class, 'listeCandidats'])->name('liste-candidats');

    Route::get('/cv-candidat/{idCandidat}', [CandidatController::class, 'afficherCV'])->name('afficher-cv');

    Route::get('/lm-candidat/{idCandidat}', [CandidatController::class, 'afficherLM'])->name('afficher-LM');

    Route::get('/profil-candidat/{idCandidat}', [CandidatController::class, 'profilCandidat'])->name('profil-candidat');

    Route::get('/ajout-candidat', [CandidatController::class, 'ajoutCandidat'])->name('ajout-candidat');

    Route::post('valider-ajout-candidat', [CandidatController::class, 'ajouterCandidat'])->name('valider-ajout-candidat');

    //EMPLOYÉS
    Route::get('/ajout-collaborateur/{idCandidat}', [EmployeController::class, 'ajoutCollaborateur'])->name('ajout-collaborateur');

    Route::post('/generer-id', [EmployeController::class, 'genererID'])->name('generer-id');

    Route::post('/envoyer-identifiant', [EmployeController::class, 'envoyerIdentifiants'])->name('envoyer-identifiant');

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

    //POSTES
    Route::get('/get-postes/{idDepartement}', [DeptPosteController::class, 'getPostesByDepartement'])->name('get-postes');


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

    Route::get('/liste-departements', [DeptPosteController::class, 'listeDepartements'])->name('liste-departements');

    //CONGÉS
    Route::get('/planning-conge', function () {
        return view('admin/planningCongés');
    })->name('planning-conge');

    Route::get('/demande-employe-conge', function () {
        return view('admin/demandesEmployésCongés');
    })->name('demande-employe-conge');


//Côté employé
Route::post('login-employé', [LogController::class, 'loginEmployé'])->name('login-employé');

    Route::get('/accueil-employé', function () {
        return view('employé.accueilEmployé');
    })->name('accueil-employé');

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

