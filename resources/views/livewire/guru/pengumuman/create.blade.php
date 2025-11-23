 <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" wire:submit.prevent="create">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Guru</label>
                        <input type="text" class="form-control" wire:model="name" disabled id="exampleInputUsername1" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul Pengumuman</label>
                        <input type="text" class="form-control" wire:model="judul" id="exampleInputEmail1">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Isi Pengumuman</label>
                        <input type="text" class="form-control" wire:model="isi" id="exampleInputPassword1" >
                      </div>
                     
                      <button type="submit" class="btn btn-primary me-2">Kirim Pengumuman</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>