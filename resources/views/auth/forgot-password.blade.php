<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #f3f4f6;
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
            max-width: 420px;
            width: 100%;
        }
        .description {
            font-size: 0.95rem;
            color: #4b5563;
            margin-bottom: 1rem;
        }
        .status {
            background-color: #dcfce7;
            color: #15803d;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
        }
        input[type="email"] {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border 0.25s ease;
        }
        input[type="email"]:focus {
            border-color: #3b82f6;
            outline: none;
        }
        .error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.4rem;
        }
        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }
        button {
            background-color: #3b82f6;
            color: white;
            padding: 0.6rem 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="description">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->get('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="actions">
                <button type="submit">Email Password Reset Link</button>
            </div>
        </form>
    </div>
</body>
</html>