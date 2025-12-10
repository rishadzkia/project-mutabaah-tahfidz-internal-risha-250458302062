<div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Siswa Tertanda</h4>
                <p class="card-description">Daftar siswa yang telah ditandai oleh guru</p>
                
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif 

                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead> 
                            <tr>
                                <th>No.</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Hafalan Terkait</th>
                                <th>Keterangan</th>
                                <th>Tanggal Ditandai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswaTertanda as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->siswa->user->name }}</td> 
                                    <td>{{ $item->siswa->kelas }}</td>
                                    <td>
                                        @if($item->hafalan)
                                            {{ $item->hafalan->surah }} ({{ $item->hafalan->ayat }})
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" 
                                            wire:click="hapusTanda({{ $item->id }})"
                                            wire:confirm="Yakin ingin menghapus tanda ini?">
                                            <i class="icon-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada siswa yang ditandai</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
