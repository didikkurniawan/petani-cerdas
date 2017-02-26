<div class="panel panel-primary">
    <header class="panel-heading">
        <a href="#" data-toggle="collapse" data-target="#panel-content" class="panel-collapse-header"><span
                class="fa pull-right fa-caret-right"></span>
            <h2 class="panel-title"><i class="fa fa-filter"></i> Advance Search</h2>
        </a>
    </header>
    <div class="panel-body collapse" id="panel-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-3">RT / RW</label>

                        <div class="col-lg-9">
                            <select select2 remote-url="'<?php echo site_url('api/data_pokok/rt_rw/select2'); ?>'"
                                    select-placeholder="'Pilih RT / RW'" name="" id="" ng-model="vm.data.rt_rw"
                                    class="form-control select2-width-lg">

                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">
                            Gol. Darah
                        </label>
                        <div class="col-md-9">
                            <select select2 name="" ng-model="vm.data.golongan_darah" id=""
                                    class="form-control select2-width-lg">
                                <option value="">Pilih Golongan Darah</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Agama</label>
                        <div class="col-md-9">
                            <select select2 name="" id="" class="form-control select2-width-lg"
                                    ng-model="vm.data.agama">
                                <option value="">Pilih Agama</option>
                                <option value="1">Islam</option>
                                <option value="2">Kristen</option>
                                <option value="3">Katolik</option>
                                <option value="4">Hindu</option>
                                <option value="5">Budha</option>
                                <option value="6">Konghucu</option>
                                <option value="7">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Warga Negara</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control select2-width-lg" ng-model="vm.data.warga_negara"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Pendidikan</label>
                        <div class="col-md-9">
                            <select select2 class="form-control select2-width-lg" ng-model="vm.data.pendidikan">
                                <option value="">Pilih Pendidikan</option>
                                <option value="1">Tidak tamat SD/MI</option>
                                <option value="2">Masih SD / MI</option>
                                <option value="3">Tamat SD / MI</option>
                                <option value="4">Masih STLP / MTSN</option>
                                <option value="5">Tamat STLP / MTSN</option>
                                <option value="6">Masih SLTA / MA</option>
                                <option value="7">Tamat SLTA / MA</option>
                                <option value="8">Masih PT / Akademi</option>
                                <option value="9">Tamat PT / Akademi</option>
                                <option value="10">Tidak / Belum Bersekolah</option>
                                <option value="11">Masih S1</option>
                                <option value="12">Tamat S1</option>
                                <option value="13">Masih S2</option>
                                <option value="14">Tamat S2</option>
                                <option value="15">Masih S3</option>
                                <option value="16">Tamat S3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3 ">Pekerjaan</label>
                        <div class="col-md-4">
                            <select select2 class="form-control select2-width-lg" ng-model="vm.data.pekerjaan">
                                <option value="">Pilih Pekerjaan</option>
                                <option value="1">Petani</option>
                                <option value="2">Nelayan</option>
                                <option value="3">Pedagang</option>
                                <option value="4">PNS / TNI / Polri</option>
                                <option value="5">Pegawai Swasta</option>
                                <option value="6">Wiraswasta</option>
                                <option value="7">Pensiunan</option>
                                <option value="8">Pekerja Lepas</option>
                                <option value="9">Tidak / Belum Bekerja</option>
                                <option value="10">Ibu Rumah Tangga</option>
                                <option value="11">Pelajar / Mahasiswa</option>
                                <option value="12">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Status Kawin</label>
                        <div class="col-md-9">
                            <select select2 class="form-control select2-width-lg" ng-model="vm.data.status_kawin">
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="1">Belum Menikah</option>
                                <option value="2">Sudah Menikah</option>
                                <option value="3">Duda</option>
                                <option value="4">Janda</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Status Warga</label>
                        <div class="col-md-9">
                            <select select2 class="form-control select2-width-lg" ng-model="vm.data.status_warga">
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="1">Warga Tetap</option>
                                <option value="2">Warga Sementara</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button ng-click="vm.reset()" class="btn btn-default">
                    <i class="fa fa-reload"></i> Reset
                </button>
                <button ng-click="vm.filter()" class="btn btn-primary">
                    <i class="fa fa-filter"></i> Filter
                </button>
            </div>
        </div>
    </div>

</div>

<div class="panel">
    <div class="panel-body no-padder">
        <table class="table table-hover table-striped" id="table-order">
            <thead>
            <tr>
                <th>Resi</th>
                <th>Order Date</th>
                <th>Customer</th>
                <th>Total (Rp.)</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <strong><a href="<?php echo site_url('pos/order/view/1')?>" class="text-primary">ORD/IND/19328409</a></strong>
                </td>
                <td>
                    <?php echo date('Y-m-d H:i:s'); ?>
                </td>
                <td>
                    PT. Angin Ribut <br /> <strong>Type</strong> <small>Outbound <i class="fa fa-arrow-up"></i></small>
                </td>
                <td>
                    15.000.000
                </td>

                <td>
                    <label class="label label-primary">Todo</label>
                </td>
            </tr>
            <tr>
                <td>
                    <strong><a href="<?php echo site_url('pos/order/view/2')?>" class="text-primary">ORD/IND/19328410</a></strong>
                </td>
                <td>
                    <?php echo date('Y-m-d H:i:s'); ?>
                </td>
                <td>
                    PT. Sejahtera Bersama <br /> <strong>Type</strong> <small>In Bound <i class="fa fa-arrow-down"></i></small>
                </td>
                <td>
                    3.000.000
                </td>

                <td>
                    <label class="label label-warning">In Progress</label>
                </td>
            </tr>
            <tr>
                <td>
                    <strong><a href="<?php echo site_url('pos/order/view/3')?>" class="text-primary">ORD/IND/19328411</a></strong>
                </td>
                <td>
                    <?php echo date('Y-m-d H:i:s'); ?>
                </td>
                <td>
                    PT. Maju Mundur <br /> <strong>Type</strong> <small>Outbound <i class="fa fa-arrow-up"></i></small>
                </td>
                <td>
                    8.000.000
                </td>
                <td>
                    <label class="label label-success">Done</label>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#table-order').dataTable();
    });
</script>