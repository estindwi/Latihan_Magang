<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Http\Requests\DokterRequest;
use App\Http\Requests\UpdateDokterRequest;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $dokters = Dokter::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                      ->orWhere('spesialis', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(DokterRequest $request)
    {
        Dokter::create($request->validated());

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(UpdateDokterRequest $request, string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->validated());

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil dihapus');
    }

    public function show(string $id)
    {
        return redirect()->route('dokter.index');
    }
}
