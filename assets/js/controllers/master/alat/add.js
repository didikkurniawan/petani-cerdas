/**
 * Created by agungrizkyana on 12/10/16.
 */    

$('textarea[name=summernote]').summernote({
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,       // set maximum height of editor
    focus: true
});
$('#form-add-alat').validate({
    submitHandler: function (form) {
        
        var formData = new FormData($(form));

        formData.append('bidang', $('#bidang').val());
        formData.append('nama_barang', $('#nama_barang').val());
        formData.append('spesifikasi', $('#spesifikasi').val());
        formData.append('harga', $('#harga').val());
        formData.append('scope', $('#scope').val());

        $.ajax({
            url: site_url + '/api/master/alat/add',
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Alat Berhasil Ditambahkan', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + '/master/alat';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menambahkan Data Alat', 'Failed!');
        });
    }
});
$('#back').click(function (event){
    window.location.href = site_url + 'master/alat';
})

$('#back').click(function (event){
    window.location.href = site_url + 'master/alat';
})

   
