<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alerte;
use Illuminate\Support\Facades\Validator;

class AlerteController extends Controller
{
    public function index()
    {
        $alertes = Alerte::all();
        return response()->json($alertes);
    }

    public function show($id)
    {
        $alerte = Alerte::find($id);
        if (!$alerte) {
            return response()->json(['message' => 'Alerte not found'], 404);
        }
        return response()->json($alerte);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'type' => 'required|max:255',
            'texte' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $alerte = Alerte::create($request->all());
        return response()->json($alerte, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'type' => 'required|max:255',
            'texte' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $alerte = Alerte::find($id);
        if (!$alerte) {
            return response()->json(['message' => 'Alerte not found'], 404);
        }

        $alerte->update($request->all());
        return response()->json($alerte);
    }

    public function destroy($id)
    {
        $alerte = Alerte::find($id);
        if (!$alerte) {
            return response()->json(['message' => 'Alerte not found'], 404);
        }

        $alerte->delete();
        return response()->json(['message' => 'Alerte deleted successfully']);
    }
}
