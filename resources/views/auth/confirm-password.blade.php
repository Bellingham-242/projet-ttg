<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation du mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        :root {
            --bg-dark: #0f172a;
            --card-light: #fefae0;
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --danger: #dc2626;
            --text: #1e293b;
            --gray: #64748b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 1rem;
            min-height: 100vh;
            background-color: var(--bg-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: var(--card-light);
            padding: 2rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .info-text {
            margin-bottom: 1rem;
            font-size: 0.95rem;
            color: var(--gray);
            line-height: 1.4;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text);
        }

        input[type="password"] {
            width: 100%;
            padding: 0.65rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .error {
            margin-top: 0.4rem;
            color: var(--danger);
            font-size: 0.875rem;
        }

        .btn-container {
            margin-top: 1.75rem;
            display: flex;
            justify-content: flex-end;
        }

        button {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: var(--primary-dark);
        }

        @media (max-width: 480px) {
            .btn-container {
                justify-content: center;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="info-text">
            Ceci est une zone sécurisée de l'application. Veuillez confirmer votre mot de passe pour continuer.
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="btn-container">
                <button type="submit">Confirmer</button>
            </div>
        </form>
    </div>
</body>
</html>
