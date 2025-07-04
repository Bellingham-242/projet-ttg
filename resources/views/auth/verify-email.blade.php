<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Vérification d'email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            margin: 0;
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
        .container {
            background: white;
            max-width: 520px;
            width: 100%;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            box-sizing: border-box;
        }
        .message {
            color: #4b5563;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }
        .status {
            background-color: #dcfce7;
            color: #15803d;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            user-select: none;
        }
        .actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        button, .btn {
            padding: 0.6rem 1.4rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: background-color 0.25s ease;
            color: white;
            background-color: #3b82f6;
            user-select: none;
        }
        button:hover, .btn:hover {
            background-color: #2563eb;
        }
        .logout {
            background: none;
            color: #4b5563;
            font-size: 0.9rem;
            border: none;
            text-decoration: underline;
            cursor: pointer;
            padding: 0.5rem 1rem;
            transition: color 0.25s ease;
            user-select: none;
        }
        .logout:hover {
            color: #1f2937;
        }
        @media (max-width: 480px) {
            .actions {
                flex-direction: column;
            }
            button, .logout {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="message">
            Merci de vous être inscrit·e ! Avant de commencer, veuillez vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer.<br />
            Si vous n’avez pas reçu l’e-mail, nous pouvons vous en renvoyer un autre.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="status" role="alert" aria-live="polite">
                Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de votre inscription.
            </div>
        @endif

        <div class="actions">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" aria-label="Renvoyer l'email de vérification">Renvoyer l'email de vérification</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout" aria-label="Se déconnecter">Se déconnecter</button>
            </form>
        </div>
    </div>
</body>
</html>
