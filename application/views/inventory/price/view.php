<form method="post" name="formAddWarga" ng-submit="vm.update()" novalidate xmlns="http://www.w3.org/1999/html">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-6">
                    <strong>No Resi</strong>
                    <p class="text-primary">ORD/IND/19328409</p>


                </div>
                <div class="col-lg-6 text-right">
                    <strong>Order Date</strong>
                    <p> <?php echo date('Y-m-d H:i:s')?> </p>
                </div>
            </div>

        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-4">
                    <label for="">Foto Warga</label>
                    <div class="thumbnail">
                        <img id="img-thumbnail" class="img-responsive"
                             ng-src="<?php echo base_url() . "/" ?>{{ vm.data.foto }}"
                             alt="">
                    </div>

                </div>
                <div class="col-lg-8">
                    <fieldset ng-disabled="true">
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Status Warga</label>
                                <div class="col-md-9">
                                    <select ng-model="vm.data.status_warga" name="" id="" class="form-control">
                                        <option value="">Pilih Status Warga</option>
                                        <option value="1" {{ vm.data.status_warga==
                                        '1' ? selected : '' }}>Tetap</option>
                                        <option value="2" {{ vm.data.status_warga==
                                        '2' ? selected : '' }}>Sementara</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Nama Lengkap *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" ng-model="vm.data.nama_lengkap"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">No KTP *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" ng-model="vm.data.no_ktp"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right ">Tempat / Tanggal Lahir</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" ng-model="vm.data.tempat_lahir"/>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" mask='39-19-9999' placeholder="dd-mm-yyyy contoh, 03-11-2016"
                                           ng-model="vm.data.tanggal_lahir" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Jenis Kelamin</label>
                                <div class="col-md-5">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" ng-model="vm.data.jenis_kelamin" value="L"/> Laki - Laki
                                        </label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" ng-model="vm.data.jenis_kelamin" value="P"/> Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-md-3">
                                            Gol. Darah
                                        </label>
                                        <div class="col-md-9">

                                            <select name="" init-data="init.golongan_darah"
                                                    ng-model="vm.data.golongan_darah" id=""
                                                    class="form-control">
                                                <option value="">Pilih Golongan Darah</option>
                                                <option value="A" {{ vm.data.golongan_darah===
                                                'A' ? selected : '' }}>A</option>
                                                <option value="B" {{ vm.data.golongan_darah===
                                                'B' ? selected : '' }}>B</option>
                                                <option value="O" {{ vm.data.golongan_darah===
                                                'O' ? selected : '' }}>O</option>
                                                <option value="AB" {{ vm.data.golongan_darah===
                                                'AB' ? selected : '' }}>AB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Alamat</label>
                                <div class="col-md-5">
                                    <textarea name="" id="" class="form-control" ng-model="vm.data.alamat"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-md-3">
                                            RT / RW
                                        </label>
                                        <div class="col-md-9">
                                            <angucomplete-alt id="ex2"
                                                              placeholder="RT / RW"
                                                              pause="50"
                                                              selected-object="selectedRtRw"
                                                              remote-url="{{remoteUrlRtRw}}"
                                                              remote-url-data-field="items"
                                                              title-field="text"
                                                              description-field="alamat"
                                                              text-no-results="RT / RW tidak ditemukan"
                                                              minlength="3"
                                                              input-class="form-control"
                                                              match-class="highlight"
                                                              auto-match="true"
                                                              minlength="1"
                                                              initial-value="vm.data.rtrw"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Agama</label>
                                <div class="col-md-9">

                                    <select class="form-control" ng-model="vm.data.agama">
                                        <option value="">Pilih Agama</option>
                                        <option value="1" {{ (vm.data.agama== 1) ? selected :
                                        '' }}>Islam</option>
                                        <option value="2">Kristen</option>
                                        <option value="3">Katolik</option>
                                        <option value="4">Hindu</option>
                                        <option value="5">Budha</option>
                                        <option value="6">Konghucu</option>
                                        <option value="7" {{ (vm.data.agama== 7) ? selected :
                                        '' }}>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Warga Negara</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" ng-model="vm.data.warga_negara"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Pendidikan</label>
                                <div class="col-md-9">
                                    <select class="form-control" init-data="init.pendidikan"
                                            ng-model="vm.data.pendidikan">
                                        <option value="">Pilih Pendidikan</option>
                                        <option value="1" {{ vm.data.pendidikan==
                                        '1' ? selected : '' }}>Tidak tamat SD/MI</option>
                                        <option value="2" {{ vm.data.pendidikan==
                                        '2' ? selected : '' }}>Masih SD / MI</option>
                                        <option value="3" {{ vm.data.pendidikan==
                                        '3' ? selected : '' }}>Tamat SD / MI</option>
                                        <option value="4" {{ vm.data.pendidikan==
                                        '4' ? selected : '' }}>Masih STLP / MTSN</option>
                                        <option value="5" {{ vm.data.pendidikan==
                                        '5' ? selected : '' }}>Tamat STLP / MTSN</option>
                                        <option value="6" {{ vm.data.pendidikan==
                                        '6' ? selected : '' }}>Masih SLTA / MA</option>
                                        <option value="7" {{ vm.data.pendidikan==
                                        '7' ? selected : '' }}>Tamat SLTA / MA</option>
                                        <option value="8" {{ vm.data.pendidikan==
                                        '8' ? selected : '' }}>Masih PT / Akademi</option>
                                        <option value="9" {{ vm.data.pendidikan==
                                        '9' ? selected : '' }}>Tamat PT / Akademi</option>
                                        <option value="10" {{ vm.data.pendidikan==
                                        '10' ? selected : '' }}>Tidak / Belum Bersekolah</option>
                                        <option value="11" {{ vm.data.pendidikan==
                                        '11' ? selected : '' }}>Masih S1</option>
                                        <option value="12" {{ vm.data.pendidikan==
                                        '12' ? selected : '' }}>Tamat S1</option>
                                        <option value="13" {{ vm.data.pendidikan==
                                        '13' ? selected : '' }}>Masih S2</option>
                                        <option value="14" {{ vm.data.pendidikan==
                                        '14' ? selected : '' }}>Tamat S2</option>
                                        <option value="15" {{ vm.data.pendidikan==
                                        '15' ? selected : '' }}>Masih S3</option>
                                        <option value="16" {{ vm.data.pendidikan==
                                        '16' ? selected : '' }}>Tamat S3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Pekerjaan</label>
                                <div class="col-md-4">
                                    <select class="form-control" init-data="init.pekerjaan"
                                            ng-model="vm.data.pekerjaan">
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="1" {{ vm.data.pekerjaan==
                                        '1' ? selected : '' }}>Petani</option>
                                        <option value="2" {{ vm.data.pekerjaan==
                                        '2' ? selected : '' }}>Nelayan</option>
                                        <option value="3" {{ vm.data.pekerjaan==
                                        '3' ? selected : '' }}>Pedagang</option>
                                        <option value="4" {{ vm.data.pekerjaan==
                                        '4' ? selected : '' }}>PNS / TNI / Polri</option>
                                        <option value="5" {{ vm.data.pekerjaan==
                                        '5' ? selected : '' }}>Pegawai Swasta</option>
                                        <option value="6" {{ vm.data.pekerjaan==
                                        '6' ? selected : '' }}>Wiraswasta</option>
                                        <option value="7" {{ vm.data.pekerjaan==
                                        '7' ? selected : '' }}>Pensiunan</option>
                                        <option value="8" {{ vm.data.pekerjaan==
                                        '8' ? selected : '' }}>Pekerja Lepas</option>
                                        <option value="9" {{ vm.data.pekerjaan==
                                        '9' ? selected : '' }}>Tidak / Belum Bekerja</option>
                                        <option value="10" {{ vm.data.pekerjaan==
                                        '10' ? selected : '' }}>Ibu Rumah Tangga</option>
                                        <option value="11" {{ vm.data.pekerjaan==
                                        '11' ? selected : '' }}>Pelajar / Mahasiswa</option>
                                        <option value="12" {{ vm.data.pekerjaan==
                                        '12' ? selected : '' }}>Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <label class="col-md-3">
                                            Lainnya
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   ng-model="vm.data.pekerjaan_lainnya"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Status Perkawinan</label>
                                <div class="col-md-9">
                                    <select class="form-control" init-data="init.status_kawin"
                                            ng-model="vm.data.status_kawin">
                                        <option value="">Pilih Status Perkawinan</option>
                                        <option value="1" {{ vm.data.status_kawin==
                                        '1' ? selected : '' }}>Belum Menikah</option>
                                        <option value="2" {{ vm.data.status_kawin==
                                        '2' ? selected : '' }}>Sudah Menikah</option>
                                        <option value="3" {{ vm.data.status_kawin==
                                        '3' ? selected : '' }}>Duda</option>
                                        <option value="4" {{ vm.data.status_kawin==
                                        '4' ? selected : '' }}>Janda</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">KTP Seumur Hidup</label>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" ng-model="vm.data.ktp_seumur_hidup" value="1"/> Ya
                                        </label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" ng-model="vm.data.ktp_seumur_hidup" value="2"/> Tidak
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5" ng-show="vm.data.ktp_seumur_hidup == '2'">
                                    <div class="row">
                                        <label for="" class="col-md-3">
                                            Tanggal Berlaku
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" mask='39-19-9999'
                                                   placeholder="dd-mm-yyyy contoh, 3-11-2016"
                                                   class="form-control" ng-model="vm.data.tgl_berlaku_ktp"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">JKN</label>
                                <div class="col-md-9">
                                    <select class="form-control" init-data="init.jkn" ng-model="vm.data.jkn">
                                        <option value="">Pilih JKN</option>
                                        <option value="1" {{ vm.data.jkn==
                                        '1' ? selected : '' }}>Memiliki BPJS - PBI</option>
                                        <option value="2" {{ vm.data.jkn==
                                        '2' ? selected : '' }}>Memiliki BPJS - Non PBI</option>
                                        <option value="3" {{ vm.data.jkn==
                                        '3' ? selected : '' }}>Non BPJS</option>
                                        <option value="4" {{ vm.data.jkn==
                                        '4' ? selected : '' }}>Tidak Memiliki JKN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Ketarangan Warga</label>
                                <div class="col-md-5">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" ng-model="vm.data.status_keterangan_warga" value="1"/>
                                            Sudah
                                            Meninggal
                                        </label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" ng-model="vm.data.status_keterangan_warga" value="2"/>
                                            Sudah
                                            Pindah
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3 label-right">Status Aktif</label>
                                <div class="col-md-5">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" ng-model="vm.data.status_aktif" value="1"/> Aktif
                                        </label>
                                        <label>
                                            <input type="radio" ng-model="vm.data.status_aktif" value="2"/> Tidak Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- end col-lg-8 -->
            </div>

        </div>

    </div>

</form>

<script type="text/javascript">

    var placeholder = {
        selectRtRw: 'Pilih RT / RW'
    };

    var $fileUpload = $('#file-upload'),
        $imgThumbnail = $('#img-thumbnail'),
        $selectRtRw = $('#select-rt-rw');


    $(window).load(function () {
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $imgThumbnail.attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $fileUpload.change('change', function () {
            readURL(this);
        });

        $selectRtRw.select2({
            data: [{id: "1", text: "001 / 002"}],
            placeholder: 'Pilih Rt / Rw',
            ajax: {
                url: '<?php echo site_url('api/data_pokok/rt_rw/select2'); ?>',
                dataType: 'json',
                data: function (param) {
                    return {
                        delay: 0.3,
                        q: param.term
                    }
                },
                processResults: function (data) {
                    console.log("items, ", data.items);
                    return {
                        results: _.map(data.items || data, function (obj) {
                            return {
                                id: obj.id,
                                text: obj.text || obj.nama,
                            }
                        })
                    }
                },
                cache: false,
                minimumInputLength: 3,
            }
        });
//        $selectRtRw.val([{id: "1", text: "001 / 002"}]).trigger('change');
    })


</script>