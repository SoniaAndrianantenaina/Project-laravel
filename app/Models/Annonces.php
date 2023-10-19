<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Annonces extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'date_parution',
        'date_debut',
        'date_fin',
        'photo'
    ];

    protected $table = "annonces";

    protected $primaryKey = 'idAnnonce';

    public $timestamps = false;

    public function dayAnnouncements()
    {
        return $this->whereDate('date_debut', '=', now()->toDateString())
            ->whereTime('date_fin', '>=', now()->toTimeString())
            ->limit(2)
            ->get();
    }

    public function upcomingAnnouncements()
    {
        return $this->whereDate('date_parution', '>=', now()->toDateString())
            ->whereDate('date_debut', '>', now()->toDateString())
            ->limit(2)
            ->get();
    }

    public function allDayAnnouncements()
    {
        return $this->whereDate('date_debut', '=', now()->toDateString())
            ->whereTime('date_fin', '>=', now()->toTimeString())
            ->get();
    }

    public function allUpcomingAnnouncements()
    {
        return $this->whereDate('date_parution', '>=', now()->toDateString())
            ->whereDate('date_debut', '>', now()->toDateString())
            ->get();
    }

    public function deleteAnnouncement($idAnnonce)
    {
        $annonce = Annonces::find($idAnnonce);

        if ($annonce) {
            $annonce->delete();
            return true;
        } else {
            return false;
        }
    }

    public function updateAnnouncement($idAnnonce){

    }

    public function storePhotos($file)
    {
        if ($file) {
            $file_name = $file->getClientOriginalName();
            $path = $file->storeAs('public', 'images/annonces/' . $file_name);
            return $path;
        }

        return false;
    }

    public function compareHeure($date_debut, $date_fin)
    {
        $date_debut = new DateTime($date_debut);
        $date_fin = new DateTime($date_fin);

        $heure_fin = $date_fin->format('H:i');
        $heure_debut = $date_debut->format('H:i');
        $date_debut = $date_debut->format('Y-m-d');
        $date_fin = $date_fin->format('Y-m-d');

        if ($date_debut == $date_fin) {
            if ($heure_debut > $heure_fin) {
                return -1;
            }
        }

        if ($date_fin < $date_debut) {
            return -2;
        }
        return 0;
    }
}
