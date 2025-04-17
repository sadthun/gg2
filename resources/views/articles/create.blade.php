@extends('layouts.app')

@section('content')
<h1>Crea Nuovo Articolo</h1>

<form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        @error('title')
           <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Contenuto</label>
        <textarea name="body" id="body" rows="5" class="form-control">{{ old('body') }}</textarea>
        @error('body')
           <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Se vuoi associare tag (usa un multi-select o checkboxes) -->
    <div class="mb-3">
        <label for="tags" class="form-label">Tag</label>
        <select name="tags[]" id="tags" class="form-select" multiple>
            @foreach ($tags as $tag)
               <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
</form>
@endsection
