<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Illuminate\Support\Facades\DB;


class Employes extends Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
        'idCandidat',
        'identifiant',
        'mdp'
    ];

    protected $table = "employes";

    protected $primaryKey = 'idEmploye';

    public $timestamps = false;

    public function candidat()
    {
        return $this->belongsTo(Candidats::class, 'idCandidat');
    }

    public function birthdayMail()
    {
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


    public function monProfil()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;
            $profil = EmployeInfos::where('idEmploye', $employe_id)->first();
            return $profil;
        }
    }

    public function relationProfil()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;

            $profil = EmployeInfos::where('idEmploye', $employe_id)->first();
            $idDepartement = $profil->deptposte->dept->idDepartement;
            $relations = DB::select('SELECT e.idEmploye, c.nom as nomEmploye, c.prenom, eip.idTypeContrat, dp.idDepartement, dp.idPoste,p.nom as nomPoste, p.degre  from employes e
            join candidats c on c.idCandidat = e.idCandidat
            join employes_infos_pros eip on e.idEmploye = eip.idEmploye
            join departement_poste dp on dp.idDeptPoste = c.idDeptPoste
            join poste p on dp.idPoste = p.idPoste
            WHERE dp.idDepartement = :idDepartement AND e.idEmploye != :employe_id' ,
            ['idDepartement' => $idDepartement, 'employe_id' => $employe_id]);
            return $relations;
        }
    }

    public function dateDuJour(){
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        date_default_timezone_set('Europe/Paris');
        $day = strftime('%A %d %B %Y');
        $day = ucfirst(mb_strtolower($day, 'UTF-8'));
        return $day;
    }
}
