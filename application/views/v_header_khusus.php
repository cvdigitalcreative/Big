<?php 
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title><?php echo $title;?></title>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/admin/images/favicon.ico" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/css/jquery.toast.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/css/image_grid.css">

 
</head>

<body>

<div class="wrapper">

<!--=================================
 preloader -->
 
<!-- <div id="pre-loader">
    <img src="<?php echo base_url()?>assets/admin/images/pre-loader/loader-01.svg" alt="">
</div> -->

<!--=================================
 preloader -->


<!--=================================
 header start-->
 
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <!-- logo -->
  <div class="text-left navbar-brand-wrapper">
    <a class="navbar-brand brand-logo" href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/images/logo.png" alt="" ></a>
    <a class="navbar-brand brand-logo-mini" href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/images/logo.png" alt=""></a>
  </div>
  <!-- Top bar left -->
  <ul class="nav navbar-nav mr-auto">
    <li class="nav-item">
      <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
    </li>
  </ul>
  <!-- top bar right -->
  
  <ul class="nav navbar-nav ml-auto">
   <!--  <li class="nav-item dropdown ">
      <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="ti-bell"></i>
        <span class="badge badge-danger notification-status"> </span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
        <div class="dropdown-header notifications">
          <strong>Notifications</strong>
          <span class="badge badge-pill badge-warning"><?php echo $jum_pesan;?></span>
        </div>
        <div class="dropdown-divider"></div>
        <?php 
                    $inbox=$this->db->query("SELECT tbl_inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_inbox WHERE inbox_status='1' ORDER BY inbox_id DESC LIMIT 5");
                    foreach ($inbox->result_array() as $in) :
                        $inbox_id=$in['inbox_id'];
                        $inbox_nama=$in['inbox_nama'];
                        $inbox_tgl=$in['tanggal'];
                        $inbox_pesan=$in['inbox_pesan'];
        ?>
        <a href="<?php echo base_url()?>Admin/Inbox" class="dropdown-item"><?php echo $inbox_pesan;?> <small class="float-right text-muted time"><?php echo $inbox_tgl;?></small> </a>
        <?php endforeach;?>
      </div>
    </li> -->
    <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
    ?>
    <li class="nav-item dropdown mr-30">
      <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="<?php echo base_url().'assets/admin/images/'.$c['pengguna_photo'];?>" alt="avatar">
      </a>
      
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header">
          <div class="media">
            <div class="media-body">
              <h5 class="mt-0 mb-0"><?php echo $c['pengguna_nama'];?></h5>
              <span><?php echo $c['pengguna_nohp'];?></span>
            </div>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?php echo base_url().'Login/logout'?>"><i class="text-danger ti-unlock"></i>Logout</a>
      </div>
    </li>
  </ul>
</nav>

<!--=================================
 header End-->

 <!--=================================
 Main content -->

<div class="container-fluid">
  <div class="row">
    <!-- Left Sidebar -->
    <div class="side-menu-fixed">
     <div class="scrollbar side-menu-bg">
      <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <!-- menu title -->
         <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Website Components </li>
        <!-- All Form  -->
       <!--  <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Blog</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
          </a>
          <ul id="Form" class="collapse" data-parent="#sidebarnav"> -->
            <!-- <li> <a href="<?php echo base_url()?>Admin/Kategori">Kategori Blog</a> </li> -->
           <!--  <li> <a href="<?php echo base_url()?>Admin/Tulisan/add_tulisan">Form Add Tulisan</a> </li> -->
            <!-- <li> <a href="<?php echo base_url()?>Admin/Tulisan">List Blog</a> </li>
          </ul>
        </li> -->
<!--         <li>
          <a href="<?php echo base_url()?>Surveyor/Project"><i class="ti-calendar"></i><span class="right-nav-text">Project</span> </a>
        </li> -->
       <!--  <li>
          <a href="<?php echo base_url()?>TindakanPerbaikan/tindakan_perbaikan_surveyor"><i class="ti-world"></i><span class="right-nav-text">Tindakan Perbaikan</span> </a>
        </li> -->
<!--         <li>
          <a href="<?php echo base_url()?>Surveyor/Pengguna"><i class="ti-user"></i><span class="right-nav-text">Setting Akun</span> </a>
        </li> -->
         <!-- menu item mailbox-->
       <!--  <li>
          <a href="<?php echo base_url()?>Admin/Inbox"><i class="ti-email"></i><span class="right-nav-text">Mail box</span> </a>
        </li> -->
      
    </ul>
  </div> 
</div>
<!-- Left Sidebar End-->