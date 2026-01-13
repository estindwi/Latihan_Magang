<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Dokter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Dokter</h1>

    @if ($errors->any())
        <div class="mb-3 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" class="border p-2 w-full rounded"
                   value="{{ old('nama', $dokter->nama) }}">
        </div>

        <div>
            <label class="block mb-1">Spesialis</label>
            <input type="text" name="spesialis" class="border p-2 w-full rounded"
                   value="{{ old('spesialis', $dokter->spesialis) }}">
        </div>

        <div class="flex gap-2">
            <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Update
            </button>
            <a href="{{ route('dokter.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>

</body>
</html>
