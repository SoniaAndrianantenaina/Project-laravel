<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;

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
}
