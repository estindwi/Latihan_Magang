@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Total Pasien</p>
        <p class="text-3xl font-bold text-blue-600">
            {{ $totalPasien }}
        </p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Pasien Hari Ini</p>
        <p class="text-3xl font-bold text-green-600">
            {{ $pasienHariIni }}
        </p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Dokter Aktif</p>
        <p class="text-3xl font-bold text-purple-600">
            {{ $dokterAktif }}
        </p>
    </div>
</div>
@endsection
