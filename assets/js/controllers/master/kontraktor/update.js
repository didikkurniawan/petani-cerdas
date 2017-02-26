/**
 * Created by agungrizkyana on 12/10/16.
 */

// contoh validate form

$('#form-update-kontraktor').validate({
    submitHandler: function (form) {

        // instance form data
        var formData = new FormData($(form));

        // buat object form input
          var formInput = {
            id: $(form).find('input[name=id]').val()
        };
       
        formData.append('nama', $('#nama').val());
        formData.append('alamat', $('#alamat').val());
        formData.append('up', $('#up').val());
        formData.append('contact_person', $('#contact_person').val());

        // lakukan request ke server
        $.ajax({
            url: site_url + '/api/master/sub_kontrak/update/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Kontraktor Berhasil Diubah', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + '/master/kontraktor';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Mengubah Data Kontraktor', 'Failed!');
        });
    }
});

$('#back').click(function (event){
    window.location.href = site_url + 'master/kontraktor';
})

