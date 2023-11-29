<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;
use App\Models\DemandesConges;
use Illuminate\Support\Facades\Auth;

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

    public function profilAdmin(){
        if (auth()->check()) {
            $admin = Auth::guard('web')->user();
            return view('admin.profilAdmin', compact('admin'));
        }
    }

}
