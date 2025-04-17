<nav class="navbar navbar-expand-lg navbar-dark bg-gradient py-3">
    <div class="container">
        <!-- Logo e Nome -->
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo me-3">
            <span class="fs-4">Viaggi in Italia</span>
        </a>
    
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link nav-custom" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-custom" href="{{ route('articles') }}">Articoli</a>
                </li>
                <li class="nav-item">
                    <!-- Utilizza la rotta "contacts" se la hai definita così (vedi routes) -->
                    <a class="nav-link nav-custom" href="{{ route('contacts') }}">Contattaci</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-light text-primary px-4 rounded-pill shadow-sm" href="#">Accedi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
