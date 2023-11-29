<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
        'identifiant',
        'mdp'
    ];

    protected $table = "administrateur";

    public $timestamps = false;
}
