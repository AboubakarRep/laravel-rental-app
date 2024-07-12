<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('admin.pages.consulter_marque', compact('marques'));
    }

    public function create()
    {
        return view('admin.pages.ajouter_marque_vehicule');
    }

    public function storeMarque(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:marques',


        ]);

        Marque::create($request->all());

        return redirect()->route('marqueliste')->with('success', 'Marque créée avec succès');
    }

    public function modifierMarque(Marque $marque)
    {
        return view('admin.pages.formModifier_marque', compact('marque'));
    }

    public function miseAjour_Marque(Request $request, Marque $marque)
    {
        $request->validate([
            'nom' => 'required|string|unique:marques,nom,'.$marque->id,

        ]);

        $marque->update([
            'nom' => $request->nom,

        ]);

        return redirect()->route('marqueliste')->with('success', 'Changement effectué avec succès');

    }


    // Ajoutez les autres méthodes pour edit, update, et delete selon les besoins

    public function supprimer(Marque $marque)
    {
        $marque->delete();

        return redirect()->route('marqueliste')->with('success', 'Marque supprimée avec succès');
    }

}
