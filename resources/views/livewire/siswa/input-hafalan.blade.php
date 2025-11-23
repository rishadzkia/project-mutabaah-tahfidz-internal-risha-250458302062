<div class="bg-white p-6 rounded-lg shadow-md">

    <h2 class="text-2xl font-semibold mb-6 text-gray-700"> 
        ✏️ Input Hafalan
    </h2>

    <form wire:submit.prevent="simpan">  
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal</label>
                <input type="date" wire:model="tanggal"
                       class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Surah/Juz</label>
                <input type="text" wire:model="surah"
                       class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

        </div> 

        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
            Simpan
        </button>
    </form>

    <hr class="my-6">

    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-medium text-gray-600">Tanggal</th>
                <th class="px-4 py-3 text-left font-medium text-gray-600">Surah</th>
                <th class="px-4 py-3 text-left font-medium text-gray-600">Ayat</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach($hafalan as $row)
                <tr>
                    <td class="px-4 py-3">{{ $row->tanggal }}</td>
                    <td class="px-4 py-3">{{ $row->surah }}</td>
                    <td class="px-4 py-3">{{ $row->ayat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
