<?php foreach ($data->result() as $row): ?>
<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Laporan keuangan</h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">laporan keuangan</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <ul class="nav nav-tabs mb-10">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin/LihatLaporanKeuangan/<?php echo $proyek_id;?>">Koordinator</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin/LihatLaporanMaterial/<?php echo $proyek_id;?>">Material</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin/LihatLaporanUpah/<?php echo $proyek_id;?>">Upah</a>
                </li>
              </ul>
            <div class="col-xl-4 mb-10">
                  <a href="<?php echo base_url()?>Admin/ProjectAdmin/cetakLaporanKeuangan/<?php echo $row->proyek_id;?>" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-print pr-2"></i> Cetak Laporan Keuangan
                  </a>
            </div>
            <?php endforeach;?>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>Tanggal</th>
                      <th>Nama Pembuat</th>
                      <th>Material</th>
                      <th>Keterangan</th>
                      <th>Uang Masuk</th>
                      <th>Uang Keluar</th>
                      <th>Sisa Uang</th>
                      <th>Upload Nota</th>
                      <th style="width:20px;">Status</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($data_laporan->result_array() as $i) :
                      $id            = $i['lm_id'];
                      $bahan         = $i['lm_bahan'];
                      $tanggal       = $i['tanggal'];
                      $pengirim      = $i['lm_pengirim'];
                      $keterangan    = $i['lm_keterangan'];
                      $uang_masuk    = $i['lm_uang_masuk'];
                      $uang_keluar   = $i['lm_uang_keluar'];
                      $sisa_uang     = $i['lm_sisa_uang'];
                      $nota          = $i['lm_nota'];
                  ?>
                  <tr>
                      <td><?php echo $tanggal;?></td>
                      <td><?php echo $pengirim;?></td>
                      <td><?php echo $bahan;?></td>
                      <td><?php echo $keterangan;?></td>
                      <td><?php echo $uang_masuk;?></td>
                      <td><?php echo $uang_keluar;?></td>
                      <td><?php echo $sisa_uang;?></td>
                      <?php if(empty($nota)):?>
                        <td><button class="btn btn-danger">Nota tidak ada</button></td>
                      <?php else:?>
                        <td><button class="btn btn-primary"><?php echo $nota?></button></td>
                      <?php endif;?>
                      <td>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#EditData"><span class="ti-pencil"></span></a>
                      </td>
                  </tr>
                  <?php endforeach;?>
                   <?php foreach ($sum->result_array() as $i) :
                       $j_uangMasuk   = $i['j_uangMasuk'];
                       $j_uangKeluar  = $i['j_uangKeluar'];
                       $j_sisaUang    = $i['j_sisaUang'];
                  ?> 
                  <tr>
                      <th colspan="4" class="text-center">Jumlah</th>
                      <th><?php echo $j_uangMasuk;?></th>
                      <th><?php echo $j_uangKeluar;?></th>
                      <th><?php echo $j_sisaUang;?></th>
                  </tr>
                  <?php endforeach;?>
              </tbody>
           </table>
          </div>
          </div>
        </div>   
      </div>
  </div>

    
<!--=================================
 footer -->
 
    <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="text-center text-md-right">
            <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
            <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
            <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
          </ul>
        </div>
      </div>
    </footer>
    </div> 
  </div>
</div>
</div>

<!--=================================
 footer -->


 
<!--=================================
 jquery -->

<!-- jquery -->
<script src="<?php echo base_url()?>assets/admin/js/jquery-3.3.1.min.js"></script>

<!-- plugins-jquery -->
<script src="<?php echo base_url()?>assets/admin/js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script>var plugin_path = '<?php echo base_url()?>assets/admin/js/';</script>

<!-- chart -->
<script src="<?php echo base_url()?>assets/admin/js/chart-init.js"></script>

<!-- calendar -->
<script src="<?php echo base_url()?>assets/admin/js/calendar.init.js"></script>

<!-- charts sparkline -->
<script src="<?php echo base_url()?>assets/admin/js/sparkline.init.js"></script>

<!-- charts morris -->
<script src="<?php echo base_url()?>assets/admin/js/morris.init.js"></script>

<!-- datepicker -->
<script src="<?php echo base_url()?>assets/admin/js/datepicker.js"></script>

<!-- sweetalert2 -->
<script src="<?php echo base_url()?>assets/admin/js/sweetalert2.js"></script>

<!-- toastr -->
<!-- <script src="<?php echo base_url()?>assets/admin/js/toastr.js"></script> -->

<!-- validation -->
<script src="<?php echo base_url()?>assets/admin/js/validation.js"></script>

<!-- lobilist -->
<script src="<?php echo base_url()?>assets/admin/js/lobilist.js"></script>
 
<!-- custom -->
<script src="<?php echo base_url()?>assets/admin/js/custom.js"></script>

<script src="<?php echo base_url().'assets/admin/js/jquery.toast.min.js'?>"></script>
 
</body>
</html>
<?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data berhasil ditambahkan",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
<?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Data tidak berhasil ditambahkan",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php else:?>
<?php endif;?>