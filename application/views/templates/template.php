<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $title ?></title>
  <!-- Bootstrap core CSS-->
  <link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?= base_url('css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

  <link href="<?= base_url('css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="<?= base_url('css/sb-admin.min.css')?>" rel="stylesheet">
  <link href="<?= base_url('css/alertify.min.css')?>" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Antrian Puskesmas</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?= base_url() ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#master" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-database"></i>
            <span class="nav-link-text">Master</span>
          </a>
          <ul class="sidenav-second-level collapse" id="master">
            <li>
              <a href="<?= base_url('admin') ?>">Admin</a>
            </li>
            <li>
              <a href="<?=base_url('apoteker')?>">Apoteker</a>
            </li>
            <li>
              <a href="<?=base_url('poli')?>">Poli</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Antrian">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#antrian" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sort-numeric-asc"></i>
            <span class="nav-link-text">Antrian</span>
          </a>
          <ul class="sidenav-second-level collapse" id="antrian">
            <li>
              <a href="<?=base_url('antrian')?>">Panggil</a>
            </li>
            <!-- <li>
              <a href="<?=base_url('antrian/buat')?>">Buat</a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Resep Dokter">
          <a class="nav-link" href="<?=base_url('resepdokter')?>" >
            <i class="fa fa-fw fa-medkit"></i>
            <span class="nav-link-text">Resep Dokter</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
      </ol> -->
      <?= $body?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Antrian Puskesmas 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih tombol keluar jika anda yakin ingin keluar!!</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="<?=base_url('user/do_logout')?>">Keluar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.form.min.js') ?>"></script>
    <script src="<?= base_url('js/sb-admin.min.js') ?>"></script>
    <script src="<?= base_url('js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('js/moment.js') ?>"></script>
    <script src="<?= base_url('js/id.js') ?>"></script>
    <script src="<?= base_url('js/alertify.min.js') ?>"></script>

    <?= isset($foot) ? $foot : null?>
  </div>
</body>

</html>
