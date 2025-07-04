<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialiser le mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        :root {
            --bg-dark: #0f172a;
            --card-light: #fefae0;
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --danger: #dc2626;
            --gray: #4b5563;
            --text: #1e293b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 1rem;
            background-color: var(--bg-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: var(--card-light);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 460px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: var(--text);
        }

        input {
            width: 100%;
            padding: 0.65rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.5rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            transition: border-color 0.25s ease;
        }

        input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .error {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: -0.4rem;
            margin-bottom: 0.9rem;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.2rem;
        }

        button {
            background-color: var(--primary);
            color: white;
            padding: 0.6rem 1.4rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--primary-dark);
        }

        @media (max-width: 480px) {
            .actions {
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
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Jeton de sécurité -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <label for="email">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                @if ($errors->get('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password">Nouveau mot de passe</label>
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

            <div class="actions">
                <button type="submit">Réinitialiser</button>
            </div>
        </form>
    </div>
</body>
</html>
