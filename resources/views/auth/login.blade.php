<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - T.T.G Network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        :root {
            --bg: #0f172a;
            --panel: #fefae0;
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --danger: #dc2626;
            --success-bg: #dcfce7;
            --success-text: #15803d;
            --text-dark: #1f2937;
            --gray: #6b7280;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bg);
            color: var(--text-dark);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: var(--panel);
            padding: 2.5rem 2rem;
            border-radius: 1.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        label {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.35rem;
            display: block;
            color: var(--text-dark);
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #cbd5e1;
            font-size: 0.95rem;
            transition: border 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .checkbox-row {
            margin-top: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-row input {
            accent-color: var(--primary-dark);
        }

        .checkbox-row span {
            font-size: 0.875rem;
            color: var(--gray);
        }

        .status {
            margin-bottom: 1rem;
            background-color: var(--success-bg);
            color: var(--success-text);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .error {
            margin-top: 0.35rem;
            color: var(--danger);
            font-size: 0.85rem;
        }

        .actions {
            margin-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        button {
            background-color: var(--primary);
            color: #fff;
            padding: 0.6rem 1.5rem;
            font-weight: bold;
            font-size: 0.95rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: var(--primary-dark);
        }

        a.link {
            color: var(--primary);
            font-size: 0.85rem;
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        a.link:hover {
            color: var(--primary-dark);
        }

        @media (max-width: 480px) {
            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions a,
            .actions button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Session Status --}}
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email Address --}}
            <div>
                <label for="email">Adresse Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @if ($errors->get('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            {{-- Password --}}
            <div style="margin-top: 1.25rem;">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @if ($errors->get('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            {{-- Remember Me --}}
            <div class="checkbox-row">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Se souvenir de moi</span>
            </div>

            {{-- Actions --}}
            <div class="actions">
                @if (Route::has('password.request'))
                    <a class="link" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif

                <button type="submit">Connexion</button>
            </div>
        </form>
    </div>
</body>
</html>
