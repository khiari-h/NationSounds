<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function index()
    {
        // Récupérer toutes les commentaires depuis la base de données
        $commentaires = Commentaire::all();

        // Retourner la vue avec la liste des commentaires
        return view('commentaires.index', ['commentaires' => $commentaires]);
    }

    public function show($id)
    {
        // Récupérer un commentaire spécifique par son ID depuis la base de données
        $commentaire = Commentaire::find($id);

        // Retourner la vue avec les détails du commentaire
        return view('commentaires.show', ['commentaire' => $commentaire]);
    }

    public function create()
    {
        // Afficher le formulaire de création d'un nouveau commentaire
        return view('commentaires.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'id_user' => 'required',
            'id_concert' => 'required',
            'texte' => 'required',
            'note' => 'required',
            'date' => 'required',
        ]);

        // Créer un nouveau commentaire dans la base de données
        $commentaire = Commentaire::create($request->all());

        // Rediriger vers la vue des commentaires avec un message de succès
        return redirect('/commentaires')->with('success', 'Commentaire ajouté avec succès');
    }

    public function edit($id)
    {
        // Récupérer un commentaire spécifique par son ID depuis la base de données
        $commentaire = Commentaire::find($id);

        // Afficher le formulaire d'édition du commentaire
        return view('commentaires.edit', ['commentaire' => $commentaire]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'id_user' => 'required',
            'id_concert' => 'required',
            'texte' => 'required',
            'note' => 'required',
            'date' => 'required',
        ]);

        // Mettre à jour les informations du commentaire dans la base de données
        Commentaire::find($id)->update($request->all());

        // Rediriger vers la vue des commentaires avec un message de succès
        return redirect('/commentaires')->with('success', 'Commentaire mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer un commentaire spécifique par son ID depuis la base de données
        Commentaire::destroy($id);

        // Rediriger vers la vue des commentaires avec un message de succès
        return redirect('/commentaires')->with('success', 'Commentaire supprimé avec succès');
    }
}
