<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;  // Importer le modèle Commande
use App\Models\Produit; 

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('produit')->get();
        return view('admin.commandes.index', compact('commandes')); // Correction ici
    }

    public function create()
    {
        $produits = Produit::all();
        return view('admin.commandes.create', compact('produits')); // Correction ici
    }

    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
            'name' => 'required|string',
            'phone' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'country' => 'required|string',
        ]);

        Commande::create([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'name' => $request->name,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'region' => $request->region,
            'country' => $request->country,
        ]);

        return redirect()->route('admin.commandes.index')->with('success', 'Commande créée avec succès.');
    }

    public function edit($id)
    {
        $commande = Commande::findOrFail($id);
        $produits = Produit::all();
        return view('admin.commandes.edit', compact('commande', 'produits')); // Correction ici
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
            'name' => 'required|string',
            'phone' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'country' => 'required|string',
        ]);

        $commande = Commande::findOrFail($id);
        $commande->update([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'name' => $request->name,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'region' => $request->region,
            'country' => $request->country,
        ]);

        return redirect()->route('admin.commandes.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('admin.commandes.index')->with('success', 'Commande supprimée avec succès.');
    }
}