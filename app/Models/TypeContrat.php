<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContrat extends Model
{
    protected $fillable = [
        'type'
    ];

    protected $table = "type_contrat";

    protected $primaryKey = 'idTypeContrat';

    public $timestamps = false;
}
