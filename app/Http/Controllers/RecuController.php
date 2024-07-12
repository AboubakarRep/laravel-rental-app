<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\Reservation;
use App\Models\Facture;
use App\Models\User;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use PDF;


class RecuController extends Controller
{
    public function generate($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $amount = $this->calculateAmount($reservation);
        $monthInFrench = $this->getMonthInFrench(now()->format('F'));


        $Facture = Facture::create([
            'reference' => $this->generateReference(),
            'reservation_id' => $reservation->id,
            'amount' => $reservation->cout,
            'launch_date' => now(),
            'done_time' => now()->addHour(),
            'status' => 'SUCCESS',
            'month' => $monthInFrench, // Assurez-vous que les mois sont en français si nécessaire
            'year' => now()->format('Y'),
        ]);

        $pdf = PDF::loadView('admin.widget.recu', compact('reservation', 'Facture'));

        // Envoyer la notification par email
       // $reservation->user->notify(new FactureGenerated($reservation, $Facture));

        return $pdf->download('Facture.pdf');
    }
    public function code($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $amount = $this->calculateAmount($reservation);
        $monthInFrench = $this->getMonthInFrench(now()->format('F'));


        $Facture = Facture::create([
            'reference' => $this->generateReference(),
            'reservation_id' => $reservation->id,
            'amount' => $reservation->cout,
            'launch_date' => now(),
            'done_time' => now()->addHour(),
            'status' => 'SUCCESS',
            'month' => $monthInFrench, // Assurez-vous que les mois sont en français si nécessaire
            'year' => now()->format('Y'),
        ]);

        $pdf = PDF::loadView('admin.widget.code', compact('reservation', 'Facture'));

        // Envoyer la notification par email
       // $reservation->user->notify(new FactureGenerated($reservation, $Facture));

        return $pdf->download('Code_reservation.pdf');
    }


    private function calculateAmount($reservation)
    {
        // Implémentez votre logique de calcul du montant
        // $duration = $reservation->date_fin->diffInHours($reservation->date_debut);
        // $rate = 50; // Tarif horaire
        $duration=5000;
        return $duration ;
    }

    private function generateReference()
    {
        // Générer une référence unique pour la facture
        return 'INV-' . strtoupper(uniqid());
    }
    private function getMonthInFrench($month)
    {
        $months = [
            'January' => 'JANVIER',
            'February' => 'FEVRIER',
            'March' => 'MARS',
            'April' => 'AVRIL',
            'May' => 'MAI',
            'June' => 'JUIN',
            'July' => 'JUILLET',
            'August' => 'AOUT',
            'September' => 'SEPTEMBRE',
            'October' => 'OCTOBRE',
            'November' => 'NOVEMBRE',
            'December' => 'DECEMBRE',
        ];

        return $months[$month] ?? 'UNKNOWN';
    }
}
