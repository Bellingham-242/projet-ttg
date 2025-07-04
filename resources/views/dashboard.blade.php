{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #0f172a; /* bleu nuit */
    }

    .dashboard-container {
        background-color: #1e293b;
        border-radius: 12px;
        padding: 20px;
        color: #fefae0; /* beige clair */
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    h3 {
        color: #fef3c7;
        font-weight: 700;
    }

    .btn-custom {
        border: none;
        padding: 12px;
        font-weight: bold;
        border-radius: 8px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        background-color: #1d4ed8;
        color: #fff;
    }

    .btn-custom:hover {
        background-color: #3b82f6;
        transform: translateY(-2px);
    }

    .btn-custom-secondary {
        background-color: #334155;
    }

    .btn-custom-secondary:hover {
        background-color: #475569;
    }

    .btn-custom-success {
        background-color: #059669;
    }

    .btn-custom-success:hover {
        background-color: #10b981;
    }

    .text-muted {
        color: #94a3b8 !important;
    }

    .text-danger {
        color: #f87171 !important;
    }

    @media (max-width: 768px) {
        .btn-custom {
            width: 100% !important;
            margin-bottom: 10px;
        }
    }
</style>

<div class="container py-4">
    <div class="dashboard-container">

        <div class="alert alert-success">
            Bonjour <strong>{{ Auth::user()->name }}</strong> !
        </div>

        @php
            $role = Auth::user()->role;
        @endphp

        @if($role === 'admin')
            <h3 class="mb-4">Tableau de bord Administrateur</h3>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="{{ route('matieres.index') }}" class="btn btn-custom w-100">Gérer les Matières</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('cours.index') }}" class="btn btn-custom w-100">Voir les Cours</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('articles.index') }}" class="btn btn-custom w-100">Articles</a>
                </div>
            </div>
        @elseif($role === 'formateur')
            <h3 class="mb-4">Espace Formateur</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="{{ route('cours.index') }}" class="btn btn-custom btn-custom-secondary w-100">Mes Cours</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('articles.create') }}" class="btn btn-custom btn-custom-secondary w-100">Publier un article</a>
                </div>
            </div>
        @elseif($role === 'etudiant')
            <h3 class="mb-4">Espace Étudiant</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="{{ route('notes.index') }}" class="btn btn-custom btn-custom-success w-100">Voir mes Notes</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('articles.index') }}" class="btn btn-custom btn-custom-success w-100">Voir les Articles</a>
                </div>
            </div>
        @elseif($role === 'parent')
            <h3 class="mb-4">Bienvenue cher parent !</h3>
            <p class="text-muted">Merci de suivre la progression de vos enfants sur notre plateforme.</p>
        @else
            <p class="text-danger">Rôle non reconnu.</p>
        @endif
    </div>
</div>
@endsection
