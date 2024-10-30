@extends('layouts.app')

@section('message')
<div class="container">
    <h1>Modifier l'article</h1>
    <form action="{{ route('blog.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" name="title" value="{{ $article->title }}" required>
        </div>
        <div class="form-group">
            <label for="message">Contenu</label>
            <textarea class="form-control" name="message" required>{{ $article->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
