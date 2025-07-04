@extends('layouts.app')

@section('content')
<style>
    .container.py-4 {
        max-width: 900px;
        margin: auto;
    }

    h2.mb-4 {
        color: #0d6efd; /* bleu bootstrap */
        font-weight: 700;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .btn-success {
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #198754;
        box-shadow: 0 6px 20px rgba(25, 135, 84, 0.5);
    }

    table.table-hover tbody tr:hover {
        background-color: #e9f5ff;
        cursor: pointer;
        transition: background-color 0.25s ease;
    }

    .btn-info, .btn-warning, .btn-danger {
        border-radius: 20px;
        padding: 0.25rem 0.75rem;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-info:hover {
        background-color: #0dcaf0;
        box-shadow: 0 4px 12px rgba(13, 202, 240, 0.5);
        color: white;
    }

    .btn-warning:hover {
        background-color: #ffc107cc;
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.5);
        color: #212529;
    }

    .btn-danger:hover {
        background-color: #dc3545cc;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.5);
        color: white;
    }
</style>

<div class="container py-4">
    <h2 class="mb-4">Liste des Niveaux</h2>

    <a href="{{ route('niveaux.create') }}" class="btn btn-success mb-3">Ajouter un niveau</a>

    @if (session('success'))
        <div class="alert alert-success shadow-sm rounded">{{ session('success') }}</div>
    @endif

    <table class="table table-hover shadow-sm rounded">
        <thead class="table-light">
            <tr>
                <th style="width:5%;">#</th>
                <th>Nom</th>
                <th style="width:25%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($niveaux as $niveau)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $niveau->nom }}</td>
                    <td>
                        <a href="{{ route('niveaux.show', $niveau) }}" class="btn btn-info btn-sm me-1">Voir</a>
                        <a href="{{ route('niveaux.edit', $niveau) }}" class="btn btn-warning btn-sm me-1">Modifier</a>
                        <form action="{{ route('niveaux.destroy', $niveau) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
