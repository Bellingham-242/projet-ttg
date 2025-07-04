@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-beige-fonce">Tableau de bord Parent</h2>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card bg-bleu-nuit text-beige-clair shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Notes des Enfants</h5>
                    <p class="card-text">Suivre les résultats scolaires.</p>
                    <a href="{{ route('notes.index') }}" class="btn btn-outline-beige-fonce btn-sm rounded-pill px-3">Voir les notes</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-bleu-nuit text-beige-clair shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Articles & Annonces</h5>
                    <p class="card-text">Lire les nouvelles de l'école.</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-beige-fonce btn-sm rounded-pill px-3">Accéder</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Couleurs thème bleu nuit / beige */
    :root {
        --bleu-nuit: #0a1f44;
        --beige-clair: #f8f4e3;
        --beige-fonce: #bfae8e;
    }

    .bg-bleu-nuit {
        background-color: var(--bleu-nuit) !important;
    }
    .text-beige-clair {
        color: var(--beige-clair) !important;
    }
    .text-beige-fonce {
        color: var(--beige-fonce) !important;
    }

    .btn-outline-beige-fonce {
        color: var(--beige-fonce);
        border-color: var(--beige-fonce);
        transition: background-color 0.3s, color 0.3s;
    }
    .btn-outline-beige-fonce:hover {
        background-color: var(--beige-fonce);
        color: var(--bleu-nuit);
        border-color: var(--beige-fonce);
    }

    /* Responsive padding et spacing */
    .row.g-4 {
        gap: 1.5rem;
    }

    @media (max-width: 576px) {
        h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .btn {
            font-size: 0.9rem;
            padding: 0.4rem 1rem;
        }
    }
</style>
@endpush
