<!--setup export pdf / excel-->
<form name="form-order" novalidate>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Order Form</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Nama Perusahaan</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.namaPerusahaan"
                                       name="nama-perusahaan" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Contact Person</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.contactPerson" name="contact-person"
                                       required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="vm.alamat" name="alamat" required/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
</form>
