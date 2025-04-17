@extends('layouts.app')

@section('pageTitle', 'Gestione Articoli (Admin)')

@section('content')
<h1>Gestione Articoli (Area Riservata)</h1>

@if(session('message'))
  <div class="alert alert-success">{{ session('message') }}</div>
@endif

<a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Crea nuovo articolo</a>

<table class="table">
  <thead>
    <tr>
      <th>Titolo</th>
      <th>Creato il</th>
      <th>Azioni</th>
    </tr>
  </thead>
  <tbody>
  @foreach($articles as $article)
    <tr>
      <td>{{ $article->title }}</td>
      <td>{{ $article->created_at->format('d/m/Y H:i') }}</td>
      <td>
        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Modifica</a>
        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare?')">Elimina</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

<!-- Paginazione -->
{{ $articles->links() }}
@endsection
