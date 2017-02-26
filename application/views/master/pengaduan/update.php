<!--setup export pdf / excel-->
<form name="form-update-jenis-pengaduan" id='form-update-jenis-pengaduan' novalidate>
    <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Form Jenis Pengaduan</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">Jenis Pengaduan</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="nama" id="nama" 
                                value="<?php echo $data->nama; ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-2">Keterangan </label>
                                <div class="col-lg-9">
                                    <textarea required name="summernote" class="form-control"
                                                  id="keterangan" cols="20" rows="65">
                                        <?php echo $data->keterangan; ?>
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
