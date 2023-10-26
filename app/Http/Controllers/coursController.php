<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Affiche la liste des cours
     */
    public function index()
    {
        $cours = Cours::all();
        return view('cours.index', compact('cours'));
    }

    /**
     * Retourne le formulaire de création d'un cours
     */
    public function create()
    {
        return view('cours.create');
    }

    /**
     * Enregistre un nouveau cours dans la base de données
     */
    public function store(Request $request)
    {
        $imagePath=(request("image")->store('uploads','public') );
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'required',
            'duree' => 'required',
        ]);
        $cours = new Cours([
            'titre' => $request->get('titre'),
            'contenu' => $request->get('contenu'),
            'image' =>$imagePath, 
            'duree' => $request->get('duree'),
        ]);
        $cours->save();
        return redirect('/')->with('success', 'Cours ajouté avec succès');
    }

    /**
     * Affiche les détails d'un cours spécifique
     */
    public function show($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.show', compact('cours'));
    }

    /**
     * Retourne le formulaire de modification
     */
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.edit', compact('cours'));
    }

    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'required',
            'duree' => 'required',
        ]);

        $cours = Cours::findOrFail($id);
        $cours->titre = $request->get('titre');
        $cours->contenu = $request->get('contenu');
        $cours->image = $request->get('image');
        $cours->duree = $request->get('duree');

        $cours->update();
        return redirect('/')->with('success', 'Cours modifié avec succès');
    }

    /**
     * Supprime le cours de la base de données
     */
    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        return redirect('/')->with('success', 'Cours supprimé avec succès');
    }

}
