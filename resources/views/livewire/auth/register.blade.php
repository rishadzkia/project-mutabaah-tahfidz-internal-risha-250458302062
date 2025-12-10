<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script> 
</head> 

<body 
    class="min-h-screen flex items-center justify-center"
    style="background-color: #7ab8c3;"
>

    <!-- Container -->
    <div class="relative bg-black/40 backdrop-blur-sm p-6 w-72 rounded-2xl text-center">

        <!-- Profile Image -->
        <img src="{{ asset('img/m3.png') }}" 
             class="absolute w-20 h-20 top-[-40px] left-1/2 -translate-x-1/2 rounded-full object-cover shadow-lg">

        <h1 class="text-white text-xl mt-10 mb-5 font-semibold">Register</h1>

        <form action="#" wire:submit.prevent="register" method="POST" class="flex flex-col items-center">

            <!-- Input Nama -->
            <input 
                type="text" 
                placeholder="Nama Lengkap"
                wire:model="name"
                class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
            >

            <!-- Input Email -->
            <input 
                type="email" 
                placeholder="Email"
                wire:model="email"
                class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
            >

            <!-- Input Password -->
            <input 
                type="password" 
                placeholder="Password"
                wire:model="password"
                class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
            >

            <!-- Select Role -->
                    <select 
            wire:model="role"
            class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none"
        >
            <option value="" class="text-black">Pilih Role</option>
                <option value="guru" class="text-black">Guru</option>
                <option value="siswa" class="text-black">Siswa</option>
        </select>


            <!-- Button -->
            <button 
                type="submit"
                class="w-48 py-2 rounded-full bg-white hover:bg-indigo-500 hover:text-white transition font-semibold mt-2"
            >
                Register 
            </button>

        </form>

        <a href="{{ route('login') }}" class="text-white text-sm mt-4 block hover:text-indigo-400">
            Sudah punya akun? Login
        </a>

@if ($role === 'guru')
<input type="file" wire:model="foto_url" class="w-full text-white mb-4
           file:bg-white file:text-black file:rounded-lg 
           file:px-3 file:py-1 file:border-none
           bg-transparent border-b-2 border-white 
           focus:outline-none"/>
            <!-- Mapel Diampu -->
            <input 
                type="text" 
                placeholder="Mapel Diampu"
                wire:model="mapel_diampu"
                class="w-full bg-transparent border-b-2 border-white text-white 
                       px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
            >

            <!-- Mulai Kerja -->
            <input 
                type="date"
                wire:model="mulai_kerja"
                class="w-full bg-transparent border-b-2 border-white text-white 
                       px-2 py-2 mb-4 focus:outline-none
                       [color-scheme:dark]"
            >
        @endif

        @if ($role === 'siswa')
            <label class="text-white mb-1 text-sm self-start">Upload Foto</label>

            <input 
                type="file" 
                wire:model="image"
                class="w-full text-white mb-4
                       file:bg-white file:text-black file:rounded-lg 
                       file:px-3 file:py-1 file:border-none
                       bg-transparent border-b-2 border-white 
                       focus:outline-none"
            >

            <!-- Preview -->
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" 
                     class="w-24 h-24 rounded-lg object-cover mb-4 shadow">
            @endif

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
        @endif
    </div>

</body>
</html>
