<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"><?php echo $title?></h4>              
          </div>
          <?php foreach ($data->result_array() as $i) :
            $proyek_id=$i['proyek_id'];
          ?> 
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url()?>Admin/ProjectAdmin/detailforAdmin/<?php echo $proyek_id;?>" class="default-color">Project Summary</a></li>
              <li class="breadcrumb-item active">Lihat Permintaan Barang</li>
            </ol>
          </div>
          
        </div>
    </div>
    <!-- main body --> 
    <div class="row" id="surveyor" style="display: block">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <div class="col-xl-3 mb-10">
                  <a href="<?php echo base_url()?>Admin/ProjectAdmin/cetakPermintaanBarang/<?php echo $proyek_id;?>"  class="btn btn-primary btn-block ripple">
                      <i class="fa fa-cloud-download pr-2"></i> Cetak Permintaan Barang
                  </a>
            </div>
            <?php endforeach; ?>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Spesifikasi</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Rencana Pemakaian</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($dataPB->result_array() as $i) :
                    $id = $i['pb_id'];
                    $pb_proyek_nama=$i['pb_proyek'];
                    $tanggal=$i['tanggal'];
                    $pb_nama_barang=$i['pb_nama_barang'];
                    $pb_spesifikasi=$i['pb_spesifikasi'];
                    $pb_jumlah=$i['pb_jumlah'];
                    $pb_satuan=$i['pb_satuan'];
                    $pb_rencana_pemakaian=$i['pb_rencana_pemakaian'];
                    $proyek_id=$i['proyek_id'];
                  ?> 
                  <tr>
                      <td><?php echo $tanggal;?></td>
                      <td><?php echo $pb_nama_barang;?></td>
                      <td><?php echo $pb_spesifikasi;?></td>
                      <td><?php echo $pb_jumlah;?></td>
                      <td><?php echo $pb_satuan;?></td>
                      <td><?php echo $pb_rencana_pemakaian;?></td>
                  </tr>
                  <?php endforeach; ?> 
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
    document.getElementById('surveyor').style.display = "block";
    document.getElementById('tender').style.display = "none";
    document.getElementById('pengawas').style.display = "none";
   }
   else if(elem.value == 2){
    document.getElementById('surveyor').style.display = "none";
    document.getElementById('tender').style.display = "block";
    document.getElementById('pengawas').style.display = "none";
  }
  else if (elem.value == 3) {
    document.getElementById('surveyor').style.display = "none";
    document.getElementById('tender').style.display = "none";
    document.getElementById('pengawas').style.display = "block";  }   
  }
</script>