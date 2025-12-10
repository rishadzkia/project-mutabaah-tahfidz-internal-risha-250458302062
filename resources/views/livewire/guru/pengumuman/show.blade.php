<div class="col-lg-12 grid-margin stretch-card">
    <div class="card border rounded-3 shadow-sm">
        <div class="card-body">

            <h4 class="card-title mb-4 fw-bold">Daftar Pengumuman</h4>

            <div class="text-end mb-4">
                <a href="{{ route('guru.create.pengumuman') }}" 
                   class="btn btn-primary">
                    Tambah Pengumuman
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="bg-light">
                        <tr class="fw-semibold">
                            <th>No.</th>
                            <th>Nama Guru</th>
                            <th>Judul Pengumuman</th>
                            <th>Isi Pengumuman</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pengumuman as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->guru->user->name }}</td>
                            <td>{{ $item->judul }}</td>
                            <td class="text-wrap" style="max-width: 300px;">
                                {{ $item->isi }} 
                            </td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>

                            <td class="d-flex gap-2">
                               <button 
                                class="btn btn-sm btn-danger"
                                wire:click="destroy({{ $item->id }})"
                                onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                                </button>


                                <a href="{{ route('guru.update.pengumuman', $item->id) }}" 
                                   class="btn btn-sm btn-outline-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
