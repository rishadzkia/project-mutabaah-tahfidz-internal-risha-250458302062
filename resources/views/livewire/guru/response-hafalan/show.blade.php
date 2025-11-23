 <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
 
 <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                   
                    </p>
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
                            <th>Tandai Siswa</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($responseHafalan as $item )
                          <tr>
                              
                          
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->hafalan?->siswa?->user?->name }}</td> 
                            <td>{{ $item->hafalan->siswa->kelas }}</td>
                           
                            <td>{{ $item->hafalan->surah }}</td>
                            <td>{{ $item->hafalan->ayat }}</td>
                            <td>{{ $item->hafalan->juz }}</td>
                            <td>{{ $item->hafalan->status }}</td>
                            <td>{{ $item->is_marked }}</td>
                        </tr>
                        @endforeach
                         
                          
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                  </div>
