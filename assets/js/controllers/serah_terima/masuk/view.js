/**
 * Created by agungrizkyana on 12/10/16.
 */

var form = $('#form-serah-terima-masuk');
var formInput = {
    id: form.find('#id').val()
    };

var table = $('#table-alat-serah-terima').DataTable({
    "paging":   false,
    "ordering": false,
    "info":     false,
    "searching": false, 
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + 'api/transaksi/serah_terima/serah_terima_detail/' + formInput.id,
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "columns": [
        {
            "data": "order",
            "render": function(data,type,row,meta){
                return data.toString().toUpperCase();
            }
        },
        {
            "data": "nama",
             "render": function(data,type,row,meta){
                return data + "<br/>" + "<i>" + row.spesifikasi + "<i/>";
            }
        },
        { "data": "qty" },
        { 
            "data": "harga", 
            "render": function(data, type, row, meta){
                return "Rp. " + numeral(data).format('0,0');
            }
        },
        {
            "data": "is_terima",
            "render": function(data, type, row, meta){
                if(data==0){
                    return "<div class='btn btn-sm btn-danger'>Belum Diterima</div>"
                }else{
                    return "<div class='btn btn-sm btn-success'>Sudah Diterima</div>"
                }
                
            }
        }

    ]
    });
    

    $('#back').click(function (event){
     window.location.href = site_url + 'serah_terima/masuk';
    });


$(document).ready(function(){
    $('#total_deal').val('Rp. ' + numeral(parseInt($('#total_deal').val())).format('0,0'));

});
