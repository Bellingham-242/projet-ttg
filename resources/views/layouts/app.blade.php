<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>T.T.G Network - @yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            padding: 0;
            color: #222;
            font-family: 'Segoe UI', sans-serif;
            animation: gradient 20s ease infinite;
            background: linear-gradient(270deg, #dbeafe, #fce7f3, #fef9c3, #e0f2fe);
            background-size: 800% 800%;
        }

        @keyframes gradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .navbar {
            background: rgba(30, 41, 59, 0.95);
            backdrop-filter: blur(8px);
        }

        .navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #facc15 !important;
            text-shadow: 0 0 5px #fff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fef08a !important;
        }

        main.container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert {
            border-radius: 10px;
            font-size: 0.95rem;
        }

        footer {
            background: rgba(15, 23, 42, 0.9);
            color: #cbd5e1;
            padding: 1rem;
            font-size: 0.85rem;
            text-align: center;
        }

        .btn-link {
            color: #f8fafc !important;
            margin-left: 1rem;
        }

        .btn-link:hover {
            color: #facc15 !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-mortarboard"></i> T.T.G Network
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
                <ul class="navbar-nav ms-auto align-items-center">
                    @php $role = auth()->user()->role; @endphp

                    @if($role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('preinscriptions.index') }}"><i class="bi bi-card-list"></i> Préinscriptions</a></li>
                    @elseif($role === 'etudiant')
                        <li class="nav-item"><a class="nav-link" href="{{ route('etudiant.dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('preinscription.formulaire') }}"><i class="bi bi-pencil-square"></i> Préinscription</a></li>
                    @elseif($role === 'formateur')
                        <li class="nav-item"><a class="nav-link" href="{{ route('formateur.dashboard') }}"><i class="bi bi-person-badge"></i> Formateur</a></li>
                    @elseif($role === 'parent')
                        <li class="nav-item"><a class="nav-link" href="{{ route('parent.dashboard') }}"><i class="bi bi-people"></i> Parent</a></li>
                    @endif

                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.show', auth()->id()) }}"><i class="bi bi-person-circle"></i> Mon profil</a></li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit"><i class="bi bi-box-arrow-right"></i> Déconnexion</button>
                        </form>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus"></i> Inscription</a></li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="container my-5">
    @if(session('success'))
        <div class="alert alert-success shadow-sm"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm"><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}</div>
    @endif

    @yield('content')
</main>

<!-- Footer -->
<footer>
    &copy; {{ date('Y') }} T.T.G Network. Tous droits réservés.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
