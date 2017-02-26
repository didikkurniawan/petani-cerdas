<!--setup export pdf / excel-->
<form name="form-add-pelanggan" id="form-add-pelanggan" novalidate>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Form Pelanggan</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Nama</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="nama" id="nama" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Telepon</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="telepon" id="telepon"
                                       required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Fax</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="fax" id="fax" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Email</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="email" id="email" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">UP</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="up" id="up" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Contact Person</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="contact_person" id="contact_person" required/>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6">
                     <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat</label>
                            <div class="col-lg-9">
                                <textarea cols="2" rows="2" class="form-control" name="alamat" id="alamat" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat Invoice</label>
                            <div class="col-lg-9">
                                <textarea cols="2" rows="2" class="form-control" name="alamat_invoice" id="alamat_invoice" required ></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Provinsi</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_provinsi" 
                                                data-placeholder="Cari Nama Provinsi" class="form-control"
                                                id="cari_nama_provinsi">
                                        </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kabupaten/Kota</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_kabupaten" 
                                                data-placeholder="Cari Nama Kabupaten/Kota" class="form-control"
                                                id="cari_nama_kabupaten">
                                        </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kecamatan</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_kecamatan" 
                                                data-placeholder="Cari Nama Kecamatan" class="form-control"
                                                id="cari_nama_kecamatan">
                                        </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kelurahan/Desa</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_kelurahan" 
                                                data-placeholder="Cari Nama Kelurahan" class="form-control"
                                                id="cari_nama_kelurahan">
                                        </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kode Pos</label>
                            <div class="col-lg-9">
                                  <select required name="kodepos" class="form-control" id="kodepos" 
                                   data-placeholder="Cari Kode Pos">
                                    </select>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <button type="button" id="back" class="btn btn-danger">
                Kembali
            </button>
        </div>
    </div>
</form>
