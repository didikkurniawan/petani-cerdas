<!--setup export pdf / excel-->
<form name="form-order" novalidate>
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <div class="panel panel-default">
        <div class="panel-heading no-overflow">
            <strong>Order Form</strong>
        </div>
        <div class="panel-body">
            <p>
                Apakah anda yakin akan menghapus data dengan id <?php echo $id; ?> ?
            </p>

        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-danger">
                Hapus
            </button>
        </div>
    </div>
</form>


