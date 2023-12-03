<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concert;

class ConcertController extends Controller
{
    public function index()
    {
        $concerts = Concert::all();
        return response()->json($concerts);
    }
    

    public function show($id)
    {
        // Récupérer un concert spécifique par son ID depuis la base de données
        $concert = Concert::find($id);

        // Retourner la vue avec les détails du concert
        return view('concerts.show', ['concert' => $concert]);
    }

    public function create()
    {
        // Afficher le formulaire de création d'un nouveau concert
        return view('concerts.create');
    }

public function store(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'groupe' => 'required',
        'horaires' => 'required',
        'scene' => 'required',
        'descriptif' => 'required',
    ]);

    // Créer un nouveau concert dans la base de données
    $concert = Concert::create($request->all());

    // Retourner le concert nouvellement créé
    return response()->json($concert, 201);
}


    public function edit($id)
    {
        // Récupérer un concert spécifique par son ID depuis la base de données
        $concert = Concert::find($id);

        // Afficher le formulaire d'édition du concert
        return view('concerts.edit', ['concert' => $concert]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'groupe' => 'required',
            'horaires' => 'required',
            'scene' => 'required',
            'descriptif' => 'required',
        ]);

        // Mettre à jour les informations du concert dans la base de données
        Concert::find($id)->update($request->all());

        // Rediriger vers la vue des concerts avec un message de succès
        return redirect('/concerts')->with('success', 'Concert mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprimer un concert spécifique par son ID depuis la base de données
        Concert::destroy($id);

        // Rediriger vers la vue des concerts avec un message de succès
        return redirect('/concerts')->with('success', 'Concert supprimé avec succès');
    }
}
