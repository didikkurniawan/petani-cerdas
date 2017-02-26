/**
 * Created by agungrizkyana on 12/10/16.
 */
$('textarea[name=summernote]').summernote({
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,       // set maximum height of editor
    focus: true
});

$('#form-add-jenis-pengaduan').validate({
    submitHandler: function (form) {
        
        var formData = new FormData($(form));

        formData.append('nama', $('#nama').val());
        formData.append('keterangan', $('#keterangan').val());

        $.ajax({
            url: site_url + '/api/master/pengaduan/add',
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pengaduan Berhasil Ditambahkan', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + '/master/pengaduan';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menambahkan Data Pengaduan', 'Failed!');
        });
    }
});

$('#back').click(function (event){
    window.location.href = site_url + 'master/pengaduan';
})


