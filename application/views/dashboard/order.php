<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body no-padder">
                <table class="table table-hover " id="table-order">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Order</th>
                            <th>Perusahaan</th>
                            <th>Status Kalibrasi</th>
                            <th>Status Sertifikat</th>
                            <th class="text-right">Estimasi Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ORD/001/X/2016</td>
                            <td>PT. Maju Mundur</td>
                            <td>
                                <span class="label label-default">Dalam Proses</span>
                            </td>
                            <td>
                                <span class="label label-default">Dalam Proses</span>
                            </td>
                            <td class="text-right">
                                24 Desember 2016
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>ORD/001/X/2016</td>
                            <td>PT. Maju Mundur</td>
                            <td>
                                <span class="label label-success">Selesai</span>
                            </td>
                            <td>
                                <span class="label label-success">Selesai</span>
                            </td>
                            <td class="text-right">
                                24 Desember 2016
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>ORD/001/X/2016</td>
                            <td>PT. Maju Mundur</td>
                            <td>
                                <span class="label label-danger">Di Batalkan</span>
                            </td>
                            <td>
                                <span class="label label-danger">Di Batalkan</span>
                            </td>
                            <td class="text-right">
                                24 Desember 2016
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#table-order').DataTable();
        // clock
        (function () {
            function update() {
                $('#clock').html(moment().format('D MMMM YYYY HH:mm:ss'));
            }

            setInterval(update, 1000);
        })();
    })
</script>