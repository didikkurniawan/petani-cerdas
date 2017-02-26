
var table = $('#table-pelanggan').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + 'api/master/pelanggan',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "columns": [
        {"data": "nama"},
        {
            "data": "telepon",
            "render": function(data,type,row,meta){
                return  data + "<br><strong class='text'>" + row.fax + "</i></strong>";
            } 
            
        },
        { "data": "email" },
        {
            "data": "alamat",
            "render": function(data,type,row,meta){
                return data + " <br>" + row.kelurahan.toLowerCase() + ", " + row.kecamatan.toLowerCase()
                + ", " + row.kota.toLowerCase() + "<br> " + row.provinsi.toLowerCase()+ ", " + row.kodepos;
            }
        },
        { "data": "contact_person" },
        {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<a href='" + site_url + "master/data_pelanggan/delete/" + row.id + "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>&nbsp;<a href='" + site_url + "/master/data_pelanggan/update/" + row.id + "' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></a>&nbsp;<a href='" + site_url + "/master/data_pelanggan/view/" + row.id + "' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a>";
            }
        }

    ]
});