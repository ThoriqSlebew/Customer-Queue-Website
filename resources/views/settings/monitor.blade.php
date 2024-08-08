<x-settings>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:slug>{{ $slug }}</x-slot:slug>
    <x-slot:namaUnit>{{ $namaUnit }}</x-slot:namaUnit>

    <div x-data="{ open: false, files: [], showConfirm: false, selectedVideo: localStorage.getItem('selectedVideo') || '{{ $unit->video_id }}', temporarySelectedVideo:  '{{ $unit->video_id }}' || localStorage.getItem('selectedVideo') }"
        class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form id="settingsForm" action="{{ route('settings.monitor.update', $unit->id) }}" method="POST"
            class="space-y-6">
            @method('PUT')
            @csrf
            <div>
                <div class="mt-2">
                    <label for="runningtext"
                        class="block font-semibold font-poppins text-lg leading-6 text-primary mb-2">Running
                        Text</label>
                    <input id="running_text" name="running_text" type="text" value="{{ $unit->running_text }}"
                        placeholder="Selamat Datang di Unit Lowokwaru" required
                        class="block w-full rounded-md border-0 py-2 text-primary shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-tertiary sm:leading-6">
                </div>
            </div>

            <div>
                <label for="video"
                    class="block font-semibold font-poppins text-lg leading-6 text-primary mb-2">Video</label>
                <a href="#" @click="open = true"
                    class="flex w-40 justify-center rounded-2xl bg-gradient-to-r from-primary to-secondary py-3 font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary hover:scale-105 transition duration-300 ease-in-out font-poppins text-lg">Tambah</a>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($videos as $video)
                    <div id="video-{{ $video->id }}"
                        :class="temporarySelectedVideo == {{ $video->id }} ? 'bg-gray-400' : 'bg-primary bg-opacity-5'"
                        class="rounded-lg p-4 ring-1 ring-primary justify-center transition duration-200">
                        <h2 class="text-center font-poppins mb-2">{{ $video->judul }}</h2>
                        <div class="aspect-video w-full bg-white rounded-xl">
                            <video controls class="w-full h-full">
                                <source src="{{ asset($video->path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="flex justify-evenly mt-2 gap-2">
                            <button type="button" onclick="deleteVideo({{ $video->id }}, '{{ $video->judul }}')"
                                :disabled="temporarySelectedVideo == {{ $video->id }}"
                                :class="temporarySelectedVideo == {{ $video->id }} ? 'bg-red-800 cursor-not-allowed' : 'bg-red-600 hover:bg-red-700'"
                                class="font-poppins py-2 px-4 rounded-xl w-full text-white text-center transition duration-200">
                                Hapus
                            </button>
                            <button type="button" @click="temporarySelectedVideo = {{ $video->id }}"
                                :disabled="temporarySelectedVideo == {{ $video->id }}"
                                :class="temporarySelectedVideo == {{ $video->id }} ? 'bg-green-900 cursor-not-allowed' : 'bg-green-600 hover:bg-green-700'"
                                class="font-poppins py-2 px-4 rounded-xl w-full text-white text-center transition duration-200">
                                Tampilkan
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="video_id" :value="temporarySelectedVideo">

            <div class="flex justify-end gap-4">
                <button type="reset"
                    @click="temporarySelectedVideo = selectedVideo; localStorage.removeItem('selectedVideo');"
                    class="w-40 text-lg rounded-2xl bg-gray-500 py-3 font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary hover:scale-105 transition duration-300 ease-in-out">Reset</button>
                <button type="button" onclick="confirmAndSubmit()"
                    class="w-40 text-lg rounded-2xl bg-gradient-to-r from-primary to-secondary py-3 font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary hover:scale-105 transition duration-300 ease-in-out">Simpan</button>
            </div>
        </form>

        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-4 rounded-lg" style="width: 400px; height: 420px;">
                <form @submit.prevent="uploadVideo">
                    @csrf
                    <h1 class="font-poppins font-semibold text-xl text-primary">Tambah Video</h1>
                    <div>
                        <label for="judul" class="block font-poppins text-md text-primary">Judul Video</label>
                        <input type="text" name="judul" id="judul"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-tertiary focus:ring-tertiary sm:text-sm">
                    </div>
                    <div class="mt-4">
                        <label for="video" class="block font-poppins text-md text-primary">Upload Video</label>
                        <div
                            class="mt-1 flex justify-center items-center flex-col px-6 pt-5 pb-6 border-2 h-48 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <img class="mx-auto" src="{{ asset('icons/upload.svg') }}" alt="Upload Video">
                                <div class="text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none ">
                                        <span class="font-poppins">Upload a file</span>
                                        <input id="file-upload" name="video" type="file" class="sr-only"
                                            accept="video/*"
                                            @change="files = $event.target.files; document.getElementById('file-name').textContent = files[0].name;">
                                    </label>
                                    <p class="pl-1 font-poppins">or drag and drop files here</p>
                                    <p id="file-name" class="text-gray-500 mt-2"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="progress-container"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-4 rounded-2xl flex flex-col items-center">
                            <svg class="animate-spin h-20 w-20 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                            <p id="upload-progress" class="mt-2 text-lg font-semibold text-blue-600">0%</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button type="button" @click="open = false"
                            class="mr-2 inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 font-poppins">Batal</button>
                        <button type="button" @click="uploadVideo()"
                            class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 font-poppins">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function submitForm() {
            document.querySelector('#settingsForm').submit();
        }

        function uploadVideo() {
            let judul = document.querySelector('#judul').value;
            let fileInput = document.querySelector('#file-upload').files[0];

            if (!judul || !fileInput) {
                Swal.fire({
                    title: 'Form Belum Lengkap'
                    , text: 'Tolong isi judul dan pilih video terlebih dahulu.'
                    , icon: 'error'
                    , confirmButtonText: 'OK'
                });
                return;
            }

            let formData = new FormData();
            formData.append('judul', judul);
            formData.append('video', fileInput);

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            formData.append('_token', csrfToken);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('settings.video.store') }}', true);

            document.getElementById('progress-container').classList.remove('hidden');

            xhr.upload.onprogress = function(event) {
                if (event.lengthComputable) {
                    let percentComplete = (event.loaded / event.total) * 100;
                    document.getElementById('upload-progress').textContent = percentComplete.toFixed(2) + '%';
                    console.log('Progress: ' + percentComplete.toFixed(2) + '%');
                }
            };

            xhr.addEventListener('load', function() {
                document.getElementById('progress-container').classList.add('hidden');
                if (xhr.status === 200) {
                    Swal.fire({
                        title: 'Upload sukses'
                        , icon: 'success'
                        , confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                        document.querySelector('[x-data]').__x.$data.open = false;
                        document.querySelector('[x-data]').__x.$data.files = [];
                    });
                } else if (xhr.status === 413) {
                    Swal.fire({
                        title: 'Upload gagal'
                        , text: 'file terlalu besar, maksimal 10MB ' + xhr.responseText
                        , icon: 'error'
                        , confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Upload gagal'
                        , text: xhr.responseText
                        , icon: 'error'
                        , confirmButtonText: 'OK'
                    });
                }
            });
            xhr.send(formData);
        }

        function deleteVideo(videoId, videoTitle) {
            Swal.fire({
                title: `Apakah anda yakin menghapus ${videoTitle}?`
                , text: 'Anda tidak akan bisa mengembalikan data yang sudah dihapus'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Hapus Video'
            }).then((result) => {
                if (result.isConfirmed) {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    let xhr = new XMLHttpRequest();
                    xhr.open('DELETE', `/settings/video/${videoId}`, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                    xhr.addEventListener('load', function() {
                        if (xhr.status === 200) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    Swal.fire(
                                        'Terhapus!'
                                        , 'Video berhasil dihapus.'
                                        , 'success'
                                    ).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Gagal!'
                                        , 'Gagal Menghapus :' + response.message
                                        , 'error'
                                    );
                                }
                            } catch (e) {
                                Swal.fire(
                                    'Failed!'
                                    , 'Delete failed: Invalid response from server.'
                                    , 'error'
                                );
                            }
                        } else {
                            Swal.fire(
                                'Failed!'
                                , 'Delete failed: ' + xhr.statusText
                                , 'error'
                            );
                        }
                    });

                    xhr.send();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            let selectedVideo = localStorage.getItem('selectedVideo');
            if (selectedVideo) {
                document.querySelector(`[x-data]`).__x.$data.selectedVideo = selectedVideo;
            }
        });

        function confirmAndSubmit() {
            Swal.fire({
                title: 'Konfirmasi'
                , text: 'Apakah anda yakin ingin menyimpan perubahan?'
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ok'
                , cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // document.querySelector('[x-data]').__x.$data.selectedVideo = document.querySelector('[x-data]').__x.$data.temporarySelectedVideo;
                    submitForm();
                }
            });
        }
    </script>
</x-settings>
