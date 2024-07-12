<?php

namespace App\Models;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','naissance','etat','profil','habitation','experience','motivation','permis', 'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}

