@extends('armada.layout')

@section('judul', 'Tambah Armada')

@section('isi')
  <div class="form">
    <h3>Tambah Armada</h3>

    <form action="{{ route('armada.store') }}" method="post">
      @csrf
      <div class="baris">
        <div class="kolom">
          <label>Nomor Seri</label>
          <input type="text" name="nomor_seri" value="{{ old('nomor_seri') }}" required>
        </div>
        <div class="kolom">
          <label>Jenis Kendaraan</label>
          <select name="jenis">
            @foreach (['Forklift', 'Troli', 'Pick-up'] as $j)
              <option value="{{ $j }}" {{ old('jenis') == $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="baris">
        <div class="kolom">
          <label>Merek / Model</label>
          <input type="text" name="merek_model" value="{{ old('merek_model') }}" required>
        </div>
        <div class="kolom">
          <label>Kapasitas Angkut (kg)</label>
          <input type="number" name="kapasitas" value="{{ old('kapasitas') }}" required>
        </div>
      </div>

      <div class="baris">
        <div class="kolom">
          <label>Lokasi Penempatan</label>
          <input type="text" name="lokasi" value="{{ old('lokasi') }}" required>
        </div>
        <div class="kolom">
          <label>Status</label>
          <select name="status">
            @foreach (['Aktif', 'Maintenance', 'Rusak'] as $s)
              <option value="{{ $s }}" {{ old('status') == $s ? 'selected' : '' }}>{{ $s }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="tombol-area">
        <button type="submit" class="tombol tombol-utama">Simpan</button>
        <a href="{{ route('armada.index') }}" class="tombol tombol-abu">Batal</a>
      </div>
    </form>
  </div>
@endsection
