<?php

namespace App\Models;

use App\Mail\NouveauMdp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class Employes extends Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
        'idCandidat',
        'identifiant',
        'mdp',
        'statut'
    ];

    protected $table = "employes";

    protected $primaryKey = 'idEmploye';

    public $timestamps = false;

    public function candidat()
    {
        return $this->belongsTo(Candidats::class, 'idCandidat');
    }

    public function genererMdp($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }
        return $password;
    }

    public function nouveauMdpMail($mdp, $email)
    {
        $mail = new NouveauMdp($mdp);
        $mail->to($email);
        Mail::send($mail);

        if (count(Mail::failures()) > 0) {
            return 0;
        } else {
            return 1;
        }
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

    public function profilEmployé($employe_id)
    {
        $profil = EmployeInfos::where('idEmploye', $employe_id)->first();
        return $profil;
    }

    public function relationProfil()
    {
        if (auth()->guard('employee')->check()) {
            $employe_user = auth()->guard('employee')->user();
            $employe_id = $employe_user->idEmploye;

            $departement = DB::select('select d.idDepartement  from employes e 
            join employes_infos_pros eip on eip.idEmploye = e.idEmploye 
            join departement_poste dp on dp.idDeptPoste = eip.idDeptPoste 
            join departements d on d.idDepartement = dp.idDepartement where e.idEmploye = ?', [$employe_id]);

            $idDepartement = $departement[0]->idDepartement;
            $relations = DB::select(
                'select e.idEmploye, c.nom as nomEmploye, c.prenom,c.photo, eip.idTypeContrat, dp.idDepartement, dp.idPoste,p.nom as nomPoste, p.degre from employes e join employes_infos_pros eip on eip.idEmploye = e.idEmploye 
                join candidats c on c.idCandidat = e.idCandidat
                join departement_poste dp on dp.idDeptPoste = eip.idDeptPoste 
                join departements d on d.idDepartement = dp.idDepartement
                join poste p on p.idPoste = dp.idPoste 
                WHERE dp.idDepartement = :idDepartement AND e.idEmploye != :employe_id',
                ['idDepartement' => $idDepartement, 'employe_id' => $employe_id]
            );

            return $relations;
        }
    }

    public function dateDuJour()
    {
        $date = Carbon::now()->locale('fr_FR');
        return $date->isoFormat('dddd D MMMM YYYY');
    }
}
