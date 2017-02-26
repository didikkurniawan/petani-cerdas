<form method="post" name="formAddWarga" ng-submit="vm.save()" novalidate>
    <div class="panel panel-primary">

        <div class="panel-body">

            <div class="row">
                <div class="col-lg-4">
                    <label for="">Foto Warga</label>
                    <div class="thumbnail">
                        <img id="img-thumbnail" class="img-responsive" src="<?php echo assets_url('img/a0.jpg') ?>"
                             alt="">
                    </div>
                    <div class="form-group">
                        <input id="file-upload" file-upload ng-model="vm.data.foto" auto-upload="auto"
                               file-callback="vm.fileCallback" ng-change="vm.onChangeFoto()" type="file"
                               class="form-control"/>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <div class="row">
                            <label for="" class="col-md-3 label-right">Status Warga</label>
                            <div class="col-md-9">
                                <select ng-model="vm.data.status_warga" name="" id="" class="form-control">
                                    <option value="">Pilih Status Warga</option>
                                    <option value="1">Tetap</option>
                                    <option value="2">Sementara</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" ng-show="vm.data.status_warga == '1'">
                        <div class="row">
                            <label for="" class="col-md-3 label-right">No KK</label>
                            <div class="col-md-9">
                                <angucomplete-alt id="ex2"
                                                  placeholder="Cari Nama Kepala Keluarga atau No KK"
                                                  pause="50"
                                                  selected-object="selectedKeluarga"
                                                  remote-url="{{remoteUrlKeluarga}}"
                                                  remote-url-data-field="response"
                                                  title-field="nomor_kk"
                                                  description-field="nama_lengkap"
                                                  text-no-results="Nomor KK tidak ditemukan"
                                                  minlength="3"
                                                  input-class="form-control"
                                                  match-class="highlight"
                                                  auto-match="true"
                                                  minlength="1"
                                />
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
                                        <select name="" ng-model="vm.data.golongan_darah" id=""
                                                class="form-control">
                                            <option value="">Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
                                            <option value="AB">AB</option>
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
                                <select name="" id="" class="form-control" ng-model="vm.data.agama">
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
                                <select class="form-control" ng-model="vm.data.pendidikan">
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
                            <label for="" class="col-md-3 label-right">Pekerjaan</label>
                            <div class="col-md-4">
                                <select class="form-control" ng-model="vm.data.pekerjaan">
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
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-3">
                                        Lainnya
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" ng-model="vm.data.pekerjaan_lainnya"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="" class="col-md-3 label-right">Status Perkawinan</label>
                            <div class="col-md-9">
                                <select class="form-control" ng-model="vm.data.status_kawin">
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
                                        <input type="text" mask='39-19-9999' placeholder="dd-mm-yyyy contoh, 3-11-2016"
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
                                <select class="form-control" ng-model="vm.data.jkn">
                                    <option value="">Pilih JKN</option>
                                    <option value="1">Memiliki BPJS - PBI</option>
                                    <option value="2">Memiliki BPJS - Non PBI</option>
                                    <option value="3">Non BPJS</option>
                                    <option value="4">Tidak Memiliki JKN</option>
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
                                        <input type="radio" ng-model="vm.data.status_keterangan_warga" value="1"/> Sudah
                                        Meninggal
                                    </label>
                                    &nbsp;
                                    <label>
                                        <input type="radio" ng-model="vm.data.status_keterangan_warga" value="2"/> Sudah
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

                </div>
            </div>

        </div>
        <div class="panel-footer no-overflow bg-primary">
            <div class="pull-right">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="<?php echo site_url('pemerintahan/data_warga') ?>" class="btn btn-danger">
                    <i class="fa fa-close"></i> Batal
                </a>
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


    $(window).load(function(){
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