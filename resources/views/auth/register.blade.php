<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
        }
        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            color: #374151;
        }
        input, select {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            transition: border-color 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #3b82f6;
            outline: none;
        }
        .error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: -0.8rem;
            margin-bottom: 0.8rem;
        }
        .link {
            font-size: 0.875rem;
            color: #4b5563;
            text-decoration: underline;
            margin-right: 1rem;
        }
        .link:hover {
            color: #1f2937;
        }
        button {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 0.6rem 1.4rem;
            font-weight: bold;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #2563eb;
        }
        .footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @if ($errors->get('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- Email -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @if ($errors->get('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @if ($errors->get('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->get('password_confirmation'))
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>

            <!-- Role -->
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
                <a href="{{ route('login') }}" class="link">Already registered?</a>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>