/**
 * Created by agungrizkyana on 12/10/16.
 */
// $('#form-order').submit(function (event) {
//     alert('submit form order');
//     event.preventDefault();
// });

// contoh validate form
$('#form-order').validate({
    submitHandler: function (form) {
        
        // instance form data
        var formData = new FormData($(form));

        // buat object form input
        // var formInput = {
        //     namaPerusahaan: $(form).find('input[name=nama-perusahaan]').val(),
        //     contactPerson: $(form).find('input[name=contact-person]').val(),
        //     alamat: $(form).find('input[name=alamat]').val(),
        // };

        formData.append('nama_perusahaan', $('#nama_perusahaan').val());
        formData.append('contact_person', $('#contact_person').val());
        formData.append('alamat', $('#alamat').val());

        // // simpan nilai object form input ke dalam formData
        // formData.append('nama_perusahaan', formInput.namaPerusahaan);
        // formData.append('contact_person', formInput.contactPerson);
        // formData.append('alamat', formInput.alamat);

        // // lakukan request ke server
        $.ajax({
            url: site_url + '/api/samples/crud/add',
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Success Add New Company', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + '/samples/crud';
            }, 1000);
        }, function (err) {
            toastr.error('Failed to Add New Company', 'Failed!');
        });
    }
});


