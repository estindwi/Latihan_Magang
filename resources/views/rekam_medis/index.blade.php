@extends('layouts.app')

@section('title', 'Data Rekam Medis')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Rekam Medis</h1>
        <a href="{{ route('rekam-medis.create') }}"
           class="bg-green-700 hover:bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Rekam Medis
        </a>
    </div>

    @if (session('success'))
        <div class="mb-3 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 text-sm">
            <thead class="bg-green-100 text-gray-700">
                <tr>
                    <th class="border p-2 text-center">No</th>
                    <th class="border p-2">Pasien</th>
                    <th class="border p-2">Dokter</th>
                    <th class="border p-2">Spesialis</th>
                    <th class="border p-2 text-center">Tanggal</th>
                    <th class="border p-2">Diagnosa</th>
                    <th class="border p-2 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($rekamMedis as $r)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>

                    <td class="border p-2 font-medium">
                        {{ $r->pasien->nama }}
                        <div class="text-xs text-gray-500">{{ $r->pasien->nik }}</div>
                    </td>

                    <td class="border p-2">{{ $r->dokter->nama }}</td>
                    <td class="border p-2">{{ $r->dokter->spesialis }}</td>

                    <td class="border p-2 text-center">
                        {{ \Carbon\Carbon::parse($r->tanggal_periksa)->format('d-m-Y') }}
                    </td>

                    <td class="border p-2">{{ $r->diagnosa ?? '-' }}</td>

                    <td class="border p-2 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('rekam-medis.edit', $r->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded text-white">
                                Edit
                            </a>

                            <form action="{{ route('rekam-medis.destroy', $r->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">
                        Data rekam medis belum ada
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
