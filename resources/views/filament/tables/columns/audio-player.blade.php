<div class="px-4 py-3">
    @if ($getState())
        {{-- Mengambil path file dari storage/app/public --}}
        @php
            // $getState() berisi string path file: audio/murottal/xxx.mp3
            $filePath = asset('storage/' . $getState());
        @endphp

        <audio controls class="w-full h-8">
            {{-- src harus berupa URL publik --}}
            <source src="{{ $filePath }}" type="audio/mpeg">
            Browser Anda tidak mendukung elemen audio.
        </audio>
    @else
        <span class="text-gray-500">- Tidak Ada Audio -</span>
    @endif
</div>