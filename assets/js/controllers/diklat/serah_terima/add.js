$(document).ready(function () {
    // summernote spesifkasi global
    $('textarea[name=spesifikasi_global]').summernote({
        height: 200
    });


    $('select[name=cari_no_penawaran]').select2({
        ajax: {
            url: site_url + 'api/transaksi/penawaran_biaya/search/1',
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

    $('select[name=cari_no_penawaran]').on('select2:select', function () {
        var value = $(this).val();
        $.ajax({
            url: site_url + 'api/transaksi/penawaran_biaya/get_detail/' + value,
            method: 'get'
        }).then(function (result) {
            $('#table-alat > tbody').empty();
            _.each(result.response, function (obj) {
                var row = "<tr>" +
                    "<td class='text-center'> <input type='hidden' class='id_alat' value='" + obj.id_alat + "'> <div class='checkbox'><label><input class='cek' onchange='onChangeCekAlat(this)' type='checkbox' value='" + obj.id_alat + "' /></label></div></td>" +
                    "<td>" + obj.bidang + "</td>" +
                    "<td>" + obj.nama + "</td>" +
                    "<td>" + obj.spesifikasi + "</td>" +
                    "<td><input type='number' onchange='onChangeQty(this)' class='form-control qty' value='" + obj.qty + "'/></td>" +
                    "</tr>";
                $(row).appendTo('#table-alat > tbody');
            });
        });
    });

    $('#form_order').submit(function (e) {
        e.preventDefault();
        var cek = _.map($('.cek'), function (el) {
            return $(el).is(':checked');
        });

        var idAlat = _.map($('.id_alat'), function (el) {
            return $(el).val();
        });

        var qty = _.map($('.qty'), function (el) {
            return $(el).val();
        });

        var alat = [];
        _.each(idAlat, function (e, i) {
            var _alat = {
                id_alat: idAlat[i],
                is_terima: cek[i],
                qty: qty[i]
            };
            alat.push(_alat);
        });


        $.ajax({
            url: site_url + 'api/transaksi/serah_terima/add',
            method: 'post',
            data: 'data=' + JSON.stringify({
                alat: alat,
                id_penawaran : $('select[name=cari_no_penawaran]').val(),
            }),
        }).then(function (result) {
            toastr.success('Sukses Serah Terima Alat', 'Sukses!');
        });

    })
});

var onChangeCekAlat = onChangeCekAlat;
var onChangeQty = onChangeQty;

function onChangeCekAlat(el) {
    console.log($(el).is(':checked'));
}

function onChangeQty(el) {
    console.log($(el).val());
}