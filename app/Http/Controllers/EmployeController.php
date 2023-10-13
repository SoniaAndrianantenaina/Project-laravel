<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function listeEmployes(){
        $employe = Employes::all();
        return view('admin.listeEmployés', compact('employe'));
    }
}
