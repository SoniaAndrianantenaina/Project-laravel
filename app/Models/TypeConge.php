<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeConge extends Model
{
    protected $fillable = [
        'nom'
    ];

    protected $table = "type_conge";

    protected $primaryKey = 'idTypeConge';

    public $timestamps = false;

}
