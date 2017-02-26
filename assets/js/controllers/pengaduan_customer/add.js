
$(document).ready(function () {
  textSpesifikasiGlobal = $('textarea[name=pesan]').summernote({
    height: 200
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

   $('select[name=jenis_pengaduan]').select2({
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

 $('#form-pengaduan-customer').validate({
    submitHandler: function (form) {
        
        var formData = new FormData($(form));

        formData.append('id_pelanggan', $('#nama_perusahaan').val());
        formData.append('id_pengaduan', $('#jenis_pengaduan').val());
        formData.append('urgensi', $('#urgensi').val());
        formData.append('pesan', $('#pesan').val());
        $.ajax({
            url: site_url + '/api/pengaduan_customer/add',
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pengaduan Berhasil Ditambahkan', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'pengaduan_customer';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menambah Data Pengaduan', 'Failed!');
        });
    }
   });
 });