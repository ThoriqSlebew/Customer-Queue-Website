<x-settings>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:slug>{{ $slug }}</x-slot:slug>
    <x-slot:namaUnit>{{ $namaUnit }}</x-slot:namaUnit>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-6">
        <div class="bg-primary bg-opacity-10 rounded-2xl shadow-lg p-4">
            <div class="grid grid-cols-1 gap-4">
                <div class="bg-white shadow-md rounded-2xl p-4">
                    <h2 class="font-poppins text-xl text-primary font-semibold mb-4">Data Antrean Nasabah</h2>
                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-primary bg-opacity-10">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 font-poppins uppercase tracking-wider">
                                        Operasional</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 font-poppins uppercase tracking-wider">
                                        Tgl. Data Awal</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 font-poppins uppercase tracking-wider">
                                        Tgl. Data Akhir</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 font-poppins uppercase tracking-wider">
                                        Total Data Antrean</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 font-poppins uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 font-semibold font-poppins whitespace-nowrap">Teller</td>
                                    <td class="px-6 py-4 font-poppins whitespace-nowrap">{{ $tanggalAwalTeller }}</td>
                                    <td class="px-6 py-4 font-poppins whitespace-nowrap">{{ $tanggalAkhirTeller }}</td>
                                    <td class="px-6 py-4 font-semibold font-poppins whitespace-nowrap">{{
                                        $jumlahAntreanTeller }}</td>
                                    <td class="px-6 py-4 font-poppins whitespace-nowrap">
                                        <form id="reset-teller-form" action="{{ route('settings.reset.teller') }}"
                                            method="POST">
                                            @csrf
                                            <button type="button"
                                                class="reset-button bg-orange-500 hover:bg-orange-700 text-white w-full font-poppins font-semibold py-2 px-4 rounded-lg"
                                                data-form-id="reset-teller-form">
                                                Reset
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-semibold font-poppins whitespace-nowrap">Customer Service
                                    </td>
                                    <td class="px-6 py-4 font-poppins whitespace-nowrap">{{ $tanggalAwalCs }}</td>
                                    <td class="px-6 py-4 font-poppins whitespace-nowrap">{{ $tanggalAkhirCs }}</td>
                                    <td class="px-6 py-4 font-semibold font-poppins whitespace-nowrap">{{
                                        $jumlahAntreanCs }}</td>
                                    <td class="px-6 py-4 font-poppins whitespace-nowrap">
                                        <form id="reset-cs-form" action="{{ route('settings.reset.cs') }}"
                                            method="POST">
                                            @csrf
                                            <button type="button"
                                                class="reset-button bg-orange-500 hover:bg-orange-700 text-white w-full font-poppins font-semibold py-2 px-4 rounded-lg"
                                                data-form-id="reset-cs-form">
                                                Reset
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-4 gap-0">
                <div class="bg-white mt-4 shadow-md rounded-2xl p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-poppins text-primary font-semibold text-xl">Data Teller</h3>
                        <div class="flex space-x-2">
                            <form id="add-teller-form" action="{{ route('settings.add-teller', $unit->id) }}"
                                method="POST">
                                @csrf
                                <button type="button"
                                    class="add-teller-button font-poppins font-semibold bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-lg"
                                    data-teller-count="{{ $unit->jumlah_teller }}">
                                    Tambah
                                </button>
                            </form>
                            <form id="remove-teller-form" action="{{ route('settings.remove-teller', $unit->id) }}"
                                method="POST">
                                @csrf
                                <button type="button"
                                    class="remove-teller-button font-poppins font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-lg"
                                    data-form-id="remove-teller-form" data-teller-count="{{ $unit->jumlah_teller }}">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2">
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$unit->jumlah_teller)
                            <div class="font-poppins font-reguler border-b border-gray-300 py-2">
                                Teller - {{ $i }}
                            </div>
                            @else
                            <div class="font-poppins font-reguler border-b border-gray-300 py-2">-</div>
                            @endif
                            @endfor
                    </div>
                </div>
                <div class="bg-white mt-4 shadow-md rounded-2xl p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-poppins text-primary font-semibold text-xl">Data Customer Service</h3>
                        <div class="flex space-x-2">
                            <form id="add-cs-form" action="{{ route('settings.add-cs', $unit->id) }}" method="POST">
                                @csrf
                                <button type="button"
                                    class="add-cs-button font-poppins font-semibold bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-lg"
                                    data-cs-count="{{ $unit->jumlah_cs }}">
                                    Tambah
                                </button>
                            </form>
                            <form id="remove-cs-form" action="{{ route('settings.remove-cs', $unit->id) }}"
                                method="POST">
                                @csrf
                                <button type="button"
                                    class="remove-cs-button font-poppins font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-lg"
                                    data-form-id="remove-cs-form" data-cs-count="{{ $unit->jumlah_cs }}">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2">
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$unit->jumlah_cs)
                            <div class="font-poppins font-reguler border-b border-gray-300 py-2">
                                Customer Services - {{ $i }}
                            </div>
                            @else
                            <div class="font-poppins font-reguler border-b border-gray-300 py-2">-</div>
                            @endif
                            @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resetButtons = document.querySelectorAll('.reset-button');
            resetButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const formId = this.getAttribute('data-form-id');
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan menghapus data antrean nasabah secara permanen dari periode tertentu!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, reset!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(formId).submit();
                        }
                    });
                });
            });

            const addTellerButton = document.querySelector('.add-teller-button');
            addTellerButton.addEventListener('click', function() {
                const tellerCount = parseInt(this.getAttribute('data-teller-count'));
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    html: `Apakah anda yakin ingin menambah <b>Teller - ${tellerCount+1}</b>?`,
                    icon: 'question',
                    showCancelButton: true, 
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tambahkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('add-teller-form').submit();
                    }
                });
            });

            const addCsButton = document.querySelector('.add-cs-button');
            addCsButton.addEventListener('click', function() {
                const csCount = parseInt(this.getAttribute('data-cs-count'));
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    html: `Apakah anda yakin ingin menambah <b>Customer Services - ${csCount + 1}</b>?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tambahkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('add-cs-form').submit();
                    }
                });
            });

            const removeTellerButton = document.querySelector('.remove-teller-button');
            removeTellerButton.addEventListener('click', function() {
                const tellerCount = this.getAttribute('data-teller-count');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    html: `Apakah anda yakin ingin menghapus <b>Teller - ${tellerCount}</b>?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('remove-teller-form').submit();
                    }
                });
            });

            const removeCsButton = document.querySelector('.remove-cs-button');
            removeCsButton.addEventListener('click', function() {
                const csCount = parseInt(this.getAttribute('data-cs-count'));
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    html: `Apakah anda yakin ingin menghapus <b> Customer Service - ${csCount}</b>?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('remove-cs-form').submit();
                    }
                });
            });
        });
    </script>
</x-settings>