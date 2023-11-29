<?php

namespace App\Http\Controllers;

use App\Models\DemandesConges;
use App\Models\Departements;
use App\Models\Employes;
use App\Models\MotifPermission;
use App\Models\Poste;
use App\Models\SoldeConge;
use App\Models\TypeConge;
use App\Models\TypeContrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CongeController extends Controller
{
    //
    public function getRelationsProfil()
    {
        $employe = new Employes();
        $profil = $employe->monProfil();
        $relation = $employe->relationProfil();
        $relations = [];
        $managers = [];

        if (is_array($relation)) {
            foreach ($relation as $relationItem) {
                if ($relationItem->degre != 2) {
                    $relations[] = $relationItem;
                } else {
                    $managers[] = $relationItem;
                }
            }
        }

        return ['profil' => $profil, 'relation' => $relations, 'manager' => $managers];
    }

    public function getSolde()
    {
        $solde_emp = new SoldeConge();
        $solde = $solde_emp->soldeCongé();
        $solde = $solde[0];
        $solde_reel = $solde->solde_réel;
        $solde_previsionnel = $solde->solde_previsionnel;
        $solde_perm = $solde->solde_perm;
        $a_plan = $solde->a_planifier;
        $soldes = [
            'solde_reel' => $solde_reel,
            'solde_previsionnel' => $solde_previsionnel,
            'solde_perm' => $solde_perm,
            'a_planifier' => $a_plan
        ];
        return ['soldes' => $soldes];
    }

    public function addtwodays()
    {
        $solde_emp = new SoldeConge();
        $calcul = $solde_emp->addTwoDays();
        return $calcul;
    }

    public function soldeCongéPage()
    {
        $employe = new Employes();
        $demande_conge = new DemandesConges();

        $data_profil = $this->getRelationsProfil();
        $solde = $this->getSolde();
        $calcul = $this->addtwodays();
        $dateDuJour = $employe->dateDuJour();

        $lastLeaves = $demande_conge->lastLeaves();

        $nbjour = [];
        foreach ($lastLeaves as $last) {
            $date_debut = $last->date_debut;
            $date_fin = $last->date_fin;
            $nbjour[] = $demande_conge->nbJour($date_debut, $date_fin);
        }
        return view('employé.soldeCongé',  array_merge($data_profil, $solde, compact('dateDuJour', 'lastLeaves', 'nbjour')));
    }

    public function maListeDemandeCongé()
    {
        $employe = new Employes();
        $conge = new SoldeConge();
        $demande_conge = new DemandesConges();

        $data_profil = $this->getRelationsProfil();
        $solde = $this->getSolde();
        $permconsommée = $conge->permConsommées();
        $dateDuJour = $employe->dateDuJour();
        $mesDemandesCongé = $demande_conge->mesDemandesCongé();

        $nbjour = [];
        foreach ($mesDemandesCongé as $demande) {
            $date_debut = $demande->date_debut;
            $date_fin = $demande->date_fin;
            $nbjour[] = $demande_conge->nbJour($date_debut, $date_fin);
        }
        return view('employé.listeDemandesCongé',  array_merge($data_profil, $solde, compact('dateDuJour', 'permconsommée', 'mesDemandesCongé', 'nbjour')));
    }

    public function demanderCongé()
    {
        $employe = new Employes();
        $dateDuJour = $employe->dateDuJour();
        $data_profil = $this->getRelationsProfil();
        $type_conge = TypeConge::all();
        $motif_permission = MotifPermission::all();
        return view('employé.demandeCongé', array_merge($data_profil), compact('dateDuJour', 'type_conge', 'motif_permission'));
    }

    public function validerDemandeCongé(Request $request)
    {
        if (auth()->guard('employee')->check()) {
            $demande_conge = new DemandesConges();

            $date_demande = $request->input('date_demande');
            $date_debut = $request->input('date_debut');
            $date_fin = $request->input('date_fin');
            $idTypeCongé = $request->input('idTypeCongé');
            $idMotifPermission = $request->input('idMotifPermission');
            $nbjourMotif = DB::select('select nbJour from motif_permission where idMotifPermission = ?', [$idMotifPermission]);
            $motif = DB::select('select motif from motif_permission where idMotifPermission = ?', [$idMotifPermission]);

            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;

            $sc = SoldeConge::where('idEmploye', $employe_id)->first();


            $nbJour = $demande_conge->nbJour($date_debut, $date_fin);

            $errors = [];

            if ($date_debut > $date_fin) {
                $errors[] = 'La date de début ne peut pas être après la date de fin.';
            }

            if ($date_demande > $date_debut) {
                $errors[] = 'La date de demande ne peut pas être après la date de début.';
            }

            if ($date_demande > $date_fin) {
                $errors[] = 'La date de demande ne peut pas être après la date de fin.';
            }

            if ($idMotifPermission && $nbjourMotif) {
                if ($nbjourMotif[0]->nbJour < $nbJour) {
                    $errors[] = 'La permission ' . $motif[0]->motif . ' n a droit qu à ' . $nbjourMotif[0]->nbJour . ' jour(s)';
                }
            }

            if ($sc->solde_perm === 0) {
                $errors[] = 'Vous n\'avez plus de permissions';
            }

            if ($sc->solde_reel === 0) {
                $errors[] = 'Vous n\'avez plus de congé';
            }

            if (!empty($errors)) {
                return redirect()->back()->with('errors', $errors);
            }

            $demande_conge = DemandesConges::create([
                'idEmploye' => $employe_id,
                'idMotifPermission' => $idMotifPermission,
                'idTypeConge' => $idTypeCongé,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'etat' => 0,
                'date_demande' => $date_demande,
            ]);

            if ($demande_conge) {
                $solde_conge = SoldeConge::where('idEmploye', '=', $employe_id)->first();
                if ($solde_conge && !$idMotifPermission) {
                    $solde_conge->solde_previsionnel -= $nbJour;
                    $solde_conge->update();
                }

                return redirect()->back()->with('success', 'La demande de congé a été enregistrée avec succès.');
            }
        }
    }

    /*planning congé côté employé*/
    public function goToPlanning()
    {
        if (auth()->guard('employee')->check()) {
            return view('employé.planningCongés');
        }
    }


    public function seePlanning()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            Log::info('planning de congés');
            $idDepartement = DB::select('SELECT departements.idDepartement
            FROM demandes_conges
            JOIN employes ON demandes_conges.idEmploye = employes.idEmploye
            JOIN employes_infos_pros ON employes.idEmploye = employes_infos_pros.idEmploye
            JOIN candidats ON employes.idCandidat = candidats.idCandidat
            JOIN departement_poste ON employes_infos_pros.idDeptPoste = departement_poste.idDeptPoste
            JOIN departements ON departement_poste.idDepartement = departements.idDepartement
            WHERE employes.idEmploye = ?', [$employe_id]);

            $idDepartementValue = $idDepartement[0]->idDepartement;


            $leaveRequests = DemandesConges::join('employes', 'demandes_conges.idEmploye', '=', 'employes.idEmploye')
                ->join('employes_infos_pros', 'employes.idEmploye', '=', 'employes_infos_pros.idEmploye')
                ->join('candidats', 'employes.idCandidat', '=', 'candidats.idCandidat')
                ->join('departement_poste', 'employes_infos_pros.idDeptPoste', '=', 'departement_poste.idDeptPoste')
                ->join('departements', 'departement_poste.idDepartement', '=', 'departements.idDepartement')
                ->where('demandes_conges.etat', 1)
                ->where('departements.idDepartement', '=', $idDepartementValue)
                ->where('employes.idEmploye', '!=', $employe_id)
                ->select('departements.idDepartement', DB::raw('CONCAT(candidats.nom, " ", candidats.prenom) as title'), 'demandes_conges.date_debut as start', 'demandes_conges.date_fin as end')
                ->get()
                ->map(function ($leaveRequest) {
                    $leaveRequest->start = date('Y-m-d', strtotime($leaveRequest->start));
                    $leaveRequest->end = date('Y-m-d', strtotime($leaveRequest->end . ' +1 day'));
                    $leaveRequest->color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                    return $leaveRequest;
                });
            return response()->json($leaveRequests);
        }
    }
    /*fin planning congé côté employé*/

    //CÔTÉ ADMIN
    public function demandesEmployésCongés(Request $request)
    {
        if (auth()->guard('web')->check()) {
            $allDemandes = DemandesConges::where('etat', 0);

            // Filter by year
            if ($request->has('annee')) {
                $allDemandes->whereYear('date_debut', $request->annee);
            }

            // Filter by department
            if ($request->has('departement')) {
                $allDemandes->whereHas('employe.candidat.deptposte.dept', function ($query) use ($request) {
                    $query->where('idDepartement', $request->departement);
                });
            }

            // Filter by poste
            if ($request->has('poste')) {
                $allDemandes->whereHas('employe.candidat.deptposte.poste', function ($query) use ($request) {
                    $query->where('idPoste', $request->poste);
                });
            }

            $allDemandes = $allDemandes->get();

            $departements = Departements::all();
            $poste = Poste::all();

            return view('admin.demandesEmployésCongés', compact('allDemandes', 'departements', 'poste'));
        }
    }


    public function planningAdmin($idDepartement)
    {
        if (auth()->guard('web')->check()) {
            return view('admin.planningCongés', compact('idDepartement'));
        }
    }

    public function seePlanningAdmin($idDepartement)
    {
        if (auth()->guard('web')->check()) {
            $leaveRequests = DemandesConges::join('employes', 'demandes_conges.idEmploye', '=', 'employes.idEmploye')
                ->join('employes_infos_pros', 'employes.idEmploye', '=', 'employes_infos_pros.idEmploye')
                ->join('candidats', 'employes.idCandidat', '=', 'candidats.idCandidat')
                ->join('departement_poste', 'employes_infos_pros.idDeptPoste', '=', 'departement_poste.idDeptPoste')
                ->join('departements', 'departement_poste.idDepartement', '=', 'departements.idDepartement')
                ->where('demandes_conges.etat', 1)
                ->where('departements.idDepartement', '=', $idDepartement)
                ->select('departements.idDepartement', DB::raw('CONCAT(candidats.nom, " ", candidats.prenom) as title'), 'demandes_conges.date_debut as start', 'demandes_conges.date_fin as end')
                ->get()
                ->map(function ($leaveRequest) {
                    $leaveRequest->start = date('Y-m-d', strtotime($leaveRequest->start));
                    $leaveRequest->end = date('Y-m-d', strtotime($leaveRequest->end . ' +1 day'));
                    $leaveRequest->color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                    return $leaveRequest;
                });
            return response()->json($leaveRequests);
        }
    }

    public function confirmerCongé($idDemandeConge)
    {
        $dc = new DemandesConges();
        $sc = new SoldeConge();
        $demandeConge = DemandesConges::find($idDemandeConge);
        $idEmploye = $demandeConge->idEmploye;
        $conge = SoldeConge::where('idEmploye', $idEmploye)->first();
        $date_debut = $demandeConge->date_debut;
        $date_fin = $demandeConge->date_fin;
        $email = DB::select('select email from employes e join candidats c on c.idCandidat = e.idCandidat where e.idEmploye = ?', [$idEmploye]);
        $adresseMail = $email[0]->email;
        $nbJour = $dc->nbJour($date_debut, $date_fin);
        $solde_reel = $conge->solde_réel;

        if ($demandeConge) {
            $demandeConge->etat = 1;
            $demandeConge->update();

            if ($demandeConge->idMotifPermission) {
                $conge->solde_perm -= $nbJour;
                $conge->update();
            } else {
                $conge->solde_réel -= $nbJour;
                $nouveauSoldeReel = $conge->solde_réel;
                $nbJourAplanifier = $sc->aPlanifier($nouveauSoldeReel);
                $conge->a_planifier = $nbJourAplanifier;
                $conge->update();
            }
            $envoiMail = $dc->mailConfirmation($date_debut, $date_fin, $adresseMail);
            return redirect()->back()->with('success', 'La demande de congé a été confirmée avec succès.');
        } else {
            return redirect()->back()->with('error', 'La demande de congé n\'existe pas.');
        }
    }

    public function refuserCongé($idDemandeConge)
    {
        $demandeConge = DemandesConges::find($idDemandeConge);

        if ($demandeConge) {
            $demandeConge->etat = 2;
            $demandeConge->save();
            return redirect()->back()->with('success', 'La demande de congé a été refusée avec succès.');
        } else {
            return redirect()->back()->with('error', 'La demande de congé n\'existe pas.');
        }
    }
}
