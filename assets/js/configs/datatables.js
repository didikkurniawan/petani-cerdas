/**
 * Created by agungrizkyana on 10/8/16.
 */
// Data Tables - Config
(function ($) {

    'use strict';

    $.fn.getDropBoxApi = function (urlStr, idStr) {
        return $.ajax({
            url: urlStr,
            type: 'GET',
            dataType: 'json',
            success: function (json) {

                $('#' + idStr).append($('<option>').text('').attr('value', ''));
                $.each(json.result, function (i, value) {
                    $('#' + idStr).append($('<option>').text(value.nama).attr('value', value.uid));
                });
            }
        });
    }

    // we overwrite initialize of all datatables here
    // because we want to use select2, give search input a bootstrap look
    // keep in mind if you overwrite this fnInitComplete somewhere,
    // you should run the code inside this function to keep functionality.
    //
    // there's no better way to do this at this time :(
    if ($.isFunction($.fn[ 'dataTable' ])) {
        $.extend(true, $.fn.dataTable.defaults, {
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                processing: '<i class="fa fa-spinner fa-spin"></i> Loading',
                paginate: {'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;'},
                emptyTable: "Data is empty",
                info: "Show page _PAGE_ of _PAGES_",
                infoEmpty: "There is no data to be shown",
                infoFiltered: " - filtered from _MAX_ data",
                zeroRecords: "There is no data to be shown."
            },
            autoWidth: false
        });

    }

}).apply(this, [jQuery]);