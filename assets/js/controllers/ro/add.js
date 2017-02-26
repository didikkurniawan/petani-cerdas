$(document).ready(function () {
    // summernote spesifkasi global


    $('textarea[name=catatan]').summernote({
        height: 200,
    });

    // to currency
    $('select[name=no_order]').select2({
        ajax: {
            url: site_url + 'api/transaksi/serah_terima/search/',
            dataType: 'json',
            data: function (param) {
                return {
                    delay: 0.3,
                    q: param.term
                }
            },
            processResults: function (data) {
                return {
                    results: _.map(data.items || data, function (obj) {
                        return {
                            id: obj.id,
                            text: obj.text || obj.nama_pelanggan,
                        }
                    })
                }
            },
            cache: true,
            minimumInputLength: 3,
        },
    });

    $('select[name=no_order]').on('select2:select', function () {
        var val = $(this).val();
        $.ajax({
            url: site_url + 'api/transaksi/serah_terima/get_detail/' + val,
            method: 'post'
        }).then(function (result) {
            console.log(result);
            $('table > tbody').empty();
            _.each(result.response, function (obj, i) {
                var row = '<tr>' +
                    '<td>' + obj.order.toUpperCase() + '</td>' +
                    '<td>' + obj.nama +'<br><i>'+ obj.spesifikasi + '</i><input type="hidden" class="id_alat" value="' + obj.id + '"><input type="hidden" class="qty" value="' + obj.qty + '"></td>'+
                    '<td>' + obj.qty + '</td>' +
                    '<td> Rp. ' + numeral(obj.harga).format('0,0') + '</td>' +
                    '</td>';
                $(row).appendTo('#table_alat > tbody');
            });

        }, function (err) {
            console.log(err);
        });
    });

    $('#modal_tindakan').on('show.bs.modal', function () {
        $('textarea[name=alasan_batal]').summernote({
            height: 150,
        });
    });

    // init item ro 
    reloadItem();

    // submit form

    $('#form').validate({
        ignore: ":hidden:not(#summernote),.note-editable.panel-body",
        submitHandler: function (form) {

            postForm();

        },
        invalidHandler: function () {
            console.log("there is an invalid");
        }
    });
});

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

var onChangeTindakan = onChangeTindakan;
var uploadFile = uploadFile;
var postForm = postForm;
var tambahRo = tambahRo;
var hapusItemRo = hapusItemRo;
var reloadItem = reloadItem;

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
        id_serah_terima: $('select[name=no_order]').val(),
        catatan: $('#catatan').val(),
        ro: ro
    };

    $.ajax({
        url: site_url + 'api/transaksi/ro/add',
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

// redirectAfterToastr('ro');