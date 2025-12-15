<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

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

        <h1 class="text-white text-xl mt-10 mb-5 font-semibold">Lengkapi Profile</h1>

        <form wire:submit.prevent="simpan" method="POST" class="flex flex-col items-center">


              <select 
    wire:model="user_id"
    class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none"
>
    <option value="" class="text-black">Pilih Guru</option> 

    @foreach ($userList as $user)
        <option value="{{ $user->id }}" class="text-black">
            {{ $user->name }}
        </option>
    @endforeach
</select>

            <!-- Input Nama -->
            <input 
                type="text" 
                placeholder="Kelas"
                wire:model="kelas"
                class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
            >

            <!-- Input Email -->
            <input 
                type="text" 
                placeholder="angkatan"
                wire:model="angkatan"
                class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
            >

            <!-- Input Password -->
            <input 
                type="file" 
                placeholder="Foto"
                wire:model="image"
                class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none placeholder-gray-300"
            >

            <!-- Select Role -->
                 <select 
    wire:model="guru_id"
    class="w-full bg-transparent border-b-2 border-white text-white px-2 py-2 mb-4 focus:outline-none"
>
    <option value="" class="text-black">Pilih Guru</option>

    @foreach ($guruList as $guru)
        <option value="{{ $guru->id }}" class="text-black">
            {{ $guru->name }}
        </option>
    @endforeach
</select>



            <!-- Button -->
            <button 
                type="submit"
                wire:submit.prevent="simpan"
                class="w-48 py-2 rounded-full bg-white hover:bg-indigo-500 hover:text-white transition font-semibold mt-2"
            >
                Simpan
            </button>

        </form>


    </div>

</body>
</html>
