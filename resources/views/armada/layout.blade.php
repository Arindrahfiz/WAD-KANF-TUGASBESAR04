<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul') - Modul Armada Operasional</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

{{-- sidebar bersama semua modul (Vendor, Barang, Armada) --}}
<x-sidebar />

<div class="konten">
    <div class="header">
        <h1>@yield('judul')</h1>
        <p>@yield('deskripsi', 'Sistem Informasi Inventaris Gudang')</p>
    </div>

    <div class="isi">
        @if (session('sukses'))
            <div class="sukses">{{ session('sukses') }}</div>
        @endif

        @if (session('gagal'))
            <div class="error">{{ session('gagal') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('isi')
    </div>
</div>

</body>
</html>
