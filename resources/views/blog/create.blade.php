@extends('layouts.app')

@section('message')
<div class="container">
    <h1>Créer un nouvel article</h1>
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="message">Contenu</label>
            <textarea class="form-control" name="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
