<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formation;

class formationController extends Controller
{
    public function index()
    {
        $formation = Formation::select('id', 'nom', 'module', 'prix', 'created_at', 'updated_at')->get();
        
        return response()->json([
            'formation' => $users
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'module' => 'required|string|module|max:255|unique:formation',
            'prix' => 'required|string|min:6',
           
        ]);

        $formation = Formation::create([
            'nom' => $request->name,
            'module' => $request->module,
            'prix' => Hash::make($request->password),
           
        ]);

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'Formation' => $Formation->only(['id', 'nom', 'module', 'prix', 'created_at', 'updated_at'])
        ], 201);
    }


     public function show($id)
    {
        $formation = Formation::select('id', 'nom', 'module', 'prix', 'created_at', 'updated_at')->find($id);
        
        if (!$formation) {
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        return response()->json([
            'formation' => $formation
        ]);
    }

    public function update(Request $request, $id)
    {
        $formation = Formation::find($id);
        
        if (!$formation) {
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        $request->validate([
            'nom' => 'sometimes|string|max:255',
            'module' => 'sometimes|string|email|max:255|unique:users,email,'.$id,
            'prix' => 'sometimes|string|min:6',
            
        ]);

        $updateData = [];
        
        if ($request->has('nom')) {
            $updateData['nom'] = $request->nom;
        }
        
        if ($request->has('module')) {
            $updateData['module'] = $request->module;
        }
        
        if ($request->has('prix')) {
            $updateData['prix'] = Hash::make($request->prix);
        }
        
    
        $formation->update($updateData);

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'formation' => $formation->only(['id', 'nom', 'module', 'prix', 'created_at', 'updated_at'])
        ]);
    }

    public function destroy($id)
    {
        $formation = Formation::find($id);
        
        if (!$formation) {
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        $formation->delete();

        return response()->json([
            'message' => 'Utilisateur supprimé avec succès'
        ]);
    }
}
