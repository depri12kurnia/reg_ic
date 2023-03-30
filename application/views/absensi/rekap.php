<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">

<div class="table-responsive mailbox-messages">
    <table id="rekap_table" class="table table-bordered table-hover small">
        <thead>
            <tr>
                <th>#</th>
                <th>Registration Number</th>
                <th>Full Name</th>
                <th>Institution</th>
                <th>Country</th>
                <th>Time Entry</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Looping data user dg foreach
            $i = 1;
            foreach ($absensi as $absensi) {
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $absensi->no_reg ?></td>
                    <td><?php echo $absensi->nama_lengkap ?></td>
                    <td><?php echo $absensi->pekerjaan ?></td>
                    <td><?php echo $absensi->negara ?></td>
                    <td><?php echo $absensi->jam_msk ?></td>
                    <td><?php echo $absensi->nama_khd ?></td>
                </tr>

            <?php $i++;
            } //End looping 
            ?>
        </tbody>
    </table>
</div>