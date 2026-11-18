<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Inventaris</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .login-wrap {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            background-color: var(--putih);
            border-radius: var(--radius);
            box-shadow: var(--bayangan);
            padding: 32px 28px;
        }
        .login-brand {
            font-size: 22px;
            font-weight: bold;
            color: var(--hijau-tua);
            margin: 0 0 4px 0;
        }
        .login-sub {
            margin: 0 0 24px 0;
            color: var(--teks-abu);
            font-size: 14px;
        }
        .login-box .kolom:last-of-type { margin-bottom: 8px; }
        .login-box .tombol { width: 100%; margin-top: 12px; }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-box">
            <h1 class="login-brand">Inventaris</h1>
            <p class="login-sub">Silakan masuk untuk melanjutkan.</p>

            @if ($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="kolom">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           placeholder="nama@email.com" required autofocus>
                </div>

                <div class="kolom">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="tombol tombol-utama">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>