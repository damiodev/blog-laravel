@extends('layouts.app')

@section('message')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->message }}</p>

    @if(Auth::check() && Auth::user()->id === $article->user_id)
        <a href="{{ route('blog.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('blog.destroy', $article->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    @endif

    <h3>Commentaires <span class="badge bg-secondary">{{ $article->comments()->count() }}</span></h3>

    <div class="mb-4">
        @foreach($article->comments as $comment)
            <div class="card mb-2">
                <div class="card-body">
                    <strong>{{ $comment->user->name }}:</strong>
                    <p>{{ $comment->message }}</p>
                </div>
            </div>
        @endforeach
    </div>

    @if(Auth::check())
        <h4>Ajouter un commentaire</h4>
        <form action="{{ route('comments.store', $article->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="content" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Commenter</button>
        </form>
    @else
        <p class="text-danger">Vous devez être connecté pour ajouter un commentaire.</p>
    @endif

    <a href="{{ route('blog.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
