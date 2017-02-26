var table = $('#table-perusahaan').DataTable({
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "stateDuration": 0,
    "ajax": {
        "url": site_url + '/api/transaksi/kalibrasi',
        "type": "POST"
    },
    "order": [[0, 'desc']],
    "createdRow": function (row, data, index) {

        console.log("data", data);        

        if (parseInt(data.is_verifikasi_pengolahan_data) == 1) {
            $('td', row).eq(3).addClass('success text-center').html('<i class="fa fa-check"></i>');
        } else {
            $('td', row).eq(3).addClass('danger text-center').html('<i class="fa fa-close"></i>');
        }

        if (parseInt(data.is_verifikasi_draft_sertifikat) == 1) {
            $('td', row).eq(4).addClass('success text-center').html('<i class="fa fa-check"></i>');
        } else {
            $('td', row).eq(4).addClass('danger text-center').html('<i class="fa fa-close"></i>');
        }

        if (parseInt(data.is_verifikasi_sertifikat) == 1) {
            $('td', row).eq(5).addClass('success text-center').html('<i class="fa fa-check"></i>');
        } else {
            $('td', row).eq(5).addClass('danger text-center').html('<i class="fa fa-close"></i>');
        }
    },
    "columns": [
        {
            "data": "created_at",
            "render": function (data, type, row, meta) {
                return data + "<br /><i>" +moment(data).fromNow()+ "</i>";
            }
        },
        { "data": "no_order" },
        { "data": "nama" },
        { "data": "is_verifikasi_pengolahan_data" },
        { "data": "is_verifikasi_draft_sertifikat" },
        { "data": "is_verifikasi_sertifikat" },
        
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