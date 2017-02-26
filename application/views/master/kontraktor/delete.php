<!--setup export pdf / excel-->
<form name="form-delete-kontraktor" id="form-delete-kontraktor" novalidate>
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
                            <label class="col-lg-3">Nama </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.nama" name="nama" id="nama"
                                        value="<?php echo $data->nama; ?>" required disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.alamat" name="alamat" id="alamat" 
                                 value="<?php echo $data->alamat; ?>" required disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">UP</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.contactPerson" id="up" name="up"
                                value="<?php echo $data->up; ?>" disabled required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Contact Person</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.contactPerson" name="contact_person" id="contact_person" 
                                 value="<?php echo $data->contact_person; ?>"
                                 required disabled/>
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
        
    </div>
</form>


