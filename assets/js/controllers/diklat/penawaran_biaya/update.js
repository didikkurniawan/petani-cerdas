 $(document).ready(function(event){
        if($('#is_deal').val() == 0){
            $('#jumlah_peserta').prop('disabled', false);
            $('#jumlah_hari').prop('disabled', false);
            $('#tarif_per_peserta').prop('disabled', false);
        }else{
            $('#jumlah_peserta').prop('disabled', true); 
            $('#jumlah_hari').prop('disabled', true);
            $('#tarif_per_peserta').prop('disabled', true);
        }        

    $('#tanggal_mulai').datepicker({
        daysOfWeekDisabled: [0, 6],
        autoclose: true
    })
    
    $('#tanggal_selesai').datepicker({
        daysOfWeekDisabled: [0, 6],
        autoclose: true
    })

    var subTotal = $('#sub_total_hidden').val();
    $('#sub_total').html('<strong>Rp.' + numeral(subTotal).format('0,0') + '</strong>');

    var pajak = $('#pajak_hidden').val();
    $('#pajak').html('<strong>Rp.' + numeral(pajak).format('0,0') + '</strong>');

    var total = $('#total_hidden').val();
    $('#total').html('<strong>Rp.' + numeral(total).format('0,0') + '</strong>');

    var totalDeal = $('#total_deal_hidden').val();
    $('#total_deal').html('<strong>Rp.' + numeral(totalDeal).format('0,0') + '</strong>');


    // form validation
    $('#form_update_diklat').validate({
         submitHandler: function (form) {
        var formInput = {
                id: $(form).find('#id').val()
        };
        var formData = new FormData($(form));
        // formData.append('id', $('#id').val());
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
        formData.append('tanggal_mulai', moment($('#tanggal_mulai').val()).format('YYYY-MM-DD'));
        formData.append('tanggal_selesai', moment($('#tanggal_selesai').val()).format('YYYY-MM-DD'));


         $.ajax({
            url: site_url + 'api/diklat/update/'+ formInput.id,
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

$('select[name=jenis_pelatihan]').select2({
   data: [{
      'id': $('#id_pelatihan_hidden').val(),
      'text': $('#pelatihan_hidden').val()
    }],
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
        data: [{
        'id': $('#id_pelanggan_hidden').val(),
        'text': $('#nama_pelanggan_hidden').val()
        }],
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

   

var jumlahPeserta ;
var jumlahHari;
var tarif;

function onChangeJumlahPeserta(jumlah){
    console.log($(jumlah).val());
    jumlahPeserta = $(jumlah).val();
    $('#jumlah_peserta').val(jumlahPeserta);
    hitungTotalBiaya();

}

function onChangeJumlahHari(jumlahHari){
    console.log($(jumlahHari).val());
    jumlahHari = $(jumlahHari).val();
    $('#jumlah_hari').val(jumlahHari);
    hitungTotalBiaya();

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
