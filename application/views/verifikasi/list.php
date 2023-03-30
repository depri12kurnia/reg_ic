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
                <th>Major</th>
                <th>Type</th>
                <th>Country</th>
                <th>Status</th>
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
                    <td><?php echo $registrasi->jurusan ?><br>
                        <small><?php echo $registrasi->jurusan_lain ?></small>
                    </td>
                    <td><?php echo $registrasi->jenis_peserta ?></td>
                    <td><?php echo $registrasi->negara ?></td>
                    <td><?php echo $registrasi->status ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo base_url('verifikasi/verify/' . $registrasi->id_reg) ?>" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Verify</a>
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