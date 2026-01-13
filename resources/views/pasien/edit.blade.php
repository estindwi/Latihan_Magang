<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Pasien</h1>

    @if ($errors->any())
        <div class="mb-3 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">NIK</label>
            <input type="text" name="nik" class="border p-2 w-full rounded"
                   value="{{ old('nik', $pasien->nik) }}">
        </div>

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" class="border p-2 w-full rounded"
                   value="{{ old('nama', $pasien->nama) }}">
        </div>

        <div>
            <label class="block mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="border p-2 w-full rounded">
                <option value="">-- Pilih --</option>
                 <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
                </option>
            </select>
        </div>

        <div>
            <label class="block mb-1">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="border p-2 w-full rounded"
                   value="{{ old('tempat_lahir', $pasien->tempat_lahir) }}">
        </div>

        <div>
            <label class="block mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="border p-2 w-full rounded"
                   value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}">
        </div>

        <div>
            <label class="block mb-1">Alamat</label>
            <textarea name="alamat" class="border p-2 w-full rounded">{{ old('alamat', $pasien->alamat) }}</textarea>
        </div>

        <div>
            <label class="block mb-1">No HP</label>
            <input type="text" name="no_hp" class="border p-2 w-full rounded"
                   value="{{ old('no_hp', $pasien->no_hp) }}">
        </div>

        <div class="flex gap-2">
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                Update
            </button>
            <a href="{{ route('pasien.index') }}" class="bg-gray-300 px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>

</body>
</html>
