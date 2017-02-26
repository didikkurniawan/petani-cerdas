var deal = deal;
var simpanDeal = simpanDeal;

var onChangeNilaiDeal = onChangeNilaiDeal;

var table = $('#table-perusahaan').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/transaksi/penawaran_biaya',
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
        {
            "data": "no_penawaran",
            "render": function (data, type, row, meta) {
                return data + "<br /><strong class='text-danger'><i>" + row.jenis_order + "</i></strong>";
            }
        },
        {"data": "nama"},
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
                return " <a class='btn btn-sm btn-success' onclick='deal(" + data + ", " + row.total + ")'>deal</a> <a href='" + site_url + "/samples/crud/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "/samples/crud/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "/samples/crud/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});

function deal(id, total) {
    $('#nilai_deal').val(total);

    $('#btn_simpan').data('id', id);
    $('#btn_simpan').data('total', total);

    $('#modal_deal').modal();

    $('#total_before').val(total);
    // $.ajax({
    //     url: site_url + 'api/transaksi/penawaran_biaya/deal',
    //     method: 'post',
    //     data: "id=" + id
    // }).then(function (result) {
    //     console.log(result);
    //     table.draw(true);
    // }, function (err) {
    //     console.log(err);
    // })

}

function isNewTotalLower(newTotal, beforeTotal) {
    if (newTotal < beforeTotal) {
        return false;
    }
    return true;
}

function simpanDeal(el) {
    var btnSimpan = $(el);
    var id = btnSimpan.data('id');
    var total = $('#nilai_deal').val();

    var params = {
        id: id,

        pajak_deal: $('#pajak_hidden').val(),
        total_deal: $('#total_hidden').val()
    };

    $.ajax({
        url: site_url + 'api/transaksi/penawaran_biaya/deal',
        method: 'post',
        data: $.param(params)
    }).then(function (result) {
        console.log(result);
        table.draw(true);
        $('#modal_deal').modal('hide');
    }, function (err) {
        console.log(err);
    })


}

function onChangeNilaiDeal(el) {
    var nilaiDeal = $(el);

    var pajak = 0.1 * parseInt(nilaiDeal.val());
    var total = pajak + parseInt(nilaiDeal.val());

    $('#pajak_hidden').val(pajak);
    $('#total_hidden').val(total);

    $('#pajak').html('<small>Pajak</small><br/><strong>Rp.' + numeral(pajak).format('0,0') + '</strong>');
    $('#total').html('<small>Total</small><br/><strong style="font-size: larger">Rp.' + numeral(total).format('0,0') + '</strong>');

}

