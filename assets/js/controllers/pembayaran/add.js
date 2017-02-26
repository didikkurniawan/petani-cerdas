$(document).ready(function () {
    // summernote spesifkasi global

    $('textarea[name=catatan]').summernote({
        height: 200,
    });

    $('input[name=due_date]').datepicker({
        daysOfWeekDisabled: [0, 6],
        autoclose: true
    });

    $('input[name=tanggal_bayar]').datepicker({
        daysOfWeekDisabled: [0, 6],
        autoclose: true
    });

    //     SELECT t_kalibrasi.is_verifikasi_pengolahan_data, t_kalibrasi.is_verifikasi_draft_sertifikat, t_kalibrasi.is_verifikasi_sertifikat, t_detail_serah_terima.qty, t_detail_kalibrasi.status, m_alat.nama, m_alat.spesifikasi, m_alat.harga, m_alat.id as id_alat,
    // t_serah_terima.no_order

    // FROM t_kalibrasi

    // LEFT JOIN t_detail_kalibrasi ON t_detail_kalibrasi.id_kalibrasi = t_kalibrasi.id
    // LEFT JOIN t_detail_serah_terima ON t_detail_kalibrasi.id_alat = t_detail_serah_terima.id
    // LEFT JOIN m_alat ON t_detail_serah_terima.id_alat = m_alat.id
    // LEFT JOIN t_serah_terima ON t_serah_terima.id = t_detail_serah_terima.id_serah_terima    

    $('select[name=no_order]').select2({
        ajax: {
            url: site_url + 'api/transaksi/serah_terima/search_unpaid/',
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

    $('select[name=no_order]').on('select2:select', function (e) {
        var val = $(this).val();

        $.ajax({
            url: site_url + 'api/transaksi/pembayaran/get_list_order/' + val,
            method: 'get'
        }).then(function (result) {

            console.log("result list order", result);

            var listOrder = result.response;

            _.each(listOrder, function (val) {
                var row = '<tr>' +
                    '<td>' + val.bidang + '<input type="hidden" value="' + val.id_detail_kalibrasi + '" class="id_alat" /></td>' +
                    '<td>' + val.nama + '</td>' +
                    '<td>' + val.spesifikasi + '</td>' +
                    '<td>' + val.qty + '</td>' +
                    '<td class="text-right"> Rp. ' + numeral(parseInt(val.harga)).format('0,0') + '<input type="hidden" class="harga" value="' + val.harga + '"></td>' +
                    '</tr>';
                $(row).appendTo('#table_alat > tbody');
                hitungTotalBiaya();
            });

            $('#total_deal').html("<i>Rp. " + numeral(parseInt(result.total_deal)).format('0,0') + "</i>");

            return;

        }, function (err) {
            toastr.error(err.toString(), 'Terjadi Kesalahan Sistem !');
        });

    });


    $('form').validate({
        ignore: ":hidden:not(#summernote),.note-editable.panel-body",
        submitHandler: function () {
            var fileBuktiBayar = $('#file_bukti_bayar');
            if (fileBuktiBayar.val()) {
                Upload.uploadFile($('#file_bukti_bayar')).then(function (result) {
                    var param = {
                        id_order: $('#no_order').val(),
                        jenis_pembayaran: $('#jenis_pembayaran').val(),
                        
                    };
                    $.ajax({
                        url: site_url + '/api/transaksi/pembayaran/save',
                        method: 'POST',
                        data: $.param(param)
                    }).then(function (result) {
                        console.log(result);
                    }, function (err) {
                        toastr.error(err.toString(), "Terjadi Kesalahan Sistem!");
                    });
                });
            }
            return;
        },
        invalidHandler: function (err) {
            toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
        }
    });

    $('#container_due_date').hide();
    $('#container_tunai').show();
});

var onChangeJenisPembayaran = onChangeJenisPembayaran;



function onChangeJenisPembayaran(select) {
    var val = $(select).val();

    if (val == 'Invoice') {
        $('#container_due_date').show();
        $('#container_tunai').hide();
    } else {
        $('#container_due_date').hide();
        $('#container_tunai').show();
    }
}

function hitungTotalBiaya() {
    subTotal = $('#sub_total');
    pajak = $('#pajak');
    _total = $('#total');

    var row = $('.row_harga');
    var sum = 0;
    var _pajak = 0.1;
    var _totalAll = 0;
    _.each($('.harga'), function (harga) {

        sum += parseFloat($(harga).val());
    });
    _pajak *= parseFloat(sum);
    _totalAll = parseFloat(sum + pajak);

    subTotal.html("Rp. " + numeral(parseInt(sum)).format('0,0'));
    pajak.html("Rp. " + numeral(parseInt(_pajak)).format('0,0'));
    _total.html("Rp. " + numeral(parseInt(_totalAll)).format('0,0'));

    $('#total_hidden').val(parseInt(_totalAll));
    $('#pajak_hidden').val(parseInt(_pajak));
    $('#sub_total_hidden').val(parseInt(sum));


}

function onChangeDiskon(input) {
    var nilaiDiskon = $(input).val();
    console.log("nilai diskon", nilaiDiskon);
    var total = parseFloat($('#total_hidden').val());
    var totalDiskon = total - ((nilaiDiskon / 100) * total);
    var pajak = 0.1 * totalDiskon;
    changeTotal(totalDiskon);
    changePajak(pajak);
}

function changeTotal(newTotal) {
    $('#total').html("Rp. " + numeral(parseInt(newTotal)).format('0,0'));
    $('#total_hidden').val(parseInt(newTotal));
}

function changePajak(newPajak) {
    $('#pajak').html("Rp. " + numeral(parseInt(newPajak)).format('0,0'));
    $('#pajak_hidden').val(parseInt(newPajak));
}