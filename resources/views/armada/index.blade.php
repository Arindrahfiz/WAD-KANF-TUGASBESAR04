<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Armada Operasional</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-sidebar />

    <div class="konten">
        <div class="header">
            <h1>Armada Operasional</h1>
            <p>Kelola data forklift, troli, dan pick-up beserta status dan lokasi penempatannya.</p>
        </div>

        <div class="isi">
            @php $bisaKelola = in_array(auth()->user()->role, ['admin', 'petugas']); @endphp

            @if ($armada->isEmpty())
                <div class="kosong">
                    <h2>Belum ada data armada</h2>
                    @if ($bisaKelola)
                        <p>Mulai daftarkan armada pertama untuk operasional gudang.</p>
                        <a href="{{ route('armada.create') }}" class="tombol tombol-utama">Tambah Armada</a>
                    @endif
                </div>
            @else
                @if ($bisaKelola)
                    <a href="{{ route('armada.create') }}" class="tombol tombol-utama">+ Tambah Armada</a>
                @endif

                <table>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nomor Seri</th>
                        <th>Jenis</th>
                        <th>Merek / Model</th>
                        <th>Kapasitas</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        @if ($bisaKelola)
                            <th>Aksi</th>
                        @endif
                    </tr>
                    @foreach ($armada as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>ARM-{{ str_pad($a->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td><b>{{ $a->nomor_seri }}</b></td>
                        <td>{{ $a->jenis }}</td>
                        <td>{{ $a->merek_model }}</td>
                        <td>{{ number_format($a->kapasitas, 0, ',', '.') }} kg</td>
                        <td>{{ $a->lokasi }}</td>
                        <td>
                            @if ($a->status === 'Aktif')
                                <span class="aktif">Aktif</span>
                            @else
                                <span class="nonaktif">{{ $a->status }}</span>
                            @endif
                        </td>
                        @if ($bisaKelola)
                        <td>
                            <a href="{{ route('armada.edit', $a->id) }}" class="tombol tombol-abu tombol-kecil">Edit</a>
                            @if (auth()->user()->role === 'admin')
                            <form action="{{ route('armada.destroy', $a->id) }}" method="POST" style="display:inline"
                                  onsubmit="return confirm('Yakin ingin menghapus armada ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tombol tombol-merah tombol-kecil">Hapus</button>
                            </form>
                            @endif
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
