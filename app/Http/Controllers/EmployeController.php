<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use App\Models\Candidats;
use App\Models\TypeContrat;
use App\Mail\TestMail;
use App\Models\Departements;
use App\Models\Annonces;
use App\Models\CessationEmploi;
use App\Models\EmployeInfos;
use App\Models\EmployesInfosPros;
use App\Models\Poste;
use App\Models\SoldeConge;
use App\Models\TypeDepart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function ajoutCollaborateur($idCandidat)
    {
        if (auth()->check()) {
            $candidat = Candidats::find($idCandidat);
            session()->put('candidat', $candidat);
            $type_contrat = TypeContrat::all();
            if($candidat->statut != 1){
                return redirect()->back()->with('error', 'Ce(tte) candidat n est pas confirmé(e) ');
            }else{
                return view('admin.ajoutCollaborateur', compact('candidat', 'type_contrat'));
            }
        }
    }

    public function takeFirst($word)
    {
        $words = explode(" ", $word);
        if (count($words) > 0) {
            $first = strtolower($words[0]);
            return $first;
        }
    }


    public function getContrat($idTypeContrat)
    {
        if ($idTypeContrat == 2) {
            return public_path('assets/contrat/CDD.pdf');
        } elseif ($idTypeContrat == 3) {
            return public_path('assets/contrat/Convention-de-stage.pdf');
        } else {
            return public_path('assets/contrat/CDI.pdf');
        }
    }

    public function envoyerMail($identifiant, $mdp, $email, $contrat)
    {
        $mail = new TestMail($identifiant, $mdp);
        $mail->to($email);
        $mail->attach($contrat);
        Mail::send($mail);

        if (count(Mail::failures()) > 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function genererID(Request $request)
    {
        if (auth()->check()) {
            $employe = new Employes();
            $candidat = session()->get('candidat');
            $idCandidat = $candidat->idCandidat;

            $nom = $candidat->nom;
            $prenoms = $candidat->prenom;

            $type_contrat = $request->input('type_contrat');
            $date_debut = $request->input('date_debut');
            $date_fin = $request->input('date_fin');
            $salaire = $request->input('salaire');

            $firstsurname = $this->takeFirst($prenoms);
            $firstname = $this->takeFirst($nom);

            //les identifiants
            $identifiant = $firstsurname . '.' . $firstname;


            $mdp = $employe->genererMdp(10);
   

            session()->put('type_contrat', $type_contrat);
            session()->put('date_debut', $date_debut);
            session()->put('date_fin', $date_fin);
            session()->put('identifiant', $identifiant);
            session()->put('salaire', $salaire);
            session()->put('mdp', $mdp);


            return view('admin.envoyerIdentifiant', compact('identifiant', 'mdp'));
        }
    }

    public function envoyerIdentifiants(Request $request)
    {
        if (auth()->check()) {
            $solde_réel = 0;
            $solde_previsionnel = 0;
            $perm = 10;
            $a_planifier = 0;

            $candidat = session()->get('candidat');
            $idCandidat = $candidat->idCandidat;
            $idDeptPoste = $candidat->idDeptPoste;
            $email = $candidat->email;

            $type_contrat = session()->get('type_contrat');
            $date_debut = session()->get('date_debut');
            $date_fin = session()->get('date_fin');
            $identifiant = $request->input('identifiant');
            $mdp = $request->session()->get('mdp');
            $salaire = $request->session()->get('salaire');

            $contrat = $this->getContrat($type_contrat);

            echo $type_contrat;

            if ($idCandidat != 0) {
                $mailResult = $this->envoyerMail($identifiant, $mdp, $email, $contrat);

                if ($mailResult === 1) {
                    $idEmploye = DB::table('employes')->insertGetId([
                        'idCandidat' => $idCandidat,
                        'identifiant' => $identifiant,
                        'mdp' => $mdp,
                        'statut' => 0
                    ]);

                    if ($idEmploye != 0) {
                        DB::table('candidats')
                            ->where('idCandidat', $idCandidat)
                            ->update(['statut' => 3]);
                        
                        if($type_contrat != 3){
                            $solde_conge = SoldeConge::create([
                                'idEmploye' => $idEmploye,
                                'solde_réel' => $solde_réel,
                                'solde_previsionnel' => $solde_previsionnel,
                                'solde_perm' => $perm,
                                'a_planifier' => $a_planifier
                            ]);
                        }
                       

                        $employeInfoPro = EmployesInfosPros::create([
                            'idEmploye' => $idEmploye,
                            'idDeptPoste' => $idDeptPoste,
                            'idTypeContrat' => $type_contrat,
                            'date_debut' => $date_debut,
                            'date_fin' => $date_fin,
                            'salaire' =>$salaire
                        ]);
                    }
                    return redirect()->route('liste-candidats')->with('success', 'Identifiants bien envoyés, et employé inséré');
                } else {
                    return redirect()->route('liste-candidats')->with('error', 'Erreur');
                }
            }
        }
    }

    public function getEmployes($idDepartement)
    {
        if (auth()->check()) {
            $employe = DB::select('SELECT e.idEmploye, d.idDepartement, d.nom as nomDept, p.nom as nomPoste,c.nom as nomEmploye, c.prenom, c.contact, c.photo
                            from employes_infos_pros eip join employes e
                            on e.idEmploye = eip.idEmploye
                            join departement_poste dp
                            on dp.idDeptPoste  = eip.idDeptPoste
                            join departements d ON d.idDepartement = dp.idDepartement
                            join candidats c ON c.idCandidat = e.idCandidat
                            join poste p on p.idPoste  = dp.idPoste
                            WHERE e.statut = 0 and d.idDepartement = :idDepartement', ['idDepartement' => $idDepartement]);
            return response()->json($employe);
        }
    }

    public function searchEmployee(Request $request){
        if(auth()->check()){
            $searchTerm = $request->input('search-employee');

            $employe = DB::select("SELECT e.idEmploye, d.idDepartement, d.nom as nomDept, p.nom as nomPoste,c.nom as nomEmploye, c.prenom, c.contact, c.photo
                FROM employes_infos_pros eip
                JOIN employes e ON e.idEmploye = eip.idEmploye
                JOIN departement_poste dp ON dp.idDeptPoste  = eip.idDeptPoste
                JOIN departements d ON d.idDepartement = dp.idDepartement
                JOIN candidats c ON c.idCandidat = e.idCandidat
                JOIN poste p ON p.idPoste  = dp.idPoste
                WHERE c.nom LIKE '%$searchTerm%' OR c.prenom LIKE '%$searchTerm%'");
            
            return response()->json($employe);
        }
    }

    public function listeEmployes()
    {
        if (auth()->check()) {
            $departements = Departements::all();
            return view('admin.listeEmployés', compact('departements'));
        }
    }

    public function profilEmployé($idEmploye)
    {
        if (auth()->check()) {
            $employe = new Employes();
            $profil = $employe->profilEmployé($idEmploye);
            session()->put('idEmployeProfil', $idEmploye);
            $salaireBrut = $profil->salaire;
            $cnaps = 2000;
            $irsa = 0;
            if ($salaireBrut > 0 && $salaireBrut <= 350000) {
                $irsa = 0;
            } elseif ($salaireBrut > 350000 && $salaireBrut <= 400000) {
                $irsa = 0.05;
            } elseif ($salaireBrut > 400000 && $salaireBrut <= 500000) {
                $irsa = 0.10;
            } elseif ($salaireBrut > 500000 && $salaireBrut <= 600000) {
                $irsa = 0.15;
            }elseif ($salaireBrut > 600000) {
                $irsa = 0.20;
            }
            $salaireNet = ($salaireBrut-($salaireBrut * $irsa))-$cnaps;

            return view('admin.profilEmployé', compact('profil','salaireNet'));
        }
    }

    public function offBoarding()
    {
        if (auth()->check()) {
            $idEmploye = session()->get('idEmployeProfil');
            $typedepart = TypeDepart::all();
            $employe = EmployeInfos::where('idEmploye', $idEmploye)->first();
            return view('admin.offBoarding', compact('employe', 'typedepart'));
        }
    }

    public function validerOffBoarding(Request $request)
    {
        if (auth()->check()) {
            $ce = new CessationEmploi();

            $idEmploye = session()->get('idEmployeProfil');
            $idTypeDepart = $request->input('idTypeDepart');
            $date_depart = $request->input('date_depart');
            $motif = $request->input('motif');

            $employe = EmployeInfos::where('idEmploye', $idEmploye)->first();
            $employe2 = Employes::where('idEmploye', $idEmploye)->first();

            $nom = $employe->nom;
            $prenom = $employe->prenom;
            $idPoste = $employe->idPoste;

            $poste = Poste::where('idPoste', $idPoste)->first();
            $nomPoste = $poste->nom;
            $idDepartement = $employe->idDepartement;

            $mailCollaborateurs = DB::select('SELECT c.email
            from employes_infos_pros eip join employes e
            on e.idEmploye = eip.idEmploye
            join departement_poste dp
            on dp.idDeptPoste  = eip.idDeptPoste
            join departements d ON d.idDepartement = dp.idDepartement
            join candidats c ON c.idCandidat = e.idCandidat
            join poste p on p.idPoste  = dp.idPoste
            WHERE e.statut = 0 and d.idDepartement = ? and e.idEmploye != ?', [$idDepartement, $idEmploye]);

            $emails = [];
            foreach ($mailCollaborateurs as $collaborateur) {
                $emails[] = $collaborateur->email;
            }

            if ($idTypeDepart != 0) {
                $cessation = CessationEmploi::create([
                    'idTypeDepart' => $idTypeDepart,
                    'idEmploye' => $idEmploye,
                    'date_depart' => $date_depart,
                    'motif' => $motif
                ]);

                if ($cessation != null) {
                    $employe2->statut = 1;
                    $employe2->update();
                }

                $mail = $ce->mailOffboarding($nom, $prenom, $nomPoste, $emails);

                if ($mail === 1) {
                    return redirect()->back()->with('success', 'L\'offboarding s\'est bien effectuée ');
                } else {
                    return redirect()->back()->with('error', 'Erreur');
                }
            }
        }
    }

    public function birthdayMail()
    {
        $employe = new Employes();
        $test = $employe->birthdayMail();
        return $test;
    }

    //COTÉ EMPLOYÉ

    public function accueilEmploye()
    {
        if (auth()->guard('employee')->check()) {
            $annonce = new Annonces();
            $annonceDuJour = $annonce->dayAnnouncements();
            $annoncesAvenir = $annonce->annoncesAvenirEmployes();
            $employe_user = auth()->guard('employee')->user();
            return view('employé.accueilEmployé', compact('annonceDuJour', 'annoncesAvenir', 'employe_user'));
        }
    }

    public function getMonProfil()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            $employe = new Employes();
            $profil = $employe->profilEmployé($employe_id);
            $salaireBrut = $profil->salaire;
            $cnaps = 2000;
            $irsa = 0;
            if ($salaireBrut > 0 && $salaireBrut <= 350000) {
                $irsa = 0;
            } elseif ($salaireBrut > 350000 && $salaireBrut <= 400000) {
                $irsa = 0.05;
            } elseif ($salaireBrut > 400000 && $salaireBrut <= 500000) {
                $irsa = 0.10;
            } elseif ($salaireBrut > 500000 && $salaireBrut <= 600000) {
                $irsa = 0.15;
            }elseif ($salaireBrut > 600000) {
                $irsa = 0.20;
            }
            $salaireNet = ($salaireBrut-($salaireBrut * $irsa))-$cnaps;
            return view('employé.monProfil', compact('profil', 'salaireNet'));
        }
    }

    public function listeCollaborateurs()
    {
        if (auth()->guard('employee')->check()) {
            $departements = Departements::all();
            return view('employé.listeCollaborateurs', compact('departements'));
        }
    }
}
