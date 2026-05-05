<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
     // Afficher toutes les inscriptions
    public function index()
    {
        $inscriptions = Inscription::with('formation')->get();

        return response()->json($inscriptions);
    }

    // Ajouter une inscription
    public function store(Request $request)
    {
        $request->validate([
            'nom_etudiant' => 'required',
            'prenom_etudiant' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
            'date_inscription' => 'required|date',
            'formation_id' => 'required|exists:formations,id'
        ]);

        $inscription = Inscription::create($request->all());

        return response()->json([
            'message' => 'Inscription réussie',
            'data' => $inscription
        ], 201);
    }

    // Afficher une inscription
    public function show($id)
    {
        $inscription = Inscription::with('formation')->findOrFail($id);

        return response()->json($inscription);
    }

    // Modifier une inscription
    public function update(Request $request, $id)
    {
        $inscription = Inscription::findOrFail($id);

        $inscription->update($request->all());

        return response()->json([
            'message' => 'Inscription modifiée avec succès',
            'data' => $inscription
        ]);
    }

    // Supprimer une inscription
    public function destroy($id)
    {
        $inscription = Inscription::findOrFail($id);

        $inscription->delete();

        return response()->json([
            'message' => 'Inscription supprimée avec succès'
        ]);
    }
}

