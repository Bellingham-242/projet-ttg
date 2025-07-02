<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bienvenue - T.T.G Network</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

  <style>
    /* Animation du fond */
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background: linear-gradient(135deg, #1e3a8a, #7e22ce, #db2777, #1e3a8a);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      color: #f1f5f9;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    header, footer {
      padding: 20px;
      max-width: 1200px;
      margin: auto;
      width: 100%;
    }

    header h1 {
      font-size: 2rem;
      font-weight: 800;
      color: #fcd34d;
    }

    nav a {
      margin-left: 20px;
      text-decoration: none;
      color: #e0f2fe;
      font-weight: 600;
      transition: color 0.3s;
    }

    nav a:hover {
      color: #38bdf8;
    }

    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 0 20px;
    }

    h2 {
      font-size: 2.8rem;
      font-weight: 800;
      margin-bottom: 15px;
      text-shadow: 2px 2px #00000033;
    }

    p {
      font-size: 1.2rem;
      max-width: 600px;
      color: #cbd5e1;
      margin-bottom: 30px;
    }

    .btn {
      padding: 12px 28px;
      margin: 0 10px;
      font-weight: bold;
      border-radius: 10px;
      border: none;
      background-color: #1e40af;
      color: white;
      box-shadow: 0 0 10px #1e40af33;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
      text-decoration: none;
    }

    .btn:hover {
      background-color: #2563eb;
      transform: scale(1.05);
    }

    footer {
      background-color: rgba(30, 41, 59, 0.85);
      text-align: center;
      font-size: 0.9rem;
      color: #94a3b8;
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
