<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekamMedis = RekamMedis::with(['pasien', 'dokter'])->latest()->get();
    return view('rekam_medis.index', compact('rekamMedis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Pasien::orderBy('nama')->get();
    $dokters = Dokter::orderBy('nama')->get();

    return view('rekam_medis.create', compact('pasiens','dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'pasien_id' => 'required|exists:pasiens,id',
        'dokter_id' => 'required|exists:dokters,id',
        'tanggal_periksa' => 'required|date',
        'keluhan' => 'nullable|string',
        'diagnosa' => 'nullable|string|max:255',
    ]);

    RekamMedis::create($validated);

    return redirect()->route('rekam-medis.index')->with('success','Rekam medis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $pasiens = Pasien::orderBy('nama')->get();
        $dokters = Dokter::orderBy('nama')->get();

    return view('rekam_medis.edit', compact('rekamMedis','pasiens','dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);

    $validated = $request->validate([
        'pasien_id' => 'required|exists:pasiens,id',
        'dokter_id' => 'required|exists:dokters,id',
        'tanggal_periksa' => 'required|date',
        'keluhan' => 'nullable|string',
        'diagnosa' => 'nullable|string|max:255',
    ]);

    $rekamMedis->update($validated);

    return redirect()->route('rekam-medis.index')->with('success','Rekam medis berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RekamMedis::findOrFail($id)->delete();
    return redirect()->route('rekam-medis.index')->with('success','Rekam medis berhasil dihapus');
    }
}
