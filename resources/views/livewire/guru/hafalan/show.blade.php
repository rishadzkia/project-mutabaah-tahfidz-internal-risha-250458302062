 <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
 
 <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                   
                    <input type="text" wire:model.live="search" 
               class="form-control mb-3" 
               placeholder="Cari nama siswa...">

     
        <button class="btn btn-danger mb-3" wire:click="exportPDF">
            Export PDF
        </button>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
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
                            @foreach ($hafalan as $item )
                          <tr>
                              
                          
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->siswa->user->name }}</td>
                            <td>{{ $item->siswa->kelas }}</td>
                           
                            <td>{{ $item->surah }}</td>
                            <td>{{ $item->ayat }}</td>
                            <td>{{ $item->juz }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at->format('d F Y') }}</td>
                        </tr>
                        @endforeach
                         
                          
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                  </div>
