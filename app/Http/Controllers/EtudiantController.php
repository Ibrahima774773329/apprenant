<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Affiche la liste des cours
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.index', compact('etudiants'));
    }
    
    /**
     * Retourne le formulaire de création d'un cours
     */
    public function create()
    {
        return view('etudiant.create');
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
        $etudiant = new etudiant([
            'prenom' => $request->get('prenom'),
            'nom' => $request->get('nom'),
            'email' =>$request->get('email'), 
            'classe' => $request->get('classe'),
        ]);
        $etudiant->save();
        return redirect('/')->with('success', 'etudiant ajouté avec succès');
    }

    /**
     * Affiche les détails d'un cours spécifique
     */
    public function show($id)
    {
        $etudiant = etudiant::findOrFail($id);
        return view('etudiant.show', compact('etudiant'));
    }

    /**
     * Retourne le formulaire de modification
     */
    public function edit($id)
    {
        $etudiant = etudiant::findOrFail($id);
        return view('etudiant.edit', compact('etudiant'));
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
    
        if (!$etudiant) {
            return redirect('/')->with('error', 'Étudiant non trouvé');
        }
    
        // Mettre à jour les champs de l'étudiant avec les données de la requête
        $etudiant->prenom = $request->input('prenom');
        $etudiant->nom = $request->input('nom');
        $etudiant->email = $request->input('email');
        $etudiant->classe = $request->input('classe');
    
        // Enregistrer les modifications
        $etudiant->update();
    
        return redirect('/')->with('success', 'Étudiant modifié avec succès');
    }
      /**
     * Supprime le cours de la base de données
     */
    public function destroy($id)
    {
        $etudiant = etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect('/')->with('success', 'etudiant supprimé avec succès');
    }

}


