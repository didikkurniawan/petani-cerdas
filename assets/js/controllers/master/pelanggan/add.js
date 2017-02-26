

    // init DOM
    tableAlat = $('#form-add-pelanggan');
    // select2
    $('select[name=cari_nama_provinsi]').empty();
     $('select[name=cari_nama_provinsi]').select2({
        // data:[{
        //     id: 0,
        //     text: 'PILIH PROVINSI'
        // }],
        ajax: {
            url: site_url + 'api/wilayah/provinsi',
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
            cache: false,
            minimumInputLength: 3,

        },
    });
    $('select[name=cari_nama_kabupaten]').empty();
    $('select[name=cari_nama_kabupaten]').select2({
        ajax: {
            url: site_url + 'api/wilayah/kota',
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
    $('select[name=cari_nama_kecamatan]').empty();
    $('select[name=cari_nama_kecamatan]').select2({
        ajax: {
            url: site_url + 'api/wilayah/kecamatan',
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
    $('select[name=cari_nama_kelurahan]').empty();
    $('select[name=cari_nama_kelurahan]').select2({
        ajax: {
            url: site_url + 'api/wilayah/kelurahan',
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
    $('select[name=kodepos]').empty();
    $('select[name=kodepos]').select2({
        ajax: {
            url: site_url + 'api/wilayah/kodepos',
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

    $('select[name=cari_nama_provinsi]').on('change', function() {
    $('select[name=cari_nama_kabupaten]').empty();
    $('select[name=cari_nama_kabupaten]').select2({
      ajax: {
        url: base_url + '/api/wilayah/kota?provinsiId=' + $('select[name=cari_nama_provinsi]').val(),
        dataType: 'json',
        data: function(param) {
          return {
            delay: 0.3,
            q: param.term
          }
        },
        processResults: function(data) {
          return {
            results: _.map(data.items || data, function(obj) {
              return {
                id: obj.id,
                text: obj.text || obj.nama,
              }
            })
          }
        },
        cache: false,
        minimumInputLength: 3,

      }
    });
  });
    

    $('select[name=cari_nama_kabupaten]').on('change', function() {
    $('select[name=cari_nama_kecamatan]').empty();
    $('select[name=cari_nama_kecamatan]').select2({
      ajax: {
        url: base_url + '/api/wilayah/kecamatan?kotaId=' + $('select[name=cari_nama_kabupaten]').val(),
        dataType: 'json',
        data: function(param) {
          return {
            delay: 0.3,
            q: param.term
          }
        },
        processResults: function(data) {
          return {
            results: _.map(data.items || data, function(obj) {
              return {
                id: obj.id,
                text: obj.text || obj.nama,
              }
            })
          }
        },
        cache: false,
        minimumInputLength: 3,

      }
    });
  });

  $('select[name=cari_nama_kecamatan]').on('change', function() {
    $('select[name=cari_nama_kelurahan]').empty();
    $('select[name=cari_nama_kelurahan]').select2({
      ajax: {
        url: base_url + '/api/wilayah/kelurahan?kecamatanId=' + $('select[name=cari_nama_kecamatan]').val(),
        dataType: 'json',
        data: function(param) {
          return {
            delay: 0.3,
            q: param.term
          }
        },
        processResults: function(data) {
          return {
            results: _.map(data.items || data, function(obj) {
              return {
                id: obj.id,
                text: obj.text || obj.nama,
              }
            })
          }
        },
        cache: false,
        minimumInputLength: 3,

      }
    });

    $('select[name=kodepos]').empty();
    $('select[name=kodepos]').select2({
      ajax: {
        url: base_url + '/api/wilayah/kodepos?kecamatanId=' + $('select[name=cari_nama_kecamatan]').val(),
        dataType: 'json',
        data: function(param) {
          return {
            delay: 0.3,
            q: param.term
          }
        },
        processResults: function(data) {
          return {
            results: _.map(data.items || data, function(obj) {
              return {
                id: obj.id,
                text: obj.text || obj.kodepos,
              }
            })
          }
        },
        cache: false,
        minimumInputLength: 3,

      }
    });
  });

    $('#form-add-pelanggan').validate({
    submitHandler: function (form) {
        
        // var formData = new FormData($(form));

        // formData.append('nama', $('#nama').val());
        // formData.append('telepon', $('#telepon').val());
        // formData.append('fax', $('#fax').val());
        // formData.append('email', $('#email').val());
        // formData.append('nama_perorangan', $('#nama_perorangan').val());
        // formData.append('contact_person', $('#contact_person').val());
        // formData.append('alamat', $('#alamat').val());
        // formData.append('provinsi',$('#cari_nama_provinsi').text());
        // formData.append('kota',$('#cari_nama_kabupaten').text());
        // formData.append('kecamatan',$('#cari_nama_kecamatan').text());
        // formData.append('kelurahan',$('#cari_nama_kelurahan').text());
        // formData.append('kodepos',$('#kodepos').text());

        var nama = $('#nama').val();
        var telepon = $('#telepon').val();
        var fax = $('#fax').val();
        var email = $('#email').val();
        var up = $('#up').val();
        var contactPerson = $('#contact_person').val();
        var alamat =  $('#alamat').val();
        var alamat_invoice =  $('#alamat_invoice').val();
        var provinsi = $('#cari_nama_provinsi').text();
        var kota = $('#cari_nama_kabupaten').text();
        var kecamatan = $('#cari_nama_kecamatan').text();
        var kelurahan = $('#cari_nama_kelurahan').text();
        var kodepos = $('#kodepos').text();

        $.ajax({
            url: site_url + '/api/master/pelanggan/add',
            method: 'post',
            data: $.param({
                nama: nama,
                telepon: telepon,
                fax: fax,
                email: email,
                up: up,
                contact_person: contactPerson,
                alamat: alamat,
                alamat_invoice:alamat_invoice,
                provinsi: provinsi,
                kota: kota,
                kecamatan: kecamatan,
                kelurahan: kelurahan,
                kodepos: kodepos
            }),
        }).then(function (result) {
            toastr.success('Data Pelanggan Berhasil Ditambahkan', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'master/data_pelanggan';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Menambah Data Pelanggan', 'Failed!');
        });
         return false;
        },
        invalidHandler: function (e) {
            console.log("ada kesalahan");
            toastr.error(e.toString(), 'Terjadi Kesalahan Sistem!');
        }
    });

$('#back').click(function (event){
    window.location.href = site_url + 'master/data_pelanggan';
});


    



















