<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicule_id','user_id','date_debut','date_fin','satut','cout','chauffeur_id','contactClient','lieu_recup','lieu_depot','code_reservation'
    ];
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'chauffeur_id');
    }



    
     /**
     * Get all of the comments for the Employer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Facture()
    {
        return $this->hasOne(Facture::class);
    }
}
