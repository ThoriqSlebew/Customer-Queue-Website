<!doctype html>
<html lang="en" class="h-full bg-pattern-dark bg-cover scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Antrean Nasabah Bank BRI">
    <title>Antrean Nasabah Bank BRI</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=Nowl5Alt"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="h-full" x-data="{ showModal: false  }">
    <main class="min-h-screen">
        <div class="lg:grid flex flex-col grid-cols-2 grid-flow-row auto-rows-min gap-5 p-8 min-h-screen">
            {{-- Jam --}}
            <div class="flex gap-8 justify-between items-end">
                <div>
                    <img src="{{ asset('img/logo-bri-light.png') }}" alt="Logo BRI" class="h-16">
                    <p class="font-poppins font-medium text-white text-lg mt-1">Melayani Dengan Setulus Hati</p>
                </div>
                <div class="text-white font-poppins text-xl w-52 lg:text-left text-center" id="time">
                    <h1 id="date"></h1>
                    <h1 class="font-bold text-5xl" id="clock"></h1>
                </div>
            </div>
            {{-- Video --}}
            <div class="bg-white bg-opacity-75 rounded-2xl shadow-lg p-4 row-span-2">
                <div class="bg-white aspect-video rounded-xl flex items-center justify-center w-full p-2 h-full">
                    @if(isset($video->path))
                    <video id="videoPlayer" class="rounded-xl h-full" autoplay muted loop>
                        <source src="{{ asset($video->path) }}" type="video/mp4">
                    </video>
                    @else
                    <h1 class="text-2xl font-poppins font-bold italic underline text-red-600">Video not found</h1>
                    @endif
                </div>
            </div>
            {{-- Antrean Teller --}}
            <div class="bg-white bg-opacity-75 rounded-2xl shadow-lg p-4">
                <div class="bg-white rounded-2xl px-16 xl:py-2 py-8 h-full gap-4 flex flex-col justify-center">
                    <div class="flex items-center justify-between w-full">
                        <h1 class="lg:text-2xl text-xl font-semibold font-poppins text-primary">Nomor Antrean</h1>
                        <h1 class="lg:text-2xl text-xl font-semibold font-poppins text-primary">Counter</h1>
                    </div>
                    <div class="h-[3px] w-full bg-primary my-4"></div>
                    <div class="flex items-center justify-between w-full">
                        <h2 id="antrean_teller" class="font-bold font-poppins text-tertiary">
                            {{ $antreanTellerFormat }}</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <h2 id="antrean_teller_counter"
                            class="lg:text-7xl text-5xl font-bold font-poppins text-tertiary">{{
                            $antreanTellerCounter }}</h2>
                    </div>
                </div>
            </div>
            {{-- Antrian CS --}}
            <div class="bg-white bg-opacity-75 rounded-2xl shadow-lg p-4">
                <div class="bg-white rounded-2xl px-16 py-8 h-full gap-4 flex flex-col justify-center">
                    <div class="flex items-center justify-between w-full">
                        <h1 class="lg:text-2xl text-xl font-semibold font-poppins text-primary">Nomor Antrean</h1>
                        <h1 class="lg:text-2xl text-xl font-semibold font-poppins text-primary">Counter</h1>
                    </div>
                    <div class="h-[3px] w-full bg-primary my-4"></div>
                    <div class="flex items-center justify-between w-full">
                        <h2 id="antrean_cs" class="font-bold font-poppins text-tertiary">
                            {{ $antreanCsFormat }}</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <h2 id="antrean_cs_counter" class="lg:text-7xl text-5xl font-bold font-poppins text-tertiary">{{
                            $antreanCsCounter }}</h2>
                    </div>
                </div>
            </div>
            {{-- Sisa Teller & CS --}}
            <div class="grid grid-cols-2 gap-6">
                <div x-data="{ currentSlide: 0, slides: 2, interval: null }"
                    x-init="interval = setInterval(() => { currentSlide = (currentSlide + 1) % slides }, 5000)"
                    class="bg-white bg-opacity-75 rounded-2xl shadow-lg p-4 h-full flex-1 relative">
                    <div
                        class="relative bg-white rounded-2xl flex flex-col items-center justify-center gap-4 p-6 h-full">
                        <div x-show="currentSlide === 0" x-transition:enter="transition transform ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="flex flex-col gap-2 items-center">
                            <h1
                                class="lg:text-2xl text-xl text-center font-semibold font-poppins text-primary leading-tight">
                                Jumlah Antrean<br>Teller
                            </h1>
                            <div class="flex gap-4">
                                <img src="{{ asset('icons/people-1.svg') }}" alt="Jumlah Antrian" class="w-18">
                                <h2 id="jumlah_antrean_teller"
                                    class="lg:text-7xl text-5xl font-bold font-poppins text-center text-quaternary">{{
                                    $jumlahAntreanTeller }}</h2>
                            </div>
                        </div>
                        <div x-show="currentSlide === 1" x-transition:enter="transition transform ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="flex flex-col gap-2 items-center">
                            <h1
                                class="lg:text-2xl text-xl text-center font-semibold font-poppins text-primary leading-tight">
                                Sisa Antrean<br>Teller
                            </h1>
                            <div class="flex gap-4">
                                <img src="{{ asset('icons/people-1.svg') }}" alt="Sisa Antrian" class="w-18">
                                <h2 id="sisa_antrean_teller"
                                    class="lg:text-7xl text-5xl font-bold font-poppins text-center text-quaternary">{{
                                    $sisaAntreanTeller }}</h2>
                            </div>
                        </div>
                        <div class="absolute bottom-4 flex justify-center space-x-2">
                            <template x-for="i in slides" :key="i">
                                <div :class="{'bg-primary': currentSlide === i-1, 'bg-gray-300': currentSlide !== i-1}"
                                    class="w-2 h-2 rounded-full"></div>
                            </template>
                        </div>
                    </div>
                </div>
                <div x-data="{ currentSlide: 0, slides: 2, interval: null }"
                    x-init="interval = setInterval(() => { currentSlide = (currentSlide + 1) % slides }, 5000)"
                    class="bg-white bg-opacity-75 rounded-2xl shadow-lg p-4 h-full flex-1 relative">
                    <div
                        class="relative bg-white rounded-2xl flex flex-col items-center justify-center gap-4 p-6 h-full">
                        <div x-show="currentSlide === 0" x-transition:enter="transition transform ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="flex flex-col gap-2 items-center">
                            <h1
                                class="lg:text-2xl text-xl text-center font-semibold font-poppins text-primary leading-tight">
                                Jumlah Antrean<br>Customer Services
                            </h1>
                            <div class="flex gap-4">
                                <img src="{{ asset('icons/people-1.svg') }}" alt="Jumlah Antrian" class="w-18">
                                <h2 id="jumlah_antrean_cs"
                                    class="lg:text-7xl text-5xl font-bold font-poppins text-center text-quaternary">{{
                                    $jumlahAntreanCs }}</h2>
                            </div>
                        </div>
                        <div x-show="currentSlide === 1" x-transition:enter="transition transform ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="flex flex-col gap-2 items-center">
                            <h1
                                class="lg:text-2xl text-xl text-center font-semibold font-poppins text-primary leading-tight">
                                Sisa Antrean<br>Customer Services
                            </h1>
                            <div class="flex gap-4">
                                <img src="{{ asset('icons/people-1.svg') }}" alt="Sisa Antrian" class="w-18">
                                <h2 id="sisa_antrean_cs"
                                    class="lg:text-7xl text-5xl font-bold font-poppins text-center text-quaternary">{{
                                    $sisaAntreanCs }}
                                </h2>
                            </div>
                        </div>
                        <div class="absolute bottom-4 flex justify-center space-x-2">
                            <template x-for="i in slides" :key="i">
                                <div :class="{'bg-primary': currentSlide === i-1, 'bg-gray-300': currentSlide !== i-1}"
                                    class="w-2 h-2 rounded-full"></div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-full px-8 py-4 bg-white rounded-xl bg-opacity-75 font-poppins font-semibold lg:text-2xl text-xl col-span-2">
                @if($unit[0]->running_text)
                <div class="marquee">
                    <span>{{ $unit[0]->running_text }}</span>
                </div>
                @else
                <p class="text-center text-red-600 italic">Silahkan edit running text pada menu settings</p>
                @endif
            </div>
        </div>
    </main>
    <div class="bg-modal fixed flex items-center justify-center inset-0 bg-black bg-opacity-75 z-50">
        <div class="modal grid w-3/4 h-3/4 ">
            <div class="bg-white bg-opacity-75 rounded-2xl shadow-lg p-4 text-center ">
                <div class=" bg-white rounded-2xl px-16 xl:py-2 py-8 h-full gap-4 flex flex-col justify-evenly">
                    <div class="bg-primary rounded-xl">
                        <h1 id="jenis_antrean" class="py-8 text-white lg:text-4xl text-xl font-semibold font-poppins">
                            Antrean Teller</h1>
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <h1 class="lg:text-4xl text-xl font-semibold font-poppins text-primary">Nomor Antrean</h1>
                        <h1 class="lg:text-4xl text-xl font-semibold font-poppins text-primary">Counter</h1>
                    </div>
                    <div class="h-[3px] w-full bg-primary"></div>
                    <div class="flex items-center justify-between w-full">
                        <h2 id="no_antrean_panggil" class="text-8xl font-bold font-poppins text-tertiary"></h2>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <h2 id="no_counter_panggil" class="lg:text-8xl text-5xl font-bold font-poppins text-tertiary">
                        </h2>
                    </div>
                    <div class="w-full py-4 col-span-2">
                        <p class="font-poppins text-primary font-semibold lg:text-2xl text-xl italic">
                            Silahkan menuju ke counter yang sudah tertera
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <audio id="call-audio" src="{{ asset('audio/call-sound.mp3') }}" preload="auto"></audio>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let previousAntreanTeller = '';
            let previousAntreanCs = '';

            function playAudioAndSpeak(antrean, counter) {
                const callAudio = document.getElementById('call-audio');
                const noAntreanPanggil = document.getElementById('no_antrean_panggil').textContent = antrean;
                const noCounterPanggil = document.getElementById('no_counter_panggil').textContent = counter;
                const jenisAntreanElement = document.getElementById('jenis_antrean');
                if (antrean.startsWith('TL')) {
                    jenisAntreanElement.textContent = 'Antrean Teller';
                } else if (antrean.startsWith('CS')) {
                    jenisAntreanElement.textContent = 'Antrean Customer Services';
                }

                callAudio.play();
                callAudio.onended = function() {
                    const text = `Nomor antrean, ${antrean}, menuju ke, counter, ${counter}`;
                    responsiveVoice.speak(text, "Indonesian Female", {rate: 0.8, pitch: 0.9});

                    modal = document.querySelector('.modal');
                    bgModal = document.querySelector('.bg-modal');
                    modal.classList.add('show');
                    bgModal.classList.add('show');
                    setTimeout(() => {
                        modal.classList.remove('show');
                        bgModal.classList.remove('show');
                        console.log(modal);
                    }, 10000);
                };
            }

            function fetchAntreanData() {
                fetch('/monitor/data')
                    .then(response => response.json())
                    .then(data => {
                        if (data.antrean_teller !== previousAntreanTeller) {
                            previousAntreanTeller = data.antrean_teller;
                            playAudioAndSpeak(data.antrean_teller, data.antrean_teller_counter);                            
                        }
                        if (data.antrean_cs !== previousAntreanCs) {
                            previousAntreanCs = data.antrean_cs;
                            playAudioAndSpeak(data.antrean_cs, data.antrean_cs_counter);
                        }
                        
                        document.getElementById('antrean_teller').textContent = data.antrean_teller;
                        document.getElementById('antrean_teller_counter').textContent = data.antrean_teller_counter;
                        if(document.getElementById('antrean_teller').textContent == 'Belum ada') {
                            document.getElementById('antrean_teller').classList.remove('lg:text-7xl', 'text-5xl');
                            document.getElementById('antrean_teller').classList.add('text-5xl');
                        } else {
                            document.getElementById('antrean_teller').classList.remove('text-5xl');
                            document.getElementById('antrean_teller').classList.add('lg:text-7xl', 'text-5xl');
                        }
                        document.getElementById('antrean_cs').textContent = data.antrean_cs;
                        document.getElementById('antrean_cs_counter').textContent = data.antrean_cs_counter;
                        if(document.getElementById('antrean_cs').textContent == 'Belum ada') {
                            document.getElementById('antrean_cs').classList.remove('lg:text-7xl', 'text-5xl');
                            document.getElementById('antrean_cs').classList.add('text-5xl');
                        } else {
                            document.getElementById('antrean_cs').classList.remove('text-5xl');
                            document.getElementById('antrean_cs').classList.add('lg:text-7xl', 'text-5xl');
                        }
                        document.getElementById('jumlah_antrean_teller').textContent = data.jumlah_antrean_teller;
                        document.getElementById('sisa_antrean_teller').textContent = data.sisa_antrean_teller;
                        document.getElementById('jumlah_antrean_cs').textContent = data.jumlah_antrean_cs;
                        document.getElementById('sisa_antrean_cs').textContent = data.sisa_antrean_cs;
                    })
                    .catch(error => console.error('Error fetching antrean data:', error));
            }

            function updateDateTime() {
                const now = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const currentDate = new Intl.DateTimeFormat('id-ID', options).format(now);
        
                let hours = now.getHours();
                let minutes = now.getMinutes();
                let seconds = now.getSeconds();
        
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
        
                document.getElementById('date').textContent = currentDate;
                document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
            }

            setInterval(updateDateTime, 1000);
            setInterval(fetchAntreanData, 1000);
            
            updateDateTime();
            fetchAntreanData();
        });
        
    </script>
</body>

</html>