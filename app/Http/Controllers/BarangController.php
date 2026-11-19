<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    private $daftar_satuan = ['Unit', 'Box', 'Pcs'];

    // tampil semua data
    public function index()
    {
        $barangs = Barang::with('kategori')->orderByDesc('id_barang')->get();
        return view('barang.index', compact('barangs'));
    }

    // form tambah
    public function create()
    {
        return $this->form(new Barang());
    }

    // simpan data baru
    public function store(Request $request)
    {
        Barang::create($this->validasi($request));
        return redirect()->route('barang.index');
    }

    // form edit
    public function edit(Barang $barang)
    {
        return $this->form($barang);
    }

    // simpan perubahan
    public function update(Request $request, Barang $barang)
    {
        $barang->update($this->validasi($request));
        return redirect()->route('barang.index');
    }

    // hapus data
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index');
    }

    // form tambah & edit memakai view yang sama
    private function form(Barang $barang)
    {
        return view('barang.form', [
            'barang'        => $barang,
            'kategoris'     => Kategori::orderBy('nama_kategori')->get(),
            'daftar_satuan' => $this->daftar_satuan,
        ]);
    }

    // validasi dipakai bersama oleh store dan update
    private function validasi(Request $request)
    {
        return $request->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'nullable',
            'warna'       => 'nullable',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'satuan'      => 'required|in:' . implode(',', $this->daftar_satuan),
        ]);
    }
}
