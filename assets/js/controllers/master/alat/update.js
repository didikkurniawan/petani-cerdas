/**
 * Created by agungrizkyana on 12/10/16.
 */

$('textarea[name=summernote]').summernote({
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,       // set maximum height of editor
    focus: true
});

$('#form-update-alat').validate({
    submitHandler: function (form) {

        // instance form data
        var formData = new FormData($(form));

        // buat object form input
          var formInput = {
            id: $(form).find('input[name=id]').val()
        };
       
        formData.append('bidang', $('#bidang').val());
        formData.append('nama_barang', $('#nama_barang').val());
        formData.append('spesifikasi', $('#spesifikasi').val());
        formData.append('harga', $('#harga').val());
        formData.append('scope', $('#scope').val());

        // lakukan request ke server
        $.ajax({
            url: site_url + '/api/master/alat/update/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Alat Berhasil Diubah', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + '/master/alat';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Mengubah Data Alat', 'Failed!');
        });
    }
});

$('#back').click(function (event){
    window.location.href = site_url + 'master/alat';
})
