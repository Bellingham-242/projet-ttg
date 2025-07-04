<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        :root {
            --bg-dark: #0f172a;
            --card-light: #fefae0;
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --success: #16a34a;
            --success-bg: #dcfce7;
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
            min-height: 100vh;
            background-color: var(--bg-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: var(--card-light);
            padding: 2.2rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .description {
            font-size: 0.95rem;
            color: var(--gray);
            margin-bottom: 1.2rem;
            line-height: 1.5;
        }

        .status {
            background-color: var(--success-bg);
            color: var(--success);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text);
        }

        input[type="email"] {
            width: 100%;
            padding: 0.65rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.25s ease;
        }

        input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .error {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.4rem;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.8rem;
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
        <div class="description">
            Vous avez oublié votre mot de passe ? Aucun souci. Indiquez-nous simplement votre adresse email, et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </div>

        @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <label for="email">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->get('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="actions">
                <button type="submit">Envoyer le lien</button>
            </div>
        </form>
    </div>
</body>
</html>
