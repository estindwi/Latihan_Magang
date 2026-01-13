<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'spesialis' => 'nullable|string|max:255',
        ]);
         Dokter::create($validated);

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          return redirect()->route('dokter.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokter = Dokter::findOrFail($id);

        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'spesialis' => 'nullable|string|max:255',
        ]);
         $dokter->update($validated);

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil dihapus');
    }
}
