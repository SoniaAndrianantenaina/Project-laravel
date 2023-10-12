<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function loginAdmin(Request $request){
        return view('admin.accueilAdmin');

        /*if (Auth::guard('admin')->attempt(['identifiant' => $request->input('identifiant'), 'mdp' => $request->input('mdp')])) {
            return view('admin.accueilAdmin');
        } else {
            return redirect()->back()->with('error', 'Identifiants incorrects');
        }*/
    }

    public function loginEmploye(Request $request){
        if (Auth::guard('employee')->attempt(['identifiant' => $request->input('identifiant'), 'mdp' => $request->input('mdp')])) {
            return view('accueil-employe');
        } else {
            return redirect()->back()->with('error', 'Identifiants incorrects');
        }
    }
}
