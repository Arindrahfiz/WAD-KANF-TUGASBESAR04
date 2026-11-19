<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArmadaController extends Controller
{
    public function index()
    {
        $armada = Armada::orderByDesc('id')->get();

        return view('armada.index', compact('armada'));
    }

    public function create()
    {
        return view('armada.create');
    }

    public function store(Request $request)
    {
        Armada::create($this->validasi($request));

        return redirect()->route('armada.index')->with('sukses', 'Data armada berhasil ditambah');
    }

    public function edit(Armada $armada)
    {
        return view('armada.edit', compact('armada'));
    }

    public function update(Request $request, Armada $armada)
    {
        $armada->update($this->validasi($request, $armada));

        return redirect()->route('armada.index')->with('sukses', 'Data armada berhasil diubah');
    }

    public function destroy(Armada $armada)
    {
        $armada->delete();

        return redirect()->route('armada.index')->with('sukses', 'Data armada berhasil dihapus');
    }

    // validasi dipakai bersama oleh store dan update
    private function validasi(Request $request, ?Armada $armada = null): array
    {
        return $request->validate([
            'nomor_seri'  => ['required', Rule::unique('armada', 'nomor_seri')->ignore($armada?->id)],
            'jenis'       => 'required|in:Forklift,Troli,Pick-up',
            'merek_model' => 'required',
            'kapasitas'   => 'required|numeric|min:1',
            'lokasi'      => 'required',
            'status'      => 'required|in:Aktif,Maintenance,Rusak',
        ]);
    }
}
