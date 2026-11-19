<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $barang->exists ? 'Edit' : 'Tambah' }} Barang</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-sidebar />

    <div class="konten">
        <div class="header">
            <h1>{{ $barang->exists ? 'Edit Data Barang' : 'Tambah Data Barang' }}</h1>
            <p>Isi formulir dibawah untuk mengisi data</p>
        </div>

        <div class="isi">
            <form method="POST" class="form"
                  action="{{ $barang->exists ? route('barang.update', $barang->id_barang) : route('barang.store') }}">
                @csrf
                @if ($barang->exists)
                    @method('PUT')
                @endif

                @if ($errors->any())
                    <div class="error">{{ $errors->first() }}</div>
                @endif

                <div class="baris">
                    <div class="kolom">
                        <label>Kode Barang</label>
                        <input type="text" value="Otomatis oleh sistem" disabled>
                    </div>
                    <div class="kolom">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang"
                               value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                    </div>
                </div>

                <div class="baris">
                    <div class="kolom">
                        <label>Spesifikasi</label>
                        <textarea name="spesifikasi">{{ old('spesifikasi', $barang->spesifikasi) }}</textarea>
                    </div>
                    <div class="kolom">
                        <label>Warna</label>
                        <input type="text" name="warna" value="{{ old('warna', $barang->warna) }}">
                    </div>
                </div>

                <div class="baris">
                    <div class="kolom">
                        <label>Kategori</label>
                        <select name="id_kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $k)
                                <option value="{{ $k->id_kategori }}"
                                    {{ old('id_kategori', $barang->id_kategori) == $k->id_kategori ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="kolom">
                        <label>Satuan</label>
                        <select name="satuan" required>
                            <option value="">-- Pilih Satuan --</option>
                            @foreach ($daftar_satuan as $s)
                                <option value="{{ $s }}" {{ old('satuan', $barang->satuan) === $s ? 'selected' : '' }}>
                                    {{ $s }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="tombol-area">
                    <button type="submit" class="tombol tombol-utama">Simpan Barang</button>
                    <a href="{{ route('barang.index') }}" class="tombol tombol-abu">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
