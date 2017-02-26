/**
 * Created by agungrizkyana on 12/10/16.
 */

var form = $('#form-delete-penawaran-biaya');
var formInput = {
    id: form.find('#id').val()
    };

var table = $('#table-alat').DataTable({
    "paging":   false,
    "ordering": false,
    "info":     false,
    "searching": false,    
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + 'api/transaksi/penawaran_biaya/penawaran_detail/' + formInput.id,
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "columns": [
        {"data": "order"},
        { 
            "data": "nama",
            "render": function(data, type, row, meta){
                if(row.sk == null){
                    return data + "<br />";
                }else{
                    return data + "<br />" + "<b>Kontraktor : " + row.nama_kontraktor +"<b/>"
                }
            } 
        },
        { "data": "spesifikasi" },
        { "data": "qty" },
        { 
            "data": "harga" ,
            "render": function(data, type, row, meta){
                return "Rp. " + numeral(data).format('0,0');
            }
        }

    ]
    });

$(document).ready(function(){
    $('#subtotal').html("Rp. " + numeral(parseInt($('#nilai_sub_total').val())).format('0,0'));
    $('#diskon').html("Rp. " + numeral(parseInt($('#nilai_diskon').val())).format('0,0'));
    $('#pajak').html("Rp. " + numeral(parseInt($('#nilai_pajak').val())).format('0,0'));
    $('#total').html("Rp. " + numeral(parseInt($('#nilai_total').val())).format('0,0'));
    $('#total_deal').html("Rp. " + numeral(parseInt($('#nilai_total_deal').val())).format('0,0'));

});
$('#form-delete-penawaran-biaya').validate({
    submitHandler: function (form) {

        // instance form data
        var formData = new FormData($(form));

        // buat object form input
        var formInput = {
            id: $(form).find('input[name=id]').val()
        };
        $.ajax({
            url: site_url + '/api/transaksi/penawaran_biaya/delete/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Success Delete penawaran Biaya', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'penerimaan_sample/penawaran_biaya';
            }, 1000);
        }, function (err) {
            toastr.error('Failed to Update Company', 'Failed!');
        });
    }
});

$('#back').click(function (event){
    window.location.href = site_url + 'penerimaan_sample/penawaran_biaya';
});


