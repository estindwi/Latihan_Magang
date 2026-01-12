<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-xl font-bold text-red-600 mb-4">
            Konfirmasi Hapus Pasien
        </h1>

        <p class="mb-4 text-gray-700">
            Apakah Anda yakin ingin menghapus data pasien berikut?
        </p>

        <div class="border rounded p-4 bg-gray-50 text-sm space-y-1 mb-5">
            <p><strong>NIK:</strong> {{ $pasien->nik }}</p>
            <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $pasien->tanggal_lahir }}</p>
            <p>
                <strong>Umur:</strong>
                {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->age }} tahun
            </p>
            <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
            <p><strong>No HP:</strong> {{ $pasien->no_hp }}</p>
        </div>

        <form action="{{ route('pasien.destroy', $pasien->id) }}"
              method="POST"
              class="flex justify-between">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                Ya, Hapus
            </button>

            <a href="{{ route('pasien.index') }}"
               class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                Batal
            </a>
        </form>
    </div>

</body>
</html>
