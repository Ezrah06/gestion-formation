<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_etudiant',
        'prenom_etudiant',
        'telephone',
        'email',
        'adresse',
        'date_inscription',
        'formation_id'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}

