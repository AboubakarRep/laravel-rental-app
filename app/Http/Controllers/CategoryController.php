<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.consulter_categorie', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.ajouter_categorie_vehicule');
    }

    public function storeCategorie(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories',
            'tarif_par_jour' => 'required|numeric',
        ]);

        Category::create($request->all());

        return redirect()->route('categorieliste')->with('success', 'Categorie créé avec succès');
    }

    public function modifierCategorie(Category $categorie)
    {
        return view('admin.pages.formModifier_categorie', compact('categorie'));
    }

    public function miseAjour(Request $request, Category $categorie)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,'.$categorie->id,
            'tarif_par_jour' => 'required|numeric',
        ]);

        $categorie->update([
            'name' => $request->name,
            'tarif_par_jour' => $request->tarif_par_jour,
            // Ajoutez d'autres champs à mettre à jour ici si nécessaire
        ]);

        return redirect()->route('categorieliste')->with('success', 'Changement effectué avec succès');

    }


    // Ajoutez les autres méthodes pour edit, update, et delete selon les besoins

    public function supprimer(Category $categorie)
    {
        $categorie->delete();
    
        return redirect()->route('categorieliste')->with('success', 'Catégorie supprimée avec succès');
    }
    
}
