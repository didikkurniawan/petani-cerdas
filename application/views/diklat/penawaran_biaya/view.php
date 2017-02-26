<!--setup export pdf / excel-->
<form name="form_view_diklat" id="form_view_diklat" method="post" action="">
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Form Detail Penawaran Biaya Diklat</strong>
    </div>
    <div class="panel-body">
          <div class="col-lg-12">
              <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">No Diklat</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="no_diklat" id="no_diklat" value="<?php echo $detail_diklat->no_diklat; ?>" disabled/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Nama Perusahaan</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $detail_diklat->nama; ?>" disabled/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jenis Pelatihan</label>
                <div class="col-lg-6">
                  <select disabled required class="form-control" name="jenis_pelatihan" id="jenis_pelatihan" value="" style="width: 100%;" data-placeholder="Cari Jenis Pelatihan">
                      <option value="<?php echo $detail_diklat->nama_pelatihan; ?>"><?php echo $detail_diklat->nama_pelatihan; ?></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Nama Kegiatan</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="<?php echo $detail_diklat->nama_kegiatan; ?>" disabled />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jumlah Peserta</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $detail_diklat->jumlah_peserta; ?>" disabled />
                </div>

              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Lokasi</label>
                <div class="col-lg-6">
                  <textarea name="lokasi" id="lokasi" class="form-control" cols="30" rows="10" disabled><?php echo $detail_diklat->lokasi; ?></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jumlah Hari</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control"  name="jumlah_hari" id="jumlah_hari" value="<?php echo $detail_diklat->jumlah_hari; ?>" disabled />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                 <label class="col-lg-2 text-right">Tanggal Pelaksanaan</label>
                <div class="col-lg-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="tanggal_mulai" value="<?php echo $detail_diklat->tanggal_mulai; ?>" disabled>
                    <span class="input-group-addon">s/d</span>
                    <input type="text" class="form-control" id="tanggal_selesai" value="<?php echo $detail_diklat->tanggal_selesai; ?>" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Tarif Per Peserta</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control"  name="tarif_per_peserta" id="tarif_per_peserta" value="<?php echo $detail_diklat->tarif; ?>" disabled />
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
                  </tr>
                  <tr>
                    <th colspan="3" class="text-right">Total Deal</th>
                    <th colspan="2" class="text-right currency" id="total_deal"></th>
                  </tr>
                </tfoot>
              </table>
              <input type="hidden" id="total_hidden" value="<?php echo $detail_diklat->total; ?>" />
              <input type="hidden" id="pajak_hidden" value="<?php echo $detail_diklat->pajak; ?>"/>
              <input type="hidden" id="sub_total_hidden" value="<?php echo $detail_diklat->subtotal; ?>"/>
              <input type="hidden" id="total_deal_hidden" value="<?php echo $detail_diklat->total_deal; ?>"/>
                </div>
              </div>
            </div>
            

          </div>
    </div>
    <div class="panel-footer text-right">
      <button type="button" id="back" class="btn btn-primary">
        Kembali
      </button>
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
