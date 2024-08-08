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

<body class="px-10 md:px-20 xl:px-40 py-10 h-screen">
    <header class="bg-white bg-opacity-50 rounded-2xl shadow-lg p-6">
        <h1 class="font-bold text-3xl md:text-4xl text-primary font-poppins text-center">Silahkan Memilih Counter Anda
        </h1>
    </header>

    <main class="h-3/4">
        <div class="grid sm:grid-cols-2 grid-cols-1 gap-10 my-10 h-full">
            <div class="bg-primary bg-opacity-10 rounded-2xl shadow-lg p-8">
                <div class="flex items-center gap-4 flex-col lg:flex-row mb-6">
                    <div class="bg-white h-20 w-20 rounded-full flex justify-center items-center">
                        <img src="{{asset('icons/icon-teller.svg')}}" alt="Icon Teller" class="w-12">
                    </div>
                    <h2 class="text-4xl font-bold font-poppins text-center text-primary">Teller</h2>
                </div>
                <div class="flex flex-col gap-4">
                    @for ($i = 1; $i <= $jumlahTeller; $i++) <a href="{{ route('panggil-antrean.teller', $i) }}"
                        class="flex justify-between items-center p-4 bg-gradient-to-r from-primary to-secondary py-4 rounded-2xl hover:scale-105 transition duration-300 ease-in-out">
                        <p class="font-poppins font-semibold text-2xl text-white ">Counter {{ $i }}</p>
                        <img src="{{asset('icons/arrow-simple-right.svg')}}" alt="Arrow" class="w-3">
                        </a>
                        @endfor
                </div>
            </div>

            <div class="bg-primary bg-opacity-10 rounded-2xl shadow-lg p-8">
                <div class="flex items-center gap-4 flex-col lg:flex-row mb-6">
                    <div class="bg-white h-20 w-20 rounded-full flex justify-center items-center">
                        <img src="{{asset('icons/icon-cs.svg')}}" alt="Icon CS" class="w-12">
                    </div>
                    <h2 class="text-4xl font-bold font-poppins text-center text-tertiary">Customer Services
                    </h2>
                </div>
                <div class="flex flex-col gap-4">
                    @for ($i = $jumlahTeller + 1; $i <= $jumlahTeller + $jumlahCs; $i++) <a
                        href="{{ route('panggil-antrean.cs', $i) }}"
                        class="flex justify-between items-center p-4 bg-gradient-to-r from-tertiary to-quaternary py-4 rounded-2xl hover:scale-105 transition duration-300 ease-in-out">
                        <p class="font-poppins font-semibold text-2xl text-white ">Counter {{ $i }}</p>
                        <img src="{{asset('icons/arrow-simple-right.svg')}}" alt="Arrow" class="w-3">
                        </a>
                        @endfor
                </div>
            </div>
        </div>
    </main>
</body>

</html>