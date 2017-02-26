<form method='post' name='form-update-rencana-oprasional' id='form-update-rencana-oprasional'>
  <div class="panel panel-default">
    <div class="panel-heading no-overflow">
      <strong>Update Rancangan Operasional</strong>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <!--<tbody>

                </tbody>-->
                </table>
            </div>
          </div>
          <div class="col-lg-8">

          <div class="row">
            <div class="col-lg-12">
              <table class="table table-striped table-condensed" id="table_ro">
                <thead>
                  <tr>
                    <th>Item <a data-toggle="modal" data-target="#modal_add_item" class="pull-right text-primary"><i class="fa fa-plus"></i></a> </th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>
                      <select name="item" id="item" class="form-control input-sm">
                        
                      </select>
                    </td>
                    <td>
                      <input type="number" class="form-control input-sm" name="nominal" id="nominal" placeholder="Rp." />
                    </td>
                    <td>
                      <input type="text" class="form-control input-sm" name="keterangan" id="keterangan" />
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm" onclick="tambahRo()"><i class="fa fa-plus"></i></a>
                    </td>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              <tbody>
                <tr></tr>
              </tbody>
            </div>
          </div>
        </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary">
        Ubah
      </button>
      <button type="button" id="back" class="btn btn-danger">
        Back
      </button>
    </div>
  </div>
</form>

<!--tambah item-->

<!--finish tambah item-->


<!--start hapus item-->
<div class="modal fade" id="modal_delete_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form id="form_delete_item" novalidate>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Item</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <div class="row">
                  <label class="col-lg-2">Nama Item</label>
                  <div class="col-lg-10">
                    <input type="hidden" required name="id" id="id" class="form-control" value=""/>
                    <input type="text" class="form-control"  name="nama" id="nama" disabled required/>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <label class="col-lg-2">Nominal Item</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control"  name="nominal" id="nominal" disabled required/>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <label class="col-lg-2">Keterangan</label>
                  <div class="col-lg-10">
                    <textarea cols="2" rows="2" class="form-control" name="keterangan" id="keterangan" required ></textarea>
                  </div>
                </div>
            </div>
        </div>
                                
                           
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Hapus</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

        </div>
      </div>
    </div>
  </form>
</div>



<!--finish hapus item-->




<!--start ubah item-->
<div class="modal fade" id="modal_update_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form id="form_update_item" novalidate>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Item</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <div class="row">
                  <label class="col-lg-2">Nama Item</label>
                  <div class="col-lg-10">
                    <input type="hidden" required name="id" id="id" class="form-control" value=""/>
                    <input type="text" class="form-control"  name="nama_update" id="nama_update"  required/>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <label class="col-lg-2">Nominal Item</label>
                  <div class="col-lg-10">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="Number" class="form-control"  name="nominal_update" id="nominal_update" value=""  required/>
                  </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <label class="col-lg-2">Keterangan</label>
                  <div class="col-lg-10">
                    <textarea cols="2" rows="2" class="form-control" name="keterangan_update" id="keterangan_update" required ></textarea>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ubah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

        </div>
      </div>
    </div>
  </form>
</div>



<!--finish ubah item-->


<!--Start add item-->

<div class="modal fade" id="modal_add_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form id="form_add_item" novalidate>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Item</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Item</label>
            <input type="text" required name="nama_item" id="nama_item" class="form-control" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

        </div>
      </div>
    </div>
  </form>
</div>

<!--finish add item-->