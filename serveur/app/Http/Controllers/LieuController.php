<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;

class LieuController extends Controller
{
    public function index()
    {
        // Récupérer tous les lieux depuis la base de données
        $lieux = Lieu::all();

        // Retourner la vue avec la liste des lieux
        return view('lieux.index', ['lieux' => $lieux]);
    }

    public function show($id)
    {
        // Récupérer un lieu spécifique par son ID depuis la base de données
        $lieu = Lieu::find($id);

        // Retourner la vue avec les détails du lieu
        return view('lieux.show', ['lieu' => $lieu]);
    }

    public function create()
    {
        // Afficher le formulaire de création d'un nouveau lieu
        return view('lieux.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'localisation_gps' => 'required',
        ]);

        // Créer un nouveau lieu dans la base de données
        $lieu = Lieu::create($request->all());

        // Rediriger vers la vue des lieux avec un message de succès
        return redirect('/lieux')->with('success', 'Lieu ajouté avec succès');
    }

    public function edit($id)
    {
        // Récupérer un lieu spécifique par son ID depuis la base de données
        $lieu = Lieu::find($id);

        // Afficher le formulaire d'édition du lieu
        return view('lieux.edit', ['lieu' => $lieu]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'localisation_gps' => 'required',
        ]);

        // Mettre à jour les informations du lieu dans la base de données
        Lieu::find($id)->update($request->all());

        // Rediriger vers la vue des lieux avec un message de succès
        return redirect('/lieux')->with('success', 'Lieu mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer un lieu spécifique par son ID depuis la base de données
        Lieu::destroy($id);

        // Rediriger vers la vue des lieux avec un message de succès
        return redirect('/lieux')->with('success', 'Lieu supprimé avec succès');
    }
}
