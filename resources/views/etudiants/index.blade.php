@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold text-beige-nuit">📋 Liste des Étudiants</h2>
        <a href="{{ route('etudiants.create') }}" class="btn btn-outline-beige-nuit rounded-pill shadow-sm px-4 mt-2 mt-sm-0">
            ➕ Ajouter un Étudiant
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="bg-beige-clair rounded-4 shadow p-3 p-md-4 overflow-auto">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-bleu-nuit text-beige-clair small text-uppercase">
                    <tr>
                        <th class="ps-3">Matricule</th>
                        <th>Nom complet</th>
                        <th>Téléphone</th>
                        <th>Option</th>
                        <th>Niveau</th>
                        <th>Moyenne</th>
                        <th>Mention</th>
                        @if(auth()->user()->role === 'admin')
                        <th class="text-center">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($etudiants as $etudiant)
                    <tr class="border-bottom border-light-subtle hover-shadow-sm">
                        <td class="ps-3 fw-medium text-bleu-nuit">{{ $etudiant->matricule }}</td>
                        <td class="text-bleu-nuit">{{ $etudiant->prenom }} {{ $etudiant->nom }}</td>
                        <td class="text-bleu-nuit">{{ $etudiant->telephone ?? '-' }}</td>
                        <td class="text-bleu-nuit">{{ $etudiant->option->nom ?? '-' }}</td>
                        <td class="text-bleu-nuit">{{ $etudiant->niveau->nom ?? '-' }}</td>
                        <td class="text-bleu-nuit">{{ number_format($etudiant->moyenne(), 2) }}</td>
                        <td class="text-bleu-nuit">{{ $etudiant->mention() }}</td>
                        @if(auth()->user()->role === 'admin')
                        <td class="text-center">
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 me-1" title="Modifier">✏️</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" title="Supprimer">🗑️</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">Aucun étudiant trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $etudiants->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Couleurs du thème */
    :root {
        --bleu-nuit: #0a1f44;
        --beige-clair: #f8f4e3;
        --beige-fonce: #bfae8e;
    }

    .text-beige-nuit {
        color: var(--beige-fonce) !important;
    }
    .text-bleu-nuit {
        color: var(--bleu-nuit) !important;
    }
    .bg-beige-clair {
        background-color: var(--beige-clair) !important;
    }
    .bg-bleu-nuit {
        background-color: var(--bleu-nuit) !important;
    }
    .btn-outline-beige-nuit {
        color: var(--bleu-nuit);
        border-color: var(--bleu-nuit);
        transition: background-color 0.3s, color 0.3s;
    }
    .btn-outline-beige-nuit:hover {
        background-color: var(--bleu-nuit);
        color: var(--beige-clair);
        border-color: var(--bleu-nuit);
    }

    /* Hover légère sur les lignes */
    .hover-shadow-sm:hover {
        background-color: var(--beige-clair);
        box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
        transition: background-color 0.3s ease;
    }

    /* Table responsive horizontal */
    .table-responsive {
        overflow-x: auto;
    }

    /* Responsive ajustements */
    @media (max-width: 576px) {
        h2 {
            font-size: 1.5rem;
        }
        .btn {
            font-size: 0.9rem;
            padding: 0.4rem 1rem;
        }
        table thead th, table tbody td {
            font-size: 0.85rem;
        }
    }
</style>
@endpush
