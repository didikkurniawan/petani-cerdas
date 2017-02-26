<!--setup export pdf / excel-->
<form name="form-add-kontraktor" id='form-add-kontraktor' novalidate>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Order Form</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Nama Kontraktor</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.nama"
                                       name="nama" id="nama" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.alamat" id="alamat" name="alamat" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">UP</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.contactPerson" id="up" name="up"
                                       required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Contact Person</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.contactPerson" id="contact_person" name="contact-person"
                                       required/>
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
