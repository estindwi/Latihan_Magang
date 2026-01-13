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

<div class="mt-8">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="relative">
            <div id="slider" class="flex transition-transform duration-500">
                <img src="{{ asset('images/rs1.jpg') }}" class="w-full h-80 object-cover flex-shrink-0">
                <img src="{{ asset('images/rs2.jpg') }}" class="w-full h-80 object-cover flex-shrink-0">
                <img src="{{ asset('images/rs3.jpg') }}" class="w-full h-80 object-cover flex-shrink-0">
            </div>

            <!-- Button kiri -->
            <button onclick="prevSlide()"
                class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/60 hover:bg-white p-2 rounded-full">
                ❮
            </button>

            <!-- Button kanan -->
            <button onclick="nextSlide()"
                class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/60 hover:bg-white p-2 rounded-full">
                ❯
            </button>
        </div>
    </div>
</div>

@endsection
