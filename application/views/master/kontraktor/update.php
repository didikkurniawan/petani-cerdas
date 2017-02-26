<!--setup export pdf / excel-->
<!--setup export pdf / excel-->
<form name="form-update-kontraktor" id="form-update-kontraktor" novalidate>
    <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Form Kontraktor</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Nama </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.nama" name="nama" id="nama"
                                        value="<?php echo $data->nama; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.alamat" name="alamat" id="alamat" 
                                 value="<?php echo $data->alamat; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">UP</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.contactPerson" name="up" id="up" 
                                 value="<?php echo $data->up; ?>"
                                 required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Contact Person</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" v-model="vm.contactPerson" name="contact_person" id="contact_person" 
                                 value="<?php echo $data->contact_person; ?>"
                                 required />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
            <button type="button" id="back" class="btn btn-danger">
                Kembali
            </button>
        </div>
    </div>
</form>

