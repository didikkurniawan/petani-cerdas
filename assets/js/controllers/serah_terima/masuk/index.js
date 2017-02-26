var deal = deal;


var table = $('table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/transaksi/serah_terima',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "createdRow": function (row, data, index) {

    },
    "columns": [
        {
            "data": "created_at",
            "render": function (data, type, row, meta) {
                return data + "<br /><i>"+moment(data).fromNow()+"</i>";
            }
        },
        {
            "data": "no_order",
            "render": function (data, type, row, meta) {
                return data + "<br /><strong><i>" + row.jenis_order + "</i></strong>";
            }
        },
        {"data": "no_penawaran"},
        {"data": "nama"},
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a href='" + site_url + "serah_terima/masuk/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "serah_terima/masuk/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "serah_terima/masuk/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});



