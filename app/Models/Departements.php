<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    protected $fillable = [
        'nom'
    ];

    protected $table = "departements";
}
