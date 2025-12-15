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
       <a href="/">
    <img src="{{ asset('img/m3.png') }}" 
         class="absolute w-20 h-20 top-[-40px] left-1/2 -translate-x-1/2 rounded-full object-cover shadow-lg">
</a>

        <h1 class="text-white text-xl mt-10 mb-5 font-semibold">Registrasi</h1>

        <form wire:submit.prevent="register" method="POST" class="flex flex-col items-center">

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
            <option value="" class="text-black">Pilih Status</option>
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

    </div>

</body>
</html>
