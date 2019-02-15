<!--================================= start wrapper 1 -->

  <div class="content-wrapper" id="content" style="display: block;">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Projects</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">
      <div class="col mb-30">
        <div class="card card-statistics h-100"> 
          <div class="card-body project-page">
            <div class="d-block d-sm-flex justify-content-between">
              <div class="d-block xs-mb-10">
                <div class="box clearfix sm-mb-10">
                  <select class="fancyselect" onchange="showDiv(this)">
                    <option value="1">Pengajuan</option>
                    <option value="2">Proses</option>
                    <option value="3">Selesai</option>
                  </select>
                </div>
            </div>  
            </div>
        </div>
        </div>
     </div>
    </div>
    
    <div class="row" id="phase" style="display: flex;">   
      <?php foreach ($proyek_fase->result_array() as $i) :
          $proyek_id=$i['proyek_id'];
          $proyek_nama=$i['proyek_nama'];
          $proyek_petugas=$i['proyek_petugas'];
          $proyek_tgl_penawaran=$i['proyek_tgl_penawaran'];
          $proyek_awal_spk = $i['proyek_tgl_awal_spk'];
          $proyek_akhir_spk = $i['proyek_tgl_akhir_spk'];
      ?> 
      <div class="col-sm-6 col-lg-6 col-xl-4 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">   
            <a href="<?php echo base_url()?>SUAdminAdmin/ProjectSUAdmin/detailforAdmin/<?php echo $proyek_id?>" class="text-dark float-right" data-toggle="tooltip" data-placement="left" title="" data-original-title="Lihat Proyek" target="_blank" style="margin-left: 5px"><i class="fa fa-eye"></i></a>
            <span><?php echo $proyek_petugas;?></span>
            <h5 class="mt-15 mb-15"><b><?php echo $proyek_nama;?></b></h5>
            <!-- <p></p> -->
            <div class="mt-20">
              <div class="clearfix">
                 <a class="text-dark mb-10 float-left" href="#">In Progress</a>
                 <?php 
                  $this->load->model('m_pekerjaan');
                  $data1 = $this->m_pekerjaan->getdataPekerjaan($proyek_id);
                   if($data1->num_rows() == 0){
                    $persen1 = 0;
                  }elseif($data1->num_rows() > 0){
                    $data2 = $this->m_pekerjaan->SumPersen($proyek_id);
                    $q=$data2->row_array();
                    $sum_volume=$q['sum_volume'];
                    $sum_progress=$q['sum_progress'];
                    $persen = ($sum_progress/$sum_volume)*100;
                    $persen1 = round($persen);
                  }
                 ?>
                 <p class="mb-10 text-info float-right"><?php echo $persen1;?>%</p>
              </div>
              <div class="progress progress-small">
                <div class="skill2-bar bg-info" role="progressbar" style="width: <?php echo $persen1;?>%" aria-valuenow="<?php echo $persen1;?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="mt-10">
              <p>
                <?php if(empty($proyek_tgl_penawaran)):?>

                <?php else:?>
                  <?php 
                    $createDate = new DateTime($proyek_tgl_penawaran); 
                    $tanggal = $createDate->format('d-m-Y');
                    
                    echo "Tanggal Penawaran : ".$tanggal;
                  ?>
                <?php endif;?>
              </p>
            </div>
          </div>
        </div>
      </div>   
      <?php endforeach;?>
    </div>

   <div class="row" id="progress" style="display: none;">   
      
      <?php foreach ($proyek_proses->result_array() as $i) :
          $proyek_id=$i['proyek_id'];
          $proyek_nama=$i['proyek_nama'];
          $proyek_petugas=$i['proyek_petugas'];
          $proyek_status=$i['proyek_status'];
          $proyek_tgl_penawaran=$i['proyek_tgl_penawaran'];
          $proyek_awal_spk = $i['proyek_tgl_awal_spk'];
          $proyek_akhir_spk = $i['proyek_tgl_akhir_spk'];
      ?>    
      <div class="col-sm-6 col-lg-6 col-xl-4 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">   
            <a href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin/detailforAdmin/<?php echo $proyek_id?>" class="text-dark float-right" data-toggle="tooltip" data-placement="left" title="" data-original-title="View project" target="_blank"><i class="fa fa-eye"></i></a>
            <span><?php echo $proyek_petugas;?></span>
            <h5 class="mt-15 mb-15"><b><?php echo $proyek_nama;?></b></h5>
            <div class="mt-20">
             <div class="clearfix">
                 <a class="text-dark mb-10 float-left" href="#">In Progress</a>
                 <?php 
                  $this->load->model('m_pekerjaan');
                  $data1 = $this->m_pekerjaan->getdataPekerjaan($proyek_id);
                   if($data1->num_rows() == 0){
                    $persen1 = 0;
                  }elseif($data1->num_rows() > 0){
                    $data2 = $this->m_pekerjaan->SumPersen($proyek_id);
                    $q=$data2->row_array();
                    $sum_volume=$q['sum_volume'];
                    $sum_progress=$q['sum_progress'];
                    $persen = ($sum_progress/$sum_volume)*100;
                    $persen1 = round($persen);
                  }
                 ?>
                 <p class="mb-10 text-info float-right"><?php echo $persen1;?>%</p>
              </div>
              <div class="progress progress-small">
                <div class="skill2-bar bg-info" role="progressbar" style="width: <?php echo $persen1;?>%" aria-valuenow="<?php echo $persen1;?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="mt-10">
              <p>
                <?php if(!empty($proyek_tgl_penawaran)):?>
                  <?php 
                    $createDate = new DateTime($proyek_tgl_penawaran); 
                    $tanggal = $createDate->format('d-m-Y');
                    
                    echo "Tanggal Penawaran : ".$tanggal;
                  ?>
                <?php else:?> 
                <?php endif;?>
              </p>

              <?php if((!empty($proyek_awal_spk) OR !empty($proyek_akhir_spk)) AND $proyek_status == 2):?>
                <?php 
                  $awalSPK1 = new DateTime($proyek_awal_spk);
                  $akhirSPK1 = new DateTime($proyek_akhir_spk); 
                  $awalSPK = $awalSPK1->format('d-m-Y');
                  $akhirSPK = $akhirSPK1->format('d-m-Y');
                ?>
                <p>Tanggal Awal SPK : <?php echo $awalSPK;?></p>
                <p>Tanggal Akhir SPK : <?php echo $akhirSPK;?></p>
              <?php else:?>
              <?php endif;?> 

            </div>
          </div>
        </div>
      </div>   
      <?php endforeach;?>
    </div>

   <div class="row" id="complete" style="display: none;">   
      <?php foreach ($proyek_selesai->result_array() as $i) :
          $proyek_id=$i['proyek_id'];
          $proyek_nama=$i['proyek_nama'];
          $proyek_petugas=$i['proyek_petugas'];
          $proyek_status=$i['proyek_status'];
          $proyek_tgl_penawaran=$i['proyek_tgl_penawaran'];
          $proyek_awal_spk = $i['proyek_tgl_awal_spk'];
          $proyek_akhir_spk = $i['proyek_tgl_akhir_spk'];
      ?>   
      <div class="col-sm-6 col-lg-6 col-xl-4 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">   
            <a href="<?php echo base_url()?>SUAdmin/ProjectSUAdmin/detailforAdmin/<?php echo $proyek_id?>" class="text-dark float-right" data-toggle="tooltip" data-placement="left" title="" data-original-title="View project" target="_blank"><i class="fa fa-eye"></i></a>
            <span><?php echo $proyek_petugas;?></span>
            <h5 class="mt-15 mb-15"><b><?php echo $proyek_nama;?></b></h5>
            <div class="mt-20">
             <div class="clearfix">
                 <a class="text-dark mb-10 float-left" href="#">In Progress</a>
                 <?php 
                  $this->load->model('m_pekerjaan');
                  $data1 = $this->m_pekerjaan->getdataPekerjaan($proyek_id);
                   if($data1->num_rows() == 0){
                    $persen1 = 0;
                  }elseif($data1->num_rows() > 0){
                    $data2 = $this->m_pekerjaan->SumPersen($proyek_id);
                    $q=$data2->row_array();
                    $sum_volume=$q['sum_volume'];
                    $sum_progress=$q['sum_progress'];
                    $persen = ($sum_progress/$sum_volume)*100;
                    $persen1 = round($persen);
                  }
                 ?>
                 <p class="mb-10 text-info float-right"><?php echo $persen1;?>%</p>
              </div>
              <div class="progress progress-small">
                <div class="skill2-bar bg-info" role="progressbar" style="width: <?php echo $persen1;?>%" aria-valuenow="<?php echo $persen1;?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
           
            <div class="mt-10">
              <p>
                <?php if(!empty($proyek_tgl_penawaran)):?>
                  <?php 
                    $createDate = new DateTime($proyek_tgl_penawaran); 
                    $tanggal = $createDate->format('d-m-Y');
                    
                    echo "Tanggal Penawaran : ".$tanggal;
                  ?>
                <?php else:?>
                  
                <?php endif;?>
              </p>

              <?php if((!empty($proyek_awal_spk) OR !empty($proyek_akhir_spk) ) AND $proyek_status == 3):?>
                <?php 
                  $awalSPK1 = new DateTime($proyek_awal_spk);
                  $akhirSPK1 = new DateTime($proyek_akhir_spk); 
                  $awalSPK = $awalSPK1->format('d-m-Y');
                  $akhirSPK = $akhirSPK1->format('d-m-Y');
                ?>
                <p>Tanggal Awal SPK : <?php echo $awalSPK;?></p>
                <p>Tanggal Akhir SPK : <?php echo $akhirSPK;?></p>
              <?php else:?>
              <?php endif;?>  

            </div>
          </div>
        </div>   
      </div>
      <?php endforeach;?>
    </div>

 <!--=================================
 wrapper1 -->
      
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

<!--=================================end wrapper 1 -->

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
<script src="<?php echo base_url()?>assets/admin/js/toastr.js"></script>

<!-- validation -->
<script src="<?php echo base_url()?>assets/admin/js/validation.js"></script>

<!-- lobilist -->
<script src="<?php echo base_url()?>assets/admin/js/lobilist.js"></script>
 
<!-- custom -->
<script src="<?php echo base_url()?>assets/admin/js/custom.js"></script>
 
</body>
</html>
<script>
  function showDiv(elem)
  {
   if(elem.value == 1){
    document.getElementById('phase').style.display = "flex";
    document.getElementById('progress').style.display = "none";
    document.getElementById('complete').style.display = "none";
   }
   else if(elem.value == 2){
    document.getElementById('phase').style.display = "none";
    document.getElementById('progress').style.display = "flex";
    document.getElementById('complete').style.display = "none";
  }
  else if (elem.value == 3) {
    document.getElementById('phase').style.display = "none";
    document.getElementById('progress').style.display = "none";
    document.getElementById('complete').style.display = "flex";  }   
  }

  // function showFragment(){
  //   var x = document.getElementById("content-add");
  //   var y = document.getElementById("content");
  //   if(x.style.display === "none")
  //   {
  //     x.style.display = "block";
  //     y.style.display = "none";
  //   }
  //   else
  //   {
  //     x.style.display = "none";
  //     y.style.display = "block";
  //   }
  // }
</script>

<!-- <script>
var x = document.getElementById("latitude");
var y = document.getElementById("longitude");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
  x.value = position.coords.latitude;
  y.value = position.coords.longitude;
}
</script> -->