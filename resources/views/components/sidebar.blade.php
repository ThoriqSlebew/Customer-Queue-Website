<div class="w-64 h-full shadow-md bg-primary fixed hidden pl-5 py-5 md:flex flex-col">
    <div class="flex-shrink-0">
        <img class="h-8" src="{{ asset('img/logo-bri-light.png') }}" alt="Bank Rakyat Indonesia">
    </div>
    <div class="pt-10">
        <a href="{{ route('settings.monitor') }}"
            class="{{ $slug == 'monitor' ? 'text-primary bg-white' : 'text-white hover:bg-white hover:bg-opacity-20' }} flex gap-3 my-2 py-2.5 px-4 rounded-s-xl transition duration-200">
            <img class="h-6 w-6"
                src="{{$slug == 'monitor' ? asset('icons/icon-monitor.svg') : asset('icons/icon-monitor-light.svg') }}"
                alt="Monitor">
            <span class="font-poppins">Monitor</span>
        </a>
        <a href="{{ route('settings.operasional') }}"
            class="{{ $slug == 'operasional' ? 'text-primary bg-white' : 'text-white hover:bg-white hover:bg-opacity-20' }} flex gap-3 my-2 py-2.5 px-4 rounded-s-xl transition duration-200">
            <img class="h-6 w-6"
                src="{{ $slug == 'operasional' ? asset('icons/icon-teller.svg') : asset('icons/icon-teller-light.svg') }}"
                alt="Operasional">
            <span class="font-poppins">Operasional</span>
        </a>
        <a href="{{ route('settings.unit') }}"
            class="{{ $slug == 'unit' ? 'text-primary bg-white' : 'text-white hover:bg-white hover:bg-opacity-20' }} flex gap-3 my-2 py-2.5 px-4 rounded-s-xl transition duration-200">
            <img class="h-6 w-6"
                src="{{ $slug == 'unit' ? asset('icons/settings-dark.svg') : asset('icons/settings-light.svg') }}"
                alt="Settings Unit">
            <span class="font-poppins">Settings Unit</span>
        </a>
    </div>
    <div class="mt-auto mr-5 font-poppins text-white">
        <h3 class="text-xl font-semibold underline">BRI Kantor Unit</h3>
        <h4 class="font-medium">{{ $namaUnit }}</h4>
    </div>
</div>