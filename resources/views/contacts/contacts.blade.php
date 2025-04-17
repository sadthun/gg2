@extends('layouts.app')

@section('content')
<h1>Contattaci</h1>

@if(session('message'))
   <div class="alert alert-success">{{ session('message') }}</div>
@endif

<form action="{{ route('contacts.send') }}" method="POST">
   @csrf
   <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
      @error('name')
         <div class="text-danger">{{ $message }}</div>
      @enderror
   </div>
   <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
      @error('email')
         <div class="text-danger">{{ $message }}</div>
      @enderror
   </div>
   <div class="mb-3">
      <label for="message" class="form-label">Messaggio</label>
      <textarea name="message" id="message" rows="5" class="form-control">{{ old('message') }}</textarea>
      @error('message')
         <div class="text-danger">{{ $message }}</div>
      @enderror
   </div>
   <button type="submit" class="btn btn-primary">Invia</button>
</form>
@endsection
