{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    /* Container general */
    .container.py-4 {
        max-width: 1100px;
        margin: auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #222;
    }

    /* Alert bienvenue */
    .alert-success {
        background: linear-gradient(135deg, #4ade80, #16a34a);
        border: none;
        color: #fff;
        font-size: 1.25rem;
        font-weight: 600;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.5);
        text-align: center;
        margin-bottom: 2rem;
        user-select: none;
        transition: background 0.4s ease;
    }
    .alert-success strong {
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Titres */
    h3.mb-4 {
        font-size: 2rem;
        font-weight: 900;
        color: #3b82f6;
        text-shadow: 1px 1px 3px #93c5fd88;
        margin-bottom: 2.5rem !important;
    }

    /* Lien boutons dans row */
    .row > .col-md-4.mb-3, 
    .row > .col-md-6.mb-3 {
        padding-left: 8px;
        padding-right: 8px;
    }

    /* Boutons principaux */
    a.btn-primary, a.btn-success, a.btn-warning {
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 12px;
        padding: 15px 0;
        box-shadow: 0 6px 12px rgb(0 0 0 / 0.15);
        transition: all 0.3s ease;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        user-select: none;
    }

    a.btn-primary {
        background: linear-gradient(45deg, #2563eb, #4f46e5);
        border: none;
        color: #f9fafb;
    }
    a.btn-primary:hover {
        background: linear-gradient(45deg, #3b82f6, #6366f1);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.6);
    }

    a.btn-success {
        background: linear-gradient(45deg, #16a34a, #22c55e);
        border: none;
        color: #ecfccb;
    }
    a.btn-success:hover {
        background: linear-gradient(45deg, #22c55e, #4ade80);
        box-shadow: 0 8px 20px rgba(34, 197, 94, 0.6);
    }

    a.btn-warning {
        background: linear-gradient(45deg, #d97706, #facc15);
        border: none;
        color: #423c0f;
    }
    a.btn-warning:hover {
        background: linear-gradient(45deg, #facc15, #fde68a);
        box-shadow: 0 8px 20px rgba(250, 204, 21, 0.6);
    }

    /* Cartes info formateur */
    .card.bg-info {
        border-radius: 16px;
        box-shadow: 0 10px 25px rgb(14 165 233 / 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        user-select: none;
        color: #f0f9ff;
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
    }
    .card.bg-info:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgb(14 165 233 / 0.6);
    }
    .card .card-title {
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 0.7rem;
        text-shadow: 0 1px 3px rgba(0,0,0,0.4);
    }
    .card .card-text {
        font-size: 0.95rem;
        line-height: 1.3;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        min-height: 60px;
    }
    .card .btn-light {
        font-weight: 600;
        border-radius: 30px;
        padding: 8px 20px;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.1);
        transition: background-color 0.3s ease;
    }
    .card .btn-light:hover {
        background-color: #cbe7ff;
        box-shadow: 0 6px 18px rgba(0, 123, 255, 0.4);
    }

    /* Texte petits rôles */
    p.text-muted {
        font-size: 1rem;
        font-style: italic;
        color: #555 !important;
        margin-top: 1rem;
    }

    p.text-danger {
        font-weight: 700;
        font-size: 1.1rem;
        text-align: center;
        margin-top: 2rem;
        color: #dc2626 !important;
        user-select: none;
    }

    /* Info formateur & étudiant code/matricule */
    p strong {
        color: #2563eb;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
</style>

<div class="container py-4">
    <div class="alert alert-success">
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
