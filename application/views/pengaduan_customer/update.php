<form method="post" id="form-update-pengaduan-customer" name="form-update-pengaduan-customer">
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Pengaduan Customer</strong>
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
                <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
                <input type="hidden" value="<?php echo $detail_pengaduan->id_pelanggan; ?>" name="id_pelanggan" id="id_pelanggan"/>
                <input type="hidden" value="<?php echo $detail_pengaduan->nama; ?>" name="nama_pelanggan" id="nama_pelanggan"/>
                <input type="hidden" value="<?php echo $detail_pengaduan->id_jenis_pengaduan; ?>" name="id_pengaduan" id="id_pengaduan"/>
                <input type="hidden" value="<?php echo $detail_pengaduan->nama_pengaduan; ?>" name="nama_pengaduan" id="nama_pengaduan"/>
                
                <select required class="form-control" id="nama_perusahaan"  name="nama_perusahaan" style="width: 100%;" 
                data-placeholder="Cari Customer berdasarkan Nama Perusahaan / No Telepon / Alamat" >
                    <!--<option value="<?php echo $detail_pengaduan->nama; ?>"><?php echo $detail_pengaduan->nama; ?></option>-->
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-lg-2 text-right">Jenis Pengaduan</label>
              <div class="col-lg-4">
                <select required class="form-control" id="jenis_pengaduan" name="jenis_pengaduan" style="width: 100%;" 
                data-placeholder="cari jenis Pengaduan" >
                    <!--<option value="<?php echo $detail_pengaduan->nama_pengaduan; ?>"><?php echo $detail_pengaduan->nama_pengaduan; ?></option>-->
                </select>
              </div>
              <label class="col-lg-2 text-right">Urgensi</label>
              <div class="col-lg-4">
                <select name="urgensi" id="urgensi" class="form-control" >
                  <option selected value="<?php echo $detail_pengaduan->urgensi; ?>" selected><?php echo $detail_pengaduan->urgensi; ?></option>
                  <option value="Medium">Medium</option>
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
                <textarea name="pesan" id="pesan" >
                    <?php echo $detail_pengaduan->pesan; ?>
                </textarea>
              </div>               
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary">
            Ubah
        </button>
        <button type="button" id="back" class="btn btn-danger">
            Kembali
        </button>
    </div>
  </div>
</form>