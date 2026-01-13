<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Rumah Sakit')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-green-900 text-white">
        <div class="p-4 text-xl font-bold border-b border-white-700">
            RS Sehat Sentosa
        </div>

        <nav class="p-4 space-y-2">
            <a href="/dashboard"
               class="block px-4 py-2 rounded text-white hover:bg-white/10">
                Dashboard
            </a>

            <a href="/pasien"
               class="block px-4 py-2 rounded text-white hover:bg-white/10">
                Data Pasien
            </a>
            <a href="{{ route('dokter.index') }}" class="block py-2 px-4 hover:bg-white/10">
                Data Dokter
            </a>
            <a href="{{ route('rekam-medis.index') }}" class="block py-2 px-4 hover:bg-white/10">
                Rekam Medis
            </a>

        </nav>
    </aside>

    <!-- KONTEN -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>
</body>
</html>
