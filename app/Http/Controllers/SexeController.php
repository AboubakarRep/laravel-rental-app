<?php

namespace App\Http\Controllers;

use App\Models\Sexe;
use Illuminate\Http\Request;

class SexeController extends Controller
{
    public function index()
    {
        $sexes = Sexe::all();
        return view('admin.pages.consulter_sexe', compact('sexes'));
    }

    public function create()
    {
        return view('admin.pages.ajouter_sexe_candidat');
    }

    public function storeSexe(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:sexes',
            'user_id' => 'required|exists:users,id',

        ]);

        Sexe::create([
            'nom' => $request->input('nom'),
            'user_id' => $request->input('user_id'), // Fournir 'user_id'
        ]);

        return redirect()->route('sexeliste')->with('success', 'Sexe créée avec succès');
    }

    public function modifierSexe(Sexe $sexe)
    {
        return view('admin.pages.formModifier_Sexe', compact('sexe'));
    }

    public function miseAjour_Sexe(Request $request, Sexe $sexe)
    {
        $request->validate([
            'nom' => 'required|string|unique:sexes,nom,'.$sexe->id,
            'user_id' => 'required|exists:users,id'

        ]);

        $sexe->update([
            'nom' => $request->nom,
            'user_id' => 'required|exists:users,id'

        ]);

        return redirect()->route('sexeliste')->with('success', 'Changement effectué avec succès');

    }


    // Ajoutez les autres méthodes pour edit, update, et delete selon les besoins

    public function supprimer(Sexe $sexe)
    {
        $sexe->delete();

        return redirect()->route('marqueliste')->with('success', 'Marque supprimée avec succès');
    }


    public function getSexes($user_id)
    {
        $sexes = \App\Models\Sexe::where('user_id', $user_id)->get();
        return response()->json($sexes);
    }

}
