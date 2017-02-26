$(document).ready(function () {
  $('textarea[name=pesan]').summernote({
    height: 200
  });

$('#form-update-pengaduan-customer').validate({
    submitHandler: function (form) {
        
        var formData = new FormData($(form));
        var formInput = {
            id: $(form).find('input[name=id]').val()
        };

        formData.append('id_pelanggan', $('#nama_perusahaan').val());
        formData.append('id_pengaduan', $('#jenis_pengaduan').val());
        formData.append('urgensi', $('#urgensi').val());
        formData.append('pesan', $('#pesan').val());

        $.ajax({
            url: site_url + '/api/pengaduan_customer/update/' + formInput.id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pengaduan Berhasil Diubah', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'pengaduan_customer';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Mengubah Data Pengaduan', 'Failed!');
        });
    }
 });
 
 

});
  var dataIdPelanggan = $('#id_pelanggan').val(); 
  var dataNamaPelanggan = $('#nama_pelanggan').val();
  $('select[name=nama_perusahaan]').select2({
    data: [{
      'id': parseInt(dataIdPelanggan),
      'text': String(dataNamaPelanggan)
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

   var dataIdPengaduan = $('#id_pengaduan').val(); 
   var dataNamaPengaduan = $('#nama_pengaduan').val();
   $('select[name=jenis_pengaduan]').select2({
    data: [{
      'id': parseInt(dataIdPengaduan),
      'text': String(dataNamaPengaduan)
    }],
    ajax: {
      url: site_url + 'api/master/pengaduan/search',
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

$('#back').click(function (event){
    window.location.href = site_url + 'pengaduan_customer';
});
