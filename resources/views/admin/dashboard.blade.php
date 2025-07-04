@extends('layouts.app')

@section('content')
<style>
    :root {
        --bleu-nuit: #0f172a;
        --bleu-clair: #1e40af;
        --beige: #fefae0;
        --beige-fonce: #bfae8e;
        --accent: #38bdf8;
        --ombre: rgba(0, 0, 0, 0.2);
    }

    body {
        background-color: var(--bleu-nuit);
    }

    .container.py-4 {
        max-width: 1140px;
        margin: auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--beige);
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .alert-success {
        background: linear-gradient(135deg, #4ade80, #16a34a);
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.5);
        text-align: center;
        margin-bottom: 2rem;
    }

    h3.mb-4 {
        font-size: 2rem;
        font-weight: 800;
        color: #fcd34d;
        text-shadow: 1px 1px 3px rgba(255,255,255,0.1);
    }

    .row > .col-md-4.mb-3,
    .row > .col-md-6.mb-3 {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    a.btn-primary, a.btn-success, a.btn-warning {
        font-weight: 700;
        text-transform: uppercase;
        font-size: 1.05rem;
        border-radius: 12px;
        padding: 12px 0;
        display: inline-block;
        width: 100%;
        color: #fff;
        box-shadow: 0 4px 10px var(--ombre);
        transition: all 0.3s ease;
        text-align: center;
        user-select: none;
    }

    a.btn-primary {
        background: linear-gradient(45deg, var(--bleu-clair), #2563eb);
    }
    a.btn-primary:hover {
        background: linear-gradient(45deg, #3b82f6, #60a5fa);
        box-shadow: 0 6px 16px rgba(59, 130, 246, 0.5);
        color: #fff;
    }

    a.btn-success {
        background: linear-gradient(45deg, #16a34a, #22c55e);
        color: #f0fdf4;
    }
    a.btn-success:hover {
        background: linear-gradient(45deg, #22c55e, #4ade80);
        box-shadow: 0 6px 16px rgba(34, 197, 94, 0.5);
    }

    a.btn-warning {
        background: linear-gradient(45deg, #d97706, #facc15);
        color: #1c1917;
    }
    a.btn-warning:hover {
        background: linear-gradient(45deg, #fde68a, #facc15);
        box-shadow: 0 6px 16px rgba(252, 201, 21, 0.5);
    }

    .card.bg-info {
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(14, 165, 233, 0.3);
        color: #f1f5f9;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .card.bg-info:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(14, 165, 233, 0.5);
    }

    .card .card-title {
        font-weight: 700;
        font-size: 1.2rem;
    }

    .card .card-text {
        font-size: 0.95rem;
        color: #f8fafccc;
        opacity: 0.95;
        min-height: 3.2rem;
    }

    .btn-light {
        font-weight: 600;
        border-radius: 30px;
        padding: 8px 20px;
        background: var(--beige);
        color: var(--bleu-nuit);
        transition: all 0.3s ease;
        box-shadow: 0 3px 8px rgba(0,0,0,0.12);
    }

    .btn-light:hover {
        background: #f9f7e8;
        color: var(--bleu-clair);
        box-shadow: 0 6px 18px rgba(0, 123, 255, 0.4);
    }

    p.text-muted {
        color: #cbd5e1 !important;
        font-style: italic;
    }

    p.text-danger {
        color: #f87171 !important;
        font-weight: bold;
        text-align: center;
    }

    p strong {
        color: var(--accent);
        text-transform: uppercase;
        letter-spacing: 0.07em;
    }

    /* Responsive */
    @media (max-width: 768px) {
        h3.mb-4 {
            font-size: 1.6rem;
        }

        .btn {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .row > div[class*="col-"] {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .card .card-text {
            min-height: auto;
        }
    }
</style>

<div class="container py-4">
    <div class="alert alert-success" role="alert">
        Bonjour <strong>{{ Auth::user()->name }}</strong> !
    </div>

    @php
        $role = Auth::user()->role;
    @endphp

    @if($role === 'admin')
        <h3 class="mb-4">Tableau de bord Administrateur</h3>
        <div class="row g-3">
            <div class="col-md-4 mb-3">
                <a href="{{ route('matieres.index') }}" class="btn btn-primary w-100">Matières</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('cours.index') }}" class="btn btn-primary w-100">Cours</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('articles.index') }}" class="btn btn-primary w-100">Articles</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('etudiants.index') }}" class="btn btn-primary w-100">Étudiants</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('formateurs.index') }}" class="btn btn-primary w-100">Formateurs</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('niveaux.index') }}" class="btn btn-primary w-100">Niveaux</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('notes.index') }}" class="btn btn-primary w-100">Notes</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('options.index') }}" class="btn btn-primary w-100">Options</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('preinscriptions.index') }}" class="btn btn-primary w-100">Préinscriptions</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('users.index') }}" class="btn btn-primary w-100">Utilisateurs</a>
            </div>
        </div>

    @elseif($role === 'formateur')
        <h3 class="mb-4">Espace Formateur</h3>
        <p>Code formateur : <strong>{{ Auth::user()->formateur->code ?? 'Non défini' }}</strong></p>
        <div class="row g-3">
            <div class="col-md-6 mb-3">
                <a href="{{ route('cours.index') }}" class="btn btn-success w-100">Mes Cours</a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('articles.create') }}" class="btn btn-success w-100">Publier un article</a>
            </div>
        </div>

        <div class="row g-4 mt-4">
            @foreach([
                ['title' => 'Les Cours', 'text' => 'Voir les cours que vous avez dispensés.', 'route' => 'cours.index'],
                ['title' => 'Mon Profil', 'text' => 'Voir mes informations personnelles.', 'route' => 'profile.show', 'id' => auth()->user()->id],
                ['title' => 'Les Matières', 'text' => 'Voir les matières concernées.', 'route' => 'matieres.index'],
                ['title' => 'Les Étudiants', 'text' => 'Voir la liste des étudiants.', 'route' => 'etudiants.index'],
                ['title' => 'Les Formateurs', 'text' => 'Voir la liste des formateurs.', 'route' => 'formateurs.index'],
                ['title' => 'Les Articles', 'text' => 'Voir ou publier des articles.', 'route' => 'articles.index'],
                ['title' => 'Les Notes', 'text' => 'Voir les notes des étudiants.', 'route' => 'notes.index'],
                ['title' => 'Les Options', 'text' => 'Voir les différentes options.', 'route' => 'options.index'],
                ['title' => 'Les Utilisateurs', 'text' => 'Voir les différents utilisateurs.', 'route' => 'users.index'],
                ['title' => 'Les Préinscriptions', 'text' => 'Voir les différentes préinscriptions.', 'route' => 'preinscriptions.index'],
            ] as $card)
                <div class="col-md-4">
                    <div class="card text-white bg-info shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card['title'] }}</h5>
                            <p class="card-text">{{ $card['text'] }}</p>
                            <a href="{{ route($card['route'], $card['id'] ?? null) }}" class="btn btn-light btn-sm">Voir</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @elseif($role === 'etudiant')
        <h3 class="mb-4">Espace Étudiant</h3>
        <p>Matricule : <strong>{{ Auth::user()->etudiant->matricule ?? 'Non défini' }}</strong></p>
        <div class="row g-3">
            <div class="col-md-6 mb-3">
                <a href="{{ route('notes.index') }}" class="btn btn-warning w-100">Voir mes Notes</a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('articles.index') }}" class="btn btn-warning w-100">Voir les Articles</a>
            </div>
        </div>

    @elseif($role === 'parent')
        <h3 class="mb-4">Bienvenue cher parent !</h3>
        <p class="text-muted">Merci de suivre la progression de vos enfants sur notre plateforme.</p>

    @else
        <p class="text-danger">Rôle non reconnu.</p>
    @endif
</div>
@endsection
