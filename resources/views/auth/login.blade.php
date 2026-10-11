
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | OCTAGON</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f3f7f4;
            --card: #ffffff;
            --text: #17251d;
            --muted: #647368;
            --border: #d8e3da;
            --field: #ffffff;
            --green: #16834a;
            --green-hover: #116b3b;
            --shadow: 0 16px 45px rgba(20, 70, 40, .10);
        }

        html[data-theme="dark"] {
            color-scheme: dark;
            --bg: #111914;
            --card: #1b261f;
            --text: #f0f7f1;
            --muted: #b4c4b7;
            --border: #394a3d;
            --field: #121b15;
            --green: #36bd73;
            --green-hover: #52d58b;
            --shadow: 0 16px 45px rgba(0, 0, 0, .25);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 28px 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            line-height: 1.6;
            transition: background .2s, color .2s;
        }

        .page { width: 100%; max-width: 490px; }

        .topbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 14px;
        }

        .theme-button {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 11px 15px;
            background: var(--card);
            color: var(--text);
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .card {
            padding: 38px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: var(--shadow);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }

       .logo-icon {
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 15px;
    background: var(--card);
    border: 1px solid var(--border);
}

.logo-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 4px;
}

        .brand { font-size: 25px; font-weight: 900; letter-spacing: 1px; }
        .tagline { color: var(--muted); font-size: 13px; }

        h1 { margin: 0 0 7px; font-size: 30px; line-height: 1.3; }
        .subtitle { margin: 0 0 27px; color: var(--muted); font-size: 16px; }

        .field { margin-bottom: 21px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 700;
        }

        input {
            width: 100%;
            min-height: 56px;
            padding: 14px 15px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--field);
            color: var(--text);
            font-size: 17px;
            outline: none;
        }

        input:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px color-mix(in srgb, var(--green) 20%, transparent);
        }

        .password-wrap { position: relative; }
        .password-wrap input { padding-right: 82px; }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: var(--green);
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            padding: 8px 3px;
        }

        .submit {
            width: 100%;
            min-height: 57px;
            border: 0;
            border-radius: 12px;
            background: var(--green);
            color: #ffffff;
            font-size: 18px;
            font-weight: 800;
            cursor: pointer;
            margin-top: 5px;
        }

        .submit:hover { background: var(--green-hover); }

        .register {
            margin: 23px 0 0;
            text-align: center;
            font-size: 16px;
            color: var(--muted);
        }

        a { color: var(--green); font-weight: 700; text-decoration: none; }
        a:hover { text-decoration: underline; }

        .error {
            margin-bottom: 20px;
            padding: 13px 15px;
            border-radius: 10px;
            background: #fee8e7;
            color: #a32121;
            font-size: 15px;
        }

        html[data-theme="dark"] .error {
            background: #482624;
            color: #ffd6d2;
        }

        .footer {
            margin-top: 22px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }

        @media (max-width: 480px) {
            body { padding: 18px 12px; }
            .card { padding: 27px 21px; }
            h1 { font-size: 27px; }
        }
    </style>
    <script>
        (function () {
            try {
                const saved = localStorage.getItem('octagon-theme');
                document.documentElement.dataset.theme =
                    saved === 'dark' ? 'dark' : 'light';
            } catch (e) {
                document.documentElement.dataset.theme = 'light';
            }
        })();
    </script>
</head>
<body>
    <main class="page">
        <div class="topbar">
            <button type="button" class="theme-button" id="themeToggle">
                🌙 Mode Gelap
            </button>
        </div>

        <section class="card">
            <div class="logo">
                <div class="logo-icon">
                    <img src="{{ asset('images/octagon.jpeg') }}" alt="Logo OCTAGON">
                </div>
                <div>
                    <div class="brand">OCTAGON</div>
                    <div class="tagline">Sistem Pencatatan dan Audit UMKM</div>
                </div>
            </div>

            <h1>Selamat Datang!</h1>
            <p class="subtitle">Silakan masuk ke akun OCTAGON kamu.</p>

            @if ($errors->any())
                <div class="error" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <div class="field">
                    <label for="email">Alamat Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="password-wrap">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >
                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                            aria-pressed="false"
                        >Lihat</button>
                    </div>
                </div>

                <button type="submit" class="submit">Masuk ke OCTAGON</button>
            </form>

            <p class="register">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar Akun</a>
            </p>
        </section>

        <div class="footer">
            &copy; {{ date('Y') }} OCTAGON · Operational Control &amp; Transaction Audit
        </div>
    </main>

    <script>
        const themeToggle = document.getElementById('themeToggle');
        const root = document.documentElement;

        function updateThemeButton() {
            const dark = root.dataset.theme === 'dark';
            themeToggle.textContent = dark
                ? '☀️ Mode Terang'
                : '🌙 Mode Gelap';
        }

        themeToggle.addEventListener('click', function () {
            const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
            root.dataset.theme = next;

            try {
                localStorage.setItem('octagon-theme', next);
            } catch (e) {}

            updateThemeButton();
        });

        const password = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {
            const show = password.type === 'password';
            password.type = show ? 'text' : 'password';
            togglePassword.textContent = show ? 'Sembunyikan' : 'Lihat';
            togglePassword.setAttribute('aria-pressed', String(show));
            togglePassword.setAttribute(
                'aria-label',
                show ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });

        updateThemeButton();
    </script>
</body>
</html>
