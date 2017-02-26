<!--setup export pdf / excel-->
<form name="form-delete-pelanggan" id="form-delete-pelanggan" novalidate>
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Delete Alat</strong>
        </div>
                <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Nama</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.nama"
                                       name="nama" id="nama" value="<?php echo $data->nama; ?>" required disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Telepon</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" v-model="vm.telepon" name="telepon" id="telepon"
                                       value="<?php echo $data->telepon; ?>" required disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Fax</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.fax" name="fax" id="fax" 
                                value="<?php echo $data->fax; ?>" required disabled/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Email</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" v-model="vm.email" name="email" id="email" 
                                value="<?php echo $data->email; ?>" required disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">UP</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="up" id="up" 
                                value="<?php echo $data->up;?>"required disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Contact Person</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.contactPerson" name="contact_person" id="contact_person" 
                                value="<?php echo $data->contact_person;?>"required disabled/>
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat</label>
                            <div class="col-lg-9">
                                <textarea cols="2" rows="2" class="form-control" name="alamat" id="alamat" required disabled><?php echo $data->alamat;?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat Invoice</label>
                            <div class="col-lg-9">
                                <textarea cols="2" rows="2" class="form-control" name="alamat_invoice" id="alamat_invoice" required disabled><?php echo $data->alamat_invoice;?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Provinsi</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_provinsi" onchange="onChangeNamaProvinsi()"
                                                data-placeholder="Cari Nama Provinsi" class="form-control"
                                                id="cari_nama_provinsi"  disabled>
                                                <option value="<?php echo $data->provinsi; ?>"> <?php echo $data->provinsi; ?> </option>                                                
                                        </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kabupaten/Kota</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_kabupaten" onchange="onChangeNamaKabupaten()"
                                                data-placeholder="Cari Nama Kabupaten/Kota" class="form-control"
                                                id="cari_nama_kabupaten"  disabled>
                                                <option value="<?php echo $data->kota; ?>"> <?php echo $data->kota; ?> </option>
                                        </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kecamatan</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_kecamatan" onchange="onChangeNamaKecamatan()"
                                                data-placeholder="Cari Nama Kecamatan" class="form-control"
                                                id="cari_nama_kecamatan" disabled>
                                                <option value="<?php echo $data->kecamatan;?>"><?php echo $data->kecamatan;?></option>
                                        </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kelurahan/Desa</label>
                            <div class="col-lg-9">
                                        <select required name="cari_nama_kelurahan" onchange="onChangeNamaKelurahan()"
                                                data-placeholder="Cari Nama Kelurahan" class="form-control"
                                                id="cari_nama_kelurahan"  disabled>
                                                <option value="<?php echo $data->kelurahan; ?>" > <?php echo $data->kelurahan; ?> </option>
                                        </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Kode Pos</label>
                            <div class="col-lg-9">
                                    <select required name="kodepos" class="form-control" id="kodepos" 
                                             disabled>
                                            <option><?php echo $data->kodepos; ?></option>
                                    </select>    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">
                Hapus
            </button>
            <button type="button" id="back" class="btn btn-danger">
                Batal
            </button>
        </div>
    </div>
</form>


