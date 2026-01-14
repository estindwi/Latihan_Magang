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
            <div class="relative overflow-hidden">
            <div id="slider" class="flex transition-transform duration-700">
                <img src="{{ asset('asset/img/RS.png') }}" class="w-full h-80 object-cover flex-shrink-0">
                <img src="{{ asset('asset/img/periksa.png') }}" class="w-full h-80 object-cover flex-shrink-0">
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const slider = document.getElementById("slider");
    const totalSlides = slider.children.length;

    setInterval(() => {
      index = (index + 1) % totalSlides;
      slider.style.transform = `translateX(-${index * 100}%)`;
    }, 4000); // 4 detik
  });
</script>

