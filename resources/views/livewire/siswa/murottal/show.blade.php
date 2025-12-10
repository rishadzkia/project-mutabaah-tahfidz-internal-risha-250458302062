<div x-data> {{-- ROOT UTAMA Livewire --}}

    <div class="card text-center">
        <div class="card-header">
            Murottal Surat Pilihan
        </div>

        <div class="card-body">

            <div class="accordion accordion-flush" id="accordionFlushExample">

                @foreach ($murottal as $index => $item)
                    <div class="accordion-item border rounded-3 mb-3 shadow-sm">

                        <h2 class="accordion-header">
                            <button 
                                class="accordion-button collapsed ayat-accordion"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#c{{ $index }}"
                            >
                                <span class="flex-grow-1 fw-semibold">
                                    {{ $item->surah }}
                                </span>
                            </button>
                        </h2>

                        <div 
                            id="c{{ $index }}" 
                            class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample"
                        >
                            <div class="accordion-body">

                                <!-- AUDIO PLAYER -->
                                <audio controls class="w-100 rounded-3 shadow-sm">
                                    <source 
                                        src="{{ asset('/storage/app/public/audio/murottal' . $item->file_url) }}" 
                                        type="audio/mp3"
                                    >
                                </audio>

                                <!-- Deskripsi -->
                                <p class="mt-3 text-muted">
                                    {{ $item->qari_name }}
                                </p>

                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

        <div class="card-footer text-body-secondary"></div>
    </div>

</div>
