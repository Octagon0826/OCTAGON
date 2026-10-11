<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Pengguna | OCTAGON</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            margin: 0;
            color: #64748b;
        }

        .button {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            background: #16834a;
            color: white;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .button:hover {
            background: #116b3b;
        }

        .button-secondary {
            background: #64748b;
        }

        .button-danger {
            background: #dc2626;
        }

        .panel {
            overflow-x: auto;
            padding: 20px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        .alert {
            margin-bottom: 16px;
            padding: 12px 15px;
            border-radius: 8px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f8fafc;
            font-size: 13px;
        }

        td {
            font-size: 14px;
        }

        .role {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .actions form {
            margin: 0;
        }

        .empty {
            padding: 30px;
            text-align: center;
            color: #64748b;
        }

        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        @media (max-width: 600px) {
            .container {
                margin-top: 24px;
            }

            h1 {
                font-size: 23px;
            }

            .panel {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        <header class="header">
            <div>
                <h1>Management Pengguna</h1>
                <p class="subtitle">
                    Kelola akun dan hak akses pengguna OCTAGON.
                </p>
            </div>

            <div>
                <a href="{{ route('dashboard') }}"
                   class="button button-secondary">
                    Kembali ke Dashboard
                </a>

                <a href="{{ route('users.create') }}" class="button">
                    + Tambah Pengguna
                </a>
            </div>
        </header>

        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="role">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->created_at?->format('d-m-Y') ?? '-' }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('users.edit', $user) }}"
                                       class="button">
                                        Edit
                                    </a>

                                    @if ($user->id !== auth()->id())
                                        <form
                                            action="{{ route('users.destroy', $user) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="button button-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada data pengguna.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="footer">
                <span>
                    Total pengguna: <strong>{{ $users->total() }}</strong>
                </span>

                {{ $users->links() }}
            </div>
        </section>
    </main>
</body>
</html>
