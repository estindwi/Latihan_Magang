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
    <aside class="w-64 bg-blue-900 text-white">
        <div class="p-4 text-xl font-bold border-b border-blue-700">
            🏥 RS Sehat Sentosa
        </div>

        <nav class="p-4 space-y-2">
            <a href="/dashboard"
               class="block px-4 py-2 rounded hover:bg-blue-700">
                📊 Dashboard
            </a>

            <a href="/pasien"
               class="block px-4 py-2 rounded hover:bg-blue-700">
                🧑‍⚕️ Data Pasien
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
