@extends('layouts.app')

@section('content')
<style>
  /* Palette bleu nuit et beige */
  :root {
    --bleu-nuit: #0d1b2a;
    --bleu-nuit-clair: #1b263b;
    --beige-clair: #f5f0e6;
    --beige-fonce: #d7ccc8;
    --btn-bg: #415a77;
    --btn-bg-hover: #2a3e57;
    --text-clair: #eae2b7;
    --text-fonce: #332e2e;
    --shadow-color: rgba(0, 0, 0, 0.25);
  }

  .container {
    margin-top: 1.5rem;
    max-width: 1200px;
    padding: 0 1rem;
  }

  h2 {
    color: var(--text-clair);
    text-align: center;
    margin-bottom: 2rem;
    font-weight: 700;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
  }

  .card {
    background-color: var(--bleu-nuit-clair);
    color: var(--text-clair);
    border-radius: 1rem;
    box-shadow: 0 4px 15px var(--shadow-color);
    flex: 1 1 280px;
    max-width: 320px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.3s ease;
  }
  .card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 30px var(--shadow-color);
  }

  .card-body {
    padding: 1.5rem;
  }

  .card-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.7rem;
    color: var(--beige-clair);
  }

  .card-text {
    font-size: 1rem;
    color: var(--beige-fonce);
    margin-bottom: 1.3rem;
    min-height: 60px;
  }

  a.btn {
    align-self: flex-start;
    background-color: var(--btn-bg);
    color: var(--text-clair);
    padding: 0.4rem 1.1rem;
    border-radius: 0.5rem;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }
  a.btn:hover {
    background-color: var(--btn-bg-hover);
    color: var(--text-clair);
  }

  /* Responsive pour mobiles */
  @media (max-width: 768px) {
    .row {
      gap: 1rem;
      justify-content: center;
    }
    .card {
      max-width: 100%;
      flex: 1 1 100%;
    }
    h2 {
      font-size: 1.8rem;
    }
  }
</style>

<div class="container">
  <h2>Tableau de bord Etudiant</h2>

  <div class="row">
    <!-- Cours -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Les Cours</h5>
        <p class="card-text">Voir les cours que vous avez dispensés.</p>
        <a href="{{ route('cours.index') }}" class="btn">Voir</a>
      </div>
    </div>

    <!-- Profil -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Mon Profil</h5>
        <p class="card-text">Voir mes informations personnelles.</p>
        <a href="{{ route('profile.show', auth()->user()->id) }}" class="btn">Voir</a>
      </div>
    </div>

    <!-- Matières -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Les Matières</h5>
        <p class="card-text">Voir les matières concernées.</p>
        <a href="{{ route('matieres.index') }}" class="btn">Voir</a>
      </div>
    </div>

    <!-- Formateurs -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Les Formateurs</h5>
        <p class="card-text">Voir la liste des formateurs.</p>
        <a href="{{ route('formateurs.index') }}" class="btn">Voir</a>
      </div>
    </div>

    <!-- Articles -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Les Articles</h5>
        <p class="card-text">Voir ou publier des articles.</p>
        <a href="{{ route('articles.index') }}" class="btn">Voir</a>
      </div>
    </div>

    <!-- Notes -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Les Notes</h5>
        <p class="card-text">Voir les notes des étudiants.</p>
        <a href="{{ route('notes.index') }}" class="btn">Voir</a>
      </div>
    </div>
  </div>
</div>
@endsection
