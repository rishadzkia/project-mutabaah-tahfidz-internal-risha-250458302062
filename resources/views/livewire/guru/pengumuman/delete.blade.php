@if ($show)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-80">

            <h2 class="text-xl font-bold text-red-600 mb-3">Hapus Pengumuman</h2>

            <p class="mb-4">
                Yakin menghapus
                <span class="font-semibold text-blue-600">"{{ $judul }}"</span>?
            </p>

            <div class="flex justify-end gap-3">
                <button wire:click="$set('show', false)"
                        class="px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Batal
                </button>

                <button wire:click="delete"
                        class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Hapus
                </button>
            </div>

        </div>
    </div>
@endif
