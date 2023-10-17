<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use App\Models\Candidats;
use App\Models\TypeContrat;
use App\Mail\TestMail;
use App\Models\EmployesInfosPros;
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

            $candidat = session()->get('candidat');
            $idCandidat = $candidat->idCandidat;

            $nom = $candidat->nom;
            $prenoms = $candidat->prenom;

            $type_contrat = $request->input('type_contrat');
            $date_debut = $request->input('date_debut');
            $date_fin = $request->input('date_fin');

            $firstsurname = $this->takeFirst($prenoms);
            $firstname = $this->takeFirst($nom);

            //les identifiants
            $identifiant = $firstsurname . '.' . $firstname;

            $mdp = $request->session()->get('generated_password');

            if (!$mdp) {
                $mdp = $this->genererMdp(10);
                $request->session()->put('generated_password', $mdp);
            }

            session()->put('type_contrat', $type_contrat);
            session()->put('date_debut', $date_debut);
            session()->put('date_fin', $date_fin);
            session()->put('identifiant', $identifiant);
            session()->put('mdp', $mdp);

            return view('admin.envoyerIdentifiant', compact('identifiant', 'mdp'));
        }
    }

    public function envoyerIdentifiants(Request $request)
    {
        $candidat = session()->get('candidat');
        $idCandidat = $candidat->idCandidat;
        $idDeptPoste = $candidat->idDeptPoste;
        $email = $candidat->email;

        $type_contrat = session()->get('type_contrat');
        $date_debut = session()->get('date_debut');
        $date_fin = session()->get('date_fin');
        $identifiant = $request->input('identifiant');
        $mdp = $request->session()->get('generated_password');

        $contrat = $this->getContrat($type_contrat);

        echo $type_contrat;

        if ($idCandidat != 0)
        {
            $mailResult = $this->envoyerMail($identifiant, $mdp, $email, $contrat);

            if ($mailResult === 1) {
                $idEmploye = DB::table('employes')->insertGetId([
                    'idCandidat' => $idCandidat,
                    'identifiant' => $identifiant,
                    'mdp' => $mdp
                ]);

                if ($idEmploye != 0) {
                    DB::table('candidats')
                        ->where('idCandidat', $idCandidat)
                        ->update(['statut' => 3]);

                    $employeInfoPro = EmployesInfosPros::create([
                        'idEmploye' => $idEmploye,
                        'idDeptPoste' => $idDeptPoste,
                        'idTypeContrat' => $type_contrat,
                        'date_debut' => $date_debut,
                        'date_fin' => $date_fin
                    ]);
                }
                return redirect()->route('liste-candidats')->with('success', 'Identifiants bien envoyés, et employé inséré');

            }else{
                return redirect()->route('liste-candidats')->with('error', 'Erreur');
            }
        }
    }

    public function listeEmployes()
    {
        $employe = Employes::all();
        return view('admin.listeEmployés', compact('employe'));
    }
}
