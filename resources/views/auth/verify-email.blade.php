<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            max-width: 520px;
            width: 100%;
        }

        .message {
            font-size: 0.95rem;
            color: #4b5563;
            margin-bottom: 1.5rem;
        }

        .status {
            background-color: #dcfce7;
            color: #15803d;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        button, .btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            font-weight: bold;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.25s ease;
        }

        button:hover, .btn:hover {
            background-color: #2563eb;
        }

        .logout {
            background: none;
            border: none;
            color: #4b5563;
            text-decoration: underline;
            font-size: 0.875rem;
            cursor: pointer;
            transition: color 0.25s ease;
        }

        .logout:hover {
            color: #1f2937;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
            If you didn't receive the email, we will gladly send you another.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="status">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <div class="actions">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit">Resend Verification Email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout">Log Out</button>
            </form>
        </div>
    </div>
</body>
</html>