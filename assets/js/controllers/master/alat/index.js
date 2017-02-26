
var table = $('#table-alat').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/master/alat',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "columns": [
        {"data": "bidang"},
        { "data": "nama" },
        { "data": "spesifikasi" },
        { "data": "scope" },
        { "data": "harga",
            "render": function (data, type, row, meta) {
                return "Rp. " + numeral(data).format('0,0.00');
            }    
        },
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a href='" + site_url + "master/alat/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "master/alat/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "master/alat/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});