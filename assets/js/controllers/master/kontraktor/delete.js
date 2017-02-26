/**
 * Created by agungrizkyana on 12/10/16.
 */

$('#form-delete-kontraktor').validate({
    submitHandler: function (form) {

        // instance form data
        var formData = new FormData($(form));

        // buat object form input
        var formInput = {
            id: $(form).find('input[name=id]').val()
        };
        $.ajax({
            url: site_url + '/api/master/sub_kontrak/delete/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Kontraktor Berhasil Dihapus', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'master/kontraktor';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menghapus Data Kontraktor', 'Failed!');
        });
    }
});

$('#back').click(function (event){
    window.location.href = site_url + 'master/kontraktor';
})



