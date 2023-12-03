<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class UtilisateurController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs depuis la base de données
        $utilisateurs = Utilisateur::all();

        // Retourner la vue avec la liste des utilisateurs
        return view('utilisateurs.index', ['utilisateurs' => $utilisateurs]);
    }

    public function show($id)
    {
        // Récupérer un utilisateur spécifique depuis la base de données
        $utilisateur = Utilisateur::findOrFail($id);

        // Retourner la vue avec les détails de l'utilisateur
        return view('utilisateurs.show', ['utilisateur' => $utilisateur]);
    }

    public function create()
    {
        // Retourner la vue avec le formulaire de création d'utilisateur
        return view('utilisateurs.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'mdp' => 'required|string|max:255',
        ]);

        // Créer un nouvel utilisateur dans la base de données
        $utilisateur = Utilisateur::create($validatedData);

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect('/utilisateurs')->with('success', 'Utilisateur créé avec succès');
    }

    public function edit($id)
    {
        // Récupérer un utilisateur spécifique depuis la base de données pour l'édition
        $utilisateur = Utilisateur::findOrFail($id);

        // Retourner la vue avec le formulaire d'édition d'utilisateur
        return view('utilisateurs.edit', ['utilisateur' => $utilisateur]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'mdp' => 'required|string|max:255',
        ]);

        // Mettre à jour les informations de l'utilisateur dans la base de données
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update($validatedData);

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect('/utilisateurs')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer un utilisateur de la base de données
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect('/utilisateurs')->with('success', 'Utilisateur supprimé avec succès');
    }
}
