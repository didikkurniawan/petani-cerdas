/**
 * Created by agungrizkyana on 12/10/16.
 */
$(document).ready(function () {
    // summernote spesifkasi global
    
    $('textarea[name=catatan]').summernote({
        height: 200,
    });
    var form = $('#form-update-rencana-oprasional');
    var formInput = {
        idSerahTerima: form.find('#id_serah_terima').val(),
        id: form.find('#id').val()
        };

    var table = $('#table-alat-rencana-oprasional').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false, 
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "stateDuration": 0,
        "ajax": {
            "url": site_url + 'api/transaksi/serah_terima/serah_terima_detail/' + formInput.idSerahTerima,
            "type": "POST"
        },
        "order": [[0, 'desc']],
        "columns": [
                    {
                    "data": "order",
                    "render": function(data,type,row,meta){
                        return data.toString().toUpperCase();
                    }
                },
                {
                    "data": "nama",
                    "render": function(data,type,row,meta){
                        return data + "<br/>" + "<i>" + row.spesifikasi + "<i/>";
                    }
                },
                { "data": "qty" },
                { 
                    "data": "harga", 
                    "render": function(data, type, row, meta){
                        return "Rp. " + numeral(data).format('0,0');
                    }
                }

        ]
        });

    var table = $('#table-ro').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false, 
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "stateDuration": 0,
        "ajax": {
            "url": site_url + 'api/transaksi/ro/detail_ro/' + formInput.id,
            "type": "POST"
        },
        "order": [[0, 'desc']],
        "columns": [
            {"data": "item"},
            { 
                "data": "nominal" ,
                "render": function(data, type, row, meta){
                    return "Rp. " + numeral(data).format('0,0');
                }
            },
            {
            "data": "id",
            "className": "text-right",
            "sortable": false,
            "searchable": false,
            "render": function (data, type, row, meta) {
                return "<input type='hidden'  id='id' class='form-control qty' value='" + row.id + "'/>"+
                        "<input type='hidden'  id='nama' class='form-control qty' value='" + row.item + "'/>"+
                        "<input type='hidden'  id='nominal' class='form-control qty' value='" + row.nominal + "'/>"+
                        "<input type='hidden'  id='keterangan' class='form-control qty' value='" + row.keterangan + "'/>"+
                        "<button type='button' onClick='onClickDelete(" + row.id + "," + '"' + row.item + '"' + "," + '"' + row.nominal + '"' + "," + '"' + row.keterangan + '"' + ")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>&nbsp;"+
                        "<button type='button' onClick='onClickUbah(" + row.id + "," + '"' + row.item + '"' + "," + '"' + row.nominal + '"' + "," + '"' + row.keterangan + '"' + ")' class='btn btn-default btn-sm'><i class='fa fa-edit'></i></button>";
            }
        }
        ]
    });

     $('#form-update-rencana-oprasional').validate({
        // ignore: ":hidden:not(#summernote),.note-editable.panel-body",
        // submitHandler: function (form) {

        //     postForm();

        // },
        // invalidHandler: function () {
        //     console.log("there is an invalid");
        // }
    });
    

});

    function onClickDelete(id,item,nominal,keterangan){

        $('#id').val(id);
        $('#nama').val(item);
        $('#nominal').val(nominal);
        $('#keterangan').val(keterangan);


        var id = $('#id').val();
        var item = $('#nama').val();
        var nominal = $('#nominal').val();
        var keterangan = $('#keterangan').val();

        $('#modal_delete_item').modal();
        $('.form-group #id').val(id);
        $('.form-group #nama').val(item);
        $('.form-group #nominal').val("Rp. " + numeral(nominal).format('0,0'));


        $('textarea[name=keterangan]').summernote({
            height: 100,
        });
        $('textarea[name=keterangan]').summernote("code", keterangan);
        $('textarea[name=keterangan]').summernote("disable");

         $('#form_delete_item').validate({
            submitHandler: function (form) {

                // instance form data
                var formData = new FormData($(form));

                $.ajax({
                    url: site_url + '/api/transaksi/ro/delete_item/' + id,
                    method: 'post',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                }).then(function (result) {
                    toastr.success('Success Delete Item', 'Success!');
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                }, function (err) {
                    toastr.error('Failed to Update Company', 'Failed!');
                });
            }   
        });
    }

    function onClickUbah(id,item,nominal,keterangan){
        $('#id').val(id);
        $('#nama').val(item);
        $('#nominal').val(nominal);
        $('#keterangan').val(keterangan);


        var id = $('#id').val();
        var item = $('#nama').val();
        var nominal = $('#nominal').val();
        var keterangan = $('#keterangan').val();

        $('#modal_update_item').modal();
        $('.form-group #id_update').val(id);
        $('.form-group #nama_update').val(item);
        $('.form-group #nominal_update').val(nominal);

        $('textarea[name=keterangan_update]').summernote({
            height: 100,
        });
        $('textarea[name=keterangan_update]').summernote("code", keterangan);

         $('#form_update_item').validate({
            submitHandler: function (form) {

                // instance form data
                var formData = new FormData($(form));
                formData.append('nama', $('#nama_update').val());
                formData.append('nominal', $('#nominal_update').val());
                formData.append('keterangan', $('#keterangan_update').val());

                $.ajax({
                    url: site_url + '/api/transaksi/ro/update_item/' + id,
                    method: 'post',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                }).then(function (result) {
                    toastr.success('Success Delete Item', 'Success!');
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                }, function (err) {
                    toastr.error('Failed to Update Company', 'Failed!');
                });
            }   
        });
    }

reloadItem();

$('#modal_add_item').on('show.bs.modal', function () {
    $('#form_add_item').validate({
        
        submitHandler: function (form) {
            var item = $('#nama_item').val();

            var param = {
                nama: item
            };

            $.ajax({
                url: site_url + '/api/master/item/add',
                method: 'post',
                data: $.param(param)
            }).then(function (result) {
                toastr.success('Berhasil Tambah Item', 'Berhasil !');
                $('#modal_add_item').modal('hide');
            }, function (err) {
                toastr.error(err.toString(), 'Terjadi Kesalahan Sistem !');
            });

            return false;

        }
    });
});

$('#modal_add_item').on('hide.bs.modal', function () {
    reloadItem();
});
function reloadItem() {
    $('#item').empty();
    $.ajax({
        url: site_url + '/api/master/item',
        method: 'get'
    }).then(function (result) {
        _.each(result.response, function (item) {
            var option = '<option value="' + item.nama + '">' + item.nama + '</option>';
            $('#item').append(option);
        });
    }, function (err) {
        toastr.error(err.toString(), 'Terjadi Kesalahan Sistem !');
    });
}

// add item ro



// void
function postForm(e) {

    var item = _.map($('.item_ro'), function (el) {
        return $(el).val();
    });

    var nominal = _.map($('.nominal_ro'), function (el) {
        return $(el).val();
    });

    var keterangan = _.map($('.keterangan'), function (el) {
        return $(el).val();
    });

    var ro = [];
    _.each(item, function (val, i) {
        var obj = {
            item: val,
            nominal: nominal[i],
            keterangan: keterangan[i]
        };
        ro.push(obj);
    });

    var params = {
        id_serah_terima: formInput.idSerahTerima,
        catatan: $('#catatan').val(),
        ro: ro
    };

    $.ajax({
        url: site_url + 'api/transaksi/ro/update/'+formInput.id,
        method: 'post',
        data: $.param(params)
    }).then(function (result) {
        toastr.success('Sukses Buat RO', 'Sukses!');
    }, function (err) {
        console.log(err);
    });


}


function onChangeTindakan(row, id) {
    // do request
    // $.ajax({})

    var jenisTindakan = $(row).val();

    if (jenisTindakan == 'di batalkan') {
        $('#alat').html(id);
        $('#modal_tindakan').modal();
    }

}

function tambahRo() {
    var item = $('#item'),
        nominal = $('#nominal'),
        keterangan = $('#keterangan');

    var row = '<tr>' +
        '<td>' + item.val() + ' <input type="hidden" class="item_ro" value="' + item.val() + '" /> </td>' +
        '<td>' + numeral(parseInt(nominal.val())).format('0,0') + '<input type="hidden" class="nominal_ro" value="' + parseInt(nominal.val()) + '"> </td>' +
        '<td>' + keterangan.val() + '<input type="hidden" class="keterangan" value="' + keterangan.val() + '" /></td>' +
        '<td> <a class="btn btn-danger btn-sm hapus-item-ro" ><i class="fa fa-trash"></i></a> </td> </tr>';
    $(row).appendTo('#table_ro > tbody');
}

function hapusItemRo() {
    var row = $(this).closest('tr');
    row.remove();
}

$('#table_ro').on('click', '.hapus-item-ro', hapusItemRo);


















    
    $('#back').click(function (event){
        window.location.href = site_url + 'ro';
    });





