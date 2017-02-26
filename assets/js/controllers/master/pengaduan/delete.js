/**
 * Created by agungrizkyana on 12/10/16.
 */
$('textarea[name=summernote]').summernote({
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,       // set maximum height of editor
    focus: true
});
$('textarea[name=summernote]').summernote('disable');
$('#form-delete-jenis-pengaduan').validate({
    submitHandler: function (form) {

        // instance form data
        var formData = new FormData($(form));

        // buat object form input
        var formInput = {
            id: $(form).find('input[name=id]').val()
        };
        $.ajax({
            url: site_url + '/api/master/pengaduan/delete/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pengaduan Berhasil Dihapus', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'master/pengaduan';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menghapus Data Pengaduan', 'Failed!');
        });
    }
});

$('#back').click(function (event){
    window.location.href = site_url + 'master/pengaduan';
})



