var deal = deal;


var table = $('table').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/transaksi/serah_terima_keluar',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "createdRow": function (row, data, index) {

    },
    "columns": [
        {
            "data": "created_at"
        },
        {"data": "no_order"},
        {"data": "no_penawaran"},
        {"data": "nama"},
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a href='" + site_url + "/samples/crud/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "/samples/crud/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "/samples/crud/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});



