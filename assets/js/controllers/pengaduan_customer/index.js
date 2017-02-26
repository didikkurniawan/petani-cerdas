$('select[name=nama_petugas]').select2({
    ajax: {
      url: site_url + 'api/pengaduan_customer/search',
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
              text: obj.first_name + ' ' + obj.last_name,
            }
          })
        }
      },
      cache: true,
      minimumInputLength: 3,

    },
  });
var table = $('#table-pengaduan-customer').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/pengaduan_customer',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "createdRow": function (row, data, index) {

        console.log("data", data);        

        if (data.penanganan == "Selesai") {
            $('td', row).eq(3).addClass('success text-center').html('Selesai');
        }else if(data.penanganan == "Dalam Proses"){
            $('td', row).eq(3).addClass('info text-center').html('Dalam Proses');
        }else if(data.penanganan == "Dibatalkan"){
            $('td', row).eq(3).addClass('danger text-center').html('Dibatalkan');
        }else{
            $('td', row).eq(3).addClass('warning text-center').html('Belum Ditangani');
        }
    },
    "columns": [
        {"data": "created_at" },
        { "data": "nama" },
        { "data": "nama_pengaduan" },
        { "data": "penanganan" },
        { "data": "urgensi" },
        
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a class='btn btn-sm btn-success' onclick='deal(" + data + ", " + row.id + ")'>Tindakan</a> <a href='" + site_url + "pengaduan_customer/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "pengaduan_customer/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "pengaduan_customer/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});



function deal(id) {
    $('#btn_simpan').data('id', id);
    $('#btn_simpan').data('keterangan', keterangan);
    $('#modal_deal').modal();
}

function simpanPenanganan(el) {
    
        var btnSimpan = $(el);
        var id = btnSimpan.data('id');
        var keterangan = $('#keterangan').val();
        var formData = new FormData();
        formData.append('keterangan', $('#keterangan').val());
        formData.append('nama_petugas', $('#nama_petugas').val());
        formData.append('penanganan', $('input[name=penanganan]:checked').val());
        

        $.ajax({
            url: site_url + '/api/pengaduan_customer/update_penanganan/' + id,
            method: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
        }).then(function (result) {
            toastr.success('Data Pengaduan Berhasil ditangani', 'Success!');
            setTimeout(function(){
                window.location.href = site_url + 'pengaduan_customer';
            }, 1000);
        }, function (err) {
            toastr.error('Tidak Berhasil Mengubah Data Pengaduan', 'Failed!');
        });
    }
 

$('#keterangan').summernote({
    height: 150
  });