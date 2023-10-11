<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'date_parution',
        'date_debut',
        'date_fin'
    ];
}
