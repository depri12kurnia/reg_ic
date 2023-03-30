<?php
// Notifikasi error
echo validation_errors('<p class="alert alert-warning">', '</p>');

// Form open
echo form_open_multipart(base_url('verifikasi/verify/' . $registrasi->id_reg));
?>
<div class="row">
    <div class="col-md-6">

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Biodata</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Registation Number <span class="text-danger">*</span></label>
                    <input type="text" name="no_reg" class="form-control form-control-md" value="<?php echo $registrasi->no_reg ?>" placeholder="Nama registrasi" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control form-control-md" value="<?php echo $registrasi->nama_lengkap ?>" placeholder="Full Name" readonly>
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" class="form-control form-control-md" value="<?php echo $registrasi->email ?>" placeholder="Email" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Mobile Phone <span class="text-danger">*</span></label>
                    <input type="text" name="handphone" class="form-control form-control-md" value="<?php echo $registrasi->handphone ?>" placeholder="Mobile Phone" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Institution <span class="text-danger">*</span></label>
                    <input type="text" name="kepesertaan" class="form-control form-control-md" value="<?php echo $registrasi->kepesertaan ?>" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Other Institution <span class="text-danger">*</span></label>
                    <input type="text" name="pekerjaan" class="form-control form-control-md" value="<?php echo $registrasi->pekerjaan ?>" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Major <span class="text-danger">*</span></label>
                    <input type="text" name="jurusan" class="form-control form-control-md" value="<?php echo $registrasi->jurusan ?>" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Other Major <span class="text-danger">*</span></label>
                    <input type="text" name="jurusan_lain" class="form-control form-control-md" value="<?php echo $registrasi->jurusan_lain ?>" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Type Participant <span class="text-danger">*</span></label>
                    <input type="text" name="jenis_peserta" class="form-control form-control-md" value="<?php echo $registrasi->jenis_peserta ?>" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label>Country <span class="text-danger">*</span></label>
                    <input type="text" name="negara" class="form-control form-control-md" value="<?php echo $registrasi->negara ?>" readonly>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col (left) -->
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Update Status & Preview</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control form-control-md">
                        <option value="Process" <?php if ($registrasi->status == "Process") {
                                                    echo "selected";
                                                } ?>>Process</option>
                        <option value="Verify" <?php if ($registrasi->status == "Verify") {
                                                    echo "selected";
                                                } ?>>Verify</option>
                        <option value="Failed" <?php if ($registrasi->status == "Failed") {
                                                    echo "selected";
                                                } ?>>Failed</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label></br>
                    <textarea name="ket" class="form-control form-control-md" placeholder="Isi Jika Failed"></textarea>
                </div>

                <div class="form-group">
                    <label>Attachment</label></br>
                    <img src="<?php echo base_url() . './assets/upload/bukti/' . $registrasi->bukti; ?>" height="50%" width="100%">
                </div>

            </div>
            <div class="card-footer">
                <div class="form-group">

                    <button class="btn btn-success btn-md float-left" name="submit" type="submit">
                        <i class="fa fa-save"></i> Verify
                    </button>
                    <a href="<?php echo base_url('verifikasi') ?>" class="btn btn-warning btn-md float-right">
                        <i class="fa fa-backward"></i> Kembali
                    </a>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<?php
// Form close
echo form_close();
?>