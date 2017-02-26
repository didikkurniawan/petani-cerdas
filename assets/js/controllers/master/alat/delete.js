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
$('#form-delete-alat').validate({
    submitHandler: function (form) {

        // instance form data
        var formData = new FormData($(form));

        // buat object form input
        var formInput = {
            id: $(form).find('input[name=id]').val()
        };
        $.ajax({
            url: site_url + '/api/master/alat/delete/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Alat Berhasil Dihapus', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'master/alat';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menghapus Data Alat', 'Failed!');
        });
    }
});
$(document).ready(function(){
    $('#harga').val('Rp. ' + numeral(parseInt($('#harga').val())).format('0,0.00'));
});

$('#back').click(function (event){
    window.location.href = site_url + 'master/alat';
})

$('#back').click(function (event){
    window.location.href = site_url + 'master/alat';
})


