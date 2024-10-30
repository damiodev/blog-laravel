@extends('layouts.app')

@section('message')
    <h1>Liste des articles</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>
                        <a href="{{ route('blog.show', $article->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('blog.edit', $article->id) }}" class="btn btn-warning">Éditer</a>
                        <form action="{{ route('blog.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
