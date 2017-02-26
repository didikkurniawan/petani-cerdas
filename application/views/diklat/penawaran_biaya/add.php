<!--setup export pdf / excel-->
<form name="form_order" id="form_order" method="post" action="">
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
        <hr />
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
            <hr />
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jenis Pelatihan</label>
                <div class="col-lg-6">
                  <select required class="form-control" name="jenis_pelatihan" id="jenis_pelatihan" style="width: 100%;" data-placeholder="Cari Jenis Pelatihan"></select>
                </div>
                <div class="col-lg-2">
                    <a data-toggle="modal" data-target="#modal_add_pelatihan" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                </div>

              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Nama Kegiatan</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jumlah Peserta</label>
                <div class="col-lg-2">
                  <input type="number" class="form-control" onchange="onChangeJumlahPeserta(this)" id="jumlah_peserta" name="jumlah_peserta" />
                </div>

              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Lokasi</label>
                <div class="col-lg-6">
                  <textarea name="lokasi" id="lokasi" class="form-control" cols="30" rows="10"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jumlah Hari</label>
                <div class="col-lg-2">
                  <input type="number" class="form-control" onchange="onChangeJumlahHari(this)" name="jumlah_hari" id="jumlah_hari" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Tarif Per Peserta</label>
                <div class="col-lg-6">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" onchange="onChangeTarif(this)" name="tarif_per_peserta" id="tarif_per_peserta" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                  &nbsp;
                </div>
                <div class="col-lg-6 text-right">
                <br>
                <table class="table table-hover table-striped" id="table-alat">
                <tfoot>
                  <tr>
                    <th colspan="3" class="text-right">Sub Total</th>
                    <th colspan="2" class="text-right currency" id="sub_total"></th>
                  </tr>
                  <tr>
                    <th colspan="3" class="text-right">Pajak (10%)</th>
                    <th colspan="2" class="text-right currency" id="pajak"></th>
                  </tr>

                  <tr>
                    <th colspan="3" class="text-right">Total</th>
                    <th colspan="2" class="text-right currency" id="total">

                    </th>
                  </tr>
                </tfoot>
              </table>
              <input type="hidden" id="total_hidden" />
              <input type="hidden" id="pajak_hidden" />
              <input type="hidden" id="sub_total_hidden" />
                </div>
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


<div class="modal fade" id="modal_add_pelatihan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <form name="form-pelatihan" id="form-pelatihan">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Jenis Pelatihan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-2 text-right">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nama" id="name" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

            </div>
        </div>
        </form>
    </div>
</div>
