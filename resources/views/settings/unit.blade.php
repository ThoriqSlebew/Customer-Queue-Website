<x-settings>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:slug>{{ $slug }}</x-slot:slug>
    <x-slot:namaUnit>{{ $namaUnit }}</x-slot:namaUnit>

    <div x-data="{ showModal: false }" class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form x-ref="form" class="space-y-6" action="{{ route('settings.unit.update', $unit->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <div class="mt-2">
                    <label for="nama" class="block font-semibold font-poppins text-lg text-primary mb-2">Nama
                        Unit</label>
                    <input id="nama" name="nama" type="text" placeholder="Lowokwaru, Malang" value="{{ $unit->nama }}"
                        required
                        class="block w-full rounded-md border-0 py-2 text-primary font-poppins shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-tertiary sm:leading-6">
                </div>
            </div>
            <div>
                <div class="mt-2">
                    <label for="alamat" class="block font-semibold font-poppins text-lg text-primary mb-2">Alamat
                        Unit</label>
                    <textarea id="alamat" name="alamat" type="text"
                        placeholder="Jl. Tlogomas Ruko Megah Jaya No.10, Tlogomas, Kec. Lowokwaru, Kota Malang, Jawa Timur, Malang, Jawa Timur, Indonesia 65144"
                        required
                        class="block w-full rounded-md border-0 py-2 h-32 text-primary font-poppins shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-tertiary sm:leading-6">{{ $unit->alamat }}</textarea>
                </div>
            </div>
            <div>
                <div class="mt-2">
                    <label for="no_telp" class="block font-semibold font-poppins text-lg text-primary mb-2">No Telpon
                        Unit</label>
                    <input id="no_telp" name="no_telp" type="text" placeholder="(0341) 572220"
                        value="{{ $unit->no_telp }}" required
                        class="block w-full rounded-md border-0 py-2 text-primary font-poppins shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-tertiary sm:leading-6">
                </div>
            </div>

            <div class="flex justify-end">
                <button @click="confirmAndSubmit()" type="button"
                    class="save-button w-40 text-lg rounded-2xl bg-gradient-to-r from-primary font-poppins to-secondary py-3 font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary hover:scale-105 transition duration-300 ease-in-out">Simpan</button>
            </div>
        </form>
    </div>
</x-settings>

<script>
    function confirmAndSubmit() {
        var form = document.querySelector('form[x-ref=form]');
        var inputs = form.querySelectorAll('input[required], textarea[required]');
        var isValid = true;

        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                isValid = false;
                return false;
            }
        });

        if (!isValid) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Mohon isi semua kolom sebelum menyimpan!',
            });
            return;
        }

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda yakin ingin menyimpan perubahan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>