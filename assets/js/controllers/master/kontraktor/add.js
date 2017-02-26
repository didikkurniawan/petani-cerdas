/**
 * Created by agungrizkyana on 12/10/16.
 */
$('#form-add-kontraktor').validate({
    submitHandler: function (form) {
        
        var formData = new FormData($(form));

        formData.append('nama', $('#nama').val());
        formData.append('alamat', $('#alamat').val());
        formData.append('up', $('#up').val());
        formData.append('contact_person', $('#contact_person').val());

        $.ajax({
            url: site_url + '/api/master/sub_kontrak/add',
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Kontraktor Berhasil Ditambahkan', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + '/master/kontraktor';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menambahkan Data Kontraktor', 'Failed!');
        });
    }
});

$('#back').click(function (event){
    window.location.href = site_url + 'master/kontraktor';
})


