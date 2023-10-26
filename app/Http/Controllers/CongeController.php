<?php

namespace App\Http\Controllers;

use App\Models\DemandesConges;
use App\Models\Employes;
use App\Models\MotifPermission;
use App\Models\SoldeConge;
use App\Models\TypeConge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data_profil = $this->getRelationsProfil();
        $solde = $this->getSolde();
        $calcul = $this->addtwodays();
        $dateDuJour = $employe->dateDuJour();
        return view('employé.soldeCongé',  array_merge($data_profil, $solde, compact('dateDuJour')));
    }

    public function listeDemandeCongé()
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

            $nbJour = $demande_conge->nbJour($date_debut, $date_fin);

            if ($date_debut > $date_fin || $date_demande > $date_debut || $date_demande > $date_fin) {
                return redirect()->back()->with('error', 'Veuillez revérifier les dates que vous avez entrées');
            }

            dd($nbJour);

            if ($idMotifPermission && $nbjourMotif) {
                if ($nbjourMotif[0]->nbJour < $nbJour) {
                    $message = 'La permission ' . $motif[0]->motif . ' n a droit qu à ' . $nbjourMotif[0]->nbJour . ' jour(s)';
                    return redirect()->back()->with('error', $message);
                }
            }

            dd('hello');
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
                $solde_conge = SoldeConge::where('idEmploye', '=', $employe_id)->get();
                if ($solde_conge) {
                    $solde_conge->solde_previsionnel -= $nbJour;
                    $solde_conge->save();
                }

                return redirect()->back()->with('success', 'La demande de congé a été enregistrée avec succès.');
            } else {
                return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de la demande de congé.');
            }
        }
    }
}
