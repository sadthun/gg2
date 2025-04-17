@extends('layouts.app')

@section('content')
<h1>Ultimi 10 Articoli</h1>

@if(session('message'))
  <div class="alert alert-success">{{ session('message') }}</div>
@endif

<a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Nuovo Articolo</a>

<div class="row">
  @foreach ($articles as $article)
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $article->title }}</h5>
          <p class="card-text">{{ Str::limit($article->body, 100) }}</p>
          <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-outline-primary">Leggi di più</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
