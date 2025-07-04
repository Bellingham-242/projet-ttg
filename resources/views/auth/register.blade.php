<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        :root {
            --bg-dark: #0f172a;
            --card-light: #fefae0;
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --danger: #dc2626;
            --text-dark: #1f2937;
            --gray: #6b7280;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: var(--card-light);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 480px;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        input, select {
            width: 100%;
            padding: 0.65rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            margin-bottom: 1.2rem;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus {
            border-color: var(--primary);
            outline: none;
        }

        .error {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: -0.8rem;
            margin-bottom: 0.8rem;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .link {
            font-size: 0.875rem;
            color: var(--gray);
            text-decoration: underline;
        }

        .link:hover {
            color: var(--text-dark);
        }

        button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.65rem 1.5rem;
            font-weight: bold;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: var(--primary-dark);
        }

        @media (max-width: 480px) {
            .footer {
                flex-direction: column;
                align-items: stretch;
            }

            .footer .link,
            .footer button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nom -->
            <div>
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @if ($errors->get('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- Email -->
            <div>
                <label for="email">Adresse Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @if ($errors->get('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @if ($errors->get('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Confirmation -->
            <div>
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->get('password_confirmation'))
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>

            <!-- Rôle -->
            <div>
                <label for="role">Rôle</label>
                <select name="role" id="role" required>
                    <option value="etudiant">Étudiant</option>
                    <option value="formateur">Formateur</option>
                    <option value="parent">Parent</option>
                </select>
            </div>

            <!-- Footer -->
            <div class="footer">
                <a href="{{ route('login') }}" class="link">Déjà inscrit ?</a>
                <button type="submit">S’inscrire</button>
            </div>
        </form>
    </div>
</body>
</html>
