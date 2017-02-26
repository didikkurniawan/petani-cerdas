<div class="panel panel-primary hide">
  <div class="panel-heading">
    <strong>Advance Search</strong>
  </div>
  <div class="panel-body">
  </div>
</div>

<div class="panel panel-default">

  <div class="panel-body no-padder">
    <table class="table table-hover" id="table-perusahaan">
      <thead>
        <tr>
          <th>Tanggal Dibuat</th>
          <th>No Diklat</th>
          <th>Nama Perusahaan</th>
          <th>Status Penawaran</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<div class="modal fade" id="modal_deal" role="dialog">
  <form id="form_deal" name="form_deal" novalidate>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nilai Diklat yang di sepakati</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <!--col-lg-6-->
              <fieldset>
                <legend><small>Total Bayar</small></legend>
                <div class="form-group">
                  <label for="">Jumlah Pembayaran</label>
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" onchange="onChangeNilaiDeal(this)" id="nilai_deal" name="nilai_deal" placeholder="Nilai Deal" autofocus="true" />
                  </div>
                </div>
                <!--<div class="form-group">
                  <label for="">Jumlah DP</label>
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" id="total_dp" name="total_dp" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Invoice Due Date</label>
                  <input type="text" class="form-control" name="due_date" id="due_date" required/>
                </div>-->
              </fieldset>
            </div>
            <!--<div class="col-lg-6">
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
            </div>-->
            <div class="col-lg-12">
              <div class="form-group ">
                <input type="hidden" id="pajak_hidden" />
                <input type="hidden" id="total_hidden" />
                <input type="hidden" id="total_before" />
                <span id="pajak"></span>
                <br/>
                <span id="total"></span>
              </div>
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
<!-- /.modal -->



<div class="modal fade" id="modal_set_tanggal" role="dialog">
  <form id="form_set_tanggal" name="form_set_tanggal" novalidate>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tanggal Pelatihan yang disepakati</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <!--col-lg-6-->
              <fieldset>
                <div class="form-group">
                  <label for="">Jumlah Hari</label>
                  <div class="input-group">
                    <input type="number" class="form-control" onchange="onChangeHari(this)" id="jumlah_hari" name="jumlah_hari" placeholder="Nilai Deal" autofocus="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Tanggal Pelaksanaan</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="tanggal_mulai" value="">
                    <span class="input-group-addon">s/d</span>
                    <input type="text" class="form-control" id="tanggal_selesai" value="" >
                  </div>
                </div>
              </fieldset>
            </div>
            <!--<div class="col-lg-12">
              <div class="form-group ">
                <input type="hidden" id="pajak_hidden" />
              </div>
            </div>-->

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



