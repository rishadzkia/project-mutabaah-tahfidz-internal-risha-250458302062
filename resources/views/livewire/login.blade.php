<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script> 
    @livewireStyles
</head>
<body 
    class="min-h-screen bg-cover bg-center flex items-center justify-center" 
      style="background-color: #7ab8c3;"
 

>

    <!-- Container -->
    <div class="relative bg-black/40 backdrop-blur-sm p-6 w-72 rounded-2xl text-center">

        <!-- Profile Image -->
        <a href="/">
    <img src="{{ asset('img/m3.png') }}" 
         class="absolute w-20 h-20 top-[-40px] left-1/2 -translate-x-1/2 rounded-full object-cover shadow-lg">
</a>

        <h1 class="text-white text-xl mt-10 mb-5 font-semibold">Login</h1>

        <form  wire:submit.prevent="login" class="flex flex-col items-center">

          
            <input 
                type="text" 
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

            <!-- Button -->
            <button 
                type="submit"
                
                class="w-48 py-2 rounded-full bg-white hover:bg-indigo-500 hover:text-white transition font-semibold mt-2"
            >
                Login
            </button>

        </form>

        <!-- Forgot Link -->
        <a href="{{ route('register') }}" class="text-white text-sm mt-4 block hover:text-indigo-400">Registrasi Disini!</a>

    </div>
@livewireScripts
</body>
</html>
