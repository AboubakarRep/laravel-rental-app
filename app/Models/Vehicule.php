<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule_vehicule', 'date_achat', 'assurance', 'image','climatisation','gps','categorie_id','modele_id'
    ];

    public function categorie()
{
    return $this->belongsTo(Category::class, 'categorie_id');
}

public function modele()
{
    return $this->belongsTo(Modele::class, 'modele_id');
}

public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
