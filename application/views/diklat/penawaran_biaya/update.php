<!--setup export pdf / excel-->
<form name="form_update_diklat" id="form_update_diklat" method="post" action="">
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
                    <input type="hidden" name="is_deal" id="is_deal" value="<?php echo $detail_diklat->is_deal; ?>"/>     
                    <input type="hidden" name="id" id="id" value="<?php echo $detail_diklat->id; ?>"/>
                    <input type="text" class="form-control" name="no_diklat" id="no_diklat" value="<?php echo $detail_diklat->no_diklat; ?>" disabled/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Nama Perusahaan</label>
                <div class="col-lg-6">
                  <!--<input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value=""/>-->
                  <input type="hidden" name="id_pelanggan_hidden" id="id_pelanggan_hidden" value="<?php echo $detail_diklat->id_pelanggan; ?>"/>
                    <input type="hidden" name="nama_pelanggan_hidden" id="nama_pelanggan_hidden" value="<?php echo $detail_diklat->nama; ?>"/>
                  <select required class="form-control" name="nama_perusahaan" style="width: 100%;" data-placeholder="Cari Customer berdasarkan Nama Perusahaan / No Telepon / Alamat"></select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jenis Pelatihan</label>
                <div class="col-lg-6">
                    <input type="hidden" name="id_pelatihan_hidden" id="id_pelatihan_hidden" value="<?php echo $detail_diklat->jenis_pelatihan; ?>"/>
                    <input type="hidden" name="pelatihan_hidden" id="pelatihan_hidden" value="<?php echo $detail_diklat->nama_pelatihan; ?>"/>
                  <select required class="form-control" name="jenis_pelatihan" id="jenis_pelatihan" value="" style="width: 100%;" >
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Nama Kegiatan</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan"  value="<?php echo $detail_diklat->nama_kegiatan; ?>" required />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jumlah Peserta</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control"  onchange="onChangeJumlahPeserta(this)"   id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $detail_diklat->jumlah_peserta; ?>" required />
                </div>

              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Lokasi</label>
                <div class="col-lg-6">
                  <textarea name="lokasi" id="lokasi" class="form-control" cols="30" rows="10" ><?php echo $detail_diklat->lokasi; ?></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Jumlah Hari</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control"  name="jumlah_hari" id="jumlah_hari" onchange="onChangeJumlahHari(this)" value="<?php echo $detail_diklat->jumlah_hari; ?>"  />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                 <label class="col-lg-2 text-right">Tanggal Pelaksanaan</label>
                <div class="col-lg-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="tanggal_mulai" value="<?php echo $detail_diklat->tanggal_mulai; ?>" >
                    <span class="input-group-addon">s/d</span>
                    <input type="text" class="form-control" id="tanggal_selesai" value="<?php echo $detail_diklat->tanggal_selesai; ?>" >
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-lg-2 text-right">Tarif Per Peserta</label>
                <div class="col-lg-6">
                    <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control"  name="tarif_per_peserta" id="tarif_per_peserta" onchange="onChangeTarif(this)" value="<?php echo $detail_diklat->tarif; ?>"  />
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
            <button type="submit" class="btn btn-primary">
                Ubah
            </button>
            <button type="button" id="back" class="btn btn-danger">
                Batal
            </button>
    </div>
  </div>
</form>