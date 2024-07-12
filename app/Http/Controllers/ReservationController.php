<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reservationeff()
    {
        $reservations = Reservation::latest()->paginate(5);

        return view('admin.pages.consulter_reservation', compact('reservations'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function create()
    {
        return view('home.form_reservation');
    }

    public function ajouterReservation(Request $request)
    {
        $user_id = Auth::id();

        $request->validate([
            'vehicule_id' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'cout' => 'required',
            'chauffeur_id' => 'required',
            'contactClient' => 'required',
            'lieu_recup' => 'required',
            'lieu_depot' => 'required',
            'code_reservation' => 'required'
        ]);
        // $startDate = Carbon::parse($request->input('date_debut'));
        // $endDate = Carbon::parse($request->input('date_fin'));
        //  //$dailyRate = $request->input('daily_rate');

        // // Check if start date is before end date
        // if($startDate->greaterThan($endDate)) {
        //     // Redirect back with an error message
        //     return redirect()->route('app_app_form-reservation')
        //         ->with('error', 'La date de début doit être antérieure à la date de fin.');
        // }


        $input = $request->all();
        $input['user_id'] = $user_id;

        Reservation::create($input);

        return redirect()->route('app_reservation')
            ->with('success','Votre reservation a été effectuée avec succès.');

    }

    public function modifierstatut(Reservation $reservation)
    {
        return view('admin.pages.modifier_reservation', compact('reservation'));
    }


    public function changerReservationUser(Reservation $reservation)
    {
        return view('admin.widget.form_modif_res_user', compact('reservation'));
    }

    // public function changerReservationSatut(Request $request, Reservation $reservation)
    // {
    //     $request->validate([
    //         'vehicule_id' => 'required',
    //         'user_id' => 'required',
    //         'date_debut' => 'required',
    //         'date_fin' => 'required',
    //         'statut' => 'required',
    //         'cout' => 'required',
    //         'chauffeur_id' => 'required',
    //         'contactClient' => 'required',
    //         'lieu_recup' => 'required',
    //         'lieu_depot' => 'required'
    //     ]);

    //     $input = $request->all();

    //     $reservation->update($input);

    //     return redirect()->route('listeReservation')
    //         ->with('Changement effectué avec succès');
    // }

    public function changerReservationSatut(Request $request, Reservation $reservation)
{
    $request->validate([
        'date_debut' => 'nullable',
        'date_fin' => 'nullable',
        'cout' => 'nullable',
        'contactClient' => 'nullable',
        'lieu_recup' => 'nullable',
        'lieu_depot' => 'nullable',
        'statut' => 'required',
    ]);

    $reservation->fill($request->all())->save();


    $reservation->statut = $request->statut;
    $reservation->save();

    return redirect()->route('reservationeff');
}



public function changerReservationSatutUser(Request $request, Reservation $reservation)
{
    $request->validate([
        'date_debut' => 'nullable',
        'date_fin' => 'nullable',
        'cout' => 'nullable',
        'contactClient' => 'nullable',
        'lieu_recup' => 'nullable',
        'lieu_depot' => 'nullable',
        'statut' => 'required',
    ]);

    $reservation->fill($request->all())->save();


    $reservation->statut = $request->statut;
    $reservation->save();

    return redirect()->route('reservationeff')
       ;

}

public function supprimer(Reservation $reservation)
{

    $reservation->delete();

    return redirect()->route('reservationeff');
}
}
