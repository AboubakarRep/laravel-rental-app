<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $fillable = ['nom','marque_id'];

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'marque_id');
    }

    public function vehicule()
    {
        return $this->hasMany(Vehicule::class);
    }
}
