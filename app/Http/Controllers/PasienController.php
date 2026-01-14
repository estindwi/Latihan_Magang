<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Http\Requests\PasienRequest;
use App\Http\Requests\UpdatePasienRequest;

class PasienController extends Controller
{
    // tampil data + search
    public function index(Request $request)
    {
        $search = $request->search;

        $pasiens = Pasien::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        })->orderBy('nama')->get();

        return view('pasien.index', compact('pasiens'));
    }

    // form tambah pasien
    public function create()
    {
        return view('pasien.create');
    }

    // simpan data (pakai PasienRequest)
    public function store(PasienRequest $request)
    {
        Pasien::create($request->validated());

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan');
    }

    // form edit pasien
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    // update data (pakai UpdatePasienRequest)
    public function update(UpdatePasienRequest $request, string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->validated());

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui');
    }

    // detail pasien (opsional)
    public function show(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.show', compact('pasien'));
    }

    // hapus data
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil dihapus');
    }
}
