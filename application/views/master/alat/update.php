<!--setup export pdf / excel-->
<!--setup export pdf / excel-->
<form name="form-update-alat" id="form-update-alat" novalidate>
    <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Order Form</strong>
        </div>
        <div class="panel-body">
            <div class="row">
               <div class="col-lg-12">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">Bidang</label>
                            <div class="col-lg-4">
                                <select required class="form-control" name="bidang" id="bidang">
                                    <option value="<?php echo $data->bidang; ?>"><?php echo $data->bidang; ?></option>
                                    <option value="Termometer">Termometer</option>
                                    <option value="Suhu">Suhu</option>
                                    <option value="Tekanan">Tekanan</option>
                                    <option value="Masa">Masa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">Nama Barang</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                        value="<?php echo $data->nama; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">Harga</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="harga" id="harga" 
                                 value="<?php echo $data->harga; ?>"
                                 required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">Scope</label>
                            <div class="col-lg-4">
                                <select required class="form-control" name="scope" id="scope">
                                    <option value="<?php echo $data->scope; ?>"><?php echo $data->scope; ?></option>
                                    <option value="ORD">ORD</option>
                                    <option value="ORD-N">ORD-N</option>
                                    <option value="SK">SK</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">Spesifikasi </label>
                                <div class="col-lg-9">
                                    <textarea required name="summernote" class="form-control"
                                                  id="spesifikasi" cols="20" rows="15" required>
                                    <?php echo $data->spesifikasi; ?>              
                                    </textarea>

                                </div>
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
                Kembali
            </button>
        </div>
    </div>
</form>

