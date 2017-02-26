
var table = $('#table-kontraktor').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/master/sub_kontrak',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "columns": [
        {"data": "created_at"},
        { "data": "nama" },
        { "data": "alamat" },
        { "data": "contact_person" },
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a href='" + site_url + "master/kontraktor/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "master/kontraktor/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "master/kontraktor/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});