$('#modal_deal').on('show.bs.modal', function () {

  // kirim invoice
  $('input[name=kirim_invoice]').on('change', function (e) {

    var id = $('#form_deal').data('id');
    var alamat = $(this).val();
    var url = site_url + '/api/transaksi/pembayaran/get_alamat_customer/';

    $.ajax({
      url: url,
      method: 'get',
      data: $.param({
        id_pembayaran: id,
        alamat: alamat
      })
    }).then(function (result) {
      $('#alamat_invoice').val(result.response);
    }, function (err) {
      toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
    });
  });

  $('input[name=tanggal_bayar]').datepicker({
    daysOfWeekDisabled: [0, 6],
    autoclose: true
  });

  $('input[name=due_date]').datepicker({
    daysOfWeekDisabled: [0, 6],
    autoclose: true
  });

  onChangeNilaiDeal();

  $('#sisa_pembayaran').on('change', function () {
    // onChangeNilaiDeal();
  });

  $('#form_deal').submit(function (e) { e.preventDefault(); }).validate({
    submitHandler: function (form) {
      var id = $(form).data('id');
      var total = $('#nilai_deal').val();
      var dp = $('#total_dp').val();
      var via = $('#via');
      var tanggalBayar = $('#tanggal_bayar');
      var buktiPembayaran = $('#file_bukti_pembayaran');
      var sisaPembayaran = $('#sisa_pembayaran').val();
      var dueDate = $('#due_date');

      var isLunas = (parseFloat(sisaPembayaran) + parseFloat(dp)  == total) ? 1 : 0;
      var isInvoice = (parseFloat(sisaPembayaran) + parseFloat(dp)  == total) ? 0 : 1;

      var params = {
        id: id,
        pajak: $('#pajak_hidden').val(),
        total: $('#total_hidden').val(),
        via: via.val(),
        sisa_pembayaran: sisaPembayaran,
        is_lunas: isLunas,
        is_invoice: isInvoice,
        alamat_invoice: $('#alamat_invoice').val()
      };


      if (buktiPembayaran.val()) {
        Upload.uploadFile(buktiPembayaran).then(function (result) {

          params.file_bukti_pembayaran = result.file;

          $.ajax({
            url: site_url + 'api/transaksi/pembayaran/update/' + id,
            method: 'post',
            data: $.param(params)
          }).then(function (result) {
            toastr.success('Berhasil Update Pembayaran', 'Berhasil!');
            table.draw(true);
            $('#modal_deal').modal('hide');

          }, function (err) {
            toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
          });
        }, function (err) {
          toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
          return false;
        });
      } else {

        $.ajax({
          url: site_url + 'api/transaksi/pembayaran/update/' + id,
          method: 'post',
          data: $.param(params)
        }).then(function (result) {
          toastr.success('Berhasil Update Pembayaran', 'Berhasil!');
          table.draw(true);
          $('#modal_deal').modal('hide');
        }, function (err) {
          toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
        });

      }

      return false;
    },
    invalidHandler: function (err) {
      console.log(err);
    }
  });
});

var deal = deal;
var simpanDeal = simpanDeal;

var onChangeNilaiDeal = onChangeNilaiDeal;

function deal(id, total, dp, pajak) {
  $('#nilai_deal').val(total);
  $('#total_dp').val(dp);
  $('#pajak_hidden').val(pajak);


  $('#form_deal').data('id', id);
  $('#form_deal').data('total', total);
  $('#form_deal').data('dp', dp);

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

  // var pajak = 0.1 * parseInt(nilaiDeal.val());
  // var total = pajak + parseInt(nilaiDeal.val());
  var dp = parseInt($('#total_dp').val());
  var sisaPembayaran = parseInt(nilaiDeal.val()) - dp;

  // $('#pajak_hidden').val(pajak);
  $('#total_hidden').val(parseInt(nilaiDeal.val()));
  // $('#total_dp').val(dp);
  $('#sisa_pembayaran').val(sisaPembayaran);

  // setLunas(sisaPembayaran, dp, total);

  $('.pajak').html('<small>Pajak</small><br/><strong>Rp.' + numeral($('#pajak_hidden').val()).format('0,0') + '</strong>');
  $('.total').html('<small>Total</small><br/><strong style="font-size: larger">Rp.' + numeral(parseInt(nilaiDeal.val())).format('0,0') + '</strong>');

}

function setLunas(sisaPembayaran, dp, total) {
  if (sisaPembayaran == (total - dp)) {
    $('#alert_lunas').show();
    $('#alert_belum_lunas').hide();
  } else {
    $('#alert_lunas').hide();
    $('#alert_belum_lunas').show();
  }
}

