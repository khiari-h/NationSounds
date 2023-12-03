<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        // Récupérer tous les genres depuis la base de données
        $genres = Genre::all();

        // Retourner la vue avec la liste des genres
        return view('genres.index', ['genres' => $genres]);
    }

    public function show($id)
    {
        // Récupérer un genre spécifique par son ID depuis la base de données
        $genre = Genre::find($id);

        // Retourner la vue avec les détails du genre
        return view('genres.show', ['genre' => $genre]);
    }

    public function create()
    {
        // Afficher le formulaire de création d'un nouveau genre
        return view('genres.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required',
            'id_concert' => 'required',
        ]);

        // Créer un nouveau genre dans la base de données
        $genre = Genre::create($request->all());

        // Rediriger vers la vue des genres avec un message de succès
        return redirect('/genres')->with('success', 'Genre ajouté avec succès');
    }

    public function edit($id)
    {
        // Récupérer un genre spécifique par son ID depuis la base de données
        $genre = Genre::find($id);

        // Afficher le formulaire d'édition du genre
        return view('genres.edit', ['genre' => $genre]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required',
            'id_concert' => 'required',
        ]);

        // Mettre à jour les informations du genre dans la base de données
        Genre::find($id)->update($request->all());

        // Rediriger vers la vue des genres avec un message de succès
        return redirect('/genres')->with('success', 'Genre mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer un genre spécifique par son ID depuis la base de données
        Genre::destroy($id);

        // Rediriger vers la vue des genres avec un message de succès
        return redirect('/genres')->with('success', 'Genre supprimé avec succès');
    }
}
