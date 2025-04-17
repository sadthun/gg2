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
            <input type="text" name="name" id="name" class="form-control" placeholder="Il tuo nome">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="La tua email">
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Oggetto</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Oggetto del messaggio">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Messaggio</label>
            <textarea name="message" id="message" rows="5" class="form-control" placeholder="Il tuo messaggio"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Invia Messaggio</button>
    </form>
@endsection
