@extends('layouts.app')

@section('content')
<style>
  :root {
    --bleu-nuit: #0f172a;
    --beige-clair: #fefae0;
    --bleu-clair: #3b82f6;
    --orange-accent: #fbbf24;
  }

  .container.py-4 {
    max-width: 900px;
    margin: auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: var(--beige-clair);
  }

  h2.mb-4 {
    color: var(--bleu-clair);
    font-weight: 700;
    text-shadow: 0 1px 3px rgba(0,0,0,0.7);
  }

  .alert-success {
    background: linear-gradient(135deg, #4ade80, #16a34a);
    color: white;
    font-weight: 600;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    box-shadow: 0 3px 10px rgba(22,163,74,0.4);
    margin-bottom: 1.5rem;
    text-align: center;
  }

  a.btn-primary {
    background: linear-gradient(45deg, #2563eb, #1e40af);
    border-radius: 25px;
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    box-shadow: 0 5px 15px rgba(37, 99, 235, 0.5);
    transition: all 0.3s ease;
    color: var(--beige-clair) !important;
    display: inline-block;
    margin-bottom: 1rem;
  }
  a.btn-primary:hover {
    background: linear-gradient(45deg, #3b82f6, #60a5fa);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.7);
  }

  table.table-bordered {
    background-color: var(--bleu-nuit);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.7);
  }

  table th, table td {
    vertical-align: middle;
    color: var(--beige-clair);
    border-color: #1e40af;
  }

  table thead th {
    background-color: #1e40af;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 0.05em;
  }

  table tbody tr:hover {
    background-color: #334155;
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
    color: var(--bleu-nuit);
  }
  .btn-warning:hover {
    background-color: #d97706;
    color: var(--beige-clair);
    box-shadow: 0 5px 15px rgba(217, 119, 6, 0.6);
  }

  .btn-danger {
    background-color: #ef4444;
    border: none;
    color: var(--beige-clair);
  }
  .btn-danger:hover {
    background-color: #b91c1c;
    box-shadow: 0 5px 15px rgba(185, 28, 28, 0.6);
  }

  p {
    color: var(--beige-clair);
    font-style: italic;
    font-weight: 600;
    text-align: center;
    margin-top: 2rem;
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
      background-color: #1e293b;
      box-shadow: 0 5px 15px rgba(30, 41, 59, 0.7);
      padding: 1rem;
    }
    table td {
      text-align: right;
      padding-left: 50%;
      position: relative;
      border: none;
      color: var(--beige-clair);
    }
    table td::before {
      content: attr(data-label);
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      font-weight: 700;
      text-transform: uppercase;
      color: var(--orange-accent);
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
    <h2 class="mb-4">Liste des Notes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('notes.create') }}" class="btn btn-primary">Ajouter une Note</a>
    @endif

    @if($notes->count() > 0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Matière</th>
                    <th>Note</th>
                    <th>Coefficient</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                <tr>
                    <td data-label="Étudiant">{{ $note->etudiant->prenom ?? 'N/A' }} {{ $note->etudiant->nom ?? 'N/A' }}</td>
                    <td data-label="Matière">{{ $note->matiere->nom ?? 'N/A' }}</td>
                    <td data-label="Note">{{ $note->valeur }}</td>
                    <td data-label="Coefficient">{{ $note->coefficient }}</td>
                    <td data-label="Actions">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette note ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $notes->links() }}
        </div>
    @else
        <p>Aucune note trouvée.</p>
    @endif
</div>
@endsection
