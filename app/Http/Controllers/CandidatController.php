<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postulation()
    {
        $candidats = Candidat::latest()->paginate(5);

        return view('admin.pages.consulter_chauffeur',compact('candidats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function postulations()
    {
        $candidats = Candidat::latest()->paginate(5);

        return view('admin.pages.consulter_candidat',compact('candidats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home/postuler');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajouter(Request $request)
    {
     // Vérifier si l'email existe déjà dans la base de données
    $existingCandidat = Candidat::where('email', $request->email)->first();
    if ($existingCandidat) {
        return redirect()->back()->with('error', 'Vous avez déjà postulé.');
    }
        $request->validate([
            'naissance' => 'required',
            'habitation' => 'required',
            'experience' => 'required',
            'motivation' => 'required',
            'profil' => 'required',
            'permis' => 'required',
            'etat' => 'required',
            'user_id' => 'required',
            'email' => 'required',


        ]);

        $input = $request->all();

        if ($image = $request->file('profil')) {
            $destinationPathprofil = 'images/profil/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPathprofil, $profileImage);

            $input['profil'] = "$profileImage";
        }

        if ($imagee = $request->file('permis')) {
            $destinationPathpermis = 'images/permis/';
            $profileImagee = date('YmdHisd') . "." . $imagee->getClientOriginalExtension();

            $imagee->move($destinationPathpermis, $profileImagee);
            $input['permis'] = "$profileImagee";
        }


        Candidat::create($input);

        return redirect()->route('app_postuler')
                        ->with('success','Votre candidature a été envoyé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function voirInfo(Candidat $candidat)
    {

        return view('admin.pages.voirInfo_candidat_chauffeur',compact('candidat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function modifier(Candidat $candidat)
    {
        return view('admin.pages.modifier_candidat',compact('candidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function miseAjour(Request $request, Candidat $candidat)
    {
        $request->validate([
            'etat' => 'required',
            'habitation' => 'required',
            'experience' => 'required',

        ]);

        $input = $request->all();

        // Vérifie s'il y a un nouveau fichier de profil
        if ($request->hasFile('profil')) {
            $image = $request->file('profil');
            $destinationPath = 'images/profil/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profil'] = $profileImage;
        }

        // Vérifie s'il y a un nouveau fichier de permis
        if ($request->hasFile('permis')) {
            $image = $request->file('permis');
            $destinationPath = 'images/permis/';
            $profileImagee = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImagee);
            $input['permis'] = $profileImagee;
        }

        // Met à jour les informations du candidat
        $candidat->update($input);

        return redirect()->route('postulations')->with('success', 'Changement effectué avec succès');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function supprimer(Candidat $candidat)
    {

        $candidat->delete();

        return redirect()->route('postulation')->with('success', 'Candidat supprimé avec succès');
    }




}
