<!--setup export pdf / excel-->
<form name="form_update_serah_terima" id="form_update_serah_terima" method="post" action="">
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Form Update Serah Terima</strong>
        </div>
        <div class="panel-body">
            <fieldset>
                <div class="row">
                    <div class="col-lg-12">
                    <input type="hidden"  value="<?php echo $id; ?>" name="id" id="id"/>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-lg-4">No Order</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control" name="nama_perusahaan" 
                                    value="<?php echo $detail_serah_terima->no_order; ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-lg-4">Nama Perusahaan</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control" name="nama_perusahaan" 
                                    value="<?php echo $detail_serah_terima->nama; ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-hover" id="table-alat">
                            <thead>
                            <tr>
                                <th>Jenis Order</th>
                                <th>Alat dan Spek</th>
                                <th>Qty</th>
                                <th>Status Penerimaan</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>


                            </tbody>

                        </table>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="panel-footer text-right">
            <button type="button" id='back' class="btn btn-danger">
               Kembali
            </button>
        </div>
    </div>
</form>

