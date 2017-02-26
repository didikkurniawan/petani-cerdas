<form method='post' name='form-delete-rencana-oprasional' id='form-delete-rencana-oprasional'>
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Rancangan Operasional</strong>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">

          <div class="form-group">
            <div class="row">
                <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
                <input type="hidden" value="<?php echo $detail_ro->id_serah_terima; ?>" name="id_serah_terima" id="id_serah_terima"/>
                
                <label class="col-lg-4 ">Nomor Order</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="no_order" 
                    value="<?php echo $detail_ro->no_order; ?>" disabled/> 
                </div>
            </div>
          </div>

        <div class="form-group">
            <div class="row">
                <label class="col-lg-4 ">Nama Perusahaan</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="nama_perusahaan" 
                     value="<?php echo $detail_ro->nama; ?>" disabled/> 
                </div>
            </div>
        </div>

    </div>
  </div>

        <div class="col-lg-12">
            <div class="panel-body no-padder">
                <table class="table table-striped" id="table-alat-rencana-oprasional">
                <thead>
                    <tr>
                        <th>Jenis Order</th>
                        <th>Alat dan Spek</th>
                        <th>Qty</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                
                </table>
            </div>
        </div>

      <div class="col-lg-12">
        <div class="col-lg-4">
          <div class="panel-body">
                <strong>Catatan</strong>
            </div>
          <textarea name="catatan" id="catatan" cols="30" rows="10">
            <?php echo $detail_ro->catatan;?>
          </textarea>
        </div>
        <div class="col-lg-8">
           <!--<div class="col-lg-12">-->
            <div class="panel-body">
                <strong>Rincian Operasional</strong>
            </div>
           
              <div class="panel-body no-padder">
                <table class="table table-hover " id="table-ro">
                <thead>
                    <tr>
                        <th>Jenis Oprasional</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <!--<tbody>

                </tbody>-->
                </table>
            </div>
          </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary">
                Hapus
            </button>
            <button type="button" id="back" class="btn btn-danger">
                Back
            </button>
    </div>
  </div>
</form>