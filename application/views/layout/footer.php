<!-- SWEETALERT -->
<?php if ($this->session->flashdata('sukses')) { ?>
  <script>
    swal("Berhasil", "<?php echo $this->session->flashdata('sukses'); ?>", "success")
  </script>
<?php } ?>

<?php if (isset($error)) { ?>
  <script>
    swal("Oops...", "<?php echo strip_tags($error); ?>", "warning")
  </script>
<?php } ?>

<?php if ($this->session->flashdata('warning')) { ?>
  <script>
    swal("Oops...", "<?php echo $this->session->flashdata('warning'); ?>", "warning")
  </script>
<?php } ?>

<script>
  // Sweet alert
  function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    console.log(urlToRedirect); // verify if this is the right URL
    swal({
        title: "Yakin ingin menghapus data ini?",
        text: "Data yang sudah dihapus tidak dapat dikembalikan",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
        if (willDelete) {
          // Proses ke URL
          window.location.href = urlToRedirect;
        }
      });
  }
</script>



</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0 Rev
  </div>
  <strong>Copyright &copy; 2022 <a href="https://poltekkesjakarta3.ac.id">Polkes Jati</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
<!-- ================================================================================== -->

<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/admin/plugins/fastclick/fastclick.js"></script>

<!-- page script -->
<script>
  $(function() {
    $('#data-tables2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "bDeferRender": true
    });

  });
</script>

<script>
  $(document).ready(function() {
    $('#rekap_table').DataTable({
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excelHtml5',
        exportOptions: {
          // orthogonal: 'export',
          modifier: {
            page: 'all'
          }
        },
      }]
    });
  });
</script>

<script>
  //Date picker
  $('#tanggal').datetimepicker({
    Format: 'dd-mm-yy',
    autoclose: true,
  });
  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

</body>

</html>