<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $vehicules = Vehicule::latest()->paginate(5);

        return view('admin.pages.consulter_vehicule',compact('vehicules'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.ajouter_vehicule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store(Request $request)
     {
         // Valider les champs requis
         $request->validate([
             'modele_id' => 'required',
             'matricule_vehicule' => 'required',
             'date_achat' => 'required',
             'categorie_id' => 'required|exists:categories,id', // Vérifie si la catégorie existe dans la table des catégories
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

         // Récupérer les valeurs des cases à cocher
         $climatisation = $request->has('climatisation');
         $gps = $request->has('gps');
         $assurance = $request->has('assurance');

         // Traiter le téléchargement de l'image
         if ($image = $request->file('image')) {
             $destinationPath = 'images/';
             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
             $image->move($destinationPath, $profileImage);
             $input['image'] = $profileImage;
         }

         // Créer le véhicule avec les données récupérées
         Vehicule::create([
             'modele_id' => $request->input('modele_id'),
             'matricule_vehicule' => $request->input('matricule_vehicule'),
             'climatisation' => $climatisation,
             'assurance' => $assurance,
             'gps' => $gps,
             'date_achat' => $request->input('date_achat'),
             'categorie_id' => $request->input('categorie_id'),

             'image' => $profileImage // S'assurer que $profileImage est défini correctement
         ]);

         return redirect()->route('admin')->with('success', 'Vehicule créé avec succès.');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        return view('admin.pages.information_vehicule', compact('vehicule'));
    }

    public function showReservationForm(Vehicule $vehicule)
    {
        return view('home.form_reservation', compact('vehicule'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        return view('admin.pages.modifier_vehicule',compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'matricule_vehicule' => 'required',
            'date_achat' => 'required',
            'categorie_id' => 'required',

        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $vehicule->update($input);

        return redirect()->route('admin')
                        ->with('success','Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->route('admin')
                        ->with('success','Car deleted successfully');
    }

    public function index()
    {
        // Récupérer les véhicules avec la relation "categorie" chargée
        $vehicles = Vehicule::with('categorie')->get();

        // Autres opérations avec les véhicules...
    }
}
