<?php

namespace App\Models;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Employes extends Model
{
    protected $fillable = [
        'idCandidat',
        'identifiant',
        'mdp'
    ];

    protected $table = "employes";

    protected $primaryKey = 'idEmploye';

    public $timestamps = false;

    public function candidat(){
        return $this->belongsTo(Candidats::class, 'idCandidat');
    }

    public function birthdayMail(){
        $employes = DB::select('SELECT e.idEmploye, c.nom, c.prenom, c.datenaissance  from employes e join candidats c on c.idCandidat = e.idCandidat');
        $today = date('d-m');
        //echo $today;

        $employeeIDs = [];

        foreach ($employes as $employe) {
            $date_naissance = date('d-m', strtotime($employe->datenaissance));

            if ($today === $date_naissance) {
                $employeID = $employe->idEmploye;
                $employeeIDs[] = $employeID;
            }
        }


        foreach ($employeeIDs as $employeeID) {
            echo "C'est l'anniversaire de l'employé avec l'ID : $employeeID<br>";
        }

    }
}
