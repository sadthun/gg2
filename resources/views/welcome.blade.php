@extends('layouts.app')

@section('content')
    <!-- Sezione Header / Hero -->
    <header class="hero-header text-center py-5">
        <div class="container">
            <h1 class="titolo">Benvenuto su Viaggi in Italia</h1>
            <p class="lead">Esplora le meraviglie del Bel Paese selezionando la regione che ti interessa.</p>
        </div>
    </header>

    <!-- Bottone per aprire la mappa -->
    <div class="container text-center my-5">
        <button id="toggleMapButton" class="btn btn-primary">Seleziona Regione</button>
    </div>

    <!-- Contenitore per la mappa, inizialmente nascosto -->
    <div id="map-container" class="contenitoreMappa" style="display: none;">
        <div id="progress-bar" style="width: 100%; height: 5px; background-color: green; position: relative;"></div>
        <iframe src="{{ asset('map/map.html') }}" width="100%" height="50px" class="mappa"></iframe>

    </div>

    <!-- Sezione per le Card -->
    <section id="articoli" class="sfondo-immagine py-5">
        {{-- Includi la vista partial delle card --}}
        @include('partials.card')
    </section>

    
@endsection
