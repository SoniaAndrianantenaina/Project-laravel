<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->whereDate('date_parution', now()->toDateString())
            ->whereTime('date_parution', '<=', now()->toTimeString())
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
        return $this->whereDate('date_parution', now()->toDateString())
            ->whereTime('date_parution', '<=', now()->toTimeString())
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

    public function storePhotos($file)
    {
        if ($file) {
            $file_name = $file->getClientOriginalName();
            $path = $file->storeAs('public/assets/annonces', $file_name);
            $this->photo = 'assets/annonces/' . $file_name;
            return $this->save();
        }

        return false;
    }
}
