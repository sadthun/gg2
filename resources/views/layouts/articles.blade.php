@extends('layouts.articles')

@section('content')
    <h1>Articoli</h1>
    <p>Qui verranno elencati gli articoli del blog.</p>
    <!-- Puoi aggiungere qui un loop sui tuoi articoli, ad esempio: -->
    @foreach($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($article->body, 100) }}</p>
                <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Leggi di più</a>
            </div>
        </div>
    @endforeach
@endsection

