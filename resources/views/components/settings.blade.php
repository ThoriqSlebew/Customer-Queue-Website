<!doctype html>
<html lang="en" class="h-full bg-pattern bg-cover scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Antrean Nasabah Bank BRI">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | Antrean Nasabah Bank BRI</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    @vite('../../resources/css/app.css')
    @vite('../../resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-full">
    <div class="min-h-full flex">
        <x-sidebar>
            <x-slot:slug>{{ $slug }}</x-slot:slug>
            <x-slot:namaUnit>{{ $namaUnit }}</x-slot:namaUnit>
        </x-sidebar>

        <div class="min-h-full md:ml-64 w-full">
            <x-navbar>
                <x-slot:slug>{{ $slug }}</x-slot:slug>
            </x-navbar>

            <x-header>
                <x-slot:title>{{ $title }}</x-slot:title>
            </x-header>

            <main class="bg-white rounded-xl shadow-lg md:mx-5 mx-4 mt-4">
                {{ $slot }}
            </main>

            <x-footer></x-footer>
        </div>
    </div>

</body>

</html>