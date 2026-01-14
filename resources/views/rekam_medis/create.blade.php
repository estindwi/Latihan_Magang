@extends('layouts.app')
@section('title', 'Tambah Rekam Medis')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-bold">Tambah Rekam Medis</h1>
    <a href="{{ route('rekam-medis.index') }}" class="text-green-600 hover:underline">Kembali</a>
  </div>

  @if ($errors->any())
    <div class="mb-3 p-3 bg-red-100 text-red-700 rounded">
      <ul class="list-disc ml-5">
        @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('rekam-medis.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label class="block mb-1">Pasien</label>
      <select id="pasien_id" name="pasien_id" class="border p-2 w-full rounded">
        <option value="">-- Pilih Pasien --</option>
        @foreach($pasiens as $p)
          <option value="{{ $p->id }}" {{ old('pasien_id') == $p->id ? 'selected' : '' }}>
            {{ $p->nama }} ({{ $p->nik }})
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label class="block mb-1">Dokter</label>
      <select id="dokter_id" name="dokter_id" class="border p-2 w-full rounded">
        <option value="">-- Pilih Dokter --</option>
        @foreach($dokters as $d)
          <option value="{{ $d->id }}" {{ old('dokter_id') == $d->id ? 'selected' : '' }}>
            {{ $d->nama }} - {{ $d->spesialis }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label class="block mb-1">Tanggal Periksa</label>
      <input type="date" name="tanggal_periksa" class="border p-2 w-full rounded"
             value="{{ old('tanggal_periksa') }}">
    </div>

    <div>
      <label class="block mb-1">Keluhan</label>
      <textarea name="keluhan" class="border p-2 w-full rounded">{{ old('keluhan') }}</textarea>
    </div>

    <div>
      <label class="block mb-1">Diagnosa</label>
      <input type="text" name="diagnosa" class="border p-2 w-full rounded"
             value="{{ old('diagnosa') }}">
    </div>

    <button class="bg-green-700 hover:bg-green-600 text-white px-4 py-2 rounded">
      Simpan
    </button>
  </form>
</div>

{{-- Tom Select CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

<script>
  new TomSelect('#pasien_id', {
    create: false,
    sortField: { field: "text", direction: "asc" }
  });

  new TomSelect('#dokter_id', {
    create: false,
    sortField: { field: "text", direction: "asc" }
  });
</script>
@endsection
