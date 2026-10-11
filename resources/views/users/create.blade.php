<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna | OCTAGON</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 16px;
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
        }

        .container {
            max-width: 650px;
            margin: 25px auto;
        }

        .card {
            padding: 28px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .04);
        }

        h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .subtitle {
            margin: 0 0 25px;
            color: #64748b;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
            color: #1f2937;
            font-size: 15px;
        }

        input:focus, select:focus {
            outline: 2px solid #bbf7d0;
            border-color: #16834a;
        }

        .hint {
            margin-top: 6px;
            color: #64748b;
            font-size: 12px;
        }

        .error-text {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .alert {
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 8px;
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            padding: 12px 17px;
            border: 0;
            border-radius: 8px;
            background: #16834a;
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background: #116b3b;
        }

        .button-secondary {
            background: #64748b;
        }

        .button-secondary:hover {
            background: #475569;
        }

        @media (max-width: 480px) {
            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .actions .button {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        <section class="card">
            <h1>Tambah Pengguna</h1>

            <p class="subtitle">
                Buat akun baru dan tentukan hak aksesnya di OCTAGON.
            </p>

            @if ($errors->any())
                <div class="alert">
                    <strong>Data belum bisa disimpan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        maxlength="255"
                        required
                    >
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        maxlength="255"
                        required
                    >
                    @error('email')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        minlength="8"
                        required
                    >
                    <p class="hint">
                        Gunakan password minimal 8 karakter.
                    </p>
                    @error('password')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">Role Pengguna</label>
                    <select id="role" name="role" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" @selected(old('role') === 'admin')>
                            Admin
                        </option>
                        <option value="pemilik" @selected(old('role') === 'pemilik')>
                            Pemilik
                        </option>
                        <option value="kasir" @selected(old('role') === 'kasir')>
                            Kasir
                        </option>
                    </select>
                    @error('role')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <a href="{{ route('users.index') }}"
                       class="button button-secondary">
                        Batal
                    </a>

                    <button type="submit" class="button">
                        Simpan Pengguna
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
