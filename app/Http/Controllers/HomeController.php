<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    /*espace administrateur*/
    public function acceuil()
    {
        return view('auth.acceuil');
    }

    public function index()
    {
        $messages = Message::all(); // Récupérer tous les messages depuis le modèle Message
        return view('home', ['messages' => $messages]); // Passer les messages à la vue 'home'
    }
}
