
<!--setup export pdf / excel-->
<div class="panel panel-default">
    <div class="panel-heading no-overflow">
        <strong>Setup Export PDF</strong>
        <div class="pull-right">
            <a id="btn-export-pdf" href="" class="btn btn-danger"
               data-src="<?php echo site_url('pos/order/export_pdf'); ?>" data-toggle="modal"
               data-target="#modal-print">
                <i class="fa fa-file-pdf-o"></i> Export PDF
            </a>
            <a href="<?php echo site_url('pos/order/export_excel'); ?>" class="btn btn-success">
                <i class="fa fa-file-excel-o"></i> Export Excel
            </a>
        </div>
    </div>
    <div class="panel-body">
        <p>Contoh Table</p>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>No Purchase Order</th>
                <th>Tanggal Order</th>
                <th>Perusahaan</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>PO/IND/001/XII/2016</td>
                <td>13/12/2016</td>
                <td>PT. Angin Ribut</td>
            </tr>
            <tr>
                <td>1</td>
                <td>PO/IND/001/XII/2016</td>
                <td>13/12/2016</td>
                <td>PT. Angin Ribut</td>
            </tr>
            <tr>
                <td>1</td>
                <td>PO/IND/001/XII/2016</td>
                <td>13/12/2016</td>
                <td>PT. Angin Ribut</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!--modal export pdf-->
<div class="modal fade" id="modal-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Print</h4>
            </div>
            <div class="modal-body">
                <i class="fa fa-spin fa-spinner hide" id="loading-spinner"></i>
                <iframe id="frame-print" style="width: 100%; height: 500px;" ></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>


<!--setup summernote-->
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Setup Summernote</strong>
    </div>
    <div class="panel-body">

        <div id="summernote">
            Hello Summernote
        </div>
    </div>
</div>


<script type="text/javascript">



    $(document).ready(function () {
        $('#table-order').dataTable();
        $('#summernote').summernote();

        // on modal-print is shown
        $('#modal-print').on('shown.bs.modal', function () {
            console.log($('#btn-export-pdf').data('src'));
            var src = $('#btn-export-pdf').data('src');
            $('#frame-print').attr('src', src);
        });

        // on load frame
        /*function onloadFrame() {
            $('#loading-spinner').removeClass('hide');
        }*/


    });
</script>