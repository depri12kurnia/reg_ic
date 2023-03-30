<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">

<div class="table-responsive mailbox-messages">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No Registrasi</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status Dokumen</th>
                <th>Status Pengajuan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $user->no_registrasi ?></td>
                <td><?php echo $user->nama ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->status_dokumen ?></td>
                <td><?php echo $user->status_pengajuan ?></td>
                <td><?php echo $user->keterangan ?></td>
            </tr>
        </tbody>
    </table>

</div>
<!-- /.mail-box-messages -->