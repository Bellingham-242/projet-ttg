@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-beige-fonce fw-bold">Liste des Utilisateurs</h2>

    <a href="{{ route('users.create') }}" class="btn btn-outline-beige-fonce mb-4 rounded px-4 shadow-sm">
        + Ajouter un utilisateur
    </a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert" style="background-color: #bfae8e; color: #0a1f44;">
            <strong class="me-auto">✔️</strong> {{ session('success') }}
            <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    @if($users->count())
        <div class="table-responsive">
            <table class="table align-middle mb-0" style="border-collapse: separate; border-spacing: 0 0.75rem;">
                <thead class="bg-bleu-nuit text-beige-clair rounded-3">
                    <tr>
                        <th class="rounded-start text-start ps-4">Nom</th>
                        <th class="text-start">Email</th>
                        <th class="text-start">Rôle</th>
                        <th class="rounded-end text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="shadow-sm bg-beige-clair rounded">
                            <td class="fw-semibold text-start ps-4 text-bleu-nuit">{{ $user->name }}</td>
                            <td class="text-start text-bleu-nuit">{{ $user->email }}</td>
                            <td class="text-capitalize text-start text-bleu-nuit">{{ $user->role }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-beige-fonce me-2 rounded-pill px-3">
                                    Modifier
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    @else
        <p class="text-center text-beige-fonce fst-italic">Aucun utilisateur trouvé.</p>
    @endif
</div>
@endsection

@push('styles')
<style>
    :root {
        --bleu-nuit: #0a1f44;
        --beige-clair: #f8f4e3;
        --beige-fonce: #bfae8e;
    }

    .bg-bleu-nuit {
        background-color: var(--bleu-nuit) !important;
    }
    .bg-beige-clair {
        background-color: var(--beige-clair) !important;
    }
    .text-beige-clair {
        color: var(--beige-clair) !important;
    }
    .text-beige-fonce {
        color: var(--beige-fonce) !important;
    }
    .text-bleu-nuit {
        color: var(--bleu-nuit) !important;
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

    /* Table spacing and radius */
    table {
        border-collapse: separate !important;
        border-spacing: 0 0.75rem !important;
    }
    thead tr th {
        border-radius: 0.5rem;
    }
    tbody tr {
        transition: box-shadow 0.3s ease;
    }
    tbody tr:hover {
        box-shadow: 0 4px 10px rgba(191, 174, 142, 0.3);
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
        h2 {
            font-size: 1.4rem;
        }
        .btn {
            font-size: 0.9rem;
            padding: 0.4rem 1rem;
        }
        table {
            font-size: 0.85rem;
        }
        thead {
            display: none; /* Simplify on small screens */
        }
        tbody tr {
            display: block;
            margin-bottom: 1rem;
            background-color: var(--beige-clair);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }
        tbody tr td {
            display: flex;
            justify-content: space-between;
            padding: 0.3rem 0;
            border: none;
        }
        tbody tr td::before {
            content: attr(data-label);
            font-weight: 600;
            color: var(--bleu-nuit);
        }
        tbody tr td:last-child {
            justify-content: center;
        }
    }
</style>
@endpush
