<?php

namespace App\Http\Controllers;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class utilisateurController extends Controller
{
      // GET /api/utilisateur - Liste tous les utilisateur
    public function index()
    {
        return utilisateur ::all();

    }

    // POST /api/utilisateur - Crée un nouveau utilisateur
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'role' => 'required|integer|min:0',
            'contact' => 'nullable|string|max:100',
          
        ]);

        $utilisateur = utilisateur::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'utilisateur créé avec succès',
            'data' => $utilisateur
        ], Response::HTTP_CREATED);
    }

    // GET /api/utilisateur/{id} - Affiche un utilisateur spécifique
    public function show($id)
    {
        $utilisateur = utilisateur::find($id);

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'utilisateur non trouvé'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $utilisateur
        ], Response::HTTP_OK);
    }

    // PUT/PATCH /api/utilisateur/{id} - Met à jour un utilisateur
    public function update(Request $request, $id)
    {
        $utilisateur = utilisateur::find($id);

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'utilisateur non trouvé'
            ], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'email' => 'nullable|string',
            'password' => 'sometimes|numeric|min:0',
            'role' => 'sometimes|integer|min:0',
            'contact' => 'nullable|string|max:100',
            
        ]);

        $utilisateur->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'utilisateur mis à jour avec succès',
            'data' => $utilisateur
        ], Response::HTTP_OK);
    }

    // DELETE /api/utilisateurs/{id} - Supprime un utilisateur
    public function destroy($id)
    {
        $utilisateur = utilisateur::find($id);

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'utilisateur non trouvé'
            ], Response::HTTP_NOT_FOUND);
        }

        $utilisateur->delete();

        return response()->json([
            'success' => true,
            'message' => 'utilisateur supprimé avec succès'
        ], Response::HTTP_OK);
    }
}

