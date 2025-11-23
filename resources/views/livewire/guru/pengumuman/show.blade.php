 <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
 
 <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                   <div class="text-end mb-5">
                      <a href="{{ route('guru.create.pengumuman') }}" class="btn btn-primary border-amber-50">Tambah Pengumuman</a>
                   </div>
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama Guru</th>
                            <th>Judul Pengumuman</th>
                            
                            <th>Isi Pengumuman</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $item )
                          <tr>
                              
                          
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->guru->user->name }}</td>
                            <td>{{ $item->judul }}</td>
                           
                            <td>{{ $item->isi }}</td>
                            <td>
                         
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus? Semua hasil vote akan hilang!')">
                            <span class="glyphicon glyphicon-trash"></span> Hapus
                        </button>
                    </form>
                              <a href="{{ route('guru.update.pengumuman', $item->id) }}"  class="btn btn-outline-success m-1">Edit</a>
                            </td>
                            
                        </tr>
                        @endforeach
                         
                          
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                  </div>
                  
