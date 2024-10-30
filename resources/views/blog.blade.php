<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h1>Articles de Blog</h1>
    <ul>
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
