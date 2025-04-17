<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Viaggi in Italia</title>
    <!-- Bootstrap 5 tramite CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous">
    <!-- Il tuo CSS personalizzato -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- CSS specifico per la navbar -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    @include('partials.navbar')
    
    <div class="container my-4">
        @yield('content')
    </div>
    
    @include('partials.footer')
    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Il tuo JS personalizzato -->
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
