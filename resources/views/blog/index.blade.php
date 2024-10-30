@extends('layouts.app')

@section('message')
<div class="container">
    <h1>Liste des articles</h1>
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->message, 100) }}</p>
<p class="text-muted">
    Créé le {{ $article->created_at ? $article->created_at->format('d/m/Y H:i') : 'Date inconnue' }} 
    par {{ $article->user ? $article->user->name : 'Inconnu' }}
</p>
                        <a href="{{ route('blog.show', $article->id) }}" class="btn btn-info">Voir</a>
                        
                        @if(Auth::check() && Auth::user()->id === $article->user_id)
                            <a href="{{ route('blog.edit', $article->id) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('blog.destroy', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
