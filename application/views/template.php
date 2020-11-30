<!DOCTYPE html>

<?php
if($this->session->userdata('userlogin'))     // mencegah akses langsung tanpa login
{ 
  $users = $this->session->userdata('userlogin');
  $avatar = $this->session->userdata('admin_foto');
}else{
  //masuk tanpa login
  $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Mohon Login terlebih dahulu</div>");
  redirect(base_url().'Login');
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Online Shope &mdash; Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/components.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/DataTables/css/jquery.dataTables.min.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url();?>assets/uploads/admin/<?=$avatar;?>" class="rounded-circle mr-1">
           
            <div class="d-sm-none d-lg-inline-block"><?=$this->session->userdata('userlogin');?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <div class="dropdown-divider"></div>
              <a href="<?=base_url("Login/logout")?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url('Homepage')?>">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?=base_url('Homepage')?>">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="<?php echo menu_aktif('Homepage')?>">
                <a href="<?php echo base_url('Homepage')?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <!-- <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li class="active"><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul> -->
              </li>
              <li class="menu-header">Users</li>
              <li class="<?php echo menu_aktif('Admin')?>"><a class="nav-link " href="<?php echo base_url("Admin")?>"><i class="far fa-user"></i> <span>Admin</span></a></li>
              
              <li class="menu-header">Menu</li>
              <li class="<?php echo menu_aktif('Kategori')?>"><a class="nav-link " href="<?php echo base_url("Kategori")?>"><i class="fa fa-bars"></i> <span>Kategori</span></a></li>
              <li class="<?php echo menu_aktif('Barang')?>"><a class="nav-link " href="<?php echo base_url("Barang")?>"><i class="fa fa-shopping-bag"></i> <span>Barang</span></a></li>
              <li class="<?php echo menu_aktif('Setting')?>"><a class="nav-link " href="<?php echo base_url("Setting")?>"><i class="fa fa-cogs"></i> <span>Setting</span></a></li>
              
              
            </ul>

            
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
      <?php echo $contents ?> 
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Developer By <a href="http://allii98.github.io/">Ali</a>
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/chartjs/dist/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets/assets/js/page/index.js"></script>

  <!-- DataTables -->
  <script src="<?php echo base_url() ?>assets/DataTables/js/jquery.dataTables.min.js"></script>

  <!-- Admin -->
  
  <!-- <script type="text/javascript">
    $(document).ready(function () {
    $('#myTable').DataTable();
    
</script> -->

<script type="text/javascript">
$(document).ready(function() {
    $('#table1').DataTable();
} )
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tbrg').DataTable();
} )
</script>

</body>
</html>
