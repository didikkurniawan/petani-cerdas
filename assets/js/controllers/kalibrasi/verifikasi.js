$(document).ready(function () {
    // summernote spesifkasi global
    $('textarea[name=catatan]').summernote({
        height: 200,
    });


    $('select[name=no_order]').select2({
        ajax: {
            url: site_url + 'api/transaksi/serah_terima/search/',
            dataType: 'json',
            data: function (param) {
                return {
                    delay: 0.3,
                    q: param.term
                }
            },
            processResults: function (data) {
                return {
                    results: _.map(data.items || data, function (obj) {
                        return {
                            id: obj.id,
                            text: obj.text || obj.nama_pelanggan,
                        }
                    })
                }
            },
            cache: true,
            minimumInputLength: 3,
        },
    });

    $('select[name=no_order]').on('select2:select', function () {
        var val = $(this).val();
        $.ajax({
            url: site_url + 'api/transaksi/serah_terima/get_detail/' + val,
            method: 'post'
        }).then(function (result) {
            $('table > tbody').empty();
            _.each(result.response, function (obj, i) {
                var bidang = (obj.bidang) ? obj.bidang : '';
                var param = JSON.stringify(obj);
                var row = '<tr>' +
                    '<td>' + (i + 1) + '<input type="hidden" class="id_alat" value="' + obj.id + '"><input type="hidden" class="qty" value="' + obj.qty + '"></td>' +
                    '<td>' + obj.nama + '<br /><i>' + obj.spesifikasi + '</i><br /><strong>' + bidang + '</strong></td>' +
                    '<td>' + obj.qty + '</td>' +
                    '<td><textarea name="catatan" id="catatan" cols="30" rows="10"></textarea></td>' +
                    // '<td class="text-center">' +
                    // '<select required name="" class="form-control status" id="" onchange="onChangeTindakan(this, ' + obj.id + ')">' +
                    // '<option value="" >pilih tindakan</option>' +
                    // '<option value="selesai">selesai</option>' +
                    // '<option value="di batalkan">di batalkan</option>' +
                    // '</select>' +
                    // '</td>' +
                    // '<td>' +
                    // '<input required type="file" class="form-control upload_file_pengolahan_data" onchange="onChangeUploadFilePengolahanData(this, ' + obj.id + ')"/>' +
                    // '</td>' +
                    '<td class="text-right">' +
                    '<a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Detail" onclick="onClickDetailVerifikasiKalibrasi(' + i + ')"><i class="fa fa-align-justify"></i></a>' +
                    '</td>' +
                    '</tr>';
                orders.push(obj);
                $(row).appendTo('#table_alat > tbody');
            });

            $('textarea[name=catatan]').summernote({
                height: 100,
            });

            return $.ajax({
                url: site_url + 'api/transaksi/ro/get_detail/' + val,
                method: 'post'
            })
        }).then(function (result) {
            _.each(result.response, function (obj) {
                var row = '<tr>' +
                    '<td>' + obj.item + ' <input type="hidden" class="id_ro" value="' + obj.id + '" /> <input type="hidden" class="item_ro" value="' + obj.item + '" /> </td>' +
                    '<td>' + obj.nominal + '<input type="hidden" class="nominal_ro" value="' + obj.nominal + '"> </td>' +
                    '</tr>';
                $(row).appendTo('#table_ro > tbody');
            });

        }, function (err) {
            console.log(err);
        });
    });

    $('#modal_tindakan').on('show.bs.modal', function () {
        $('textarea[name=alasan_batal]').summernote({
            height: 150,
        });
    });


    // submit form
    $('#form').validate({
        ignore: ":hidden:not(#summernote),.note-editable.panel-body",
        submitHandler: function (form) {

            var id_serah_terima = $('select[name=no_order]').val();

            $.ajax({
                url: site_url + 'api/transaksi/serah_terima/get_detail/' + id_serah_terima,
                method: 'post'
            }).then(function (result) {

                return $.ajax({
                    url: site_url + 'api/transaksi/serah_terima/update_transaksi', 
                    method: 'post',
                    data: $.param({
                        id_serah_terima : id_serah_terima,
                        data: result.response,
                        is_verifikasi_pengolahan_data: 1,
                        tag: 'update'
                    })
                });

            }).then(function (result) {
                console.log(result);
            }, function (err) {
                toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
            });

        },
        invalidHandler: function () {
            console.log("there is an invalid");
        }
    });
});


var orders = [];

function onClickDetailVerifikasiKalibrasi(param) {
    var order = orders[param];



    for (var i = 0; i < order.qty; i++) {
        var data = JSON.parse(order.data);
        var file = (data) ? site_url + '/' + atob(data[0].file) : '';
        var setHideDownload = (data) ? '' : 'hide';
        var _row = "<tr>" +
            "<td><input type='hidden' class='ids' value='" + order.id + "' />" + (i + 1) + "</td>" +
            "<td>" + order.nama + "</br ><strong>" + order.spesifikasi + "</strong></td>" +
            "<td>selesai</td>" +
            "<td><a href='" + file + "' target='_blank' class='btn btn-success " + setHideDownload + "' ><i class='fa fa-download'></i>   File Pengolahan </a></td>" +
            "</tr>";
        $(_row).appendTo('#table_detail_kalibrasi > tbody');
    }
    $('#modal_detail_kalibrasi').modal('toggle');
}


var onChangeTindakan = onChangeTindakan;
var uploadFile = uploadFile;
var postForm = postForm;

// void
function postForm(file) {
    var status = _.map($('.status'), function (el) {
        return $(el).val();
    });

    var idAlat = _.map($('.id_alat'), function (el) {
        return $(el).val();
    });

    var qty = _.map($('.qty'), function (el) {
        return $(el).val();
    });

    var alat = [];
    _.each(idAlat, function (val, i) {
        var obj = {
            id_alat: val,
            status: status[i],
            qty: qty[i]
        };
        alat.push(obj);
    });

    var params = {
        alat: alat,
        id_serah_terima: $('select[name=no_order]').val(),
        catatan: $('#catatan').val(),
        file_input_data: file,
    };

    console.log(params);

    $.ajax({
        url: site_url + 'api/transaksi/kalibrasi/add',
        method: 'post',
        data: "data=" + JSON.stringify(params)
    }).then(function (result) {
        console.log(result);
    }, function (err) {
        console.log(err);
    });


}

function uploadFile(inputForm) {
    var inputFile = inputForm[0].files[0];
    var inputFileName = inputFile.name;

    var formData = new FormData();
    formData.append('file', inputFile, inputFileName);

    return $.ajax({
        url: site_url + 'file/upload_docs/file',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
    }).then(function (result) {

        return result;
    }, function (err) {
        return result;
    });

}

function onChangeTindakan(row, id) {
    // do request
    // $.ajax({})

    var jenisTindakan = $(row).val();

    if (jenisTindakan == 'di batalkan') {
        $('#alat').html(id);
        $('#modal_tindakan').modal();
    }

}

$('#modal_batal_verifikasi').on('show.bs.modal', function () {
    $('textarea[name=alasan_batal]').summernote({
        height: 150,
    });
});


$('#modal_detail_kalibrasi').on('hidden.bs.modal', function () {
    $('#table_detail_kalibrasi > tbody').empty();
});