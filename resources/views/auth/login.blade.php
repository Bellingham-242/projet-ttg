<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <style>
        /* =====  Base layout  ===== */
        * { box-sizing: border-box; }
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f3f4f6;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            padding: 2.25rem 2rem;
            border-radius: 1.25rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.07);
        }

        /* =====  Typography  ===== */
        label {
            display: block;
            margin-bottom: 0.45rem;
            font-weight: 600;
            color: #374151;
        }
        .info, .error, .status {
            font-size: 0.875rem;
        }
        .status {
            margin-bottom: 1rem;
            color: #16a34a;
            background: #dcfce7;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
        }
        .error {
            margin-top: 0.4rem;
            color: #dc2626;
        }
        a.link {
            font-size: 0.875rem;
            color: #2563eb;
            text-decoration: underline;
            transition: color 0.25s ease;
        }
        a.link:hover { color: #1d4ed8; }

        /* =====  Inputs  ===== */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.55rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.45rem;
            font-size: 0.95rem;
            transition: border-color 0.25s ease;
        }
        input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        /* =====  Checkbox  ===== */
        .checkbox-row {
            margin-top: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .checkbox-row input {
            width: 1rem;
            height: 1rem;
            accent-color: #4f46e5;
        }
        .checkbox-row span {
            color: #4b5563;
            font-size: 0.875rem;
        }

        /* =====  Actions  ===== */
        .actions {
            margin-top: 1.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.8rem;
        }
        button {
            background: #3b82f6;
            color: #ffffff;
            border: none;
            border-radius: 0.45rem;
            padding: 0.55rem 1.25rem;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.25s ease;
        }
        button:hover { background: #2563eb; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Session Status -->
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @if ($errors->get('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Password -->
            <div style="margin-top: 1.25rem;">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @if ($errors->get('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="checkbox-row">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </div>

            <!-- Actions -->
            <div class="actions">
                @if (Route::has('password.request'))
                    <a class="link" href="{{ route('password.request') }}">Forgot your password?</a>
                @endif

                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>