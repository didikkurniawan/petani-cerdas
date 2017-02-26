var tableAlat;
var textSpesifikasiGlobal;
var alat;

var subTotal;
var pajak;
var _total;

$(document).ready(function () {

    $('input[name=tanggal_kegiatan]').datepicker({
        daysOfWeekDisabled: [0, 6],
        autoclose: true
    });

    $('.input-daterange input').each(function () {
        $(this).datepicker("clearDates");
    });

    // init DOM
    tableAlat = $('#table-alat');

    // summernote spesifkasi global
    textSpesifikasiGlobal = $('textarea[name=spesifikasi_global]').summernote({
        height: 200
    });

    // select2
    $('select[name=jenis_pelatihan]').select2({
    ajax: {
            url: site_url + 'api/diklat/search',
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

    $('#form-pelatihan').validate({
         submitHandler: function (form) {
        
        var formData = new FormData($(form));

        formData.append('nama', $('#name').val());

         $.ajax({
            url: site_url + 'api/diklat/addJenisPelatihan',
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pelatihan Berhasil Ditambahkan', 'Success!');
            setTimeout(function(){
                location.reload();
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menambahkan Data Pelatihan', 'Failed!');
        });
    }
});

$('#form_order').validate({
         submitHandler: function (form) {
        
        var formData = new FormData($(form));

        formData.append('nama_perusahaan', $('select[name=nama_perusahaan]').val());
        formData.append('jenis_pelatihan', $('#jenis_pelatihan').val());
        formData.append('nama_kegiatan', $('#nama_kegiatan').val());
        formData.append('jumlah_peserta', $('#jumlah_peserta').val());
        formData.append('lokasi', $('#lokasi').val());
        formData.append('jumlah_hari', $('#jumlah_hari').val());
        formData.append('tarif', $('#tarif_per_peserta').val());
        formData.append('subtotal', $('#sub_total_hidden').val());
        formData.append('pajak', $('#pajak_hidden').val());
        formData.append('total', $('#total_hidden').val());


         $.ajax({
            url: site_url + 'api/diklat/add',
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pelatihan Berhasil Ditambahkan', 'Success!');
            setTimeout(function(){
                location.reload();
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menambahkan Data Pelatihan', 'Failed!');
        });
    }
});

});

// var function
var tambahAlat = tambahAlat;
var deleteAlat = deleteAlat;


// event 'on'
var onChangeNamaAlat = onChangeNamaAlat;
var onChangeQty = onChangeQty;
var onChangeDiskon = onChangeDiskon;
var onChangeJenisCustomer = onChangeJenisCustomer;

var selectedPelanggan = selectedPelanggan;
var simpan = simpan;

// function simpan(e) {

// }
var jumlahPeserta ;
var jumlahHari;
var tarif;

function onChangeJumlahPeserta(jumlah){
    console.log($(jumlah).val());
    jumlahPeserta = $(jumlah).val();
    $('#jumlah_peserta').val(jumlahPeserta);
}

function onChangeJumlahHari(jumlahHari){
    console.log($(jumlahHari).val());
    jumlahHari = $(jumlahHari).val();
    $('#jumlah_hari').val(jumlahHari);

}

function onChangeTarif(tarif){
    console.log($(tarif).val());
    tarif = $(tarif).val();
    $('#tarif_per_peserta').val(tarif);
    hitungTotalBiaya();

}

function hitungTotalBiaya(){
    var peserta = $('#jumlah_peserta').val();
    var hari = $('#jumlah_hari').val();
    var tarif = $('#tarif_per_peserta').val();

    var subTotal = (peserta * tarif) * hari;
    var pajak = subTotal * 10 / 100;
    var total = subTotal + pajak;

    $('#sub_total_hidden').val(subTotal);
    $('#pajak_hidden').val(pajak);
    $('#total_hidden').val(total);

    $('#sub_total').html("Rp. " + numeral(parseInt(subTotal)).format('0,0'));
    $('#pajak').html("Rp. " + numeral(parseInt(pajak)).format('0,0'));
    $('#total').html("Rp. " + numeral(parseInt(total)).format('0,0'));
    
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

// function tambahAlat() {

//     // request alat
//     var id = $('select[name=cari_nama_alat]').val();
//     if (id) {
//         $.ajax({
//             url: site_url + 'api/master/alat/get_by_id/' + id,
//             method: 'post'
//         }).then(function (result) {
//             var harga = result.response.harga;
//             var row =
//                 "<tr class='row_harga'>" +
//                 "<td>" + result.response.bidang + " <input type='hidden' class='id_alat' name='id_alat[]' value='" + result.response.id + "'> </td>" +
//                 '<td>' + result.response.nama + '</td>' +
//                 '<td> ' + result.response.spesifikasi + ' </td>' +
//                 '<td> <input type="text" class="form-control qty" value="1"  name="qty[]" onchange="onChangeQty(this, ' + harga + ')" /> </td>' +
//                 '<td class="text-right">' +
//                 '<div class="input-group">' +
//                 '<span class="input-group-addon" id="basic-addon1">Rp.</span>' +
//                 '<input type="text" class="form-control harga" name="harga[]" placeholder="" value="' + result.response.harga + '" aria-describedby="basic-addon1">' +
//                 '</div>' +
//                 '</td>' +
//                 '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteAlat($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
//                 "</tr>";
//             $(row).appendTo('#table-alat > tbody');
//             hitungTotalBiaya();
//         }, function (err) {
//             console.log(err);
//         });
//     } else {
//         toastr.error('Alat belum di pilih', 'Gagal!');
//     }
// }

// function deleteAlat(row) {

//     row.closest('tr').remove();
// }

// function onChangeNamaAlat() {
//     var alat = $('select[name=cari_nama_alat]').val();
//     $.ajax({
//         url: site_url + 'api/master/alat/get_by_id/' + alat,
//         method: 'post',
//     }).then(function (result) {
//         textSpesifikasiGlobal.summernote('reset');
//         textSpesifikasiGlobal.summernote('insertText', result.response.spesifikasi);
//     }, function (err) {
//         console.log(err);
//     });
// }


// function onChangeQty(row, harga) {
//     var _row = $(row.closest('tr'));
//     var qty = $(row).val();
//     var inputHarga = _row.find('td').find('div.input-group').find('.harga');
//     if (qty < 1) {
//         toastr.error('Qty tidak boleh kurang dari 1', 'Gagal!');
//         return;
//     }

//     var total = qty * harga;
//     inputHarga.val(total);
// }

// function onChangeDiskon(input) {
//     var nilaiDiskon = $(input).val();
//     var total = parseFloat($('#total').html());
//     var totalDiskon = total - ((nilaiDiskon / 100) * total);

//     // new total
//     $('#total').html(totalDiskon);


// }

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

// function hitungTotalBiaya() {
//     subTotal = $('#sub-total');
//     pajak = $('#pajak');
//     _total = $('#total');

//     var row = $('.row_harga');
//     var sum = 0;
//     var _pajak = 0.1;
//     var _totalAll = 0;
//     _.each(row, function (_row) {
//         var harga = $(_row).find('div.input-group').find('.harga');
//         if (harga.val()) {
//             sum += parseFloat(harga.val());
//         }
//     });
//     _pajak *= parseFloat(sum);
//     _totalAll = parseFloat(sum + pajak);

//     subTotal.html(sum);
//     pajak.html(_pajak);
//     _total.html(_totalAll);

// }
