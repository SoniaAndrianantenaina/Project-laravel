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

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'idGenre');
    }

    public function deptposte()
    {
        return $this->belongsTo(DepartementPoste::class, 'idDeptPoste');
    }

    public function statutmarital()
    {
        return $this->belongsTo(StatutMarital::class, 'idStatutMarital');
    }

    public function typecontrat()
    {
        return $this->belongsTo(TypeContrat::class, 'idTypeContrat');
    }

    public function sauverImage($file)
    {
        if ($file) {
            $file_name = $file->getClientOriginalName();
            $path = $file->storeAs('public', 'images/candidats/' . $file_name);
            return $path;
        }

        return false;
    }

    public function modifierCV($file)
    {
        if ($file) {
            $extension = $file->getClientOriginalExtension();

            $extensionsAutorisees = ['pdf', 'doc', 'docx'];

            if (in_array($extension, $extensionsAutorisees)) {
                $file_name = $file->getClientOriginalName();
                $path = $file->storeAs('public', 'dossier/candidats/CV/' . $file_name);
                return $file_name;
            } else {
                return false;
            }
        }

        return false;
    }

    public function modifierLM($file)
    {
        if ($file) {
            $extension = $file->getClientOriginalExtension();

            $extensionsAutorisees = ['pdf', 'doc', 'docx'];

            if (in_array($extension, $extensionsAutorisees)) {
                $file_name = $file->getClientOriginalName();
                $path = $file->storeAs('public', 'dossier/candidats/LM/' . $file_name);
                return $file_name;
            } else {
                return false;
            }
        }

        return false;
    }
}
