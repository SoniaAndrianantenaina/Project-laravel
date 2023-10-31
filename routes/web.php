<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\DeptPosteController;
use App\Http\Controllers\EmployeController;
use App\Mail\TestMail;
use App\Models\Annonces;
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
})->name('connexion');



//Côté administrateur
    Route::post('login-admin', [LogController::class, 'loginAdmin'])->name('login-admin');

    Route::get('logout-admin', [LogController::class, 'logoutAdmin'])->name('logout-admin');

    Route::get('accueil-admin', [AdminController::class, 'accueilAdmin'])->name('accueil-admin');

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

    Route::get('/liste-employes', [EmployeController::class, 'listeEmployes'])->name('liste-employes');

    Route::get('/profil-employe/{idEmploye}', [EmployeController::class, 'profilEmployé'])->name('profil-employe');

    Route::get('/get-employes/{idDepartement}', [EmployeController::class, 'getEmployes'])->name('get-employes');

    Route::get('/anniversaire', [EmployeController::class, 'birthdayMail'])->name('anniversaire');

    Route::get('/off-boarding', [EmployeController::class, 'offBoarding'])->name('off-boarding');

    //POSTES
    Route::get('/get-postes/{idDepartement}', [DeptPosteController::class, 'getPostesByDepartement'])->name('get-postes');


    //ANNONCES
    Route::get('/annonces-du-jour', [AnnoncesController::class, 'allDayAnnouncement'])->name('annonces-du-jour');

    Route::get('/annonces-à-venir', [AnnoncesController::class, 'allUpcomingAnnouncement'])->name('annonces-à-venir');

    Route::get('/supprimer-annonce/{idAnnonce}', [AnnoncesController::class, 'supprimerAnnonce'])->name('supprimer-annonce');

    Route::get('/modifier-annonce/{idAnnonce}', [AnnoncesController::class, 'modifierAnnonce'])->name('modifier-annonce');

    Route::post('/valider-modif-annonce', [AnnoncesController::class, 'validerModifAnnonce'])->name('valider-modif-annonce');

    Route::get('/ajout-annonce', function () { return view('admin/ajoutAnnonce'); })->name('ajout-annonce');

    Route::post('/valider-ajout-annonce', [AnnoncesController::class, 'ajoutAnnonces'])->name('valider-ajout-annonce');



    //DÉPARTEMENTS
    Route::get('/plan-departements', function () {
        return view('admin/planDépartements');
    })->name('plan-departements');

    Route::get('/ajout-departement', function () {
        return view('admin/ajoutDépartement');
    })->name('ajout-departement');

    Route::get('/liste-departements', [DeptPosteController::class, 'listeDepartements'])->name('liste-departements');

    //CONGÉS

    Route::get('/demande-employe-conge', [CongeController::class, 'demandesEmployésCongés'])->name('demande-employe-conge');

    Route::get('/planning-congé-employé/{idDepartement}', [CongeController::class, 'planningAdmin'])->name('planning-congé-employé');

    Route::get('/calendrier-congé-employé', [CongeController::class, 'seePlanningAdmin'])->name('calendrier-congé-employé');

    Route::get('/confirmer-conge/{idDemandeConge}', [CongeController::class, 'confirmerCongé'])->name('confirmer-conge');

    Route::get('/refuser-conge/{idDemandeConge}', [CongeController::class, 'refuserCongé'])->name('refuser-conge');

//Côté employé
    Route::post('login-employe', [LogController::class, 'loginEmployé'])->name('login-employe');

    Route::get('logout-employe', [LogController::class, 'logoutEmployé'])->name('logout-employe');

    Route::get('accueil-employé', [EmployeController::class, 'accueilEmploye'])->name('accueil-employé');

    //annonce
    Route::get('/annonces-du-jour-employé', [AnnoncesController::class, 'allDayAnnouncementEmployee'])->name('annonces-du-jour-employé');

    Route::get('/annonces-à-venir-employé', [AnnoncesController::class, 'allUpcomingAnnouncementEmployee'])->name('annonces-à-venir-employé');

    //congés
    Route::get('/solde-conge', [CongeController::class, 'soldeCongéPage'])->name('solde-conge');

    Route::get('/liste-demande-conge', [CongeController::class, 'maListeDemandeCongé'])->name('liste-demande-conge');

    Route::get('/demander-congé', [CongeController::class, 'demanderCongé'])->name('demander-congé');

    Route::post('/valider-demande-congé', [CongeController::class, 'validerDemandeCongé'])->name('valider-demande-congé');

    Route::get('/planning-congé', [CongeController::class, 'goToPlanning'])->name('planning-congé');

    Route::get('/calendar/congés', [CongeController::class, 'seePlanning'])->name('/calendar/congés');



    Route::get('/liste-collaborateurs', function () {
        return view('employé.listeEmployés');
    })->name('liste-collaborateurs');

    Route::get('/profil-collaborateur', function () {
        return view('employé.profilCollaborateur');
    })->name('profil-collaborateurs');

    //profil
    Route::get('/mon-profil', [EmployeController::class, 'getMonProfil'])->name('mon-profil');


