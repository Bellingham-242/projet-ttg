<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bienvenue - T.T.G Network</title>

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Arial', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background: linear-gradient(135deg, #0f172a, #1e293b);
      color: #fefae0;
    }

    header, footer {
      width: 100%;
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }

    header h1 {
      font-size: 2rem;
      font-weight: 800;
      color: #fef3c7;
    }

    nav {
      margin-top: 10px;
    }

    nav a {
      margin-right: 20px;
      text-decoration: none;
      color: #fcd34d;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #fde68a;
    }

    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      text-align: center;
    }

    h2 {
      font-size: 2.5rem;
      margin-bottom: 15px;
      font-weight: bold;
      color: #e2e8f0;
      text-shadow: 2px 2px #00000022;
    }

    p {
      max-width: 600px;
      margin-bottom: 30px;
      font-size: 1.1rem;
      color: #cbd5e1;
    }

    .btn {
      padding: 12px 24px;
      margin: 8px;
      font-weight: bold;
      border-radius: 8px;
      border: none;
      background-color: #1e3a8a;
      color: #fff;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      transition: background 0.3s, transform 0.2s;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .btn:hover {
      background-color: #3b82f6;
      transform: translateY(-2px);
    }

    footer {
      background-color: #1e293b;
      text-align: center;
      font-size: 0.9rem;
      color: #94a3b8;
      padding: 15px 10px;
    }

    [data-fade] {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.6s ease-out;
    }

    [data-fade].show {
      opacity: 1;
      transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 768px) {
      header, footer {
        padding: 15px;
        text-align: center;
      }

      nav a {
        display: block;
        margin: 10px 0;
      }

      h2 {
        font-size: 2rem;
      }

      p {
        font-size: 1rem;
      }

      .btn {
        width: 100%;
        max-width: 280px;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>T.T.G Network</h1>
    <nav>
      <a href="{{ route('register') }}">Créer un compte</a>
      <a href="{{ route('login') }}">Se connecter</a>
    </nav>
  </header>

  <main>
    <h2 data-fade>Bienvenue sur T.T.G Network</h2>
    <p data-fade>La plateforme scolaire intelligente qui facilite la gestion des étudiants, cours, notes, enseignants et plus encore.</p>
    <div data-fade>
      <a href="{{ route('register') }}" class="btn">Créer un compte</a>
      <a href="{{ route('login') }}" class="btn">Se connecter</a>
    </div>
  </main>

  <footer>
    © {{ date('Y') }} <strong>T.T.G Network</strong>. Tous droits réservés.
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      document.querySelectorAll('[data-fade]').forEach(el => {
        setTimeout(() => el.classList.add('show'), 150);
      });
    });
  </script>
</body>
</html>
