<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Laporan harian</h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">laporan harian</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>No.SPK</th>
                      <th>Tanggal SPK</th>
                      <th>Tanggal Laporan</th>
                      <th>Perpanjangan Waktu</th>
                      <th>Minggu Ke</th>
                      <th>Hari Ke</th>
                      <th style="width:20px;">Data Laporan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($data_harian->result_array() as $i) :
                       $id                  = $i['lh_id'];
                       $tanggal             = $i['tanggal'];
                       $tglSPK              = $i['tglSPK'];
                       $perpanjanganwaktu   = $i['perpanjanganwaktu'];
                       $noSPK               = $i['lh_noSPK'];
                       $minggu              = $i['lh_minggu'];
                       $hari                = $i['lh_hari'];
                       $proyek_id           = $i['proyek_id'];
                  ?>
                  <tr>
                      <td><?php echo $noSPK;?></td>
                      <td><?php echo $tglSPK;?></td>
                      <td><?php echo $tanggal;?></td>
                      <td><?php echo $perpanjanganwaktu;?></td>
                      <td><?php echo $minggu;?></td>
                      <td><?php echo $hari;?></td>
                      <?php 
                        $lh_id=$id;
                        $q=$this->db->query("SELECT * FROM data_harian WHERE lh_id='$lh_id'");
                        $c=$q->num_rows();
                        if($c == 0):
                      ?>
                        <td><a href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin/LaporanDetail/<?php echo $id;?>/<?php echo $proyek_id;?>"><button class="btn btn-danger">Belum Input Data</button></a></td>
                      <?php else :?>
                        <td><a href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin/LaporanDetail/<?php echo $id;?>/<?php echo $proyek_id;?>"><button class="btn btn-primary">Tambah Data Input</button></a></td>
                      <?php endif;?>
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
<script src="<?php echo base_url().'assets/admin/js/jquery.toast.min.js'?>"></script>

<!-- validation -->
<script src="<?php echo base_url()?>assets/admin/js/validation.js"></script>

<!-- lobilist -->
<script src="<?php echo base_url()?>assets/admin/js/lobilist.js"></script>
 
<!-- custom -->
<script src="<?php echo base_url()?>assets/admin/js/custom.js"></script>
 
</body>
</html> 

<?php if($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Edit profile proyek berhasil dibuat.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#00C9E6'
                });
        </script>
<?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Laporan dibuat, Silahkan masukan data laporannya",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
<?php else:?>
<?php endif;?>
