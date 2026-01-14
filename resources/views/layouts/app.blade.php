<script src="https://cdn.tailwindcss.com"></script>

<div class="flex min-h-screen">
    <x-sidebar />

    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>
