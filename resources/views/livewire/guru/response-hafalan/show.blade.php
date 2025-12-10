<div x-data>

    <div class="col-lg-12 grid-margin stretch-card"> 
        <div class="card border-0 rounded-4 shadow-sm">
            <div class="card-body">

                <h4 class="card-title fw-bold mb-4 text-primary">Response Hafalan Siswa</h4>
                
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div> 
                @endif 

                {{-- Tambahkan alert error --}}
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Search Box --> 
                <div class="mb-4">
                    <input type="text" 
                        wire:model.live="search" 
                        class="form-control form-control-lg border-2 rounded-3 shadow-sm"
                        placeholder=" Cari nama siswa...">
                </div>

                <!-- Filter Section -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="fw-semibold mb-1">Filter Bulan</label>
                        <select class="form-control border-3 rounded-3 shadow-sm" wire:model.live="filterMonth">
                            <option value="">-- Semua Bulan --</option>
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}">
                                    {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="fw-semibold mb-1">Filter Tanggal</label>
                        <input type="date" 
                            class="form-control border-2 rounded-3 shadow-sm"
                            wire:model.live="filterDate">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden">
                        <thead class="bg-light">
                            <tr class="text-center fw-semibold">
                                <th>No.</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Surah</th>
                                <th>Ayat</th>
                                <th>Juz</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($responseHafalan as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->siswa->user->name }}</td>
                                    <td>{{ $item->siswa->kelas }}</td> 
                                    <td>{{ $item->surah }}</td>
                                    <td>{{ $item->ayat }}</td>
                                    <td>{{ $item->juz }}</td> 
                                    <td>
                                        <select class="form-select form-select-sm border-2 rounded-3 shadow-sm" 
                                            wire:change="updateStatus({{ $item->id }}, $event.target.value)">
                                            <option value="disetor" {{ $item->status == 'disetor' ? 'selected' : '' }}>Disetor</option>
                                            <option value="lulus" {{ $item->status == 'lulus' ? 'selected' : '' }}>Lulus</option>
                                            <option value="perbaikan" {{ $item->status == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                        </select>
                                    </td>
                                    <td>{{ $item->created_at->format('d F Y') }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm px-3 py-2 rounded-3 shadow-sm" 
                                            wire:click="tandaiSiswa({{ $item->id }})"
                                            wire:confirm="Yakin ingin menandai hafalan siswa ini?">
                                            <i class="icon-flag"></i> Tandai 
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">Tidak ada data hafalan yang perlu direspon</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>