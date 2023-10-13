<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutMarital extends Model
{
    protected $fillable = [
        'nom'
    ];

    protected $table = "statut_marital";

    protected $primaryKey = 'idStatutMarital';

    public $timestamps = false;
}
