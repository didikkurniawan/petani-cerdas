/**
 * Created by agungrizkyana on 12/10/16.
 */


var form = $('form[name=form-order]');
var formInput = {
    id: form.find('input[name=id]').val()
};
// lakukan request ke server
form.submit(function(){
    alert('tes');
    $.ajax({
        url: site_url + '/api/samples/crud/delete/' + formInput.id,
        method: 'post',
        dataType: 'json',
        contentType: false,
        processData: false,
    }).then(function (result) {
        toastr.success('Success Delete Company', 'Success!');
        setTimeout(function(){
            window.location.href = site_url + '/samples/crud';
        }, 1000);
    }, function (err) {
        toastr.error('Failed to Delete Company', 'Failed!');
    });
});


