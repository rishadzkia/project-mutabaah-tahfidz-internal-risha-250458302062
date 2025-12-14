<div class="card text-center">
    <div class="card-header">
        Murottal Surat Pilihan
    </div>

    <div class="card-body">

        {{-- LIVEWIRE JANGAN SENTUH --}}
        <div class="accordion accordion-flush" id="accordionFlushExample" wire:ignore.self>

            @foreach ($murottal as $index => $item)
                <div class="accordion-item border rounded-3 mb-3 shadow-sm"> 

                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button 
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapse{{ $index }}"
                            aria-expanded="false"
                            aria-controls="collapse{{ $index }}"
                        >
                            <span class="flex-grow-1 fw-semibold">
                                {{ $item->surah }}
                            </span>
                        </button>
                    </h2>

                    <div 
                        id="collapse{{ $index }}" 
                        class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $index }}"
                        data-bs-parent="#accordionFlushExample"
                    >
                        <div class="accordion-body">

                            <!-- AUDIO -->
                            <audio controls class="w-100 rounded-3 shadow-sm">
                                <source 
                                    src="{{ asset('storage/audio/murottal/' . $item->file_url) }}" 
                                    type="audio/mpeg"
                                >
                                Browser tidak mendukung audio.
                            </audio>

                            <p class="mt-3 text-muted">
                                {{ $item->qari_name }}
                            </p>

                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</div>
