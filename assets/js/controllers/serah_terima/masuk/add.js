$(document).ready(function () {
    // summernote spesifkasi global

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
                    "<td class='text-left'> <input type='hidden' class='id_alat' value='" + obj.id + "'> <div class='checkbox'><label><input class='cek' onchange='onChangeCekAlat(this)' type='checkbox' value='" + obj.id_alat + "' /></label></div></td>" +
                    "<td><input type='hidden' class='jenis_order' value='"+obj.order+"'>" + obj.order.toUpperCase() + "</td>" +
                    "<td><input type='hidden' id='spesifikasi' class='form-control' value='" + obj.id + "'/>" + obj.nama + "<br/>" + "<i>" + obj.spesifikasi + "<i/>" + "</td>" +
                    "<td><input type='hidden'  id='nama' class='form-control qty' value='" + obj.qty + "'/>" + obj.qty + "</td>" + 
                    
                    // "<td class='text-right'><input type='hidden'  id='qty' class='form-control qty' value='" + obj.qty + "'/><input type='hidden'  id='id' class='form-control qty' value='" + obj.id + "'/> <button type='button' onClick='onChangeDetail(" + obj.id + "," + obj.qty + "," + '"' + obj.nama + '"' + "," + '"' + obj.spesifikasi + '"' + ")'  class='id btn btn-default btn-sm'> <i class='fa fa-align-justify'></i></button> </td>" +

                    "</tr>";
                orders.push(obj);
                $(row).appendTo('#table-alat > tbody');
            });
        });
    });




    $('#form_order').submit(function (e) { e.preventDefault(); }).validate({
        submitHandler: function (form) {
            var cek = _.map($('.cek'), function (el) {
                return ($(el).is(':checked')) ? 1 : 0;
            });

            orders = _.map(orders, function (o, i) {
                o.is_terima = cek[i];
                return o;
            });

            $.ajax({
                url: site_url + 'api/transaksi/serah_terima/add',
                method: 'post',
                data: $.param({
                    alat: orders,
                    id_penawaran: $('select[name=cari_no_penawaran]').val(),
                }),
            }).then(function (result) {
                toastr.success('Sukses Serah Terima Alat', 'Sukses!');
            }, function (e) {
                toastr.error(e.toString(), 'Gagal Simpan Serah Terima');
            });
        },
        invalidHandler: function (e) {
            toastr.error(e.toString(), 'Terjadi Kesalahan Sistem!');
        }
    });
});

var orders = [];

var onChangeCekAlat = onChangeCekAlat;
var onChangeQty = onChangeQty;
var onChangeDetail = onChangeDetail;

function onChangeDetail(id, qty, nama, spesifikasi) {
    $('#qty').val(qty);
    $('#id').val(id);
    $('#nama').val(nama);
    $('#spesifikasi').val(spesifikasi);


    $('#modal_deal').modal();

    var qty = $('#qty').val();
    var id = $('#id').val();
    var nama = $('#nama').val();
    var spesifikasi = $('#spesifikasi').val();


    $('#table-detail > tbody').empty();

    for (i = 0; i < qty; i++) {
        var row = "<tr>" +
            "<td class='text-left'> <input type='hidden' class='id_alat' value='" + id + "'> <div class='checkbox'><label><input class='check' onchange='onChangeCekAlat(this)' type='checkbox' value='" + id + "' />Check</label></div></td>" +
            "<td>" + nama + "<br /><i>" + spesifikasi + "</i></td>" +
            "</tr>";

        $(row).appendTo('#table-detail > tbody');
    }
}

function onChangeCekAlat(el) {
    console.log($(el).is(':checked'));
}

function onChangeQty(el) {
    console.log($(el).val());
}

function onClickCheckAll() {

}

$('#modal_deal').on('show.bs.modal', function () {
    $('#form_deal').submit(function (e) {
        e.preventDefault();

        return;
    });
});