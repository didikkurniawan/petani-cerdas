<!--setup export pdf / excel-->
<form name="form_order" id="form_order" method="post" action="" novalidate>
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Form Penawaran Biaya</strong>
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
              <div class="col-lg-2">
                <select required class="form-control" name="jenis_customer" onchange="onChangeJenisCustomer(this)">
                  <option value="">-Jenis Customer-</option>
                  <option value="baru">Customer Baru</option>
                  <option value="lama">Customer Lama (Langganan)</option>
                </select>
              </div>
              <div class="col-lg-10 hide" id="container_cari_perusahaan">
                <div class="row">
                  <div class="col-lg-12">
                    <select required class="form-control" name="nama_perusahaan" style="width: 100%;" data-placeholder="Cari Customer berdasarkan Nama Perusahaan / No Telepon / Alamat"></select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr/>
      </fieldset>
      <fieldset>
        <div class="row">
          <div class="col-lg-12 hide" id="container_perusahaan_bukan_langganan">
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Nama Perusahaan</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="nama_perusahaan" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Contact Person</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="contact_person" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Alamat</label>
                <div class="col-lg-10">
                  <textarea name="alamat" class="form-control" id="" cols="20" rows="5"></textarea>
                </div>
              </div>
            </div>
            <hr/>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jenis Order</label>
                <div class="col-lg-3">
                  <select name="jenis_order" class="form-control" id="jenis_order" onchange="onChangeJenisOrder()">
                    <option value="">-Jenis Order-</option>
                    <option value="ORD" selected>ORD</option>
                    <option value="ORD-N">ORD-N</option>
                    <option value="SK">SK</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- ORD GROUP-->
            <div id="ord_group">
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Nama Alat</label>
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-6">
                        <select required name="cari_nama_alat" onchange="onChangeNamaAlat()" data-placeholder="Cari Nama Alat" class="form-control" id=""></select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Spesifikasi Global</label>
                  <div class="col-lg-10">
                    <textarea required name="spesifikasi_global" class="form-control summernote" id="" cols="20" rows="15"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-12 text-right">
                    <a onclick="tambahAlat()" class="btn btn-success">
                      <i class="fa fa-plus"></i> Tambahkan
                    </a>
                  </div>
                </div>
              </div>

            </div>
            <!-- / END ORD GROUP-->

            <!-- ORD-N GROUP-->
            <div id="ordn_group">
              
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Nama Alat</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="ordn_nama_alat" id="ordn_nama_alat" />
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Spesifikasi Global</label>
                  <div class="col-lg-10">
                    <textarea required name="ordn_spesifikasi_global" class="form-control summernote" id="ordn_spesifikasi_global" cols="20" rows="15"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Harga Satuan</label>
                  <div class="col-lg-6">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                      <input type="number" class="form-control" name="ordn_harga_satuan" id="ordn_harga_satuan" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-12 text-right">
                    <a onclick="tambahAlatOrdn()" class="btn btn-success">
                      <i class="fa fa-plus"></i> Tambahkan
                    </a>
                  </div>
                </div>
              </div>

            </div>
            <!-- / END ORD-N GROUP-->

            <!-- SK GROUP-->
            <div id="sk_group">
              
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Sub Kontrak</label>
                  <div class="col-lg-6">
                    <select name="sk_sub_kontrak" id="sk_sub_kontrak" class="form-control" style="width: 100%;" id="sk_sub_kontrak"></select>
                  </div>
                  <div class="col-lg-2">
                    <a data-toggle="modal" data-target="#modal_add_sub_kontrak" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Nama Alat</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="sk_nama_alat" id="sk_nama_alat" />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Spesifikasi Global</label>
                  <div class="col-lg-10">
                    <textarea required name="sk_spesifikasi_global" class="form-control summernote" id="sk_spesifikasi_global" cols="20" rows="15"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2 text-right">Harga Satuan</label>
                  <div class="col-lg-6">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                      <input type="number" class="form-control" name="sk_harga_satuan" id="sk_harga_satuan" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-12 text-right">
                    <a onclick="tambahAlatSk()" class="btn btn-success">
                      <i class="fa fa-plus"></i> Tambahkan
                    </a>
                  </div>
                </div>
              </div>


            </div>
            <!-- tabel alat-->
            <div class="col-lg-12">
              <table class="table table-hover table-striped" id="table-alat">
                <thead>
                  <tr>
                    <th>Jenis Order</th>
                    <th>Alat dan Spek</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3" class="text-right">Sub Total</th>
                    <th colspan="2" class="text-right currency" id="ord_sub_total"></th>
                  </tr>
                  <tr>
                    <th colspan="3" class="text-right">Diskon</th>
                    <th colspan="2">
                      <div class="row">
                        <div class="col-lg-3">
                          <select name="jenis_diskon" class="form-control" id="jenis_diskon">
                            <option value="Rp" selected>Rp</option>
                            <option value="Persen">%</option>
                          </select>
                        </div>
                        <div class="col-lg-9">
                          <input onchange="onChangeDiskon(this, 'ord')" id="ord_diskon" type="number" class="form-control" placeholder="Diskon dalam persen" aria-describedby="basic-addon1">
                        </div>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <th colspan="3" class="text-right">Pajak (10%)</th>
                    <th colspan="2" class="text-right currency" id="ord_pajak"></th>
                  </tr>

                  <tr>
                    <th colspan="3" class="text-right">Total</th>
                    <th colspan="2" class="text-right currency" id="ord_total">

                    </th>
                  </tr>
                </tfoot>
              </table>
              <input type="hidden" id="ord_total_hidden" />
              <input type="hidden" id="ord_pajak_hidden" />
              <input type="hidden" id="ord_sub_total_hidden" />
            </div>
            <!-- / end tabel alat-->
            <!-- / END SK GROUP-->
          </div>

        </div>
      </fieldset>
      <fieldset>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <div class="form-group">
              <label for="">Upload PO</label>
              <div class="input-group">
                <input type="file" class="form-control upload_po" id="upload_po" />
                <span class="input-group-btn">
<button class="btn btn-default" type="button">Preview</button>
</span>
              </div>
            </div>
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


<?php $this->load->view('penerimaan_sample/penawaran_biaya/modal/add_sub_kontrak'); ?>