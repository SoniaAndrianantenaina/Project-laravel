<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
        'identifiant',
        'mdp'
    ];

    protected $table = "administrateur";

    public function getAuthPassword()
    {
        return $this->mdp;
    }
}
