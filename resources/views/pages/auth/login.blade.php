<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - STUDIA</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --midnight: #0a0a0b;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
            --gold: #d4af37;
            --gold-gradient: linear-gradient(135deg, #d4af37 0%, #f7e08b 50%, #d4af37 100%);
            --text-main: #ffffff;
            --text-dim: #a0a0a0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--midnight);
            color: var(--text-main);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: radial-gradient(circle at 50% 50%, #1a1a1c 0%, #0a0a0b 100%);
        }

        .login-card {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            padding: 50px;
            border-radius: 30px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .logo {
            font-size: 32px;
            font-weight: 700;
            color: var(--gold);
            text-align: center;
            margin-bottom: 40px;
            display: block;
            text-decoration: none;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 500;
        }

        label {
            display: block;
            color: var(--text-dim);
            font-size: 14px;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            padding: 15px;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.08);
        }

        .btn-login {
            width: 100%;
            background: var(--gold-gradient);
            color: black;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px rgba(212, 175, 55, 0.5);
        }

        .error-msg {
            color: #ff6b6b;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }

        .footer-links {
            text-align: center;
            margin-top: 30px;
            color: var(--text-dim);
            font-size: 14px;
        }

        .footer-links a {
            color: var(--gold);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <a href="/" class="logo">STUDIA<span>.</span></a>
        <h1>Espace Administration</h1>

        @if($errors->any())
            <div class="error-msg">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Se connecter</button>
        </form>

        <div class="footer-links">
            <a href="/">Retour au site</a>
        </div>
    </div>
</body>

</html>