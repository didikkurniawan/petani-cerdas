<form method='post' name='form' id="form">
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Serah Terima Keluar</strong>
      <div class="pull-right">
        <button type="submit" class="btn btn-primary">
          Simpan dan Cetak
        </button>
        <a data-toggle="modal" data-target="#modal_batal_verifikasi" class="btn btn-default">Batal</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label>No Order</label>
            <select required name="no_order" data-placeholder="Ketikan nomor order atau nama perusahaan" class="form-control" id=""></select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-hover" id="table_alat">
            <thead>
              <tr>
                <th></th>
                <th>No</th>
                <th>Bidang</th>
                <th>Alat</th>
                <th class="text-center">Tindakan</th>
              </tr>
            </thead>
            <tbody>


            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <label>Catatan</label>
          <textarea name="catatan" id="catatan" cols="30" rows="10"></textarea>
        </div>
        <div class="col-lg-6">

          <div class="row">
            <div class="col-lg-12">
              <label for="">Rancangan Operasional</label>
              <table class="table table-striped table-condensed" id="table_ro">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Nominal</th>
                  </tr>

                </thead>
                <tbody>

                </tbody>
              </table>
              <tbody>
                <tr></tr>
              </tbody>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary">
        Simpan dan Cetak
      </button>
      <a data-toggle="modal" data-target="#modal_batal_verifikasi" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>


<div class="modal fade" id="modal_batal_verifikasi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Batalkan Verifikasi <span id="alat"></span></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Alasan</label>
          <textarea name="alasan_batal" class="form-control" id="alasan_batal" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitBatal()" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->