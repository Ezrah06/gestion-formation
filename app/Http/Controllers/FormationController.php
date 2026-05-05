<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
     // Liste des formations
    public function index()
    {
        return response()->json(Formation::all());
    }

    // Ajouter une formation
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'module' => 'required',
            'prix' => 'required|numeric'
        ]);

        $formation = Formation::create($request->all());

        return response()->json([
            'message' => 'Formation ajoutée avec succès',
            'data' => $formation
        ]);
    }

    // Afficher une formation
    public function show($id)
    {
        return response()->json(Formation::findOrFail($id));
    }

    // Modifier une formation
    public function update(Request $request, $id)
    {
        $formation = Formation::findOrFail($id);

        $formation->update($request->all());

        return response()->json([
            'message' => 'Formation modifiée avec succès',
            'data' => $formation
        ]);
    }

    // Supprimer une formation
    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);
        $formation->delete();

        return response()->json([
            'message' => 'Formation supprimée avec succès'
        ]);
    }
}

