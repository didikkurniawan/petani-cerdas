$('#form_deal').submit(function (e) { e.preventDefault(); }).validate({
        submitHandler: function (form) {
            var id = $(form).data('id');
            var total = $('#nilai_deal').val();
            // var dp = $('#total_dp').val();
            // var via = $('#via');
            // var tanggalBayar = $('#tanggal_bayar');
            // var buktiPembayaran = $('#file_bukti_pembayaran');
            // var dueDate = $('#due_date');
            

            var params = {
                id: id,
                pajak_deal: $('#pajak_hidden').val(),
                total_deal: $('#total_hidden').val(),
                // dp: dp,
                // via: via.val(),
                // tanggal_bayar: moment(tanggalBayar.val()).format('YYYY-MM-DD'),
                // due_date: moment(dueDate.val()).format('YYYY-MM-DD'),
            };
                    $.ajax({
                        url: site_url + 'api/diklat/deal',
                        method: 'post',
                        data: $.param(params)
                    }).then(function (result) {
                        table.draw(true);
                        $('#modal_deal').modal('hide');
                        toastr.success('Berhasil Menyimpan Deal', 'Berhasil!');
                        return false;
                    }, function (err) {

                    });


            // if (buktiPembayaran.val()) {
            //     Upload.uploadFile(buktiPembayaran).then(function (result) {

            //         params.file_bukti_pembayaran = result.file;

            //         $.ajax({
            //             url: site_url + '/api/transaksi/penawaran_biaya/deal',
            //             method: 'post',
            //             data: $.param(params)
            //         }).then(function (result) {
            //             table.draw(true);
            //             $('#modal_deal').modal('hide');
            //             toastr.success('Berhasil Menyimpan Deal', 'Berhasil!');
            //             return false;
            //         }, function (err) {

            //         });
            //     }, function (err) {
            //         toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
            //         return false;
            //     });
            // } else {

            //     $.ajax({
            //         url: site_url + '/api/transaksi/penawaran_biaya/deal',
            //         method: 'post',
            //         data: $.param(params)
            //     }).then(function (result) {
            //         table.draw(true);
            //         $('#modal_deal').modal('hide');
            //         toastr.success('Berhasil Menyimpan Deal', 'Berhasil!');
            //         return false;
            //     }, function (err) {
            //         toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
            //     });

            // }

            return false;
        },
        invalidHandler: function (err) {
            console.log(err);
        }
    });





$('#form_set_tanggal').submit(function (e) { e.preventDefault(); }).validate({
        submitHandler: function (form) {
            var id = $(form).data('id');
            var mulai = $('#tanggal_mulai');
            var selesai = $('#tanggal_selesai');

            var params = {
                id: id,
                tanggal_mulai: moment(mulai.val()).format('YYYY-MM-DD'),
                tanggal_selesai: moment(selesai.val()).format('YYYY-MM-DD'),
            };
                    $.ajax({
                        url: site_url + 'api/diklat/setTanggal',
                        method: 'post',
                        data: $.param(params)
                    }).then(function (result) {
                        table.draw(true);
                        $('#modal_set_tanggal').modal('hide');
                        toastr.success('Berhasil Menyimpan Tanggal Deal', 'Berhasil!');
                        return false;
                    }, function (err) {

                    });

            return false;
        },
        invalidHandler: function (err) {
            console.log(err);
        }
    });




var deal = deal;
var simpanDeal = simpanDeal;


var table = $('#table-perusahaan').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/diklat',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "createdRow": function (row, data, index) {
        if (data.is_deal == '0') {
            $('td', row).eq(3).addClass('info');
        } else {
            $('td', row).eq(3).addClass('success');
        }
    },
    "columns": [
        {
            "data": "created_at"
        },
        { "data": "no_diklat" },
        { "data": "nama" },
        {
            "data": "is_deal",
            "render": function (data, type, row, meta) {
                var template = "<strong>Deal</strong> <br /> Rp. " + numeral(row.total_deal).format('Rp0,0.00');
                if (row.is_deal == 0) {
                    template = "<strong>Nego</strong>";
                }
                return template;
            }
        },
        {
            "data": "total",
            "render": function (data, type, row, meta) {
                return "Rp. " + numeral(data).format('Rp0,0.00');
            }
        },
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a class='btn btn-sm btn-success' onclick='setTanggal(" + data + "," + row.jumlah_hari + ")'>Set Tanggal</a> <a class='btn btn-sm btn-success' onclick='deal(" + data + ", " + row.total + ")'>deal</a> <a href='" + site_url + "diklat/penawaran_biaya/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "diklat/penawaran_biaya/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "diklat/penawaran_biaya/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});

onChangeNilaiDeal();
var onChangeNilaiDeal = onChangeNilaiDeal;

function deal(id, total) {
    $('#nilai_deal').val(total);

    $('#form_deal').data('id', id);
    $('#form_deal').data('total', total);
    
    $('#modal_deal').modal();

    $('#total_before').val(total);
    

}


function isNewTotalLower(newTotal, beforeTotal) {
    if (newTotal < beforeTotal) {
        return false;
    }
    return true;
}
function getDp() {
    var nilaiDeal = $('#nilai_deal').val();
    return nilaiDeal * 0.5;
}

function onChangeNilaiDeal(el) {
    var nilaiDeal = (el) ? $(el) : $('#nilai_deal');

    var pajak = 0.1 * parseInt(nilaiDeal.val());
    var total = pajak + parseInt(nilaiDeal.val());
    

    $('#pajak_hidden').val(pajak);
    $('#total_hidden').val(total);
    $('#total_dp').val();

    $('#pajak').html('<small>Pajak</small><br/><strong>Rp.' + numeral(pajak).format('0,0') + '</strong>');
    $('#total').html('<small>Total</small><br/><strong style="font-size: larger">Rp.' + numeral(total).format('0,0') + '</strong>');

}
$('#tanggal_mulai').datepicker({
        daysOfWeekDisabled: [0, 6],
        autoclose: true
    })
    
$('#tanggal_selesai').datepicker({
        daysOfWeekDisabled: [0, 6],
        autoclose: true
    })

function setTanggal(id, jumlahHari) {
    $('#jumlah_hari').val(jumlahHari);

    $('#form_set_tanggal').data('id', id);
    $('#form_set_tanggal').data('jumlahHari', jumlahHari);
    
    $('#modal_set_tanggal').modal();

    // $('#total_before').val(total);
    

}




