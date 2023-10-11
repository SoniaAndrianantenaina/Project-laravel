<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotifPermission extends Model
{
    protected $fillable = [
        'idtypeconge',
        'motif'
    ];

    public function typeconge(){
        return $this->belongsTo(TypeConge::class, 'idTypeConge');
    }
}
