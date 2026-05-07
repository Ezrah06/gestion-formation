<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;

class PaiementController extends Controller
{
    public function index()
    {
        $paiement = Paiement::select(
            'id',
            'nom_client',
            'montant',
            'mode_paiement',
            'date_paiement',
            'created_at',
            'updated_at'
        )->get();

        return response()->json([
            'paiements' => $paiement
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'mode_paiement' => 'required|string|max:255',
            'date_paiement' => 'required|date'
        ]);

        $paiement = Paiement::create([
            'nom_client' => $request->nom_client,
            'montant' => $request->montant,
            'mode_paiement' => $request->mode_paiement,
            'date_paiement' => $request->date_paiement,
        ]);

        return response()->json([
            'message' => 'Paiement créé avec succès',
            'paiement' => $paiement->only([
                'id',
                'nom_client',
                'montant',
                'mode_paiement',
                'date_paiement',
                'created_at',
                'updated_at'
            ])
        ], 201);
    }

    public function show($id)
    {
        $paiement = Paiement::select(
            'id',
            'nom_client',
            'montant',
            'mode_paiement',
            'date_paiement',
            'created_at',
            'updated_at'
        )->find($id);

        if (!$paiement) {
            return response()->json([
                'message' => 'Paiement non trouvé'
            ], 404);
        }

        return response()->json([
            'paiement' => $paiement
        ]);
    }

    public function update(Request $request, $id)
    {
        $paiement = Paiement::find($id);

        if (!$paiement) {
            return response()->json([
                'message' => 'Paiement non trouvé'
            ], 404);
        }

        $request->validate([
            'nom_client' => 'sometimes|string|max:255',
            'montant' => 'sometimes|numeric',
            'mode_paiement' => 'sometimes|string|max:255',
            'date_paiement' => 'sometimes|date'
        ]);

        $updateData = [];

        if ($request->has('nom_client')) {
            $updateData['nom_client'] = $request->nom_client;
        }

        if ($request->has('montant')) {
            $updateData['montant'] = $request->montant;
        }

        if ($request->has('mode_paiement')) {
            $updateData['mode_paiement'] = $request->mode_paiement;
        }

        if ($request->has('date_paiement')) {
            $updateData['date_paiement'] = $request->date_paiement;
        }

        $paiement->update($updateData);

        return response()->json([
            'message' => 'Paiement mis à jour avec succès',
            'paiement' => $paiement->only([
                'id',
                'nom_client',
                'montant',
                'mode_paiement',
                'date_paiement',
                'created_at',
                'updated_at'
            ])
        ]);
    }

    public function destroy($id)
    {
        $paiement = Paiement::find($id);

        if (!$paiement) {
            return response()->json([
                'message' => 'Paiement non trouvé'
            ], 404);
        }

        $paiement->delete();

        return response()->json([
            'message' => 'Paiement supprimé avec succès'
        ]);
    }
}