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
                var row = '<tr>' +
                    '<td>' + (i + 1) + '<input type="hidden" class="id_alat" value="' + obj.id + '"><input type="hidden" class="qty" value="' + obj.qty + '"></td>' +
                    '<td>' + obj.bidang + '</td>' +
                    '<td>' + obj.nama + '</td>' +
                    '<td>' + obj.spesifikasi + '</td>' +
                    '<td class="text-center">' +
                    '<select required name="" class="form-control status" id="" onchange="onChangeTindakan(this, ' + obj.id + ')">' +
                    '<option value="" >pilih tindakan</option>' +
                    '<option value="selesai">selesai</option>' +
                    '<option value="di batalkan">di batalkan</option>' +
                    '</select>' +
                    '</td>' +
                    '</td>';
                $(row).appendTo('#table_alat > tbody');
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

        submitHandler: function (form) {

            var inputFormFile = $('input[name=file]');
            uploadFile(inputFormFile).then(function (file) {

                postForm(file.file);

            }, function (err) {
                console.log(err);
            });

        },
        invalidHandler: function () {
            console.log("there is an invalid");
        }
    });
});

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