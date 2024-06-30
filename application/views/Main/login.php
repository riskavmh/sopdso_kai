<!DOCTYPE html>
<html lang="en" style="font-size: 92%;">
<head >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | SOPDSO</title>

  <link rel="shortcut icon" href="<?=base_url('assets');?>/img/favicon_kai_bw.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/dist/css/adminlte.min.css">
    <!-- Toastr -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/toastr/toastr.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo" style="font-size: 20px">
     <img src="<?=base_url('assets');?>/img/logo_kai.png" alt="LogoKAI" class="brand-image mb-1" style="opacity: 1" width="70">
  </div>

  <div class="card card-navy card-outline">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-dark"><b>SISTEM OPTIMASI PENGELOLAAN<br>DATA STOK OBAT</b>
        <br>Apotek PT Kereta Api Indonesia Daop 9</p>

      <form action="<?=base_url('Main/login');?>" method="post">
        <div class="input-group mb-3">
          <input type="username" class="form-control" placeholder="Username" id="username" name="username" maxlength="20">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" maxlength="12">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn bg-navy btn-block">Masuk</button>
          </div>
        </div>
      </form>

      <hr>
      <button type="button" class="btn btn-outline-dark btn-sm text-sm col-12" data-toggle="modal" data-target="#modal-default">Lihat Username & Password</button>

  </div>

</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-md">Username & Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-md">Username : <strong>apoteker</strong></p>
        <p class="text-md">Password : <strong>apoteker256</strong></p>
      </div>
      <!-- <div class="modal-footer justify-content-between"> -->
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      <!-- </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="<?=base_url('assets');?>/vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets');?>/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets');?>/vendor/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets');?>/vendor/AdminLTE/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">

toastr.options = {
  "closeButton": false,
  "debug": false,
  "progressBar": false,
  "preventDuplicates": true,
  "positionClass": "toast-top-center",
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "700",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php } ?>

</script>
</body>
</html>