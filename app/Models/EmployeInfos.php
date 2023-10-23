<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeInfos extends Model
{
    use HasFactory;

    protected $table = "employé_infos";

    public function candidat(){
        return $this->belongsTo(Candidats::class, 'idCandidat');
    }

    public function deptposte(){
        return $this->belongsTo(DepartementPoste::class, 'idDeptPoste');
    }

    public function typecontrat(){
        return $this->belongsTo(TypeContrat::class, 'idTypeContrat');
    }

    public function statutmarital(){
        return $this->belongsTo(StatutMarital::class, 'idStatutMarital');
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'idGenre');
    }
}
