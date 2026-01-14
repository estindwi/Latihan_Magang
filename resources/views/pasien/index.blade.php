@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Pasien</h1>
        <a href="{{ route('pasien.create') }}"
           class="bg-green-700 hover:bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Pasien
        </a>
    </div>

    <!-- Search -->
    <form id="searchForm" method="GET" action="{{ route('pasien.index') }}" class="mb-4">
    <div class="flex gap-2 max-w-sm">
        <input
            id="searchInput"
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama pasien..."
            class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-green-200 focus:outline-none"
            oninput="autoSearch()"
        >
        </div>
    </form>

    <script>
    let t;
    function autoSearch() {
        clearTimeout(t);
        t = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500); 
    }
    </script>

    <!-- Alert -->
    @if (session('success'))
        <div class="mb-3 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 text-sm">
            <thead class="bg-green-100 text-gray-700">
                <tr>
                    <th class="border p-2 text-center">No</th>
                    <th class="border p-2">NIK</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2 text-center">Jenis Kelamin</th>
                    <th class="border p-2">TTL</th>
                    <th class="border p-2 text-center">Umur</th>
                    <th class="border p-2">Alamat</th>
                    <th class="border p-2">No HP</th>
                    <th class="border p-2 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pasiens as $p)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-2">{{ $p->nik }}</td>
                    <td class="border p-2 font-medium">{{ $p->nama }}</td>
                    <td class="border p-2 text-center">
                        {{ $p->jenis_kelamin }}
                    </td>
                    <td class="border p-2">
                        {{ $p->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') }}
                    </td>
                    <td class="border p-2 text-center">
                        {{ \Carbon\Carbon::parse($p->tanggal_lahir)->age }} th
                    </td>
                    <td class="border p-2">{{ $p->alamat }}</td>
                    <td class="border p-2">{{ $p->no_hp }}</td>
                    <td class="border p-2 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('pasien.edit', $p->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded text-white">
                                Edit
                            </a>

                            <form action="{{ route('pasien.destroy', $p->id) }}"
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
                    <td colspan="9" class="p-4 text-center text-gray-500">
                        Data pasien belum ada
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
