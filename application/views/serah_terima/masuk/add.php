<form name="form_order" id="form_order" method="post" action="">
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Form Serah Terima</strong>
      <div class="pull-right">
        <button type="submit" class="btn btn-primary">
          Simpan dan Cetak
        </button>
        <a href="" class="btn btn-default">Batal</a>
      </div>
    </div>
    <div class="panel-body">

      <fieldset>
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <select name="cari_no_penawaran" class="form-control" data-placeholder="Ketikan nomor penawaran atau nama perusahaan" id="" required></select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 no-padder">
            <table class="table table-hover" id="table-alat">
              <thead>
                <tr>
                  <th></th>
                  <th>Jenis Order</th>
                  <th>Alat dan Spek</th>
                  <th>Qty</th>
                  <!--<th class="text-right">Action</th>-->
                </tr>
              </thead>
              <tbody>


              </tbody>

            </table>
          </div>
        </div>
      </fieldset>
    </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary">
        Simpan dan Cetak
      </button>
      <a href="" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>


<div class="modal fade" id="modal_deal" role="dialog">
  <form id="form_deal" name="form_deal" novalidate>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Detail serah terima</h4>
        </div>
        <div class="modal-body no-padder">
          <div class="row">
            <div class="col-lg-12">
              <div class="panel-body no-padder">
                <table class="table table-striped" id="table-detail">
                  <thead>
                    <tr>
                      <th>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="check_all" onclick="onClickCheckAll()" /> Check All
                          </label>
                        </div>
                      </th>
                      <th>Nama dan Spesifikasi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="check_all" onclick="onClickCheckAll()" /> Check All
                          </label>
                        </div>
                      </th>
                      <th>Nama dan Spesifikasi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>-->

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </form>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!--<div class="modal fade" id="modal_detail_serah_terima" role="dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Nilai Penawaran yang di sepakati</h4>
</div>
<div class="modal-body">
<div class="row">
<fieldset>
<div class="panel-body no-padder">
<table class="table table-hover" id="table-alat">
<thead>
<tr>
<th>Jenis Order</th>
<th>Alat dan Spek</th>
<th>Qty</th>
<th>Status Penerimaan</th>
<th>Action</th>

</tr>
</thead>
<tbody>
</tbody>

</table>
</div>
</fieldset>
</div>
</div>
</div>
</div>
</div>
</div>-->