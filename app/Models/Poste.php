<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = [
        'nom',
        'salaire',
        'degre'
    ];

    protected $table = "poste";

}
