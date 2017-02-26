var table = $('#table-perusahaan').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/transaksi/ro',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "columns": [
        {
            "data": "created_at",
            "render": function (data, type, row, meta) {
                return data + "<br /><i>"+moment(data).fromNow()+"</i>";
            }
        },
        {"data": "no_order"},
        {"data": "nama"},
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a href='" + site_url + "ro/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "ro/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "ro/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});