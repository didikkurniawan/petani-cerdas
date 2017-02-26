$(document).ready(function () {
  $('textarea[name=pesan]').summernote({
    height: 200
  });

  $('textarea[name=pesan]').summernote('disable');

  
$('#form-delete-pengaduan-customer').validate({
    submitHandler: function (form) {

        // instance form data
        var formData = new FormData($(form));

        // buat object form input
        var formInput = {
            id: $(form).find('input[name=id]').val()
        };
        $.ajax({
            url: site_url + '/api/pengaduan_customer/delete/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pengaduan Berhasil Dihapus', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'pengaduan_customer';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menghapus Data Pengaduan', 'Failed!');
        });
    }
 });

});

$('#back').click(function (event){
    window.location.href = site_url + 'pengaduan_customer';
});
