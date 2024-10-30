<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    // Afficher tous les articles
    public function index()
    {
        $articles = Article::with('user')->get(); // Charge les utilisateurs en même temps
        return view('blog.index', compact('articles'));
    }

    // Afficher un article
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.show', compact('article'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('blog.create');
    }

    // Stocker un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        // Log les données reçues
        Log::info('Données reçues pour la création d\'article:', $request->all());
    
        $article = Article::create([
            'title' => $request->title,
            'message' => $request->message,
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id,
        ]);
    
        // Log l'article créé
        Log::info('Article créé:', $article->toArray());
    
        return redirect()->route('blog.index')->with('success', 'Article créé avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.edit', compact('article'));
    }

    // Mettre à jour un article
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'message' => $request->message,
        ]);

        return redirect()->route('blog.index')->with('success', 'Article mis à jour avec succès.');
    }

    // Supprimer un article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('blog.index')->with('success', 'Article supprimé avec succès.');
    }
}
