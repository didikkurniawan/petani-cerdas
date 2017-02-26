<form novalidate>
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Pembayaran</strong>
      <br/>
      <i>No Invoice</i>
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
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="">Jenis Pembayaran</label>
                <select required name="jenis_pembayaran" class="form-control" id="" onchange="onChangeJenisPembayaran(this)">
                  <option value="" disabled selected>-Pilih Jenis Pembayaran-</option>
                  <option value="Tunai">Tunai / Transfer</option>
                  <option value="Invoice">Invoice</option>
                </select>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="form-group">
                <label>No Order</label>
                <select name="no_order" data-placeholder="Ketikan nomor order atau nama perusahaan" class="form-control" id="select_no_order"></select>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-hover table-striped" id="table_alat">
            <thead>
              <tr>
                <th>Bidang Kalibrasi</th>
                <th>Alat</th>
                <th>Spesifikasi Global</th>
                <th>Qty</th>
                <th class="text-right">Harga</th>

              </tr>
            </thead>
            <tbody>


            </tbody>
            <tfoot>
              <tr>
                <th colspan="4" class="text-right">Sub Total</th>
                <th colspan="2" class="text-right currency" id="sub_total"></th>
              </tr>
              <tr>
                <th colspan="4" class="text-right">Diskon</th>
                <th colspan="2">
                  <div class="input-group pull-right">

                    <input onchange="onChangeDiskon(this)" id="diskon" type="number" class="form-control" placeholder="Diskon dalam persen" aria-describedby="basic-addon1">
                    <span class="input-group-addon" id="basic-addon1">%</span>
                  </div>
                </th>
              </tr>
              <tr>
                <th colspan="4" class="text-right">Pajak (10%)</th>
                <th colspan="2" class="text-right currency" id="pajak"></th>
              </tr>

              <tr>
                <th colspan="4" class="text-right">Total</th>
                <th colspan="2" class="text-right currency" id="total">

                </th>
              </tr>
              <tr>
                <th colspan="4" class="text-right"><i>Deal</i></th>
                <th colspan="2" class="text-right currency" id="total_deal">

                </th>
              </tr>
            </tfoot>
          </table>
          <input type="hidden" id="total_hidden" />
          <input type="hidden" id="pajak_hidden" />
          <input type="hidden" id="sub_total_hidden" />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7">
          <label>Catatan</label>
          <textarea name="catatan" id="catatan" cols="30" rows="10"></textarea>
        </div>
        <div class="col-lg-5" id="container_due_date">
          <div class="form-group">
            <label for="">Invoice Due Date</label>
            <input type="text" class="form-control" name="due_date" required/>
          </div>
          <div class="form-group">
            <label for="">Jumlah DP</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="number" class="form-control" name="jumlah_dp" id="jumlah_do" />
            </div>
          </div>
          <div class="form-group">
            <label for="">&nbsp;</label>
            <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_pelunasan">Pelunasan</a>
          </div>
        </div>
        <div class="col-lg-5" id="container_tunai">

          <div class="form-group">
            <label>Jumlah Pembayaran</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" />
            </div>
          </div>
          <div class="form-group">
            <label for="">Via</label>
            <select name="via" id="via" class="form-control">
              <option value="" disabled selected>-Pilih Via-</option>
              <option value="1">Kasir / Adm</option>
              <option value="2">BNI 0482378923 - AN. Indocal Lab, pt.</option>
              <option value="3">BRI 2399082394 - AN. Indocal Lab, pt.</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Tanggal Bayar</label>
            <input type="text" class="form-control" name="tanggal_bayar" required/>
          </div>
          <div class="form-group">
            <label for="">Bukti Bayar</label>
            <input type="file" class="form-control" name="file_bukti_bayar" id="file_bukti_bayar" />
          </div>
        </div>
      </div>

    </div>
    <div class="panel-footer text-right">
      <button class="btn btn-primary">
        Simpan dan Cetak
      </button>
      <a href="" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>

<div class="modal fade" id="modal_pelunasan" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pelunasan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Jumlah Pembayaran</label>
          <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" />
          </div>
        </div>
        <div class="form-group">
          <label for="">Via</label>
          <select name="via" id="via" class="form-control">
            <option value="" disabled selected>-Pilih Via-</option>
            <option value="1">Kasir / Adm</option>
            <option value="2">BNI 0482378923 - AN. Indocal Lab, pt.</option>
            <option value="3">BRI 2399082394 - AN. Indocal Lab, pt.</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Tanggal Bayar</label>
          <input type="text" class="form-control" name="tanggal_bayar" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->