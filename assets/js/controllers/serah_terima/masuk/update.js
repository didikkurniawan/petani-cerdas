$(document).ready(function () {
    
        var value = $('#id').val();
        
        $.ajax({
            url: site_url + 'api/transaksi/serah_terima/serah_terima_update/' + value,
            method: 'get'
        }).then(function (result) {
            
            $('#table-alat > tbody').empty();
            _.each(result.response, function (obj) {
                var isTerima;
                if(obj.is_terima==0){
                    isTerima = "<div class='btn btn-sm btn-danger'>Belum Diterima</div>";
                }else{
                    isTerima = "<div class='btn btn-sm btn-success'>Sudah Diterima</div>"
                }
                var row = "<tr>" +
                    "<td>" + obj.order.toUpperCase() + "</td>" +
                    "<td>" + obj.nama + "<br/>" + "<i>" + obj.spesifikasi + "<i/>"+ "</td>" +
                    "<td><input type='number' onChange='onChangeQty(this)' id='qty' class='form-control' value='" + obj.qty + "'/></td>" +
                    "<td>" +isTerima+"</td>" +
                    "<td><input type='hidden'  id='qty_update' class='form-control qty' value='" + obj.qty + "'/><button type='button' onClick='onChangeEdit(this)'  value='" + obj.id+ "' class='id btn btn-primary'> Tambahkan </button> </td>" +
                    "</tr>";
                $(row).appendTo('#table-alat > tbody');
            });
        });
});

    function onChangeQty(el){
        $('#qty_update').val($(el).val())
    }

    function onChangeEdit(el){
        var qty = _.map($('.qty'), function (el) {
                    return $(el).val();
        });
        var formData = new FormData();
        formData.append('qty', qty);
        $.ajax({
            url: site_url + 'api/transaksi/serah_terima/update/' + $(el).val(),
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Alat Berhasil Diubah', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'serah_terima/masuk';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Mengubah Data Alat', 'Failed!');
        });

}


$('#back').click(function (event){
     window.location.href = site_url + 'serah_terima/masuk';
    });
