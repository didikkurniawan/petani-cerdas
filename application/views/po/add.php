<!--setup export pdf / excel-->
<form name="form_order" id="form_order" method="post" action="" novalidate>
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Form Penawaran Biaya</strong>
      <div class="pull-right">
        <button type="submit" class="btn btn-primary">
          Simpan
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
      
    </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary">
        Simpan
      </button>
      <a href="" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>


<?php $this->load->view('penerimaan_sample/penawaran_biaya/modal/add_sub_kontrak'); ?>