<?php


namespace App\Http\Controllers;


use App\Models\Cours;
use Illuminate\Http\Request;


class CoursController extends Controller
{

    /**
     * Affiche la liste des contacts
     */
    public function index()
    {

        $cours = Cours::all();
        return view('cours.index', compact('cours'));

    }


    /**
     * return le formulaire de créationcreation d'un contact
     */
    public function create()
    {

        return view('cours.create');

    }


    /**
     * Enregistre un nouveau contact dans la base de données
     */ public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'required',
            'duree' => 'required',
        ]);
        $cours = new cours([
            'titre' => $request->get('titre'),
            'contenu' => $request->get('contenu'),
            'image' =>$request->get('image'), 
            'duree' => $request->get('duree'),
        ]);
        $cours->save();
        return redirect('/')->with('success', 'cours ajouté avec succès');
    }

    /**
     * Affiche les détails d'un cours spécifique
     */
    public function show($id)
    {
        $cours = cours::findOrFail($id);
        return view('cours.show', compact('cours'));
    }

    /**
     * Retourne le formulaire de modification
     */
    public function edit($id)
    {
        $cours = cours::findOrFail($id);
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
    
        $cours= Cours::find($id);
    
        if (!$cours) {
            return redirect('/')->with('error', 'Cours non trouvé');
        }
    
        // Mettre à jour les champs de l'étudiant avec les données de la requête
        $cours->titre= $request->input('titre');
        $cours->contenu = $request->input('contenu');
        $cours->image = $request->input('image');
        $cours->duree = $request->input('duree');
    
        // Enregistrer les modifications
        $cours->update();
    
        return redirect('/')->with('success', 'Cours modifié avec succès');
    }
      /**
     * Supprime le cours de la base de données
     */
    public function destroy($id)
    {
        $cours = cours::findOrFail($id);
        $cours->delete();
        return redirect('/')->with('success', 'courssupprimé avec succès');
    }

}



   