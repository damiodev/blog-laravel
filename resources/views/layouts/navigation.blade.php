<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('blog.index') }}">Mon Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.create') }}">Créer un article</a>
            </li>
        </ul>
        <div class="d-flex align-items-center"> <!-- Flexbox pour aligner les éléments à droite -->
            @if(Auth::check())
                <span class="navbar-text me-3">
                    {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary me-2">Connexion</a>
                <a href="{{ route('register') }}" class="btn btn-success">S'inscrire</a>
            @endif
        </div>
    </div>
</nav>
