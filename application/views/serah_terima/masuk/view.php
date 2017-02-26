<!--setup export pdf / excel-->

<form name="form-serah-terima-masuk" id="form-serah-terima-masuk" novalidate>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Form Serah terima</strong>
        </div>
        <div class="panel-body">

            <fieldset>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 ">Nomor Penawaran</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="no_penawaran" 
                                        value="<?php echo $detail_serah_terima->no_penawaran; ?>" disabled/> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    Tanggal Penawaran <br>
                                    <label><i><?php echo $detail_serah_terima->tanggal_penawaran; ?></i></label>
                                </div>
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 ">Nomor Order</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="no_order" 
                                        value="<?php echo $detail_serah_terima->no_order; ?>" disabled/> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    Tanggal Order <br>
                                    <label><i><?php echo $detail_serah_terima->created_at; ?></i></label>
                                </div>
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 ">Nama Perusahaan</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="nama_perusahaan" 
                                        value="<?php echo $detail_serah_terima->nama; ?>" disabled/> 
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 ">Total Harga Deal</label>
                                    <div class="col-lg-8" >
                                        <input type="text" class="form-control" name="total_deal" id="total_deal" 
                                        value="<?php echo $detail_serah_terima->total_deal; ?>" disabled/> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                       <div class="panel-body no-padder">
                                <table class="table table-hover table-striped" id="table-alat-serah-terima">
                                    <thead>
                                    <tr>
                                        <th>Jenis Order</th>
                                        <th>Alat dan Spek</th>
                                        <th>Qty</th>
                                        <th>Harga Penawaran</th>
                                        <th>Status Penerimaan</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="panel-footer text-right">
            <button type="button" id="back" class="btn btn-primary">
                Back
            </button>
        </div>
    </div>
</form>
