<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
            'user_id' => Auth::user()->id, // Utilise Auth pour récupérer l'utilisateur connecté
        ]);
    
        // Log l'article créé
        Log::info('Article créé:', $article->toArray());
    
        return redirect()->route('blog.index')->with('success', 'Article créé avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        // Vérifie si l'utilisateur authentifié est l'auteur de l'article
        if (Auth::user()->id !== $article->user_id) {
            return redirect()->route('blog.index')->with('error', 'Vous n\'êtes pas autorisé à éditer cet article.');
        }

        return view('blog.edit', compact('article'));
    }

    // Mettre à jour un article
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        // Vérifie si l'utilisateur authentifié est l'auteur de l'article
        if (Auth::user()->id !== $article->user_id) {
            return redirect()->route('blog.index')->with('error', 'Vous n\'êtes pas autorisé à mettre à jour cet article.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

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

        // Vérifie si l'utilisateur authentifié est l'auteur de l'article
        if (Auth::user()->id !== $article->user_id) {
            return redirect()->route('blog.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cet article.');
        }

        $article->delete();

        return redirect()->route('blog.index')->with('success', 'Article supprimé avec succès.');
    }
}
