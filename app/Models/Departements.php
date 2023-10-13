<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    protected $fillable = [
        'nom'
    ];

    protected $primaryKey = 'idDepartement';

    public $timestamps = false;

    protected $table = "departements";
}
