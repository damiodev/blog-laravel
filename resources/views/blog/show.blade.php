@extends('layouts.app')

@section('message')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->message }}</p>
    
    <a href="{{ route('blog.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('blog.destroy', $article->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('blog.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
