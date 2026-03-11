<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Dashboard - STUDIA</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --midnight: #060608;
            --deep-dark: #0d0d10;
            --glass: rgba(255, 255, 255, 0.02);
            --glass-strong: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.08);
            --glass-border-light: rgba(255, 255, 255, 0.15);
            --gold: #d4af37;
            --gold-bright: #f7e08b;
            --gold-gradient: linear-gradient(135deg, #d4af37 0%, #f7e08b 50%, #d4af37 100%);
            --gold-soft: rgba(212, 175, 55, 0.1);
            --text-main: #f8f8f8;
            --text-dim: #8e8e93;
            --shadow-premium: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        body {
            background-color: var(--midnight);
            color: var(--text-main);
            overflow-x: hidden;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(212, 175, 55, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 100% 100%, rgba(255, 255, 255, 0.01) 0%, transparent 50%);
            background-attachment: fixed;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: rgba(13, 13, 16, 0.85);
            backdrop-filter: blur(30px) saturate(180%);
            border-right: 1px solid var(--glass-border);
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .logo {
            font-size: 26px;
            font-weight: 700;
            color: var(--gold);
            text-decoration: none;
            margin-bottom: 50px;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo span {
            color: var(--text-main);
        }

        .nav-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-dim);
            margin-bottom: 20px;
            margin-left: 10px;
            font-weight: 600;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            color: var(--text-dim);
            text-decoration: none;
            border-radius: 14px;
            margin-bottom: 8px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 400;
            font-size: 15px;
            border: 1px solid transparent;
        }

        .nav-link i,
        .nav-link span:first-child {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover {
            background: var(--glass);
            color: var(--text-main);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: var(--gold-soft);
            color: var(--gold);
            font-weight: 500;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-link.active i,
        .nav-link.active span:first-child {
            transform: scale(1.1);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 50px 60px;
            max-width: 1600px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
        }

        header h1 {
            font-size: 36px;
            font-weight: 700;
            letter-spacing: -1px;
            background: linear-gradient(to right, #fff, #a0a0a0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Reusable Components */
        .premium-card {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 30px;
            transition: all 0.4s ease;
            box-shadow: var(--shadow-premium);
        }

        .premium-card:hover {
            border-color: var(--glass-border-light);
            background: var(--glass-strong);
            transform: translateY(-5px);
        }

        .btn-gold {
            background: var(--gold-gradient);
            color: black;
            border: none;
            padding: 14px 28px;
            border-radius: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        .btn-gold:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.3);
        }

        /* Table Design */
        .table-container {
            margin-top: 30px;
            overflow-x: auto;
            border-radius: 20px;
            border: 1px solid var(--glass-border);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: rgba(13, 13, 16, 0.4);
        }

        th {
            text-align: left;
            color: var(--text-dim);
            padding: 20px 24px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid var(--glass-border);
            font-weight: 600;
        }

        td {
            padding: 20px 24px;
            border-bottom: 1px solid var(--glass-border);
            font-size: 15px;
            color: var(--text-main);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: var(--glass);
        }

        /* Badge Design */
        .badge {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Modal Enhancement */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(15px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .modal-content {
            background: #0d0d10;
            border: 1px solid var(--glass-border-light);
            padding: 45px;
            border-radius: 32px;
            width: 90%;
            max-width: 650px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
            position: relative;
            transform: scale(1);
            animation: slideUp 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-content h2 {
            font-size: 28px;
            margin-bottom: 30px;
            color: var(--gold);
            font-weight: 700;
        }

        input,
        select,
        textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            padding: 14px 18px;
            border-radius: 12px;
            color: white;
            margin-top: 10px;
            margin-bottom: 25px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.1);
        }

        label {
            color: var(--text-dim);
            font-size: 13px;
            font-weight: 500;
            margin-left: 5px;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    style="width: 32px; height: 32px; object-fit: contain;">
                <span>STUDIA.</span>
            </a>
            <nav style="flex: 1;">
                <div class="nav-label">Menu Principal</div>
                <a href="{{ route('dashboard.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <span>📊</span> Vue d'ensemble
                </a>
                <a href="{{ route('dashboard.clients.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.clients.index') ? 'active' : '' }}">
                    <span>👥</span> Clients
                </a>
                <a href="{{ route('dashboard.dossiers.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.dossiers.index') ? 'active' : '' }}">
                    <span>📁</span> Dossiers
                </a>
                <a href="{{ route('dashboard.finances.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.finances.index') ? 'active' : '' }}">
                    <span>💰</span> Finances
                </a>
                <a href="{{ route('dashboard.finances.devis') }}"
                    class="nav-link {{ request()->routeIs('dashboard.finances.devis') ? 'active' : '' }}">
                    <span>📜</span> Devis
                </a>

                <div class="nav-label" style="margin-top: 30px;">Outils</div>
                <a href="#" class="nav-link">
                    <span>📄</span> Documents
                </a>
                <a href="#" class="nav-link">
                    <span>⚙️</span> Paramètres
                </a>
            </nav>

            <div style="margin-top: auto; padding-top: 20px; border-top: 1px solid var(--glass-border);">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link"
                        style="width: 100%; background: none; border: none; cursor: pointer; text-align: left;">
                        <span>🚪</span> Déconnexion
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
    <script>
        // Close modals when clicking outside or pressing Escape
        window.onclick = function (event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal').forEach(m => m.style.display = 'none');
            }
        });
    </script>
</body>

</html>