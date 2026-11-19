<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Barang</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-sidebar />

    <div class="konten">
        <div class="header">
            <h1>Katalog Barang</h1>
            <p>Kelola data barang gudang beserta kategori dan satuannya.</p>
        </div>

        <div class="isi">
            @if ($barangs->isEmpty())
                <div class="kosong">
                    <h2>Belum ada data barang</h2>
                    @if (auth()->user()->role === 'admin')
                        <p>Mulai tambahkan barang pertama ke katalog gudang.</p>
                        <a href="{{ route('barang.create') }}" class="tombol tombol-utama">Tambah Barang</a>
                    @endif
                </div>
            @else
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('barang.create') }}" class="tombol tombol-utama">+ Tambah Barang</a>
                @endif

                <table>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Warna</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        @if (auth()->user()->role === 'admin')
                            <th>Aksi</th>
                        @endif
                    </tr>
                    @foreach ($barangs as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>BRG-{{ str_pad($b->id_barang, 3, '0', STR_PAD_LEFT) }}</td>
                        <td><b>{{ $b->nama_barang }}</b></td>
                        <td>{{ $b->spesifikasi }}</td>
                        <td>{{ $b->warna }}</td>
                        <td>{{ $b->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $b->satuan }}</td>
                        @if (auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('barang.edit', $b->id_barang) }}" class="tombol tombol-abu tombol-kecil">Edit</a>
                            <form action="{{ route('barang.destroy', $b->id_barang) }}" method="POST" style="display:inline"
                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tombol tombol-merah tombol-kecil">Hapus</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</body>
</html>
