<!--setup export pdf / excel-->
<form name="form-delete-penawaran-biaya" id="form-delete-penawaran-biaya" novalidate>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Order Form</strong>
        </div>
         <div class="panel-body">
            <fieldset>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
                            <div class="row">
                                <label class="col-lg-2 ">Nomor Penawaran</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="no_penawaran" 
                                    value="<?php echo $detail_penawaran->no_penawaran; ?>" disabled/>
                                </div>
                            </div>
                        </div>
                        <!-- ORD GROUP-->
                        <div id="ord_group">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2 ">Nama</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="nama_perusahaan" 
                                         value="<?php echo $detail_penawaran->nama; ?>" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Jenis Order</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="jenis_order" 
                                        value="<?php echo $detail_penawaran->jenis_order; ?>" disabled/>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="nilai_sub_total" value="<?php echo $detail_penawaran->sub_total; ?>">
                            <input type="hidden" id="nilai_diskon" value="<?php echo $detail_penawaran->diskon; ?>">
                            <input type="hidden" id="nilai_pajak" value="<?php echo $detail_penawaran->pajak; ?>">
                            <input type="hidden" id="nilai_total" value="<?php echo $detail_penawaran->total; ?>">
                            <input type="hidden" id="nilai_total_deal" value="<?php echo $detail_penawaran->total_deal; ?>">
                            
                            <!-- tabel alat-->
                            <div class="col-lg-12">
                            <div class="panel-body no-padder">
                                <table class="table table-hover table-striped" id="table-alat">
                                    <thead>
                                    <tr>
                                        <th>Jenis Order</th>
                                        <th>Alat</th>
                                        <th>Spesifikasi</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                                <table class="table table-striped">
                                    <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right">Sub Total</th>
                                        <th colspan="2" class="text-right currency" id="subtotal">
                                            <?php echo $detail_penawaran->sub_total; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Diskon</th>
                                        <th colspan="2" class="text-right currency" id="diskon">
                                            <?php echo $detail_penawaran->diskon; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Pajak (10%)</th>
                                        <th colspan="2" class="text-right currency" id="pajak">
                                            <?php echo $detail_penawaran->pajak; ?>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="4" class="text-right">Total</th>
                                        <th colspan="2" class="text-right currency" id="total">
                                            <?php echo $detail_penawaran->total; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Total Deal</th>
                                        <th colspan="2" class="text-right currency" id="total_deal">
                                            <?php echo $detail_penawaran->total_deal; ?>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>  
                            </div>
                            <!-- / end tabel alat-->
                        </div>
                        <!-- / END ORD GROUP-->
                    </div>

                </div>
            </fieldset>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">
                Hapus
            </button>
            <button type="button" id="back" class="btn btn-danger">
                Back
            </button>
        </div>
    </div>
</form>


