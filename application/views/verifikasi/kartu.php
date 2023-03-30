<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Registration</title>
</head>

<body>
    <img src="<?php echo base_url('assets/logo-new.png') ?>" alt="logo" style="width:180px;height:60px;">
    </br>
    <p>Form Registration International Conference 4TH Poltekkes Jakarta III</p>
    <table>
        <tr>
            <td>No Registration</td>
            <td>:</td>
            <td><?php echo $registrasi->no_reg ?></td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td>:</td>
            <td><?php echo $registrasi->nama_lengkap ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $registrasi->email ?></td>
        </tr>
        <tr>
            <td>Handphone</td>
            <td>:</td>
            <td><?php echo $registrasi->handphone ?></td>
        </tr>

        <tr>
            <td>Type Participant</td>
            <td>:</td>
            <td><?php echo $registrasi->jenis_peserta ?></td>
        </tr>
        <tr>
            <td>Country</td>
            <td>:</td>
            <td><?php echo $registrasi->negara ?></td>
        </tr>
    </table>
    <br>
    <img src="<?php echo base_url('assets/upload/barcode/' . $registrasi->qr_code) ?>" alt="barcode" style="width:180px;height:60px;">
</body>

</html>