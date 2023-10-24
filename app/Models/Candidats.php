<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidats extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'datenaissance',
        'adresse',
        'contact',
        'email',
        'idGenre',
        'idStatutMarital',
        'nb_enfants',
        'CV',
        'LM',
        'idDeptPoste',
        'photo',
        'statut',
        'idTypeContrat'
    ];

    protected $table = "candidats";

    protected $primaryKey = 'idCandidat';

    public $timestamps = false;

    public function genre(){
        return $this->belongsTo(Genre::class, 'idGenre');
    }

    public function deptposte(){
        return $this->belongsTo(DepartementPoste::class, 'idDeptPoste');
    }

    public function statutmarital(){
        return $this->belongsTo(StatutMarital::class, 'idStatutMarital');
    }

    public function typecontrat(){
        return $this->belongsTo(TypeContrat::class, 'idTypeContrat');
    }

}
