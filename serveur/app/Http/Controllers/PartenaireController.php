<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;

class PartenaireController extends Controller
{
    public function index()
    {
        // Récupérer tous les partenaires depuis la base de données
        $partenaires = Partenaire::all();

        // Retourner la vue avec la liste des partenaires
        return view('partenaires.index', ['partenaires' => $partenaires]);
    }

    public function show($id)
    {
        // Récupérer un partenaire spécifique par son ID depuis la base de données
        $partenaire = Partenaire::find($id);

        // Retourner la vue avec les détails du partenaire
        return view('partenaires.show', ['partenaire' => $partenaire]);
    }

    public function create()
    {
        // Afficher le formulaire de création d'un nouveau partenaire
        return view('partenaires.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'categories' => 'required',
            'nom' => 'required',
            'logo' => 'required|integer',
            'url' => 'required|url',
        ]);

        // Créer un nouveau partenaire dans la base de données
        $partenaire = Partenaire::create($request->all());

        // Rediriger vers la vue des partenaires avec un message de succès
        return redirect('/partenaires')->with('success', 'Partenaire ajouté avec succès');
    }

    public function edit($id)
    {
        // Récupérer un partenaire spécifique par son ID depuis la base de données
        $partenaire = Partenaire::find($id);

        // Afficher le formulaire d'édition du partenaire
        return view('partenaires.edit', ['partenaire' => $partenaire]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'categories' => 'required',
            'nom' => 'required',
            'logo' => 'required|integer',
            'url' => 'required|url',
        ]);

        // Mettre à jour les informations du partenaire dans la base de données
        Partenaire::find($id)->update($request->all());

        // Rediriger vers la vue des partenaires avec un message de succès
        return redirect('/partenaires')->with('success', 'Partenaire mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer un partenaire spécifique par son ID depuis la base de données
        Partenaire::destroy($id);

        // Rediriger vers la vue des partenaires avec un message de succès
        return redirect('/partenaires')->with('success', 'Partenaire supprimé avec succès');
    }
}
