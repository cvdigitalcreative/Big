 <!--=================================wrapper -->

    <div class="content-wrapper">
      <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Tindakan Perbaikan</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="<?php echo $this->agent->referrer();?>">Tindakan Perbaikan</a></li>
              <li class="breadcrumb-item active">Lihat Detail</li>
            </ol>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
              <h5 class="mb-0"> Penerimaan Masalah</h5>
          </div>
      </div>
      <?php foreach($data->result_array() AS $row) :
        $id                       = $row['td_id'];
        $masalah                  = $row['td_masalah'];
        $analisis                 = $row['td_analisis'];
        $htj                      = $row['td_htj'];
        $penemu                   = $row['td_nama_penemu'];
        $lokasi                   = $row['td_bagian_lokasi'];
        $perbaikanhh              = $row['td_perbaikan_hh'];
        $perbaikanjawab           = $row['td_perbaikan_j'];
        $perbaikants              = $row['perbaikants'];
        $perbaikanstatus          = $row['td_perbaikan_s'];
        $tindakanperbaikanhh      = $row['td_tindakan_perbaikan_hh'];
        $tindakanperbaikanjawab   = $row['td_tindakan_perbaikan_j'];
        $tindakanperbaikants      = $row['tindakanperbaikants'];
        $tindakanperbaikanstatus  = $row['td_tindakan_perbaikan_s'];

      ?>
      <form action="<?php echo base_url()?>TindakanPerbaikan/AddTD" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                      <div class="form-group col-md-12">
                          <label class="control-label">Masalah Yang Ditemukan / Kondisi Sekarang</label>
                          <textarea rows="4" class="form-control form-white" name="xmasalah" disabled><?php echo $masalah?></textarea>
                          <label class="control-label mt-10">Analisis Sebab Akibat</label>
                          <textarea rows="4" class="form-control form-white" name="xanalisis" disabled><?php echo $analisis?></textarea>
                      </div>
                  </div>
              </div>  
          </div>
          <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-51"> 
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Hari / Tanggal / Jam </label>
                    <input type="text" class="form-control" name="xhtj" value="<?php echo $htj;?>" disabled/>
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Nama Penemu Masalah</label>
                    <input type="text" class="form-control" name="xpenemu" value="<?php echo $penemu;?>" disabled />
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">Bagian Lokasi</label>
                      <input type="text" class="form-control" name="xlokasi" value="<?php echo $lokasi;?>" disabled />
                  </div>
                </div>
            </div>  
          </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
              <h5 class="mb-0"> Perbaikan</h5>
          </div>
      </div>
      <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                      <div class="form-group col-md-12">
                          <label class="control-label">Hal-Hal yang harus dikerjakan</label>
                          <textarea rows="8" class="form-control form-white" name="xPerbaikanKerja" disabled><?php echo $perbaikanhh;?></textarea>
                          
                      </div>
                  </div>
              </div>  
          </div>
          <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-51"> 
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-sm-2">P.Jawab</label>
                    <input type="text" class="form-control" name="xPerbaikanJawab" value="<?php echo $perbaikanjawab;?>" disabled/>
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2">Target Tanggal Selesai</label>
                    <input type="text" class="form-control" name="xPerbaikanTanggalSelesai" value="<?php echo $perbaikants;?>" disabled />
                  </div>
                  <div class="form-group">
                      <label class="control-label">Status</label>
                      <select class="custom-select mr-sm-2" name="xPerbaikanStatus" disabled>
                        <?php if($perbaikanstatus == 1):?>
                          <option value="1" selected>Belum</option>
                          <option value="2">Selesai</option>
                        <?php else :?>
                          <option value="1">Belum</option>
                          <option value="2" selected>Selesai</option>  
                        <?php endif;?>                   
                      </select>
                  </div>
                </div>
            </div>  
          </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
              <h5 class="mb-0">Tindakan Perbaikan</h5>
          </div>
      </div>
       <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                      <div class="form-group col-md-12">
                          <label class="control-label">Hal-Hal yang harus dikerjakan</label>
                          <textarea rows="8" class="form-control form-white" name="xTDKerja" disabled><?php echo $tindakanperbaikanhh;?></textarea>
                      </div>
                  </div>
              </div>  
          </div>
          <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-51"> 
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-sm-2">P.Jawab</label>
                    <input type="text" class="form-control" name="xTDJawab" value="<?php echo $tindakanperbaikanjawab;?>" disabled/>
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2">Target Tanggal Selesai</label>
                    <input type="text" class="form-control" name="xTDTanggalSelesai" value="<?php echo $tindakanperbaikants;?>" disabled/>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Status</label>
                       <select class="custom-select mr-sm-2" name="xTDStatus" disabled>
                          <?php if($tindakanperbaikanstatus == 1):?>
                          <option value="1" selected>Belum</option>
                          <option value="2">Selesai</option>
                        <?php else :?>
                          <option value="1">Belum</option>
                          <option value="2" selected>Selesai</option>  
                        <?php endif;?>                      
                      </select>
                  </div>
                </div>
            </div>  
          </div>
      </div>

      </form>
    <?php endforeach;?>
      
     
<!--=================================
 wrapper -->
      
<!--=================================
 footer -->

    <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="https://www.digitalcreative.web.id" target="blank"> Warung Kreatif </a> All Rights Reserved. </p>
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
  </div><!-- main content wrapper end-->
  </div>
</div>
</div>

<!--=================================footer -->


 
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
                    text: "Data tindakan perbaikan sudah disimpan",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
<?php else:?>
<?php endif;?>
