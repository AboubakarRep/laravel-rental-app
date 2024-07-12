<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caisse;

class CaisseController extends Controller
{
    public function index()
    {
        $reservations = Caisse::all();
        return view('caisse.index', ['reservations' => $reservations]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_name' => 'required|string',
            'debit_montant' => 'required|numeric',
            'credit_montant' => 'required|numeric',
        ]);

        Caisse::create($request->all());

        return redirect()->route('caisse.index')->with('success', 'Réservation enregistrée avec succès !');
    }

    // Ajoutez d'autres fonctions pour update et destroy selon les besoins

}
