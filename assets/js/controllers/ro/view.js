/**
 * Created by agungrizkyana on 12/10/16.
 */
$(document).ready(function () {
    // summernote spesifkasi global
    
    $('textarea[name=catatan]').summernote({
        height: 200,
    });
    $('textarea[name=catatan]').summernote('disable');
    var form = $('#form-serah-rencana-oprasional');
    var formInput = {
        idSerahTerima: form.find('#id_serah_terima').val(),
        id: form.find('#id').val()
        };

    var table = $('#table-alat-rencana-oprasional').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false, 
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "stateDuration": 0,
        "ajax": {
            "url": site_url + 'api/transaksi/serah_terima/serah_terima_detail/' + formInput.idSerahTerima,
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
                }

        ]
        });

    var table = $('#table-ro').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false, 
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "stateDuration": 0,
        "ajax": {
            "url": site_url + 'api/transaksi/ro/detail_ro/' + formInput.id,
            "type": "POST"
        },
        "order": [[0, 'desc']],
        "columns": [
            {"data": "item"},
            { 
                "data": "nominal" ,
                "render": function(data, type, row, meta){
                    return "Rp. " + numeral(data).format('0,0');
                }
            }
        ]
        });


});
    
    $('#back').click(function (event){
        window.location.href = site_url + 'ro';
    });





