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
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Upload File</label>
                            <div class="col-lg-9">
                                <input type="file" class="form-control" v-on:change="onChangeFile" name="file"
                                       required/>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Email</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="email" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">Tanggal Lahir</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="tanggal-lahir" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3">No Telepon</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="telepon"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="form-group">

                        <label>Deskripsi</label>
                        <textarea placeholder="Deskripsi" name="deskripsi"  id="summernote">

                            </textarea>

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

<script type="text/javascript">

    // contoh validate form
    $('form[name=form-order]').validate({
        submitHandler: function (form) {

            var formData = new FormData($(form));

            var file = $(form).find('input[name=file]')[0].files[0];

            var formInput = {
                namaPerusahaan: $(form).find('input[name=nama-perusahaan]').val(),
                contactPerson: $(form).find('input[name=contact-person]').val(),
                alamat: $(form).find('input[name=alamat]').val(),
                email: $(form).find('input[name=email]').val(),
                tanggalLahir: $(form).find('input[name=tanggal-lahir]').val(),
                telepon: $(form).find('input[name=telepon]').val(),
                deskripsi: $(form).find('textarea[name=deskripsi]').val()
            };

            formData.append('file', file);
            formData.append('nama_perusahaan', formInput.namaPerusahaan);
            formData.append('contact_person', formInput.contactPerson);
            formData.append('alamat', formInput.alamat);
            formData.append('email', formInput.email);
            formData.append('tanggal_lahir', formInput.tanggalLahir);
            formData.append('telepon', formInput.telepon);
            formData.append('deskripsi', formInput.deskripsi);


            $.ajax({
                url: site_url + '/api/samples/form/submit',
                method: 'post',
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
            }).then(function (result) {
                console.log(result);
            }, function (err) {
                console.log(err);
            });
        }
    });

    $(document).ready(function () {

        // contoh penggunaan 'summernote' untuk free text
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true
        });

        // contoh validasi minimal panjang karakter 2
        $('input[name=nama-perusahaan]').rules('add', {
            required: true,
            minlength: 2,
            messages: {
                required: jQuery.validator.messages.required,
                minlength: jQuery.validator.messages.minlength
            }
        });


        // contoh tanggal lahir
        $('input[name=tanggal-lahir]').datepicker({
            language: 'id',
            format: {
                /*
                 * Say our UI should display a week ahead,
                 * but textbox should store the actual date.
                 * This is useful if we need UI to select local dates,
                 * but store in UTC
                 */
                toDisplay: function (date, format, language) {
                    var d = new Date(date);
                    d.setDate(d.getDate() - 7);
                    return moment(date).format('DD MMMM YYYY');
                },
                toValue: function (date, format, language) {
                    var d = new Date(date);
                    d.setDate(d.getDate() + 7);
                    return new Date(d);
                }
            },
            autoclose: true
        });

        // contoh masking input no telepon
        $('input[name=telepon]').inputmask({
            'mask': '(999) 9999999'
        });


    });
</script>
