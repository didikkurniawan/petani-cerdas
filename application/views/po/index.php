<div class="panel panel-primary hide">
    <div class="panel-heading">
        <strong>Advance Search</strong>
    </div>
    <div class="panel-body">
    </div>
</div>

<div class="panel panel-default">

    <div class="panel-body no-padder">
        <table class="table table-hover" id="table-perusahaan">
            <thead>
            <tr>
                <th>Tanggal Dibuat</th>
                <th>No Penawaran</th>
                <th>Nama Perusahaan</th>
                <th>Status Penawaran</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="modal_deal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nilai Penawaran yang di sepakati</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <input type="number" class="form-control" onchange="onChangeNilaiDeal(this)"
                                       id="nilai_deal"
                                       name="nilai_deal"
                                       placeholder="Nilai Deal"/>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <input type="hidden" id="pajak_hidden"/>
                            <input type="hidden" id="total_hidden"/>
                            <input type="hidden" id="total_before"/>
                            <span id="pajak"></span> <br/>

                            <span id="total"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpanDeal(this)" class="btn btn-primary" id="btn_simpan">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->