<?php

namespace App\Http\Controllers;

use App\Models\DemandesConges;
use App\Models\Employes;
use App\Models\SoldeConge;
use Illuminate\Http\Request;

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

    public function getSolde(){
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
        return ['soldes' => $soldes ];
    }

    public function addtwodays(){
        $solde_emp = new SoldeConge();
        $calcul = $solde_emp->addTwoDays();
        return $calcul;
    }

    public function soldeCongéPage(){
        $employe = new Employes();
        $data_profil = $this->getRelationsProfil();
        $solde = $this->getSolde();
        $calcul = $this->addtwodays();
        $dateDuJour = $employe->dateDuJour();
        return view('employé.soldeCongé',  array_merge($data_profil,$solde, compact('dateDuJour')));
    }

    public function listeDemandeCongé(){
        $employe = new Employes();
        $conge = new SoldeConge();
        $demande_conge = new DemandesConges();

        $data_profil = $this->getRelationsProfil();
        $solde = $this->getSolde();
        $permconsommée = $conge->permConsommées();
        $dateDuJour = $employe->dateDuJour();
        $mesDemandesCongé = $demande_conge->mesDemandesCongé();

        $nbjour = [];
        foreach($mesDemandesCongé as $demande){
            $date_debut = $demande->date_debut;
            $date_fin = $demande->date_fin;
            $nbjour[] = $demande_conge->nbJour($date_debut, $date_fin);
        }
        return view('employé.listeDemandesCongé',  array_merge($data_profil,$solde, compact('dateDuJour', 'permconsommée','mesDemandesCongé','nbjour')));
    }

    public function demanderCongé(){
        $employe = new Employes();
        $dateDuJour = $employe->dateDuJour();

        $data_profil = $this->getRelationsProfil();

        return view('employé.demandeCongé', array_merge($data_profil), compact('dateDuJour'));
    }
}
