<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">

<div class="table-responsive mailbox-messages">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Jurusan :</label>
                <select class="form-control" name="jurusan" id="jurusan">
                    <option value="">Pilih</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Midwife">Midwife</option>
                    <option value="Medical Laboratory Technician">Medical Laboratory Technician</option>
                    <option value="Physiotherapy">Physiotherapy</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
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
                <label>Jenis Peserta :</label>
                <select class="form-control" name="jenis_peserta" id="jenis_peserta">
                    <option value="">Pilih</option>
                    <option value="Participants">Seminar Participants</option>
                    <option value="Seminars and Oral">Participants Seminars and Oral Presentations</option>
                    <option value="Seminars and Poster">Participants Seminars and Poster Presentations</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Status :</label>
                <select class="form-control" name="status" id="status">
                    <option value="">Pilih</option>
                    <option value="Process">Process</option>
                    <option value="Verify">Verify</option>
                    <option value="Failed">Failed</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Presensi :</label>
                <select class="form-control" name="presensi" id="presensi">
                    <option value="">Pilih</option>
                    <option value="Belum">Belum</option>
                    <option value="Hadir">Hadir</option>
                </select>
            </div>
        </div>
    </div>
    <!-- /.col -->
    <table id="data_report" class="table table-bordered table-hover small">
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Participant</th>
                <th>Institution</th>
                <th>Major</th>
                <th>Other Major</th>
                <th>Type</th>
                <th>Country</th>
                <th>Status</th>
                <th>Presensi</th>
                <th>Description</th>
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
    $(document).ready(function() {

        //datatables
        reg_table = $('#data_report').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "serverMethod": 'post',
            "order": [], //Initial no order.
            "pageLength": 500,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                },
            }],

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?= base_url() ?>report/ajax_list",
                "type": "POST",
                "data": function(data) {
                    data.jurusan = $('#jurusan').val();
                    data.kepesertaan = $('#kepesertaan').val();
                    data.jenis_peserta = $('#jenis_peserta').val();
                    data.status = $('#status').val();
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
                null,
                null,
                null,
            ],
        });

        $('#jurusan,#kepesertaan,#jenis_peserta,#status,#presensi').change(function() {
            reg_table.draw();
        });
    });
</script>