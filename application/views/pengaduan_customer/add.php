<form method="post" id="form-pengaduan-customer" name="form-pengaduan-customer">
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Pengaduan Customer</strong>
      <div class="pull-right">
        <button class="btn btn-primary">
          Simpan dan Cetak
        </button>
        <a href="" class="btn btn-default">Batal</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <div class="row">
              <label class="col-lg-2 text-right">
                Customer
              </label>
              <div class="col-lg-10">
                <select required class="form-control" id="nama_perusahaan"  name="nama_perusahaan" style="width: 100%;" 
                data-placeholder="Cari Customer berdasarkan Nama Perusahaan / No Telepon / Alamat"></select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-lg-2 text-right">Jenis Pengaduan</label>
              <div class="col-lg-4">
                <select required class="form-control" id="jenis_pengaduan" name="jenis_pengaduan" style="width: 100%;" data-placeholder="cari jenis Pengaduan"></select>
              </div>
              <label class="col-lg-2 text-right">Urgensi</label>
              <div class="col-lg-4">
                <select name="urgensi" id="urgensi" class="form-control">
                  <option value="Medium" selected>Medium</option>
                  <option value="High">High</option>
                  <option value="Low">Low</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-lg-2 text-right">Pesan</label>
              <div class="col-lg-10">
                <textarea name="pesan" id="pesan" ></textarea>
              </div>               
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer no-overflow">
      <div class="pull-right">
        <button class="btn btn-primary">
          Simpan dan Cetak
        </button>
        <a href="" class="btn btn-default">Batal</a>
      </div>
    </div>
  </div>
</form>