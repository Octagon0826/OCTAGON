
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | OCTAGON</title>
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
            --hover: #116b3b;
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
            --hover: #52d58b;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            padding: 24px 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            color: var(--text);
            font: 17px/1.6 Arial, sans-serif;
        }
        .page { width: 100%; max-width: 510px; }
        .topbar { display: flex; justify-content: flex-end; margin-bottom: 12px; }
        button, input { font: inherit; }
        .theme {
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--card);
            color: var(--text);
            cursor: pointer;
        }
        .card {
            padding: 36px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 22px;
        }
        .brand { color: var(--green); font-size: 27px; font-weight: 900; letter-spacing: 1px; }
        h1 { margin: 18px 0 4px; font-size: 30px; }
        .muted { color: var(--muted); margin: 0 0 24px; }
        label { display: block; margin-bottom: 7px; font-weight: 700; }
        .field { margin-bottom: 18px; }
        input {
            width: 100%;
            min-height: 54px;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: var(--field);
            color: var(--text);
        }
        input:focus { outline: 2px solid var(--green); outline-offset: 1px; }
        .password { position: relative; }
        .password input { padding-right: 100px; }
        .toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: var(--green);
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }
        .submit {
            width: 100%;
            min-height: 56px;
            border: 0;
            border-radius: 11px;
            background: var(--green);
            color: white;
            font-weight: 800;
            cursor: pointer;
        }
        .submit:hover { background: var(--hover); }
        .errors {
            margin-bottom: 18px;
            padding: 12px 15px;
            border-radius: 10px;
            background: #fee8e7;
            color: #a32121;
        }
        html[data-theme="dark"] .errors { background: #482624; color: #ffd6d2; }
        .bottom { text-align: center; margin: 22px 0 0; color: var(--muted); }
        a { color: var(--green); font-weight: bold; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .footer { text-align: center; color: var(--muted); font-size: 13px; margin-top: 18px; }
        @media(max-width: 480px) { .card { padding: 25px 20px; } h1 { font-size: 26px; } }
    </style>
    <script>
        (function () {
            try {
                document.documentElement.dataset.theme =
                    localStorage.getItem('octagon-theme') === 'dark' ? 'dark' : 'light';
            } catch (e) {
                document.documentElement.dataset.theme = 'light';
            }
        })();
    </script>
</head>
<body>
    <main class="page">
        <div class="topbar">
            <button class="theme" type="button" id="themeToggle">🌙 Mode Gelap</button>
        </div>

        <section class="card">
            <div class="brand">OCTAGON</div>
            <h1>Buat Akun Baru</h1>
            <p class="muted">Daftar untuk mulai menggunakan OCTAGON.</p>

            @if ($errors->any())
                <div class="errors" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register.process') }}">
                @csrf

                <div class="field">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" name="name" type="text"
                           value="{{ old('name') }}" autocomplete="name"
                           placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="field">
                    <label for="email">Alamat Email</label>
                    <input id="email" name="email" type="email"
                           value="{{ old('email') }}" autocomplete="email"
                           placeholder="contoh@email.com" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="password">
                        <input id="password" name="password" type="password"
                               minlength="8" autocomplete="new-password"
                               placeholder="Minimal 8 karakter" required>
                        <button type="button" class="toggle"
                                data-target="password">Lihat</button>
                    </div>
                </div>

                <div class="field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="password">
                        <input id="password_confirmation"
                               name="password_confirmation" type="password"
                               minlength="8" autocomplete="new-password"
                               placeholder="Ketik ulang password" required>
                        <button type="button" class="toggle"
                                data-target="password_confirmation">Lihat</button>
                    </div>
                </div>

                <button class="submit" type="submit">Daftar Akun</button>
            </form>

            <p class="bottom">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </p>
        </section>

        <div class="footer">OCTAGON · Sistem Pencatatan dan Audit UMKM</div>
    </main>

    <script>
        const root = document.documentElement;
        const themeToggle = document.getElementById('themeToggle');

        function updateThemeButton() {
            themeToggle.textContent = root.dataset.theme === 'dark'
                ? '☀️ Mode Terang'
                : '🌙 Mode Gelap';
        }

        themeToggle.addEventListener('click', function () {
            root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
            try {
                localStorage.setItem('octagon-theme', root.dataset.theme);
            } catch (e) {}
            updateThemeButton();
        });

        document.querySelectorAll('.toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = document.getElementById(button.dataset.target);
                const show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                button.textContent = show ? 'Sembunyikan' : 'Lihat';
            });
        });

        updateThemeButton();
    </script>
</body>
</html>
