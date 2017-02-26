<div class="panel panel-primary hide">
  <div class="panel-heading">
    <strong>Advance Search</strong>
  </div>
  <div class="panel-body">
  </div>
</div>

<div class="panel panel-default">

  <div class="panel-body no-padder">
    <table class="table table-hover" id="table-pengaduan-customer">
      <thead>
        <tr>
          <th>Tanggal Pengaduan</th>
          <th>Nama Perusahaan</th>          
          <th>Jenis Pengaduan</th>
          <th>Status</th>
          <th>Urgansi</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>


<!--<form method="post" id="form-keterangan" name="form-keterangan">-->
<div class="modal fade" id="modal_deal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Keterangan penyelesaian pengaduan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="row">
                            <label class="col-lg-2">
                                Petugas
                            </label>
                            <div class="col-lg-10">
                                <select required class="form-control" id="nama_petugas"  name="nama_petugas" style="width: 100%;" 
                                data-placeholder="Cari Petugas"></select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <label class="col-lg-2">
                                Status Pengaduan
                            </label>
                            <div class="col-lg-10">
                                <div class="radio">
                                    <label><input type="radio" name="penanganan" id="penanganan" value="Dibatalkan">Dibatalkan</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="penanganan" id="penanganan" value="Dalam Proses">Dalam Proses</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="penanganan" id="penanganan" value="Selesai">Selesai</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">
                                Keterangan Pengaduan
                            </label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <textarea name="keterangan" id="keterangan" ></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpanPenanganan(this)" class="btn btn-primary" id="btn_simpan">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--</form>-->