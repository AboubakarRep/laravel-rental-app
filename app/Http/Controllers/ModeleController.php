<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    public function index()
    {
        $modeles = Modele::all();
        return view('admin.pages.consulter_modele', compact('modeles'));
    }

    public function create()
    {
        return view('admin.pages.ajouter_modele_vehicule');
    }

    public function storeModele(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'marque_id' => 'required|exists:marques,id', // Validation de l'existence de 'marque_id'
        ]);

        Modele::create([
            'nom' => $request->input('nom'),
            'marque_id' => $request->input('marque_id'), // Fournir 'marque_id'
        ]);

        return redirect()->route('modeleliste')->with('success', 'Modele créée avec succès');
    }

   public function modifierModele(Modele $modele)
    {
        return view('admin.pages.formModifier_modele', compact('modele'));
    }

    public function miseAjour_Modele(Request $request, Modele $modele)
    {
        $request->validate([
            'nom' => 'required|string|unique:modeles,nom,'.$modele->id,
            'marque_id' => 'required|exists:marques,id',

        ]);

        $modele->update([
            'nom' => $request->nom,
            'marque_id' => 'required|exists:marques,id',
        ]);

        return redirect()->route('modeleliste')->with('success', 'Changement effectué avec succès');

    }


    // Ajoutez les autres méthodes pour edit, update, et delete selon les besoins

    public function supprimer(Modele $modele)
    {
        $modele->delete();

        return redirect()->route('modeleliste')->with('success', 'Marque supprimée avec succès');
    }


    public function getModeles($marque_id)
{
    $modeles = \App\Models\Modele::where('marque_id', $marque_id)->get();
    return response()->json($modeles);
}


}
