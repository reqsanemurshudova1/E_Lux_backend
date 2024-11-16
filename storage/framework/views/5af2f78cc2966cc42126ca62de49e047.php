<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo e(url('admin/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=" <?php echo e(url('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('admin/dist/css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<!-- jQuery Confirm CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="content-wrapper">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
  <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>





  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
   <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo e(url('admin/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js ')); ?>"></script>
<!-- overlayScrollbars -->
<script src=" <?php echo e(url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('admin/dist/js/adminlte.js')); ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('.data-table').DataTable();
  });
</script>
<script src="<?php echo e(url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script>
$(document).ready(function() {
    $('.delete-button').on('click', function() {
        var form = $(this).closest('.delete-product-form');
        if (confirm('Are you sure you want to delete this product?')) {
            form.submit();
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $('.delete-button').on('click', function() {
        var productId = $(this).data('id');
        var formAction = "<?php echo e(route('admin.delete_product', '')); ?>/" + productId;
        $('#deleteForm').attr('action', formAction);
    });
});
</script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo e(url('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/raphael/raphael.min.js ')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/jquery-mapael/jquery.mapael.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/jquery-mapael/maps/usa_states.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(url('admin/plugins/chart.js/Chart.min.js')); ?>"></script>
<!-- jQuery Confirm JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo e(url('admin/dist/js/pages/dashboard2.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\e_Lux_Backend\resources\views/admin/layout/layout.blade.php ENDPATH**/ ?>