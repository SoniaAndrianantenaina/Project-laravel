<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDepart extends Model
{
    protected $fillable = [
        'nom'
    ];

    protected $table = "type_depart";

    protected $primaryKey = 'idTypeDepart';

    public $timestamps = false;

}
