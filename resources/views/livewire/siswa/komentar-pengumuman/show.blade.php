<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Pengumuman & Komentar</title> 
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script> 
</head> 
<body>
<div class="bg-white rounded-xl p-6 shadow max-w-5xl mx-auto mt-10">

    @if ($pengumumans->isEmpty()) 
    <p class="text-center text-gray-500 italic mb-4">
        Tidak ada pengumuman saat ini.
    </p>
@endif

    <!-- Daftar Pengumuman -->
    @foreach ($pengumumans as $pengumuman)
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <p class="font-medium">Nama Guru: <span class="font-bold">{{ $pengumuman->guru->user->name }}</span></p>
             
            </div>
            <hr class="my-4">
            <h3 class="text-xl font-bold mt-2">{{ $pengumuman->judul }}</h3>
            <p class="mt-3 text-gray-700">{{ $pengumuman->isi }}</p>
        </div>
    @endforeach

    <hr class="my-4">
    <h4 class="font-semibold mb-4">Komentar Pengumuman</h4>

    <div class="grid md:grid-cols-2 gap-6">

        <!-- Form Input Komentar -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h2 class="text-lg font-semibold mb-3">Tulis Komentar</h2>

            <form wire:submit.prevent="create" class="mt-3 space-y-3">
                <textarea
                    wire:model="komentar"
                    placeholder="Tulis komentar..."
                    class="w-full border border-gray-300 rounded-lg p-2 h-24 focus:ring focus:ring-blue-200"
                ></textarea>

                <button 
                    type="submit" 
                    wire:click="$set('pengumuman_id', {{ $pengumumans->first()->id ?? 0 }})"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-medium"
                >
                    Kirim Komentar
                </button>
            </form> 
        </div>

        <!-- Riwayat Komentar -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h2 class="text-lg font-semibold mb-4">Riwayat Komentar</h2>

            <div class="space-y-3"> 
                @foreach ($komentars as $komentar)
                    <div class="border rounded-lg p-3 bg-gray-50 flex justify-between items-start">
                        <div>
                            <p class="font-semibold text-sm">{{ $komentar->siswa->user->name }}</p>
                            <p class="text-gray-700 text-sm">{{ $komentar->komentar }}</p>
                            <p class="text-[10px] text-gray-500 mt-1">
                                {{ $komentar->created_at->diffForHumans() }}
                            </p>
                        </div>
                        @if ($komentar->siswa_id === auth()->user()->siswa->id)
                            <button 
                                wire:click="deleteKomentar({{ $komentar->id }})"
                                class="text-red-500 text-sm hover:underline" 
                            >
                                Hapus
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
</body>
</html>
