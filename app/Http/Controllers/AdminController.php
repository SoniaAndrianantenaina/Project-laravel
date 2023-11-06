<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DemandesConges;

class AdminController extends Controller
{
    //
    public function accueilAdmin(){
        if (auth()->check()) {
            $annonce = new Annonces();
            $annonceDuJour = $annonce->dayAnnouncements();
            $annoncesAvenir = $annonce->upcomingAnnouncements();
            return view('admin.accueilAdmin', compact('annonceDuJour', 'annoncesAvenir'));
        }
    }

    public function stats(){
        if (auth()->check()) {
            return view('admin.statistiques');
        }
    }
}
