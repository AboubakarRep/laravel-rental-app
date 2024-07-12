<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $fillable = ['nom','marque_id'];

    public function vehicule()
    {
        return $this->hasMany(Vehicule::class);
    }

    public function modele()
    {
        return $this->hasMany(Modele::class);
    }
}
