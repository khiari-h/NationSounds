<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;

class PreferenceController extends Controller
{
    public function index()
    {
        // Récupérer toutes les préférences depuis la base de données
        $preferences = Preference::all();

        // Retourner la vue avec la liste des préférences
        return view('preferences.index', ['preferences' => $preferences]);
    }

    public function show($id)
    {
        // Récupérer une préférence spécifique depuis la base de données
        $preference = Preference::findOrFail($id);

        // Retourner la vue avec les détails de la préférence
        return view('preferences.show', ['preference' => $preference]);
    }

    public function create()
    {
        // Retourner la vue avec le formulaire de création de préférence
        return view('preferences.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'valeur' => 'required|string|max:255',
        ]);

        // Créer une nouvelle préférence dans la base de données
        $preference = Preference::create($validatedData);

        // Rediriger vers la liste des préférences avec un message de succès
        return redirect('/preferences')->with('success', 'Préférence créée avec succès');
    }

    public function edit($id)
    {
        // Récupérer une préférence spécifique depuis la base de données pour l'édition
        $preference = Preference::findOrFail($id);

        // Retourner la vue avec le formulaire d'édition de préférence
        return view('preferences.edit', ['preference' => $preference]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'valeur' => 'required|string|max:255',
        ]);

        // Mettre à jour les informations de la préférence dans la base de données
        $preference = Preference::findOrFail($id);
        $preference->update($validatedData);

        // Rediriger vers la liste des préférences avec un message de succès
        return redirect('/preferences')->with('success', 'Préférence mise à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer une préférence de la base de données
        $preference = Preference::findOrFail($id);
        $preference->delete();

        // Rediriger vers la liste des préférences avec un message de succès
        return redirect('/preferences')->with('success', 'Préférence supprimée avec succès');
    }
}
