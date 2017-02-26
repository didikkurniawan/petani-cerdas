<form method='post' name='form' id="form">
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Rancangan Operasional</strong>
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
                <th>Jenis Order</th>
                <th>Alat dan Spek</th>
                <th>Qty</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>


            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <label>Catatan</label>
          <textarea name="catatan" id="catatan" cols="30" rows="10"></textarea>
        </div>
        <div class="col-lg-7">

          <div class="row">
            <div class="col-lg-12">
              <table class="table table-striped table-condensed" id="table_ro">
                <thead>
                  <tr>
                    <th>Item <a data-toggle="modal" data-target="#modal_add_item" class="pull-right text-primary"><i class="fa fa-plus"></i></a> </th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>
                      <select name="item" id="item" class="form-control input-sm">
                        
                      </select>
                    </td>
                    <td>
                      <input type="number" class="form-control input-sm" name="nominal" id="nominal" placeholder="Rp." />
                    </td>
                    <td>
                      <input type="text" class="form-control input-sm" name="keterangan" id="keterangan" />
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm" onclick="tambahRo()"><i class="fa fa-plus"></i></a>
                    </td>
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
        Simpan
      </button>
      <a href="" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>

<div class="modal fade" id="modal_add_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form id="form_add_item" novalidate>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Item</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Item</label>
            <input type="text" required name="nama_item" id="nama_item" class="form-control" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

        </div>
      </div>
    </div>
  </form>
</div>



