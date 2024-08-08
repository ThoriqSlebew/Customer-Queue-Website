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

<body class="px-10 md:px-20 xl:px-40 py-10 flex min-h-screen flex-col justify-center">
    <div
        class="grid md:grid-cols-2 grid-cols-1 gap-10 bg-white bg-opacity-50 rounded-2xl shadow-lg py-10 px-10 lg:px-24">
        <div class="pb-8 md:border-0 border-b-2 border-tertiary">
            <img src="{{asset('img/logo-bri-dark.png')}}" alt="Logo BRI" class="w-40 md:m-0 mx-auto">
            <div class="mt-4 text-primary font-poppins font-medium md:text-base text-sm md:text-left text-center">
                <h1>Bank BRI Kantor Cabang Malang Sutoyo</h1>
                <h1 class="{{ $unit[0]->alamat ? '' : 'text-red-600 italic' }}">{{ $unit[0]->alamat ?? 'Silahkan
                    masukan alamat unit pada menu settings!!' }}</h1>
                <h1 class="{{ $unit[0]->no_telp ? '' : 'text-red-600 italic' }}">{{ $unit[0]->no_telp ?? 'Silahkan
                    masukan nomor telepon unit pada menu settings!!' }}</h1>
            </div>
        </div>
        <div class="mx-auto w-full lg:max-w-sm">
            <h1 class="text-primary font-poppins font-bold text-4xl text-center mb-4">Login</h1>
            <form class="space-y-6" action="{{ route('settings.login') }}" method="POST">
                @csrf
                <div>
                    <label for="username"
                        class="block font-medium font-poppins sm:text-base text-sm leading-6 text-primary">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" required
                            class="block w-full rounded-md border-0 py-2 text-primary font-poppins shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-tertiary sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="password"
                        class="block font-medium font-poppins sm:text-base text-sm leading-6 text-primary">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required
                            class="block w-full rounded-md border-0 py-2 text-primary font-poppins shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-tertiary sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center text-lg rounded-lg bg-gradient-to-r from-primary font-poppins to-secondary py-3 font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary hover:scale-105 transition duration-300 ease-in-out">Masuk</button>
                </div>
            </form>

            <p class="mt-8 text-center font-poppins text-primary italic">
                Untuk masuk ke halaman ini anda perlu login sebagai admin
            </p>
        </div>
    </div>
</body>

</html>