<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseursController extends Controller
{
    /**
     * Affiche la liste des cours
     */
    public function index()
    {
        $professeurs = Professeur::all();
        return view('professeur.index', compact('professeurs'));
    }
    
    /**
     * Retourne le formulaire de création d'un cours
     */
    public function create()
    {
        return view('professeur.create');
    }

    /**
     * Enregistre un nouveau cours dans la base de données
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'classe' => 'required',
        ]);
        $professeur = new professeur([
            'prenom' => $request->get('prenom'),
            'nom' => $request->get('nom'),
            'email' =>$request->get('email'), 
            'classe' => $request->get('classe'),
        ]);
        $professeur->save();
        return redirect('/')->with('success', 'professeur ajouté avec succès');
    }

    /**
     * Affiche les détails d'un cours spécifique
     */
    public function show($id)
    {
        $professeur = professeur::findOrFail($id);
        return view('professeur.show', compact('professeur'));
    }

    /**
     * Retourne le formulaire de modification
     */
    public function edit($id)
    {
        $professeur = professeur::findOrFail($id);
        return view('professeur.edit', compact('professeur'));
    }

    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'classe' => 'required',
        ]);
    
        $etudiant = Etudiant::find($id);
    
        if (!$professeur) {
            return redirect('/')->with('error', 'Professeur non trouvé');
        }
    
        // Mettre à jour les champs de l'étudiant avec les données de la requête
        $professeur->prenom = $request->input('prenom');
        $professeur->nom = $request->input('nom');
        $professeur->email = $request->input('email');
        $professeur->classe = $request->input('classe');
    
        // Enregistrer les modifications
        $etudiant->update();
    
        return redirect('/')->with('success', 'Professeur modifié avec succès');
    }
      /**
     * Supprime le cours de la base de données
     */
    public function destroy($id)
    {
        $professeur = professeur::findOrFail($id);
        $professeur->delete();
        return redirect('/')->with('success', 'professeur supprimé avec succès');
    }

}



