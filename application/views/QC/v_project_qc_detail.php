<!--=================================
wrapper -->
  <?php foreach ($data->result() as $row): ?>
  <div class="content-wrapper" id="content-summary" style="display: block">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Project Summary </h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
            <li class="breadcrumb-item active">Project Summary </li>
          </ol>
        </div>
      </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-8 mb-30">     
        <div class="card card-statistics"> 
          <div class="card-body">
            <div class="d-block d-md-flex justify-content-between border-bottom mb-10">
              <div class="d-block">
                <h5 class="mb-10 card-title border-0 pb-0">Project File</h5>
              </div>
             </div>    
             <div class="row">
            
                <div class="col-sm-6 col-md-4 mb-30">
                  <div class="clearfix">
                    <div class="float-left icon-box bg-success">
                      <span class="text-white">
                        <i class="fa fa-camera highlight-icon" aria-hidden="true"></i>
                      </span>
                    </div>
                    <div class="float-left pl-20">
                      <a href="#" onclick="showImages()" class="card-text text-dark">Foto Survey</a>
                     
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>   
      <div class="card card-statistics mt-30"> 
        <div class="card-body">
        <h5 class="card-title">Project Location</h5>
        <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $row->proyek_latitude;?>,<?php echo $row->proyek_longitude;?>&hl=es;z=14&amp;output=embed" style="width: 100%;">
 </iframe>
          </div>
        </div>
      </div>
      <div class="col-xl-4 mb-30">
      <div class="card card-statistics mb-30"> 
          <div class="card-body">
             <h5 class="card-title">Project overview </h5>
              <p>Nama Proyek : <?php echo $row->proyek_nama;?> </p>   
              <p>Nama Petugas : <?php echo $row->proyek_petugas;?> </p>
              <?php if(empty($row->proyek_tgl_penawaran)):?>
              <?php else:?>
                <?php 
                  $createDate = new DateTime($row->proyek_tgl_penawaran); 
                  $tanggal = $createDate->format('d-m-Y');
                ?>
                <p>Tanggal Penawaran : <?php echo $tanggal;?> </p>
              <?php endif;?> 

              <?php if((!empty($row->proyek_tgl_awal_spk) OR !empty($row->proyek_tgl_akhir_spk) ) AND $row->proyek_status == 2):?>
                <?php 
                  $awalSPK1 = new DateTime($row->proyek_tgl_awal_spk);
                  $akhirSPK1 = new DateTime($row->proyek_tgl_akhir_spk); 
                  $awalSPK = $awalSPK1->format('d-m-Y');
                  $akhirSPK = $akhirSPK1->format('d-m-Y');
                ?>
                <p>Tanggal Awal SPK : <?php echo $awalSPK;?></p>
                <p>Tanggal Akhir SPK : <?php echo $akhirSPK;?></p>
              <?php else:?>
              <?php endif;?>    
          </div>
      </div> 

      <div class="card card-statistics mb-30"> 
          <div class="card-body">
            <h5 class="card-title">Upload File</h5>
             <a href="<?php echo base_url()?>QC/ProjectQC/InputData/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Upload BQ</button></a>
             <a href="<?php echo base_url()?>QC/ProjectQC/InputDataJadwal/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Upload Time Schedule</button></a>
             <a href="<?php echo base_url()?>QC/ProjectQC/InputDataUpah/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Upload File Upah</button></a>
             <a href="<?php echo base_url()?>QC/ProjectQC/InputDataBahan/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Upload File Bahan</button></a>
          </div>
      </div>

      <div class="card card-statistics mb-30"> 
          <div class="card-body">
             <a href="<?php echo base_url()?>Pekerjaan/lihat_perkerjaan/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Daftar Pekerjaan</button></a>
          </div>
      </div>

        <div class="card card-statistics "> 
          <div class="card-body">
            <div class="d-block d-md-flex justify-content-between border-bottom mb-10">
              <div class="d-block">
                 <h5 class="mb-10 card-title border-0 pb-0">Project Users</h5>
              </div>
              <div class="clearfix">
                  <?php if($row->pengawas_id == NULL OR $row->pengawas_id == 0) :?>
                    <a href="#" class="text-dark float-right" data-toggle="modal" data-target="#add-user"><i class="fa fa-plus"></i> </a>
                  <?php else:?>

                  <?php endif;?>
                  <?php endforeach;?>
                </div>
             </div>               
             <ul class="list-unstyled">
                <?php if($userSurveyor->num_rows() == 0):?>

                <?php else:?>
                <?php foreach ($userSurveyor->result() as $row): ?>
                <li class="mb-20">
                  <div class="media">
                   <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="<?php echo base_url()?>assets/images/<?php echo $row->surveyor_foto?>" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 text-info"><?php echo $row->surveyor_nama;?></h6>
                       <p><?php echo $row->surveyor_hp;?></p>
                       <p>Surveyor</p>
                    </div>
                  </div>
                  <div class="divider mt-20"></div>
                </li>
                <?php endforeach;?>
                <?php endif;?>
                
                <?php if($userQC->num_rows() == 0):?>
                  
                <?php else:?>
                <?php foreach ($userQC->result() as $row): ?>
                <li class="mb-20">
                  <div class="media">
                   <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="<?php echo base_url()?>assets/images/<?php echo $row->qc_foto?>" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 text-info"><?php echo $row->qc_nama;?></h6>
                       <p><?php echo $row->qc_hp;?></p>
                       <p>Quality Control</p>
                    </div>
                     
                  </div>
                  <div class="divider mt-20"></div>
                </li>
                <?php endforeach;?>
                <?php endif;?>

                <?php if($userPengawas->num_rows() == 0):?>
                  
                <?php else:?>
                <?php foreach ($userPengawas->result() as $row): ?>
                <li class="mb-20">
                  <div class="media">
                   <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="<?php echo base_url()?>assets/images/<?php echo $row->pengawas_foto?>" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 text-info"><?php echo $row->pengawas_nama;?></h6>
                       <p><?php echo $row->pengawas_hp;?></p>
                       <p>Pengawas</p>
                    </div>
                   <a href="#" class="text-dark float-right" data-toggle="modal" data-target="#add-user"><i class="fa fa-pencil"></i> </a>
                  </div>
                  <div class="divider mt-20"></div>
                </li>
                <?php endforeach;?>
                <?php endif;?>   
              </ul>
           </div>
        </div>    
      </div>
      <!-- Modal Add User -->
        <div class="modal" tabindex="-1" role="dialog" id="add-user">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <?php foreach ($data->result() as $row): ?> 
                    <form action="<?php echo base_url()?>QC/ProjectQC/updateuserPengawas/<?php echo $row->proyek_id;?>" method="post">
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php endforeach;?>
                                    <label class="control-label">Pengawas</label>
                                    <select class="form-control" name="pengawas">
                                        <option selected value="">Pilih</option>
                                         <?php
                                            $no=0;
                                            foreach ($pengawas->result_array() as $i) :
                                              $no++;
                                                 $pengawas_id=$i['pengawas_id'];
                                                 $pengawas_nama=$i['pengawas_nama'];
                                                 
                                              ?>
                                            <option value="<?php echo $pengawas_id;?>"><?php echo $pengawas_nama;?></option>
                                          <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ripple save-category" id="simpan">Save</button>
                    </div>
                    </form>
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

<!--=================================start wrapper 3 --> 
<div class="content-wrapper" id="content-images" style="display: none">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Images view</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="default-color" onclick="showImages()">Projects Summary</a></li>
              <li class="breadcrumb-item active">Images View</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-md-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">   
            <div class="row1">
              <div class="d-block">
                <h5 class="mb-10 card-title border-0 pb-0">Foto tampak depan</h5>
              </div>            
              <div class="column1">
                <?php foreach ($depan->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->ftd_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>             

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto tampak belakang</h5>
              </div>
              <div class="column1">
                <?php foreach ($belakang->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fb_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>              
              
              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto tampak kanan</h5>
              </div>              
              <div class="column1">
                <?php foreach ($kanan->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fk_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>
                     
              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto tampak kiri</h5>
              </div>  
              <div class="column1">
                <?php foreach ($kiri->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fkr_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>
              

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto tetangga kanan</h5>
              </div>
              <div class="column1">
                <?php foreach ($tetangga_kanan->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->ftk_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto tetangga kiri</h5>
              </div>
              <div class="column1">
                <?php foreach ($tetangga_kiri->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->ftkr_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto pam/sumur</h5>
              </div>
              <div class="column1">
                <?php foreach ($pam->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fp_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto listrik/kwh</h5>
              </div>
              <div class="column1">
                <?php foreach ($kwh_listrik->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fkl_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto lantai</h5>
              </div>
              <div class="column1">
                <?php foreach ($lantai->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fl_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto dak</h5>
              </div>
              <div class="column1">
                <?php foreach ($dak->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fd_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);"> 
                <?php endforeach; ?> 
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto Toilet</h5>
              </div>
              <div class="column1">
                <?php foreach ($toilet->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->ft_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">  
                <?php endforeach; ?>
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto Tanah Belakang</h5>
              </div>
              <div class="column1">
                <?php foreach ($tanah_belakang->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->ftb_gambar;?>" style="width:14%" onclick="myFunction(this);"> 
                <?php endforeach; ?> 
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto Parkiran</h5>
              </div>
              <div class="column1">
                <?php foreach ($parkiran->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fp_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?> 

              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto Bahu Jalan</h5>
              </div>
              <div class="column1">
                <?php foreach ($bahu_jalan->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fbj_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>   
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto atap</h5>
              </div>
              <div class="column1">
                <?php foreach ($foto_atap->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fa_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>   
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto folding gate</h5>
              </div>
              <div class="column1">
                <?php foreach ($folding_gate->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->ffg_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>   
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto pintu-pintu</h5>
              </div>
              <div class="column1">
                <?php foreach ($pintu_pintu->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fpp_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>  
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto dinding</h5>
              </div>
              <div class="column1">
                <?php foreach ($dinding->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fdd_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>  
              </div>
              
              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Foto semua kondisi bangunan</h5>
              </div>
              <div class="column1">
                <?php foreach ($kondisi_bangunan->result() as $row): ?>
                <img class="mb-2" src="<?php echo base_url()?>assets/foto_proyek/<?php echo $row->fkb_gambar;?>" alt="Lights" style="width:14%" onclick="myFunction(this);">
                <?php endforeach; ?>  
              </div>

              <div class="d-block">
                <h5 class="mb-10 mt-10 card-title border-0 pb-0">Note foto diatas</h5>
              </div>
              <div class="column1">
                <?php foreach ($catatan->result() as $row): ?>
                  <?php echo $row->catatan_text;?>
                <?php endforeach; ?> 
              </div>

            </div>
            <div id="myModal" class="modal1">
              <span onclick="this.parentElement.style.display='none'" class="close1">&times;</span>
              <img class="modal-content1" id="img01" style="margin-top: 6%;">
            </div>
          </div>
        </div>   
      </div> 
  </div>

 <!--=================================
 wrapper -->
      
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
  function showFragment(){
    var x = document.getElementById("content-foto");
    var y = document.getElementById("content-summary");
    if(x.style.display === "none")
    {
      x.style.display = "block";
      y.style.display = "none";
    }
    else
    {
      x.style.display = "none";
      y.style.display = "block";
    }
  }

  function showImages(){
    var x = document.getElementById("content-images");
    var y = document.getElementById("content-summary");
    if(x.style.display === "none")
    {
      x.style.display = "block";
      y.style.display = "none";
    }
    else
    {
      x.style.display = "none";
      y.style.display = "block";
    }
  }

   function showEdit(){
    var x = document.getElementById("content-edit");
    var y = document.getElementById("content-summary");
    if(x.style.display === "none")
    {
      x.style.display = "block";
      y.style.display = "none";
    }
    else
    {
      x.style.display = "none";
      y.style.display = "block";
    }
  }

  function showTindakanPerbaikan(){
    var x = document.getElementById("content-tindakan-perbaikan");
    var y = document.getElementById("content-summary");
    if(x.style.display === "none")
    {
      x.style.display = "block";
      y.style.display = "none";
    }
    else
    {
      x.style.display = "none";
      y.style.display = "block";
    }
  }
</script>

<script>
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
</script>

<script>
function myFunction(imgs) {
    var expandImg = document.getElementById("img01");
    expandImg.src = imgs.src;
    expandImg.parentElement.style.display = "block";
}
</script>

<script src="<?php echo base_url().'assets/admin/js/jquery.toast.min.js'?>"></script>
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-pengawas'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Update User Proyek Pengawas Berhasil.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>