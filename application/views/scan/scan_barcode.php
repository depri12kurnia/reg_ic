<div class="table-responsive mailbox-messages">
    <table id="data-tables2" class="table table-bordered table-striped small">
        <thead>
            <tr>
                <th>#</th>
                <th>Registation Number</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Participant</th>
                <th>Institution</th>
                <th>Type</th>
                <th>Country</th>
                <th>Status</th>
                <th>Presensi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Looping data user dg foreach
            $i = 1;
            foreach ($registrasi as $registrasi) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $registrasi->no_reg ?></td>
                    <td><?php echo $registrasi->nama_lengkap ?></td>
                    <td><?php echo $registrasi->email ?></td>
                    <td><?php echo $registrasi->handphone ?></td>
                    <td><?php echo $registrasi->kepesertaan ?></td>
                    <td><?php echo $registrasi->pekerjaan ?></td>
                    <td><?php echo $registrasi->jenis_peserta ?></td>
                    <td><?php echo $registrasi->negara ?></td>
                    <td><?php echo $registrasi->status ?></td>
                    <td><?php echo $registrasi->presensi ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo anchor('scanbarcode/hadir/' . $registrasi->id_reg . '', 'Hadir', 'class="btn btn-success btn-sm"'); ?>
                        </div>
                    </td>
                </tr>

            <?php $i++;
            } //End looping 
            ?>
        </tbody>
    </table>

</div>
<!-- /.mail-box-messages -->