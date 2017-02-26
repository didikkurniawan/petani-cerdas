var tableAlat;
var textSpesifikasiGlobal;
var alat;

var subTotal;
var pajak;
var _total;

var link = '/penerimaan_sample/penawaran_biaya';

$(document).ready(function () {

    // init default order
    setDefaultOrder();

    // init DOM
    tableAlat = $('#table-alat');

    // summernote spesifkasi global
    textSpesifikasiGlobal = $('.summernote').summernote({
        height: 200
    });

    // select2
    $('select[name=cari_nama_alat]').select2({
        ajax: {
            url: site_url + 'api/master/alat/search/10/0',
            dataType: 'json',
            data: function (param) {
                return {
                    delay: 0.3,
                    q: param.term
                }
            },
            processResults: function (data) {
                return {
                    results: _.map(data.response || data, function (obj) {
                        return {
                            id: obj.id,
                            text: obj.text || obj.nama,
                        }
                    })
                }
            },
            cache: true,
            minimumInputLength: 3,

        },
    });

    $('select[name=nama_perusahaan]').select2({
        ajax: {
            url: site_url + 'api/master/pelanggan/search',
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
                            text: obj.text || obj.nama,
                        }
                    })
                }
            },
            cache: true,
            minimumInputLength: 3,

        },
    });

    $('select[name=nama_perusahaan]').on('select2:select', function (e) {
        var ajax = selectedPelanggan(e.params);
        ajax.then(function (result) {
            console.log(result);
        }, function (err) {
            console.log(err);
        });
    });

    $('select[name=sk_sub_kontrak]').select2({
        placeholder: 'Cari Sub Kontrak',
        ajax: {
            url: site_url + 'api/master/sub_kontrak/search',
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
                            text: obj.text || obj.nama,
                        }
                    })
                }
            },
            cache: true,
            minimumInputLength: 3,

        },
    });

    $('#form_order').validate({
        submitHandler: function (form) {
            var harga = _.map($('.harga'), function (el) {
                return $(el).val();
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
                    harga: harga[i],
                    qty: qty[i]
                };
                alat.push(_alat);
            });

            var jenis_order = $('#jenis_order');
            var order = jenis_order.val().toString().toLowerCase();


            var subTotal = $('#' + order + "_sub_total_hidden").val(),
                total = $('#' + order + '_total_hidden').val(),
                diskon = $('#' + order + '_diskon').val(),
                pajak = $('#' + order + '_pajak_hidden').val();

            $.ajax({
                url: site_url + 'api/transaksi/penawaran_biaya/add',
                method: 'post',
                data: 'data=' + JSON.stringify({
                    alat: alat,
                    id_pelanggan: $('select[name=nama_perusahaan]').val(),
                    jenis_customer: $('select[name=jenis_customer]').val(),
                    sub_total: subTotal,
                    total: total,
                    total_deal: total,
                    diskon: diskon,
                    pajak: pajak,
                    order: order,
                    jenis_order: jenis_order.val(),
                    jenis_diskon: $('#jenis_diskon').val()
                }),
            }).then(function (result) {
                toastr.success('Sukses Membuat Penawaran Biaya', 'Sukses!');
            });
        },
        invalidHandler: function (e) {
            console.log("ada kesalahan");
            toastr.error(e.toString(), 'Terjadi Kesalahan Sistem!');
        }
    });
});

toastr.options.onHidden = function () {
    // window.location.href = site_url + link;
};
toastr.options.onclick = function () {
    // window.location.href = site_url + link;
};
toastr.options.onCloseClick = function () {
    // window.location.href = site_url + link;
};

// var function
var tambahAlat = tambahAlat;
var tambahAlatOrdn = tambahAlatOrdn;
var tambahAlatSk = tambahAlatSk;
var deleteAlat = deleteAlat;


// event 'on'
var onChangeNamaAlat = onChangeNamaAlat;
var onChangeQty = onChangeQty;
var onChangeDiskon = onChangeDiskon;
var onChangeJenisCustomer = onChangeJenisCustomer;
var onChangeJenisOrder = onChangeJenisOrder;

var selectedPelanggan = selectedPelanggan;
var simpan = simpan;
var setDefaultOrder = setDefaultOrder;

function simpan(e) {

}


function selectedPelanggan(param) {
    return $.ajax({
        url: site_url + 'api/master/pelanggan/view/' + param.data.id,
        method: 'get'
    }).then(function (result) {
        return result;
    }, function (err) {
        return err;
    });
}

function tambahAlat() {

    // request alat
    var id = $('select[name=cari_nama_alat]').val();
    if (id) {
        $.ajax({
            url: site_url + 'api/master/alat/get_by_id/' + id,
            method: 'post'
        }).then(function (result) {
            var harga = result.response.harga;
            var row =
                "<tr class='row_harga'>" +
                "<td>" + result.response.bidang + " <input type='hidden' class='id_alat' name='id_alat[]' value='" + result.response.id + "'> </td>" +
                '<td>' + result.response.nama + '</td>' +
                '<td> ' + result.response.spesifikasi + ' </td>' +
                '<td> <input type="number" class="form-control qty" value="1"  name="qty[]" onchange="onChangeQty(this, ' + harga + ')" /> </td>' +
                '<td class="text-right">' +
                '<div class="input-group">' +
                '<span class="input-group-addon" id="basic-addon1">Rp.</span>' +
                '<input type="number" class="form-control harga" name="harga[]" onchange="onChangeHarga(this)" placeholder="" value="' + result.response.harga + '" aria-describedby="basic-addon1">' +
                '</div>' +
                '</td>' +
                '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteAlat($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
                "</tr>";
            $(row).appendTo('#table-alat > tbody');
            hitungTotalBiaya('ord');
        }, function (err) {
            console.log(err);
        });
    } else {
        toastr.error('Alat belum di pilih', 'Gagal!');
    }
}
function tambahAlatOrdn() {

    var bidang = $('#ordn_bidang'),
        namaAlat = $('#ordn_nama_alat'),
        spesifikasiGlobal = $('#ordn_spesifikasi_global'),
        hargaSatuan = $('#ordn_harga_satuan');

    var row =
        "<tr class='row_harga'>" +
        "<td>" + bidang.val() + "</td>" +
        '<td>' + namaAlat.val() + '</td>' +
        '<td> ' + spesifikasiGlobal.val() + ' </td>' +
        '<td> <input type="text" class="form-control qty" value="1"  name="qty[]" onchange="onChangeQty(this, ' + hargaSatuan.val() + ')" /> </td>' +
        '<td class="text-right">' +
        '<div class="input-group">' +
        '<span class="input-group-addon" id="basic-addon1">Rp.</span>' +
        '<input type="text" class="form-control harga" name="harga[]" placeholder="" value="' + hargaSatuan.val() + '" aria-describedby="basic-addon1">' +
        '</div>' +
        '</td>' +
        '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteAlat($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-alat-ordn > tbody');
    hitungTotalBiaya('ordn');
}
function tambahAlatSk() {

    var bidang = $('#sk_bidang'),
        namaAlat = $('#sk_nama_alat'),
        spesifikasiGlobal = $('#sk_spesifikasi_global'),
        hargaSatuan = $('#sk_harga_satuan');

    var row =
        "<tr class='row_harga'>" +
        "<td>" + bidang.val() + "</td>" +
        '<td>' + namaAlat.val() + '</td>' +
        '<td> ' + spesifikasiGlobal.val() + ' </td>' +
        '<td> <input type="text" class="form-control qty" value="1"  name="qty[]" onchange="onChangeQty(this, ' + hargaSatuan.val() + ')" /> </td>' +
        '<td class="text-right">' +
        '<div class="input-group">' +
        '<span class="input-group-addon" id="basic-addon1">Rp.</span>' +
        '<input type="text" class="form-control harga" name="harga[]" placeholder="" value="' + hargaSatuan.val() + '" aria-describedby="basic-addon1">' +
        '</div>' +
        '</td>' +
        '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteAlat($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-alat-sk > tbody');
    hitungTotalBiaya('sk');
}

function deleteAlat(row) {

    row.closest('tr').remove();
}

function onChangeNamaAlat() {
    var alat = $('select[name=cari_nama_alat]').val();
    $.ajax({
        url: site_url + 'api/master/alat/get_by_id/' + alat,
        method: 'post',
    }).then(function (result) {
        textSpesifikasiGlobal.summernote('reset');
        textSpesifikasiGlobal.summernote('insertText', result.response.spesifikasi);
    }, function (err) {
        console.log(err);
    });
}


function onChangeQty(row, harga) {
    var _row = $(row.closest('tr'));
    var qty = $(row).val();
    var order = $('#jenis_order').val().toString().toLowerCase();
    var inputHarga = _row.find('td').find('div.input-group').find('.harga');
    if (qty < 1) {
        toastr.error('Qty tidak boleh kurang dari 1', 'Gagal!');
        return;
    }

    var total = qty * harga;
    inputHarga.val(total);
    hitungTotalBiaya(order);
}

function onChangeHarga(row) {
    var _row = $(row.closest('tr'));
    var hargaBaru = $(row).val();



    var order = $('#jenis_order').val().toString().toLowerCase();
    var inputHarga = _row.find('td').find('div.input-group').find('.harga');
    if (hargaBaru < 1) {
        toastr.error('Harga tidak boleh kurang dari 1', 'Gagal!');
        return;
    }

    var total = hargaBaru;
    inputHarga.val(total);
    hitungTotalBiaya(order);
}

function onChangeDiskon(input, order) {
    var nilaiDiskon = $(input).val();
    var total = parseFloat($('#' + order + '_total_hidden').val());

    var jenisDiskon = $('#jenis_diskon').val();
    var totalDiskon = 0;
    var pajak = 0;

    if (jenisDiskon == 'Rp') {
        totalDiskon = total - nilaiDiskon;
        pajak = 0.1 * totalDiskon;
    } else {
        totalDiskon = total - ((nilaiDiskon / 100) * total);
        pajak = 0.1 * totalDiskon;
    }

    changeTotal(totalDiskon, order);
    changePajak(pajak, order);

}

function changeTotal(newTotal, order) {
    $('#' + order + "_total").html("Rp. " + numeral(parseInt(newTotal)).format('0,0'));
    $('#' + order + "_total_hidden").val(parseInt(newTotal));
}

function changePajak(newPajak, order) {
    $('#' + order + "_pajak").html("Rp. " + numeral(parseInt(newPajak)).format('0,0'));
    $('#' + order + "_pajak_hidden").val(parseInt(newPajak));
}

function onChangeJenisCustomer(select) {
    var jenisCustomer = $(select).val();
    if (jenisCustomer == 'lama') {
        $('#container_cari_perusahaan').removeClass('hide');
        $('#container_perusahaan_bukan_langganan').addClass('hide');
    } else {
        $('#container_cari_perusahaan').addClass('hide');
        $('#container_perusahaan_bukan_langganan').removeClass('hide');
    }
}

function onChangeJenisOrder() {
    setDefaultOrder();
}

function hitungTotalBiaya(order) {
    subTotal = $('#' + order + '_sub_total');
    pajak = $('#' + order + '_pajak');
    _total = $('#' + order + '_total');

    var row = $('.row_harga');
    var sum = 0;
    var _pajak = 0.1;
    var _totalAll = 0;
    _.each(row, function (_row) {
        var harga = $(_row).find('div.input-group').find('.harga');
        if (harga.val()) {
            sum += parseFloat(harga.val());
        }
    });
    _pajak *= parseFloat(sum);
    _totalAll = parseFloat(sum + pajak);

    subTotal.html("Rp. " + numeral(parseInt(sum)).format('0,0'));
    pajak.html("Rp. " + numeral(parseInt(_pajak)).format('0,0'));
    _total.html("Rp. " + numeral(parseInt(_totalAll)).format('0,0'));

    $('#' + order + '_total_hidden').val(parseInt(_totalAll));
    $('#' + order + '_pajak_hidden').val(parseInt(_pajak));
    $('#' + order + '_sub_total_hidden').val(parseInt(sum));

}


function setDefaultOrder() {


    var jenisOrder = $('#jenis_order');
    switch (jenisOrder.val()) {
        case 'ORD':
            $('#ord_group').show();
            $('#ordn_group').hide();
            $('#sk_group').hide();
            break;
        case 'ORD-N':
            $('#ord_group').hide();
            $('#ordn_group').show();
            $('#sk_group').hide();
            break;
        case 'SK':
            $('#ord_group').hide();
            $('#ordn_group').hide();
            $('#sk_group').show();
            break;
        default:
            $('#ord_group').show();
            $('#ordn_group').hide();
            $('#sk_group').hide();
            break;
    }
}
