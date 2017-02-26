// /**
//  * Created by agungrizkyana on 12/10/16.
//  */
var form = $('#form-view-penawaran-biaya');
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

$('#back').click(function (event){
    window.location.href = site_url + 'penerimaan_sample/penawaran_biaya';
});

$(document).ready(function(){
    $('#subtotal').html("Rp. " + numeral(parseInt($('#nilai_sub_total').val())).format('0,0'));
    $('#diskon').html("Rp. " + numeral(parseInt($('#nilai_diskon').val())).format('0,0'));
    $('#pajak').html("Rp. " + numeral(parseInt($('#nilai_pajak').val())).format('0,0'));
    $('#total').html("Rp. " + numeral(parseInt($('#nilai_total').val())).format('0,0'));
    $('#total_deal').html("Rp. " + numeral(parseInt($('#nilai_total_deal').val())).format('0,0'));

});
