<form method='post' name='form' id="form">
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Tindakan Sertifikasi</strong>
      <div class="pull-right">
        <button type="submit" class="btn btn-primary">
          Simpan
        </button>
        <a href="" class="btn btn-default">Batal</a>
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
          <table class="table table-striped table-hover table-condensed" id="table_alat">
            <thead>
              <tr>
                <th>No</th>
                <th>Alat dan Spek</th>
                <th>Qty</th>
                <th>Catatan Teknis</th>
                <!--<th class="text-center">Tindakan</th>
<th class="text-center">File Pengolahan Data*</th>-->
                <th></th>
              </tr>
            </thead>
            <tbody>


            </tbody>
          </table>
          <br />
          <small><i>* file akan langsung di upload</i></small>
        </div>
      </div>


    </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary">
        Simpan
      </button>
      <a href="" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>

<div class="modal fade" id="modal_detail_kalibrasi" role="dialog">
  <form id="form_detail_kalibrasi" novalidate>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tindakan Sertifikasi <span id="alat"></span></h4>
        </div>
        <div class="modal-body no-padder">
          <table class="table table-condensed table-striped" id="table_detail_kalibrasi">
            <thead>
              <tr>
                <th>No</th>
                <th>Alat dan Spek</th>
                <th>File Pengolahan Data</th>
                <th>File Sertifikasi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </form>
</div>
<!-- /.modal -->

<div class="modal fade" id="modal_tindakan" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Batalkan Kalibrasi ID <span id="alat"></span></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Alasan</label>
          <textarea name="alasan_batal" class="form-control" id="" cols="30" rows="10"></textarea>
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