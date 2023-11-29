<?php

namespace App\Http\Controllers;

use App\Models\DemandesConges;
use Illuminate\Support\Facades\DB;

class StatistiquesController extends Controller
{
    //
    public function effectifActuel()
    {
        $result = DB::select('select count(idEmploye) as count from employes e where statut = 0');
        $nbr = $result[0]->count;
        return $nbr;
    }

    public function masseSalariale()
    {
        $result = DB::select("SELECT 
            IF(sum(salaire) >= 1000000000, 
                CONCAT(FLOOR(sum(salaire) / 1000000000), 'G', LPAD(FLOOR((sum(salaire) % 1000000000) / 1000000), 3, '0')),
                IF(sum(salaire) >= 1000000, 
                    CONCAT(FLOOR(sum(salaire) / 1000000), 'M', LPAD(FLOOR((sum(salaire) % 1000000) / 1000), 3, '0')),
                    CONCAT(FLOOR(sum(salaire) / 1000), 'K')
                )
            ) AS sommeSalaire 
            FROM employes e 
            JOIN employes_infos_pros eip ON eip.idEmploye = e.idEmploye");

        $somme = $result[0]->sommeSalaire;
        return $somme;
    }

    public function turnOver()
    {
        $result = DB::select('select count(e.idEmploye) as nbreDepart  from employes e join employes_infos_pros eip on eip.idEmploye = e.idEmploye 
        where year (eip.date_debut) = year(current_date()) and e.statut = 1');
        $result1 = DB::select('select count(e.idEmploye) as nbreArrivee  from employes e join employes_infos_pros eip on eip.idEmploye = e.idEmploye 
        where year (eip.date_debut) = year(current_date()) and e.statut = 0');

        $nbre_depart = $result[0]->nbreDepart;
        $nbre_arrivee = $result1[0]->nbreArrivee;
        $effectif = $this->effectifActuel();

        $turnOver = ((($nbre_depart + $nbre_arrivee) / 2) / $effectif) * 100;
        return number_format($turnOver, 2);
    }

    public function absenteisme()
    {
        $demande_conge = new DemandesConges();
        $result = DB::select('select count(idEmploye) as nbEmploye from demandes_conges dc where etat = 1 and month(date_debut) = month(current_date())');
        $result1 = DB::select('select date_fin, date_debut from demandes_conges dc where etat = 1 and month(date_debut) = month(current_date())');

        $nbjour = [];
        foreach ($result1 as $r) {
            $date_debut = $r->date_debut;
            $date_fin = $r->date_fin;
            $nbjour[] = $demande_conge->nbJour($date_debut, $date_fin);
        }

        $totalJoursConge = array_sum($nbjour);
        $effectif = $this->effectifActuel();

        $heuresTravailleesParJour = 7;
        $totalHeuresConge = $totalJoursConge * $heuresTravailleesParJour;
        $nbheuretravail = $effectif * 7 * 22;


        $absenteisme = 100 * ($totalHeuresConge / $nbheuretravail);
        return number_format($absenteisme, 2);
    }

    public function effectifDepartement()
    {
        $result = DB::select("SELECT COUNT(ei.idEmploye) as nbEmploye, d.nom as departement FROM employé_infos ei JOIN departements d ON d.idDepartement = ei.idDepartement where statutEmploye = 0 GROUP BY ei.idDepartement, d.nom");
        $effectif = [];
        foreach ($result as $row) {
            $effectif[] = [$row->departement, $row->nbEmploye];
        }
        return $effectif;
    }

    public function effectifGenre()
    {
        $result = DB::select('select count(e.idEmploye) as nbEmploye, g.nom  from employes e join employé_infos ei on ei.idEmploye = e.idEmploye 
        join candidats c on c.idCandidat = ei.idCandidat 
        join genre g on g.idGenre = c.idGenre 
        where statutEmploye = 0 group by c.idGenre, g.nom');
        $effectifGenre = [];
        foreach ($result as $row) {
            $effectifGenre[] = [$row->nom, $row->nbEmploye];
        }
        return $effectifGenre;
    }

    public function effectifContrat()
    {
        $result = DB::select('select count(ei.idEmploye) as nbEmploye, tc.type from employé_infos ei join type_contrat tc on tc.idTypeContrat = ei.idTypeContrat 
        where statutEmploye = 0
        group by ei.idTypeContrat, tc.type');
        $effectifContrat = [];
        foreach ($result as $row) {
            $effectifContrat[] = [$row->type, $row->nbEmploye];
        }
        return $effectifContrat;
    }

    public function lastEmployes()
    {
        $result = DB::select('SELECT ei.nom, ei.prenom, g.nom as genre, tc.`type` as contrat, d.nom as departement, p.nom as poste FROM employé_infos ei
        join genre g on ei.idGenre  = g.idGenre 
        join type_contrat tc on tc.idTypeContrat = ei.idTypeContrat 
        join departements d on d.idDepartement = ei.idDepartement 
        join poste p on p.idPoste = ei.idPoste 
        ORDER BY date_debut  DESC
        LIMIT 5');

        return $result;
    }

    public function depensesSalarialeDept()
    {
        $result = DB::select("SELECT sum(salaire) AS sommeSalaire, d.nom
            FROM employes e 
            JOIN employes_infos_pros eip ON eip.idEmploye = e.idEmploye
            join departement_poste dp on dp.idDeptPoste = eip.idDeptPoste 
            join departements d on d.idDepartement = dp.idDepartement group by d.nom");

        $depense = [];

        foreach ($result as $row) {
            if ($row->nom !== null && $row->sommeSalaire !== null) {
                $depense[] = [$row->nom, $row->sommeSalaire];
            }
        }
        return $depense;
    }

    public function stats()
    {
        if (auth()->check()) {
            $moisActuel = \Carbon\Carbon::now()->locale('fr_FR')->isoFormat('MMMM');
            $mois = ucfirst($moisActuel);

            $effectif = $this->effectifActuel();
            $masseSalariale = $this->masseSalariale();
            $turnOver = $this->turnOver();
            $absenteisme = $this->absenteisme();
            $effectifDept = $this->effectifDepartement();
            $nbreGenre = $this->effectifGenre();
            $nbreEffectifContrat = $this->effectifContrat();
            $newestEmployee = $this->lastEmployes();

            $salaireDept = $this->depensesSalarialeDept();
            return view('admin.statistiques', compact(
                'mois',
                'effectif',
                'masseSalariale',
                'turnOver',
                'absenteisme',
                'effectifDept',
                'nbreGenre',
                'nbreEffectifContrat',
                'newestEmployee',
                'salaireDept'
            ));
        }
    }
}
