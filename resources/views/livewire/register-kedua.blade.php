<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Lanjutan</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
</head>

<body 
    class="min-h-screen flex items-center justify-center"
    style="background-color: #7ab8c3;"
>

    <!-- Card -->
    <div class="relative bg-black/40 backdrop-blur-sm p-6 w-72 rounded-2xl text-center">

        <!-- Avatar -->
        <img src="{{ asset('img/m3.png') }}" 
             class="absolute w-20 h-20 top-[-40px] left-1/2 -translate-x-1/2 rounded-full object-cover shadow-lg">

        <h1 class="text-white text-xl mt-10 mb-5 font-semibold">
            Lengkapi Data
        </h1>

        {{-- ================= FORM GURU ================= --}}
        @if ($role === 'guru')
            <form wire:submit.prevent="save" class="flex flex-col items-center">

                <!-- Foto -->
                <input 
                    type="file"  
                    wire:model="foto_url"
                    class="w-full text-white mb-4
                           file:bg-white file:text-black file:rounded-lg 
                           file:px-3 file:py-1 file:border-none
                           bg-transparent border-b-2 border-white 
                           focus:outline-none"
                />

                <!-- Mapel -->
                <input 
                    type="text"
                    placeholder="Mapel Diampu"
                    wire:model="mapel_diampu"
                    class="w-full bg-transparent border-b-2 border-white text-white 
                           px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
                >

                <!-- Tanggal mulai kerja -->
                <input 
                    type="date"
                    wire:model="mulai_kerja"
                    class="w-full bg-transparent border-b-2 border-white text-white 
                           px-2 py-2 mb-4 focus:outline-none
                           [color-scheme:dark]"
                >

                <button 
                    type="submit"
                    class="w-48 py-2 rounded-full bg-white hover:bg-indigo-500 hover:text-white 
                           transition font-semibold mt-2"
                >
                    Simpan
                </button>
            </form>

        {{-- ================= FORM SISWA ================= --}}
        @elseif ($role === 'siswa')
            <form wire:submit.prevent="save" class="flex flex-col items-center">

                <!-- Upload Foto -->
                <label class="text-white mb-1 text-sm self-start">
                    Upload Foto
                </label>

                <input 
                    type="file" 
                    wire:model="image"
                    class="w-full text-white mb-4
                           file:bg-white file:text-black file:rounded-lg 
                           file:px-3 file:py-1 file:border-none
                           bg-transparent border-b-2 border-white 
                           focus:outline-none"
                >

                <!-- Kelas -->
                <input 
                    type="text"
                    placeholder="Kelas"
                    wire:model="kelas"
                    class="w-full bg-transparent border-b-2 border-white text-white 
                           px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
                >

                <!-- Angkatan -->
                <input 
                    type="text"
                    placeholder="Angkatan"
                    wire:model="angkatan"
                    class="w-full bg-transparent border-b-2 border-white text-white 
                           px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
                >

                <!-- Guru ID -->
                <input 
                    type="text"
                    placeholder="Guru ID"
                    wire:model="guru_id"
                    class="w-full bg-transparent border-b-2 border-white text-white 
                           px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
                >

                <button 
                    type="submit"
                    class="w-48 py-2 rounded-full bg-white hover:bg-indigo-500 hover:text-white 
                           transition font-semibold mt-2"
                >
                    Simpan
                </button>
            </form>
        @endif 

    </div>

    @livewireScripts
</body>
</html>
