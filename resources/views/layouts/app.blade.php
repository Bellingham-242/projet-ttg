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
        /* Palette Bleu Nuit & Beige */
        :root {
            --bleu-nuit: #0a1f44;
            --bleu-nuit-light: #143d77;
            --beige-clair: #f8f4e3;
            --beige-fonce: #bfae8e;
            --texte-clair: #f0e8d0;
            --texte-fonce: #312f2f;
            --btn-bg: #234d7e;
            --btn-bg-hover: #193d68;
            --shadow-color: rgba(0,0,0,0.25);
            --navbar-bg: rgba(10, 31, 68, 0.95);
            --footer-bg: rgba(7, 20, 43, 0.9);
        }

        body {
            margin: 0;
            padding: 0;
            color: var(--texte-fonce);
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(270deg, var(--beige-clair), var(--beige-fonce));
            background-size: 400% 400%;
            animation: gradient 20s ease infinite;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        @keyframes gradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        /* Navbar */
        .navbar {
            background: var(--navbar-bg);
            backdrop-filter: blur(6px);
        }

        .navbar .nav-link {
            color: var(--texte-clair) !important;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #f7df9c !important; /* beige clair */
            text-shadow: 0 0 5px var(--texte-clair);
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: 700;
            color: #f7df9c !important;
        }

        /* Boutons liens déconnexion */
        .btn-link {
            color: var(--texte-clair) !important;
            margin-left: 1rem;
        }

        .btn-link:hover {
            color: #f7df9c !important;
        }

        /* Main container */
        main.container {
            background: var(--beige-clair);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px var(--shadow-color);
            animation: fadeIn 0.8s ease-in;
            flex-grow: 1;
            max-width: 1140px;
            margin-top: 2rem;
            margin-bottom: 2rem;
            color: var(--texte-fonce);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Alerts personnalisées */
        .alert {
            border-radius: 10px;
            font-size: 1rem;
            box-shadow: 0 4px 10px var(--shadow-color);
        }

        .alert-success {
            background-color: #e4f5d4;
            color: #256029;
            border-color: #a8d08d;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-color: #f5c2c7;
        }

        /* Footer */
        footer {
            background: var(--footer-bg);
            color: var(--beige-clair);
            padding: 1rem 0;
            font-size: 0.85rem;
            text-align: center;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
        }

        /* Responsive */
        @media (max-width: 576px) {
            main.container {
                padding: 1.25rem;
                margin-top: 1rem;
                margin-bottom: 1rem;
                border-radius: 12px;
            }
            .navbar-brand {
                font-size: 1.3rem;
            }
            .btn-link {
                margin-left: 0.5rem;
                font-size: 0.9rem;
            }
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
