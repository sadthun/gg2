@extends('layouts.app')

@section('content')
<h1>{{ $article->title }}</h1>
<p>Autore: {{ $article->user->name }}</p>
<div>{!! nl2br(e($article->body)) !!}</div>

<hr>

<a href="{{ route('articles.index') }}" class="btn btn-secondary">Torna alla lista</a>

@endsection
