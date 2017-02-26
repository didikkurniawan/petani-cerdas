/**
 * Created by agungrizkyana on 12/10/16.
 */
$(document).ready(function(event){
    

    var jumlah = $('#jumlah_peserta').val();
    $('#jumlah_peserta').val(jumlah + ' orang');

    var jumlahHari = $('#jumlah_hari').val();
    $('#jumlah_hari').val(jumlahHari + ' hari');

    var tarif = $('#tarif_per_peserta').val();
    $('#tarif_per_peserta').val('Rp. '+ numeral(tarif).format('0,0'));

    var subTotal = $('#sub_total_hidden').val();
    $('#sub_total').html('<strong>Rp.' + numeral(subTotal).format('0,0') + '</strong>');

    var pajak = $('#pajak_hidden').val();
    $('#pajak').html('<strong>Rp.' + numeral(pajak).format('0,0') + '</strong>');

    var total = $('#total_hidden').val();
    $('#total').html('<strong>Rp.' + numeral(total).format('0,0') + '</strong>');

    var totalDeal = $('#total_deal_hidden').val();
    $('#total_deal').html('<strong>Rp.' + numeral(totalDeal).format('0,0') + '</strong>');

    
});
$('#back').click(function (event){
    window.location.href = site_url + 'diklat/penawaran_biaya';
});

