<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scene;

class SceneController extends Controller
{
    public function index()
    {
        // Récupérer toutes les scènes depuis la base de données
        $scenes = Scene::all();

        // Retourner la vue avec la liste des scènes
        return view('scenes.index', ['scenes' => $scenes]);
    }

    public function show($id)
    {
        // Récupérer une scène spécifique depuis la base de données
        $scene = Scene::findOrFail($id);

        // Retourner la vue avec les détails de la scène
        return view('scenes.show', ['scene' => $scene]);
    }

    public function create()
    {
        // Retourner la vue avec le formulaire de création de scène
        return view('scenes.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'id_lieu' => 'required|exists:lieu,id',
        ]);

        // Créer une nouvelle scène dans la base de données
        $scene = Scene::create($validatedData);

        // Rediriger vers la liste des scènes avec un message de succès
        return redirect('/scenes')->with('success', 'Scène créée avec succès');
    }

    public function edit($id)
    {
        // Récupérer une scène spécifique depuis la base de données pour l'édition
        $scene = Scene::findOrFail($id);

        // Retourner la vue avec le formulaire d'édition de scène
        return view('scenes.edit', ['scene' => $scene]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'id_lieu' => 'required|exists:lieu,id',
        ]);

        // Mettre à jour les informations de la scène dans la base de données
        $scene = Scene::findOrFail($id);
        $scene->update($validatedData);

        // Rediriger vers la liste des scènes avec un message de succès
        return redirect('/scenes')->with('success', 'Scène mise à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer une scène de la base de données
        $scene = Scene::findOrFail($id);
        $scene->delete();

        // Rediriger vers la liste des scènes avec un message de succès
        return redirect('/scenes')->with('success', 'Scène supprimée avec succès');
    }
}
