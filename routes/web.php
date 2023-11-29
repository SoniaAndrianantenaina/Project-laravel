<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\DeptPosteController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\StatistiquesController;
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

//mot de passe oublié
Route::get('mdp-oublie', [LogController::class, 'mdpOublié'])->name('mdp-oublie');

Route::post('nouveau-mdp', [LogController::class, 'nouveauMdp'])->name('nouveau-mdp');

//Côté administrateur
    Route::post('login-admin', [LogController::class, 'loginAdmin'])->name('login-admin');

    Route::get('logout-admin', [LogController::class, 'logoutAdmin'])->name('logout-admin');

    Route::get('accueil-admin', [AdminController::class, 'accueilAdmin'])->name('accueil-admin');

    //PROFIL

    Route::get('/profil-admin', [AdminController::class, 'profilAdmin'])->name('profil-admin');

    //CANDIDATS
    Route::match(['get', 'post'], 'liste-candidats', [CandidatController::class, 'listeCandidats'])->name('liste-candidats');

    Route::get('/afficher-cv/{idCandidat}', [CandidatController::class, 'afficherCV'])->name('afficher-cv');

    Route::get('/lm-candidat/{idCandidat}', [CandidatController::class, 'afficherLM'])->name('afficher-LM');

    Route::get('/profil-candidat/{idCandidat}', [CandidatController::class, 'profilCandidat'])->name('profil-candidat');

    Route::get('/ajout-candidat', [CandidatController::class, 'ajoutCandidat'])->name('ajout-candidat');

    Route::post('valider-ajout-candidat', [CandidatController::class, 'ajouterCandidat'])->name('valider-ajout-candidat');

    Route::get('/modifier-candidat', [CandidatController::class, 'modifierCandidat'])->name('modifier-candidat');

    Route::get('/supprimer-candidat', [CandidatController::class, 'supprimerCandidat'])->name('supprimer-candidat');

    Route::post('valider-modif-candidat', [CandidatController::class, 'validerModifierCandidat'])->name('valider-modif-candidat');



    //EMPLOYÉS
    Route::get('/ajout-collaborateur/{idCandidat}', [EmployeController::class, 'ajoutCollaborateur'])->name('ajout-collaborateur');

    Route::post('/generer-id', [EmployeController::class, 'genererID'])->name('generer-id');

    Route::post('/envoyer-identifiant', [EmployeController::class, 'envoyerIdentifiants'])->name('envoyer-identifiant');

    Route::get('/liste-employes', [EmployeController::class, 'listeEmployes'])->name('liste-employes');

    Route::post('/search-employee', [EmployeController::class, 'searchEmploye'])->name('search-employee');

    Route::get('/profil-employe/{idEmploye}', [EmployeController::class, 'profilEmployé'])->name('profil-employe');

    Route::get('/get-employes/{idDepartement}', [EmployeController::class, 'getEmployes'])->name('get-employes');

    Route::get('/search-employe', [EmployeController::class, 'searchEmployee'])->name('search-employe');

    Route::get('/anniversaire', [EmployeController::class, 'birthdayMail'])->name('anniversaire');

    Route::get('/off-boarding', [EmployeController::class, 'offBoarding'])->name('off-boarding');

    Route::post('/valider-off-boarding', [EmployeController::class, 'validerOffBoarding'])->name('valider-off-boarding');


    //POSTES
    Route::get('/get-postes/{idDepartement}', [DeptPosteController::class, 'getPostesByDepartement'])->name('get-postes');


    //ANNONCES
    Route::get('/annonces-du-jour', [AnnoncesController::class, 'allDayAnnouncement'])->name('annonces-du-jour');

    Route::get('/annonces-à-venir', [AnnoncesController::class, 'allUpcomingAnnouncement'])->name('annonces-à-venir');

    Route::get('/annonces-à-venir-employe', [AnnoncesController::class, 'annoncesAvenirEmployes'])->name('annonces-à-venir-employe');

    Route::get('/supprimer-annonce/{idAnnonce}', [AnnoncesController::class, 'supprimerAnnonce'])->name('supprimer-annonce');

    Route::get('/modifier-annonce/{idAnnonce}', [AnnoncesController::class, 'modifierAnnonce'])->name('modifier-annonce');

    Route::post('/valider-modif-annonce', [AnnoncesController::class, 'validerModifAnnonce'])->name('valider-modif-annonce');

    Route::get('/ajout-annonce', function () { return view('admin/ajoutAnnonce'); })->name('ajout-annonce');

    Route::post('/valider-ajout-annonce', [AnnoncesController::class, 'ajoutAnnonces'])->name('valider-ajout-annonce');



    //DÉPARTEMENTS
    Route::get('/plan-departements', function () {
        return view('admin/planDépartements');
    })->name('plan-departements');

    Route::get('/ajout-departement', [DeptPosteController::class, 'ajoutDépartement'])->name('ajout-departement');

    Route::get('/liste-departements', [DeptPosteController::class, 'listeDepartements'])->name('liste-departements');

    Route::get('/filtre-departements', [DeptPosteController::class, 'listeDepartements'])->name('filtre-departements');

    Route::post('/search-departements', [DeptPosteController::class, 'searchdepartements'])->name('search-departements');

    Route::get('/update-department/{idDepartement}', [DeptPosteController::class, 'updateDept'])->name('update-department');

    Route::get('/delete-departement-poste/{idDepartement}/{idPoste}', [DeptPosteController::class, 'deleteDepartementPoste'])->name('delete-departement-poste');
    
    Route::get('/delete-poste/{idPoste}', [DeptPosteController::class, 'deletePoste'])->name('delete-poste');

    Route::post('/valider-update-department', [DeptPosteController::class, 'modifierDeptPoste'])->name('valider-update-department');

    Route::post('/valider-update-poste', [DeptPosteController::class, 'modifierDeptPoste'])->name('valider-update-poste');
    
    Route::get('/liste-postes', [DeptPosteController::class, 'listePostes'])->name('liste-postes');

    Route::get('/ajout-poste-departement/{idDepartement}/{idPoste}', [DeptPosteController::class, 'ajoutPosteDepartement'])->name('ajout-poste-departement');

    Route::get('/delete-department/{idDepartement}', [DeptPosteController::class, 'deleteDept'])->name('delete-department');

    Route::post('/add-dept-poste', [DeptPosteController::class, 'addDeptPoste'])->name('add-dept-poste');

    //CONGÉS

    Route::match(['get', 'post'], 'demande-employe-conge', [CongeController::class, 'demandesEmployésCongés'])->name('demande-employe-conge');

    Route::get('/planning-conge-employe/{idDepartement}', [CongeController::class, 'planningAdmin'])->name('planning-conge-employe');

    Route::get('/calendrier-conge-employe/{idDepartement}', [CongeController::class, 'seePlanningAdmin'])->name('calendrier-conge-employe');

    Route::get('/confirmer-conge/{idDemandeConge}', [CongeController::class, 'confirmerCongé'])->name('confirmer-conge');

    Route::get('/refuser-conge/{idDemandeConge}', [CongeController::class, 'refuserCongé'])->name('refuser-conge');

    //STATISTIQUES
    Route::get('/statistiques', [StatistiquesController::class, 'stats'])->name('statistiques');

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

    Route::get('/liste-collaborateurs', [EmployeController::class, 'listeCollaborateurs'])->name('liste-collaborateurs');


    Route::get('/profil-collaborateur', function () {
        return view('employé.profilCollaborateur');
    })->name('profil-collaborateurs');

    //profil
    Route::get('/mon-profil', [EmployeController::class, 'getMonProfil'])->name('mon-profil');


