@extends('armada.layout')

@section('judul', 'Edit Armada')

@section('isi')
  <div class="form">
    <h3>Edit Armada</h3>

    <form action="{{ route('armada.update', $armada) }}" method="post">
      @csrf
      @method('PUT')
      <div class="baris">
        <div class="kolom">
          <label>Nomor Seri</label>
          <input type="text" name="nomor_seri" value="{{ old('nomor_seri', $armada->nomor_seri) }}" required>
        </div>
        <div class="kolom">
          <label>Jenis Kendaraan</label>
          <select name="jenis">
            @foreach (['Forklift', 'Troli', 'Pick-up'] as $j)
              <option value="{{ $j }}" {{ old('jenis', $armada->jenis) == $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="baris">
        <div class="kolom">
          <label>Merek / Model</label>
          <input type="text" name="merek_model" value="{{ old('merek_model', $armada->merek_model) }}" required>
        </div>
        <div class="kolom">
          <label>Kapasitas Angkut (kg)</label>
          <input type="number" name="kapasitas" value="{{ old('kapasitas', $armada->kapasitas) }}" required>
        </div>
      </div>

      <div class="baris">
        <div class="kolom">
          <label>Lokasi Penempatan</label>
          <input type="text" name="lokasi" value="{{ old('lokasi', $armada->lokasi) }}" required>
        </div>
        <div class="kolom">
          <label>Status</label>
          <select name="status">
            @foreach (['Aktif', 'Maintenance', 'Rusak'] as $s)
              <option value="{{ $s }}" {{ old('status', $armada->status) == $s ? 'selected' : '' }}>{{ $s }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="tombol-area">
        <button type="submit" class="tombol tombol-utama">Update</button>
        <a href="{{ route('armada.index') }}" class="tombol tombol-abu">Batal</a>
      </div>
    </form>
  </div>
@endsection
