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
        <li>
          <a href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin"><i class="ti-calendar"></i><span class="right-nav-text">Project</span> </a>
        </li>
         <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Data Master</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
          </a>
          <ul id="Form" class="collapse" data-parent="#sidebarnav">
            <li> <a href="<?php echo base_url()?>SUAdmin/Data_User">Data Surveyor</a> </li>
            <li> <a href="<?php echo base_url()?>SUAdmin/Data_User/QC">Data QC</a> </li>
            <li> <a href="<?php echo base_url()?>SUAdmin/Data_User/Pengawas">Data Pengawas</a> </li>
            <li> <a href="<?php echo base_url()?>SUAdmin/Data_User/Admin">Data Admin</a> </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url()?>TindakanPerbaikan/tindakan_perbaikan_admin"><i class="ti-world"></i><span class="right-nav-text">Tindakan Perbaikan</span> </a>
        </li>
        <li>
          <a href="<?php echo base_url()?>SUAdmin/Pengguna"><i class="ti-user"></i><span class="right-nav-text">Pengaturan Akun</span> </a>
        </li>
         <!-- menu item mailbox-->
       <!--  <li>
          <a href="<?php echo base_url()?>Admin/Inbox"><i class="ti-email"></i><span class="right-nav-text">Mail box</span> </a>
        </li> -->
      
    </ul>
  </div> 
</div>
<!-- Left Sidebar End-->