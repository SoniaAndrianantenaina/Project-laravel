<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidats;


class CandidatController extends Controller
{
    public function listeCandidats(){
        $candidats = Candidats::all();
        return view('admin.listeAnnonces', compact('candidats'));
    }
}
