<div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Guru</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script> 
</head>

<body 
    class="min-h-screen flex items-center justify-center"
    style="background-color: #7ab8c3;"
>

    <!-- Container -->
    <div class="relative bg-black/40 backdrop-blur-sm p-6 w-72 rounded-2xl text-center">

        <!-- Image Above Card -->
        <img src="{{ asset('img/m3.png') }}" 
             class="absolute w-20 h-20 top-[-40px] left-1/2 -translate-x-1/2 rounded-full object-cover shadow-lg">

        <h1 class="text-white text-xl mt-10 mb-5 font-semibold">Input Data Guru</h1>

        <form wire:submit.prevent="save" class="flex flex-col items-center">

            <!-- Foto URL -->
           <input 
    type="file" 
    wire:model="foto_url"
    class="w-full text-white mb-4
           file:bg-white file:text-black file:rounded-lg 
           file:px-3 file:py-1 file:border-none
           bg-transparent border-b-2 border-white 
           focus:outline-none"
/>


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

            <!-- Button -->
            <button 
                type="submit"
                class="w-48 py-2 rounded-full bg-white hover:bg-indigo-500 hover:text-white 
                       transition font-semibold mt-2"
            >
                Simpan
            </button>

        </form>

    </div>

</body>
</html>

</div>
