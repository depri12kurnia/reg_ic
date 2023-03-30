<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-archive"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">All Registration</span>
                <span class="info-box-number">
                    <?php echo $this->dasbor_model->all_regis()->total; ?>
                    <small>Registration</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.row -->

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-spinner"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Process</span>
                <span class="info-box-number">
                    <?php echo $this->dasbor_model->process()->total; ?>
                    <small>Process</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.row -->

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Verify</span>
                <span class="info-box-number">
                    <?php echo $this->dasbor_model->verify()->total; ?>
                    <small>Verify</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.row -->

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-exclamation-triangle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Failed</span>
                <span class="info-box-number">
                    <?php echo $this->dasbor_model->failed()->total; ?>
                    <small>Failed</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.row -->

</div>