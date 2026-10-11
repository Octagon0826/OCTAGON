
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | OCTAGON</title>

    <script>
        (function () {
            try {
                document.documentElement.dataset.theme =
                    localStorage.getItem('octagon-theme') === 'dark'
                        ? 'dark' : 'light';
            } catch (e) {
                document.documentElement.dataset.theme = 'light';
            }
        })();
    </script>

    <style>
        :root {
            color-scheme: light;
            --bg: #f3f7f4;
            --surface: #ffffff;
            --sidebar: #16834a;
            --text: #17251d;
            --muted: #617267;
            --border: #dce6de;
            --green: #16834a;
            --green-hover: #116b3b;
            --green-soft: #e6f5eb;
            --shadow: 0 5px 22px rgba(20, 70, 40, .06);
        }

        html[data-theme="dark"] {
            color-scheme: dark;
            --bg: #111914;
            --surface: #1b261f;
            --sidebar: #17211a;
            --text: #f0f7f1;
            --muted: #b4c4b7;
            --border: #35483a;
            --green: #36bd73;
            --green-hover: #52d58b;
            --green-soft: #263d2e;
            --shadow: 0 5px 22px rgba(0, 0, 0, .12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            line-height: 1.65;
            transition: background .2s, color .2s;
        }

        button, input {
            font: inherit;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            width: 270px;
            flex-shrink: 0;
            padding: 28px 20px;
            background: var(--sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .brand {
    color: #ffffff;
    text-align: center;
    padding: 8px 0 27px;
    border-bottom: 1px solid rgba(255, 255, 255, .25);
}

        .brand-logo {
            width: 104px;
            height: 104px;
            margin: 0 auto 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 20px;
            background: var(--surface);
            border: 1px solid var(--border);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 5px;
        }

        .brand-name {
            font-size: 27px;
            line-height: 1.35;
            font-weight: 900;
            letter-spacing: 1.5px;
        }

        .brand-caption {
            margin-top: 5px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .nav-title {
            margin: 26px 10px 12px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 12px;
            color: var(--text);
            font-size: 16px;
            font-weight: 700;
        }

        .nav-item.active {
            background: var(--green-soft);
            color: var(--green);
        }

        .nav-icon {
            width: 27px;
            flex-shrink: 0;
            text-align: center;
            font-size: 21px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .account-box {
            padding: 15px;
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow-wrap: anywhere;
        }

        .account-name {
            font-weight: 800;
            font-size: 16px;
        }

        .account-role {
            display: inline-block;
            margin-top: 5px;
            padding: 3px 10px;
            border-radius: 20px;
            background: var(--green-soft);
            color: var(--green);
            font-size: 13px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .logout {
            width: 100%;
            margin-top: 13px;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: var(--surface);
            color: var(--text);
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
        }

        .logout:hover {
            border-color: var(--green);
            color: var(--green);
        }

        /* MAIN CONTENT */

        .main {
            min-width: 0;
            flex: 1;
            padding: 32px 38px 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 30px;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 15px;
        }

        .topbar h1 {
            margin: 3px 0 0;
            font-size: 30px;
            line-height: 1.4;
        }

        .theme-button {
            flex-shrink: 0;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--surface);
            color: var(--text);
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
        }

        .theme-button:hover {
            border-color: var(--green);
        }

        .welcome {
            padding: 28px 30px;
            border-radius: 20px;
            background: var(--green);
            color: #ffffff;
            margin-bottom: 30px;
        }

        .welcome-label {
            font-size: 15px;
            opacity: .95;
        }

        .welcome h2 {
            margin: 5px 0 7px;
            font-size: 29px;
            line-height: 1.4;
        }

        .welcome p {
            margin: 0;
            max-width: 720px;
            font-size: 16px;
            line-height: 1.7;
        }

        .section-title {
            margin: 0 0 5px;
            font-size: 23px;
            line-height: 1.5;
        }

        .section-description {
            margin: 0 0 21px;
            color: var(--muted);
            font-size: 16px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 34px;
        }

        .stat-card {
            min-height: 150px;
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: var(--surface);
            box-shadow: var(--shadow);
        }

        .stat-top {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 13px;
            background: var(--green-soft);
            font-size: 24px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 16px;
            font-weight: 700;
        }

        .stat-number {
            font-size: 34px;
            line-height: 1.35;
            font-weight: 900;
            overflow-wrap: anywhere;
        }

        .modules {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .module-card {
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--surface);
        }

        .module-icon {
            margin-bottom: 10px;
            font-size: 27px;
        }

        .module-card h3 {
            margin: 0 0 5px;
            font-size: 18px;
        }

        .module-card p {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .notice {
            margin-bottom: 24px;
            padding: 14px 17px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--surface);
            font-size: 15px;
        }

        .footer {
            margin-top: 35px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 13px;
            text-align: center;
        }

        .sidebar .nav-title {
    color: rgba(255, 255, 255, .75);
}

.sidebar .nav-item {
    color: #ffffff;
}

.sidebar .nav-item.active {
    background: rgba(255, 255, 255, .18);
    color: #ffffff;
}

.sidebar .account-box {
    border-color: rgba(255, 255, 255, .3);
    color: #ffffff;
}

.sidebar .account-role {
    background: #ffffff;
    color: #16834a;
}

.sidebar .logout {
    border-color: rgba(255, 255, 255, .4);
    background: transparent;
    color: #ffffff;
}

.sidebar .logout:hover {
    background: rgba(255, 255, 255, .14);
    border-color: #ffffff;
}

        @media (min-width: 1400px) {
            .main {
                padding: 40px 52px;
            }

            .stats {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .modules {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 230px;
                padding: 22px 14px;
            }

            .main {
                padding: 25px 22px;
            }

            .brand-logo {
                width: 86px;
                height: 86px;
            }

            .topbar h1 {
                font-size: 26px;
            }
        }

        @media (max-width: 650px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                display: flex;
                align-items: center;
                gap: 15px;
                text-align: left;
                padding: 0 0 17px;
            }

            .brand-logo {
                width: 66px;
                height: 66px;
                flex-shrink: 0;
                margin: 0;
                border-radius: 13px;
            }

            .brand-name {
                font-size: 23px;
            }

            .nav-title {
                margin-top: 17px;
            }

            .sidebar-bottom {
                margin-top: 10px;
                padding-top: 10px;
            }

            .main {
                padding: 22px 16px 30px;
            }

            .topbar {
                align-items: flex-start;
                flex-wrap: wrap;
                margin-bottom: 22px;
            }

            .topbar h1 {
                font-size: 25px;
            }

            .theme-button {
                padding: 10px 12px;
            }

            .welcome {
                padding: 23px 20px;
            }

            .welcome h2 {
                font-size: 25px;
            }

            .stats,
            .modules {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .stat-card {
                min-height: auto;
                padding: 20px;
            }

            .stat-number {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
    @php
        $role = $user->role ?? 'kasir';
        $name = $user->name ?? 'Pengguna OCTAGON';
    @endphp

    <div class="layout">

        <aside class="sidebar">
            <div class="brand">
                <div class="brand-logo">
                    <img src="{{ asset('images/octagon.jpeg') }}"
                         alt="Logo OCTAGON">
                </div>

                <div>
                    <div class="brand-name">OCTAGON</div>
                    <div class="brand-caption">
                        Sistem Pencatatan dan Audit UMKM
                    </div>
                </div>
            </div>

            <div class="nav-title">Menu Utama</div>

            <div class="nav-item active">
                <span class="nav-icon">▦</span>
                <span>Dashboard</span>
            </div>

            @if ($role === 'admin')
                <div class="nav-item">
                    <span class="nav-icon">♙</span>
                    <span>Manajemen Pengguna</span>
                </div>
            @endif

            @if (in_array($role, ['admin', 'pemilik']))
                <div class="nav-item">
                    <span class="nav-icon">▤</span>
                    <span>Audit Stok</span>
                </div>

                <div class="nav-item">
                    <span class="nav-icon">▥</span>
                    <span>Laporan Transaksi</span>
                </div>
            @endif

            @if (in_array($role, ['admin', 'pemilik', 'kasir']))
                <div class="nav-item">
                    <span class="nav-icon">▣</span>
                    <span>Data Produk</span>
                </div>

                <div class="nav-item">
                    <span class="nav-icon">＋</span>
                    <span>Transaksi</span>
                </div>
            @endif

            <div class="sidebar-bottom">
                <div class="account-box">
                    <div class="account-name">{{ $name }}</div>
                    <span class="account-role">{{ $role }}</span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout" type="submit">
                        ↪ Keluar dari Akun
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div>
                    <div class="breadcrumb">OCTAGON / Dashboard</div>
                    <h1>Dashboard Utama</h1>
                </div>

                <button type="button" class="theme-button" id="themeToggle">
                    Mode Gelap
                </button>
            </header>

            @if (session('success'))
                <div class="notice">
                    {{ session('success') }}
                </div>
            @endif

            <section class="welcome">
                <div class="welcome-label">Selamat datang kembali,</div>
                <h2>{{ $name }}!</h2>

                @if ($role === 'admin')
                    <p>
                        Kamu masuk sebagai Administrator. Kelola pengguna
                        dan pantau data operasional OCTAGON melalui dashboard.
                    </p>
                @elseif ($role === 'pemilik')
                    <p>
                        Pantau stok, transaksi, dan hasil audit usaha
                        melalui dashboard OCTAGON.
                    </p>
                @else
                    <p>
                        Selamat bekerja! Kamu dapat memulai aktivitas
                        operasional sesuai akses akunmu.
                    </p>
                @endif
            </section>

            <section>
                <h2 class="section-title">Ringkasan Data</h2>
                <p class="section-description">
                    Ikhtisar data yang tersimpan di sistem OCTAGON.
                </p>

                <div class="stats">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div class="stat-icon">▣</div>
                            <div class="stat-label">Total Produk</div>
                        </div>
                        <div class="stat-number">
                            {{ number_format($statistics['products'] ?? 0) }}
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-top">
                            <div class="stat-icon">▤</div>
                            <div class="stat-label">Total Transaksi</div>
                        </div>
                        <div class="stat-number">
                            {{ number_format($statistics['transactions'] ?? 0) }}
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-top">
                            <div class="stat-icon">✓</div>
                            <div class="stat-label">Total Audit Stok</div>
                        </div>
                        <div class="stat-number">
                            {{ number_format($statistics['audits'] ?? 0) }}
                        </div>
                    </div>

                    @if ($role === 'admin')
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon">♙</div>
                                <div class="stat-label">Total Pengguna</div>
                            </div>
                            <div class="stat-number">
                                {{ number_format($statistics['users'] ?? 0) }}
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <section>
                <h2 class="section-title">Modul Operasional</h2>
                <p class="section-description">
                    Fitur OCTAGON yang tersedia sesuai peran akunmu.
                </p>

                <div class="modules">
                    @if ($role === 'admin')
                        <article class="module-card">
                            <div class="module-icon">♙</div>
                            <h3>Manajemen Pengguna</h3>
                            <p>
                                Kelola akun dan peran pengguna sistem.
                            </p>
                        </article>
                    @endif

                    <article class="module-card">
                        <div class="module-icon">▣</div>
                        <h3>Pengelolaan Produk</h3>
                        <p>
                            Ringkasan data produk dan stok usaha.
                        </p>
                    </article>

                    <article class="module-card">
                        <div class="module-icon">＋</div>
                        <h3>Pencatatan Transaksi</h3>
                        <p>
                            Catat aktivitas transaksi penjualan.
                        </p>
                    </article>

                    @if (in_array($role, ['admin', 'pemilik']))
                        <article class="module-card">
                            <div class="module-icon">✓</div>
                            <h3>Audit Stok</h3>
                            <p>
                                Pantau pemeriksaan dan pencocokan stok.
                            </p>
                        </article>

                        <article class="module-card">
                            <div class="module-icon">▤</div>
                            <h3>Laporan Transaksi</h3>
                            <p>
                                Tinjau riwayat transaksi untuk kebutuhan audit.
                            </p>
                        </article>
                    @endif
                </div>
            </section>

            <footer class="footer">
                &copy; {{ date('Y') }} OCTAGON
                · Operational Control &amp; Transaction Audit
            </footer>
        </main>
    </div>

    <script>
        const root = document.documentElement;
        const themeToggle = document.getElementById('themeToggle');

        function updateThemeButton() {
            themeToggle.textContent =
                root.dataset.theme === 'dark'
                    ? '☀️ Mode Terang'
                    : '🌙 Mode Gelap';
        }

        themeToggle.addEventListener('click', function () {
            const nextTheme =
                root.dataset.theme === 'dark' ? 'light' : 'dark';

            root.dataset.theme = nextTheme;

            try {
                localStorage.setItem('octagon-theme', nextTheme);
            } catch (e) {}

            updateThemeButton();
        });

        updateThemeButton();
    </script>
</body>
</html>
