var table = $('#table-perusahaan').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/transaksi/pembayaran',
        "type": "POST"
    },
    "createdRow": function (row, data, index) {
        if (parseInt(data.is_lunas) == 0) {
            $('td', row).eq(4).addClass('danger');
        } else {
            $('td', row).eq(4).addClass('success');
        }
    },
    "order": [[0, 'asc']],

    "columns": [
        {
            "data": "created_at",
            "render": function (data, type, row, meta) {
                return data + "<br /><i>" + moment(data).fromNow() + "</i>";
            }
        },

        { "data": "no_invoice" },
        { "data": "no_penawaran" },
        { "data": "nama" },
        {
            "data": "is_lunas",
            "render": function (data, type, row, meta) {
                var messageLunas = 'Belum Lunas';
                if (parseInt(data) != 0) {
                    messageLunas = 'Lunas';
                }

                return "<strong>" + messageLunas + "</strong><br /><i>Sisa Rp." + numeral(parseFloat(row.total) - parseFloat(row.dp)).format("0,0") + "</i>";
            }
        },

        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                console.log(row);
                var dropdown = '<div class="dropdown">' +
                    '<a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block">' +
                    'Action <i class="fa fa-chevron-down"></i>' +
                    '</a>' +
                    '<ul class="dropdown-menu" aria-labelledby="dLabel">' +
                    '<li><a><i class="fa fa-print"></i>  Cetak Invoice  </a></li>' +
                    '<li><a onclick="openModalViewInvoice(' + row.id + ')"><i class="fa fa-eye"></i> Tampilkan</a></li>' +
                    '<li><a><i class="fa fa-trash"></i> Hapus</a></li>' +
                    '<li><a><i class="fa fa-edit"></i> Edit</a></li>' +
                    '<li><a onclick="deal(' + row.id + ', ' + row.total + ', ' + row.dp + ', ' + row.pajak + ')"><i class="fa fa-money"></i> Bayar Invoice</a></li>' +
                    '</ul>' +
                    '</div>';
                return dropdown;
                // return "<a href='" + site_url + "/samples/crud/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "/samples/crud/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "/samples/crud/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});

var openModalViewInvoice = openModalViewInvoice;

function openModalViewInvoice(id) {
    $.ajax({
        url: site_url + 'api/transaksi/pembayaran/view/' + id,
        method: 'get'
    }).then(function (result) {
        
        var data = result;
        //header
        $('.nama_perusahaan').html(data.pelanggan.nama);
        $('#email').html(data.pelanggan.email);
        $('#no_invoice').html(data.pembayaran.no_invoice);
        $('#due_date').html("Jatuh Tempo <strong>" + moment(data.pembayaran.due_date).format('DD MMMM YYYY') + '</strong>');
        $('.alamat').html(data.pelanggan.alamat + "<br />" + data.pelanggan.kelurahan + "<br />" + data.pelanggan.kecamatan + "<br />" + data.pelanggan.kota + "<br />" + data.pelanggan.provinsi);
        $('.telepon').html("Telepon : " + data.pelanggan.telepon + "<br />Fax : " + data.pelanggan.fax);

        //alat

        _.each(data.detail_penawaran, function (detail) {

            var row = '<tr>' +
                '<td>' + parseInt(detail.qty) + '</td>' +
                '<td>' + detail.nama + ' <br /><strong>' + detail.bidang + '</strong><br /><strong>' + detail.spesifikasi + '</strong></td>' +
                '<td>Rp.' + numeral(parseFloat(detail.harga)).format("0,0") + '</td>' +
                '<td>Rp.' + numeral(parseInt(detail.qty) * parseFloat(detail.harga)).format("0,0") + '</td>' +
                '</tr>';
            $(row).appendTo('#table_alat > tbody');

        });

        var subTotal = _.sum(_.map(data.detail_penawaran, function (detail) {
            return (parseInt(detail.qty) * parseFloat(detail.harga));
        }));
        $('#sub_total').html("Rp." + numeral(subTotal).format("0,0"));
        $('#pajak').html("Rp." + numeral(parseFloat(data.pembayaran.pajak)).format("0,0"));
        $('#total').html("Rp." + numeral(parseFloat(data.pembayaran.total)).format("0,0"));
        $('#jenis_diskon').html("<i>" + data.penawaran.jenis_diskon + "</i>");
        if (data.penawaran.jenis_diskon == 'Rp') {
            $('#diskon').html("Rp. " + numeral(parseFloat(data.penawaran.diskon)).format("0,0"));
        } else {
            $('#diskon').html(data.penawaran.diskon + '%');
        }
        //pembayaran



        $('#modal_detail_pembayaran').modal('show');

    }, function (err) {
        console.log(err);
        toastr.error(err.toString(), 'Terjadi Kesalahan Sistem!');
    });
}
