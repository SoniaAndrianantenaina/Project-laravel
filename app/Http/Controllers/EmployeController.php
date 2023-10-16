<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use App\Models\Candidats;
use App\Models\TypeContrat;
use App\Mail\TestMail;
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
            return view('admin.ajoutCollaborateur', compact('candidat', 'type_contrat'));
        }
    }

    /*public function ajoutEmployé(Request $request){
        if (auth()->check()) {
            $candidat = session()->get('candidat');
            $idCandidat = $candidat->idCandidat;

        }
    }*/

    public function takeFirst($word)
    {
        $words = explode(" ", $word);
        if (count($words) > 0) {
            $first = strtolower($words[0]);
            return $first;
        }
    }

    public function genererMdp($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }
        return $password;
    }

    public function genererContrat($idTypeContrat)
    {
        if ($idTypeContrat == 2) {
            return "hey";
        } else if ($idTypeContrat == 3) {
            return "hello";
        } else {
            return "hiii";
        }
    }

    public function envoyerMail($identifiant, $mdp, $email)
    {
        $mail = new TestMail($identifiant, $mdp);
        $mail->to($email);
        Mail::send($mail);
    }

    public function genererID(Request $request)
    {
        if (auth()->check()) {

            $candidat = session()->get('candidat');

            $nom = $candidat->nom;
            $prenoms = $candidat->prenom;
            $email = $candidat->email;
            $type_contrat = $request->input('type_contrat');

            $firstsurname = $this->takeFirst($prenoms);
            $firstname = $this->takeFirst($nom);

            //les identifiants
            $identifiant = $firstsurname . '.' . $firstname;
            $mdp = $this->genererMdp(10);
            //echo $identifiant . $mdp;

            $contrat = $this->genererContrat($type_contrat);
            echo $contrat;
            //$mail = $this->envoyerMail($identifiant,$mdp,$email);

            return "E-mail envoyé avec succès";
        }
    }



    public function listeEmployes()
    {
        $employe = Employes::all();
        return view('admin.listeEmployés', compact('employe'));
    }
}
