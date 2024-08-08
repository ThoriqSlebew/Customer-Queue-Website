<!doctype html>
<html lang="en" class="bg-pattern bg-cover scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Antrean Nasabah Bank BRI">
    <title>Antrean Nasabah Bank BRI</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="px-10 md:px-20 xl:px-40 py-10">
    <header class="bg-white bg-opacity-50 rounded-2xl shadow-lg p-6">
        <img src="{{asset('img/logo-bri-dark.png')}}" alt="Logo BRI" class="w-40 m-auto">
        <div class="mt-4 text-primary font-poppins font-medium text-center">
            <h1>Bank BRI Unit {{ $unit[0]->nama }}</h1>
            <h1 class="{{ $unit[0]->alamat ? '' : 'text-red-600 italic' }}">{{ $unit[0]->alamat ?? 'Silahkan
                masukan alamat unit pada menu settings!!' }}</h1>
            <h1 class="{{ $unit[0]->no_telp ? '' : 'text-red-600 italic' }}">{{ $unit[0]->no_telp ?? 'Silahkan
                masukan nomor telepon unit pada menu settings!!' }}</h1>
        </div>
    </header>

    <main>
        <div class="grid sm:grid-cols-2 grid-cols-1 gap-10 my-10">
            <a href="{{ route('ambil-antrean.index') }}"
                class="bg-gradient-to-r from-tertiary to-quaternary rounded-2xl shadow-lg p-8 flex flex-col hover:scale-105 transition duration-300 ease-in-out">
                <div class="flex items-center gap-4 flex-col lg:flex-row">
                    <div class="bg-white h-20 w-20 rounded-full flex justify-center items-center">
                        <img src="{{asset('icons/icon-queue.svg')}}" alt="Icon Queue">
                    </div>
                    <h2 class="text-white text-3xl md:text-4xl font-poppins font-bold italic">Take Queue</h2>
                </div>
                <p class="font-poppins text-white my-4 md:my-8 md:text-lg">
                    Halaman untuk pengambilan nomor antrean Teller dan Customer Services bagi nasabah
                </p>
                <img src="{{asset('icons/arrow.svg')}}" alt="Arrow" class="w-1/4 self-end">
            </a>
            <a href="{{ route('panggil-antrean.index') }}"
                class="bg-gradient-to-r from-secondary to-primary rounded-2xl shadow-lg p-8 flex flex-col hover:scale-105 transition duration-300 ease-in-out">
                <div class="flex items-center gap-4 flex-col lg:flex-row">
                    <div class="bg-white h-20 w-20 rounded-full flex justify-center items-center">
                        <img src="{{asset('icons/icon-teller-cs.svg')}}" alt="Icon Queue">
                    </div>
                    <h2 class="text-white text-3xl md:text-4xl font-poppins font-bold italic">Teller and CS</h2>
                </div>
                <p class="font-poppins text-white my-4 md:my-8 md:text-lg">
                    Halaman untuk Teller dan Customer Service memanggil antrean nasabah
                </p>
                <img src="{{asset('icons/arrow.svg')}}" alt="Arrow" class="w-1/4 self-end">
            </a>
            <a href="{{ route('monitor') }}"
                class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-lg p-8 flex flex-col hover:scale-105 transition duration-300 ease-in-out">
                <div class="flex items-center gap-4 flex-col lg:flex-row">
                    <div class="bg-white h-20 w-20 rounded-full flex justify-center items-center">
                        <img src="{{asset('icons/icon-monitor.svg')}}" alt="Icon Queue">
                    </div>
                    <h2 class="text-white text-3xl md:text-4xl font-poppins font-bold italic">Queue Viewer Page</h2>
                </div>
                <p class="font-poppins text-white my-4 md:my-8 md:text-lg">
                    Halaman untuk menampilkan urutan antrean nasabah yang dipanggil, total, dan sisa nasabah yang belum
                </p>
                <img src="{{asset('icons/arrow.svg')}}" alt="Arrow" class="w-1/4 self-end">
            </a>
            <a href="{{ route('settings.login') }}"
                class="bg-gradient-to-r from-quaternary to-tertiary rounded-2xl shadow-lg p-8 flex flex-col hover:scale-105 transition duration-300 ease-in-out">
                <div class="flex items-center gap-4 flex-col lg:flex-row">
                    <div class="bg-white h-20 w-20 rounded-full flex justify-center items-center">
                        <img src="{{asset('icons/icon-settings.svg')}}" alt="Icon Queue">
                    </div>
                    <h2 class="text-white text-3xl md:text-4xl font-poppins font-bold italic">Settings</h2>
                </div>
                <p class="font-poppins text-white my-4 md:my-8 md:text-lg">
                    Halaman Settings untuk manajemen konten dan menambahkan Teller dan Customer Service
                </p>
                <img src="{{asset('icons/arrow.svg')}}" alt="Arrow" class="w-1/4 self-end">
            </a>
        </div>
    </main>

    <footer class="bg-white bg-opacity-50 rounded-2xl shadow-lg p-6">
        <p class="text-primary font-poppins font-medium text-center">&copy; 2024 - Internship UIN Malang | All
            rights reserved.</p>
    </footer>
</body>

</html>