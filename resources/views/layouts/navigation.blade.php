<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('blog.index') }}">Mon Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.create') }}">Créer un article</a>
            </li>
            <li>
                @if(Auth::check())
                    <span class="navbar-text me-3">
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
