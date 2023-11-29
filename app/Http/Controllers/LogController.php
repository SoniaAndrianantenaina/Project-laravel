<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\EmployeInfos;
use App\Models\Employes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function loginAdmin(Request $request)
    {
        $id = $request->input('identifiant');
        $mdp = $request->input('mdp');

        $admin = Administrateur::where('identifiant', $id)->first();

        if ($admin && $mdp == $admin->mdp) {
            auth()->guard('web')->login($admin);
            $admin_user = auth()->guard('web')->user();
            return response()->json(['success' => 'Connexion réussie', 'redirect' => route('accueil-admin')]);
        } else {
            return response()->json(['error' => 'Identifiants incorrects']);
        }
    }

    public function loginEmployé(Request $request)
    {
        $id = $request->input('identifiant');
        $mdp = $request->input('mdp');

        $employe = Employes::where('identifiant', $id)->first();
        $statut = $employe->statut;

        if ($employe && $mdp == $employe->mdp && $statut == 0) {
            auth()->guard('employee')->login($employe);
            $employe_user = auth()->guard('employee')->user();
            return response()->json(['success' => 'Connexion réussie', 'redirect' => route('accueil-employé')]);
        } else {
            return response()->json(['error' => 'Identifiants incorrects']);
        }
    }

    public function mdpOublié(){
        return view('mdpOublié');
    }

    public function nouveauMdp(Request $request){
        $emp = new Employes();
        $nouveauMdp = $emp->genererMdp(10); 

        $email = $request->input('email');
        $admin = Administrateur::where('email', $email)->first();
        $employeinfo = EmployeInfos::where('email', $email)->first();

        if($admin) {
            $admin->mdp = $nouveauMdp;
            $admin->save();
        } elseif($employeinfo) {
            $idEmploye = $employeinfo->idEmploye;
            $employe = Employes::find($idEmploye);
            $employe->mdp = $nouveauMdp;
            $employe->update();
        } else {
            return "Aucun utilisateur avec cet email trouvé.";
        }    
        
        $mailResult = $emp->nouveauMdpMail($nouveauMdp, $email);

        if($mailResult === 1){
            return redirect()->back()->with('success', 'Votre nouveau mot de passe se trouve dans votre boîte mail');
        }else{
            return redirect()->back()->with('error', 'Erreur');

        }
    }

    public function logoutEmployé(){
        auth()->guard('employee')->logout();
        return view('connexion');
    }

    public function logoutAdmin(){
        auth()->guard('web')->logout();
        return view('connexion');
    }
}
