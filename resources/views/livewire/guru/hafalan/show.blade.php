<div x-data>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card border-0 rounded-4 shadow-sm">
            <div class="card-body">

               
                <h4 class="card-title fw-bold mb-4 text-primary"> Data Hafalan Siswa</h4>

                
                <div class="mb-4">
                    <input type="text" 
                        wire:model.live="search" 
                        class="form-control form-control-lg border-2 rounded-3 shadow-sm"
                        placeholder=" Cari nama siswa...">
                </div>

              
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

               
                <button class="btn btn-danger px-4 py-2 rounded-3 shadow-sm mb-3" wire:click="exportPDF">
                     Export PDF
                </button>

                
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
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($hafalan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->siswa->user->name }}</td>
                                <td>{{ $item->siswa->kelas }}</td>
                                <td>{{ $item->surah }}</td>
                                <td>{{ $item->ayat }}</td>
                                <td>{{ $item->juz }}</td>
                                <td> 
                                @php
                                $status = strtolower($item->status);
                                $badgeClass = match ($status) {
                                    'disetor'    => 'bg-primary',
                                    'lulus'      => 'bg-success',
                                    'perbaikan'  => 'bg-warning text-dark',
                                    default      => 'bg-secondary',
        };
    @endphp

    <span class="badge {{ $badgeClass }} px-3 py-2 text-capitalize">
        {{ $item->status }}
    </span>
</td>

                                <td>{{ $item->created_at->format('d F Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

       
       

    </div>

</div>
