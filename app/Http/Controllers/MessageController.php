<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $message = Message::create($validatedData);

        // Rediriger l'utilisateur avec un message de succès
        return redirect('/')->with('success', 'Message envoyé avec succès !');
    }

    public function index()
    {
        // Récupérer tous les messages à partir de la base de données
        $messages = Message::all();

        // Passer les messages récupérés à la vue pour affichage
        return view('messages.index', ['messages' => $messages]);
    }
}
