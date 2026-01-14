<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->search;

    $pasiens = Pasien::when($search, function ($query, $search) {
        $query->where('nama', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%");
    })->orderBy('nama')->get();

    return view('pasien.index', compact('pasiens'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nik'           => 'required|unique:pasiens',
        'nama'          => 'required',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tempat_lahir'  => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat'        => 'required',
        'no_hp'         => 'required'
    ]);

    Pasien::create([
        'nik'           => $request->nik,
        'nama'          => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tempat_lahir'  => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'alamat'        => $request->alamat,
        'no_hp'         => $request->no_hp,
    ]);

    return redirect()->route('pasien.index')
                     ->with('success', 'Data pasien berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('pasien.index')
                         ->with('success', 'Data pasien berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $pasien = Pasien::findOrFail($id);

    $validated = $request->validate([
        'nik'           => 'required|unique:pasiens,nik,' . $id,
        'nama'          => 'required',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tempat_lahir'  => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat'        => 'required',
        'no_hp'         => 'required',
    ]);

    $pasien->update($validated);

    return redirect()->route('pasien.index')
                     ->with('success', 'Data pasien berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')
                         ->with('success', 'Data pasien berhasil dihapus');
    }
}
