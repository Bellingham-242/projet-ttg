@extends('layouts.app')

@section('content')
<style>
  .container.py-4 {
    max-width: 900px;
    margin: auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #0f172a; /* texte foncé pour contraste */
  }

  h2.mb-4 {
    color: #2563eb;
    font-weight: 700;
    text-shadow: 0 1px 3px rgba(37, 99, 235, 0.3);
  }

  a.btn-success {
    border-radius: 25px;
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    background: linear-gradient(45deg, #16a34a, #22c55e);
    box-shadow: 0 5px 15px rgba(34, 197, 94, 0.5);
    color: #f0fdf4 !important;
    transition: all 0.3s ease;
    margin-bottom: 1rem;
    display: inline-block;
  }
  a.btn-success:hover {
    background: linear-gradient(45deg, #22c55e, #4ade80);
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.7);
  }

  table.table-bordered {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  }

  table th, table td {
    vertical-align: middle;
    border-color: #cbd5e1;
  }

  table thead th {
    background-color: #e0e7ff;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 0.05em;
    color: #1e40af;
  }

  table tbody tr:hover {
    background-color: #f0f9ff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-warning, .btn-danger {
    border-radius: 20px;
    font-weight: 600;
    padding: 0.3rem 0.8rem;
    font-size: 0.85rem;
    transition: all 0.3s ease;
  }

  .btn-warning {
    background-color: #f59e0b;
    border: none;
    color: #1e40af;
  }
  .btn-warning:hover {
    background-color: #d97706;
    color: #fef3c7;
    box-shadow: 0 5px 15px rgba(217, 119, 6, 0.6);
  }

  .btn-danger {
    background-color: #ef4444;
    border: none;
    color: #fef3f2;
  }
  .btn-danger:hover {
    background-color: #b91c1c;
    box-shadow: 0 5px 15px rgba(185, 28, 28, 0.6);
  }

  td[colspan="4"] {
    text-align: center;
    font-style: italic;
    color: #64748b;
  }

  /* Responsive */
  @media (max-width: 768px) {
    table thead {
      display: none;
    }
    table, table tbody, table tr, table td {
      display: block;
      width: 100%;
    }
    table tr {
      margin-bottom: 1rem;
      border-radius: 12px;
      background-color: #f9fafb;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      padding: 1rem;
    }
    table td {
      text-align: right;
      padding-left: 50%;
      position: relative;
      border: none;
      color: #1e293b;
      font-weight: 600;
    }
    table td::before {
      content: attr(data-label);
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      font-weight: 700;
      text-transform: uppercase;
      color: #2563eb;
      font-size: 0.85rem;
    }
    .btn-warning, .btn-danger {
      width: 48%;
      margin-bottom: 0.5rem;
    }
    .btn-danger {
      margin-left: 4%;
    }
  }
</style>

<div class="container py-4">
    <h2 class="mb-4">Liste des Options</h2>

    <a href="{{ route('options.create') }}" class="btn btn-success">Ajouter une Option</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($options as $option)
                <tr>
                    <td data-label="#"> {{ $option->id }} </td>
                    <td data-label="Nom"> {{ $option->nom }} </td>
                    <td data-label="Actions">
                        <a href="{{ route('options.edit', $option->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('options.destroy', $option->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Aucune option enregistrée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
