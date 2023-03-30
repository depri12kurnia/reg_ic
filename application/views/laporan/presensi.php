<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">

<div class="table-responsive mailbox-messages">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Kepesertaan :</label>
                <select class="form-control" name="kepesertaan" id="kepesertaan">
                    <option value="">Pilih</option>
                    <option value="Poltekkes Jakarta III">Poltekkes Jakarta III</option>
                    <option value="Other">Non Poltekkes Jakarta III</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Presensi :</label>
                <select class="form-control" name="presensi" id="presensi">
                    <option value="Belum">Belum</option>
                    <option value="Hadir">Hadir</option>
                </select>
            </div>
            <!-- /.form-group -->
        </div>
    </div>
    <!-- /.col -->
    <table id="data_table" class="table table-bordered table-hover small">
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Participant</th>
                <th>Institution</th>
                <th>Type</th>
                <th>Country</th>
                <th>Status</th>
                <th>Presensi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- /.mail-box-messages -->
<script type="text/javascript">
    var reg_table;
    var base_url = '<?php echo base_url(); ?>';
    var url = '<?php echo base_url('assets/upload/bukti/'); ?>';
    $(document).ready(function() {

        //datatables
        reg_table = $('#data_table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "serverMethod": 'post',
            "order": [], //Initial no order.
            "pageLength": 500,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                exportOptions: {
                    // orthogonal: 'export',
                    modifier: {
                        page: 'all'
                    }
                },
            }],

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?= base_url() ?>presensi/ajax_list",
                "type": "POST",
                "data": function(data) {
                    data.kepesertaan = $('#kepesertaan').val();
                    data.presensi = $('#presensi').val();
                }
            },
            //Set column definition initialisation properties.
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            ],
        });
        $('#kepesertaan,#presensi').change(function() {
            reg_table.draw();
        });
    });
</script>