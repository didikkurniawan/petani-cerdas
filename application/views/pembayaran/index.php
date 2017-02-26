<div class="panel panel-primary hide">
  <div class="panel-heading">
    <strong>Advance Search</strong>
  </div>
  <div class="panel-body">
  </div>
</div>

<div class="panel panel-default">

  <div class="panel-body no-padder">
    <table class="table table-hover table-condensed" id="table-perusahaan">
      <thead>
        <tr>
          <th>Tanggal Dibuat</th>
          <th>No Invoice</th>
          <th>No Penawaran</th>
          <th>Nama Perusahaan</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<!--modal detail pembayaran-->
<div class="modal fade" id="modal_detail_pembayaran" role="dialog">
  <form id="form_detail_pembayaran" name="form_detail_pembayaran" novalidate>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header no-overflow">
          <strong>Detail Pembayaran</strong>

          <button class="btn btn-info pull-right btn-sm">Cetak</button>

        </div>
        <div class="modal-body">
          <div class="wrapper-md">
            <div>
              <!--<i class="fa fa-apple fa fa-3x"></i>-->
              <div class="row">
                <div class="col-xs-6">
                  <h4><strong class="nama_perusahaan"></strong></h4>
                  <p id="email"></p>
                  <p class="alamat">

                  </p>
                  <p id="telepon">

                  </p>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="h4" id="no_invoice"></p>
                  <h5 id="due_date"></h5>
                </div>
              </div>
              <div class="well m-t bg-light lt">
                <div class="row">
                  <div class="col-xs-6">
                    <strong>DARI:</strong>
                    <?php $this->load->view('indocal');?>
                  </div>
                  <div class="col-xs-6">
                    <strong>KEPADA:</strong>
                    <h4 class="nama_perusahaan">John Smith</h4>
                    <p class="alamat">
                      2nd Floor
                      <br> St John Street, Aberdeenshire 2541
                      <br> United Kingdom
                      <br> Phone: 031-432-678
                      <br> Email: youemail@gmail.com
                      <br>
                    </p>
                  </div>
                </div>
              </div>

              <div class="line"></div>
              <table class="table table-striped bg-white b-a" id="table_alat">
                <thead>
                  <tr>
                    <th style="width: 60px">QTY</th>
                    <th>ALAT</th>
                    <th style="width: 140px">HARGA</th>
                    <th style="width: 90px">TOTAL</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                    <td id="sub_total">$1607.00</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-right no-border"><strong>Diskon</strong> &nbsp;<span id="jenis_diskon"></span></td>
                    <td>

                      <span id="diskon"></span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-right no-border"><strong>Pajak</strong></td>
                    <td id="pajak">$0.00</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-right no-border"><strong>Total</strong></td>
                    <td><strong id="total">$1607.00</strong></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!--modal deal-->
<div class="modal fade" id="modal_deal" role="dialog">
  <form id="form_deal" name="form_deal" novalidate>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Bayar Invoice</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <fieldset>
                <legend><small>Total Bayar</small></legend>
                <div class="form-group">
                  <label for="">Jumlah Pembayaran</label>
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" disabled onchange="onChangeNilaiDeal(this)" id="nilai_deal" name="nilai_deal" placeholder="Nilai Deal" autofocus="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Jumlah DP</label>
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" disabled class="form-control" id="total_dp" name="total_dp" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Sisa Pembayaran</label>
                  <input type="number" class="form-control" name="sisa_pembayaran" id="sisa_pembayaran" required/>
                </div>
                <div class="form-group ">
                  <input type="hidden" id="pajak_hidden" />
                  <input type="hidden" id="total_hidden" />
                  <input type="hidden" id="total_before" />
                  <span class="pajak"></span>
                  <br/>

                  <span class="total"></span>
                </div>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <legend><small>Pembayaran</small></legend>
                <div class="form-group">
                  <label for="">Via</label>
                  <select name="via" id="via" class="form-control" required>
                    <option value="" disabled selected>-Pilih Via-</option>
                    <option value="1">Kasir / Adm</option>
                    <option value="2">BNI 0482378923 - AN. Indocal Lab, pt.</option>
                    <option value="3">BRI 2399082394 - AN. Indocal Lab, pt.</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Upload Bukti Pembayaran </label>
                  <input type="file" class="form-control" name="file_bukti_pembayaran" id="file_bukti_pembayaran" />
                  <i class="pull-right"><small>file dalam bentuk gambar atau dokumen pdf</small></i>
                </div>
              </fieldset>
              <fieldset>
                <legend><small>Invoice</small></legend>
                <div class="form-group">
                  <label for="">Kirim Invoice Ke ?</label>
                  <div class="radio">
                    <label>
                      <input type="radio" value="0" name="kirim_invoice" /> Alamat Perusahaan
                    </label>
                    &nbsp;
                    <label>
                      <input type="radio" value="1" name="kirim_invoice" /> Alamat Invoice
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="alamat_invoice" class="form-control" id="alamat_invoice" cols="30" rows="10"></textarea>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </form>
  <!-- /.modal-dialog -->
</div>