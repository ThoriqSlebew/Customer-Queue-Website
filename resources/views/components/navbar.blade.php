<nav class="bg-primary rounded-xl md:m-5 m-3" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0 md:hidden">
                    <img class="h-8" src="{{ asset('img/logo-bri-light.png') }}" alt="Bank Rakyat Indonesia">
                </div>
            </div>
            <!-- Profile dropdown -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="relative ml-3">
                        <div class="flex items-center gap-4">
                            <h2 class="font-poppins font-medium leading-none text-right text-white">{{
                                Auth::user()->name }}</h2>
                            <button type="button" @click="isOpen = !isOpen"
                                class="flex-shrink-0 relative flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-6 w-6 m-2" src="{{ asset('icons/people-4.svg') }}" alt="Admin">
                            </button>
                        </div>

                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white p-2 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <form id="logout-form" action="{{ route('settings.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center justify-between hover:bg-primary hover:bg-opacity-10 rounded-md px-4 py-2 transition duration-200"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">
                                    <p class="font-poppins text-sm font-medium">Logout</p>
                                    <img class="w-3" src="{{ asset('icons/logout.svg') }}" alt="Logout">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-primary hover:bg-opacity-75 transition duration-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="{{ route('settings.monitor') }}"
                class="{{ $slug == 'monitor' ? 'text-primary bg-white' : 'text-white hover:bg-white hover:bg-opacity-20' }} flex gap-3 rounded-md px-3 py-2"
                aria-current="page">
                <img class="h-6 w-6"
                    src="{{$slug == 'monitor' ? asset('icons/icon-monitor.svg') : asset('icons/icon-monitor-light.svg') }}"
                    alt="Monitor">
                <span class="font-poppins text-base font-medium">Monitor</span>
            </a>
            <a href="{{ route('settings.operasional') }}"
                class="{{ $slug == 'operasional' ? 'text-primary bg-white' : 'text-white hover:bg-white hover:bg-opacity-20' }} flex gap-3 rounded-md px-3 py-2">
                <img class="h-6 w-6"
                    src="{{ $slug == 'operasional' ? asset('icons/icon-teller.svg') : asset('icons/icon-teller-light.svg') }}"
                    alt="Operasional">
                <span class="font-poppins text-base font-medium">Operasional</span>
            </a>
            <a href="{{ route('settings.unit') }}"
                class="{{ $slug == 'unit' ? 'text-primary bg-white' : 'text-white hover:bg-white hover:bg-opacity-20' }} flex gap-3 rounded-md px-3 py-2">
                <img class="h-6 w-6"
                    src="{{ $slug == 'unit' ? asset('icons/settings-dark.svg') : asset('icons/settings-light.svg') }}"
                    alt="Settings Unit">
                <span class="font-poppins text-base font-medium">Settings Unit</span>
            </a>
        </div>
        <div class="border-t border-white pb-3 pt-4">
            <div class="flex items-center justify-between px-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-white rounded-full">
                        <img class="h-6 w-6 m-2" src="{{ asset('icons/people-4.svg') }}" alt="Admin">
                    </div>
                    <div class="ml-3 font-medium font-poppins leading-none text-white">{{ Auth::user()->name }}</div>
                </div>
                <form id="logout-form" action="{{ route('settings.logout') }}" method="POST" x-data="{ isOpen: false }">
                    @csrf
                    <button type="button" @click="isOpen = true"
                        class="w-full flex items-center justify-between hover:bg-primary hover:bg-opacity-10 rounded-md px-4 py-2 transition duration-200"
                        role="menuitem" tabindex="-1" id="user-menu-item-2">
                        <p class="font-poppins text-sm font-medium">Logout</p>
                        <img class="w-3" src="{{ asset('icons/logout.svg') }}" alt="Logout">
                    </button>

                    <script>
                        document.getElementById('logout-form').addEventListener('submit', function(e) {
                            e.preventDefault();
                            Swal.fire({
                                title: 'Logout',
                                text: 'Apakah anda yakin ingin logout?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Logout',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit();
                                }
                            });
                        });
                    </script>
                </form>

            </div>
        </div>
    </div>
</nav>