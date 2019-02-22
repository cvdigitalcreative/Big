<style type="text/css">
   /* The Modal (background) */

 </style>

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
                    <div class="float-left icon-box bg-primary">
                      <span class="text-white">
                        <i class="fa fa-calendar-o highlight-icon" aria-hidden="true"></i>
                      </span>
                    </div>
                    <div class="float-left pl-20">
                      <a href="#" onclick="showMessage()" class="card-text text-dark">Project Message</a>
                     
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-30">
                  <div class="clearfix">
                    <div class="float-left icon-box bg-success">
                      <span class="text-white">
                        <i class="fa fa-camera highlight-icon" aria-hidden="true"></i>
                      </span>
                    </div>
                    <div class="float-left pl-20">
                      <a href="#" onclick="showImages()" class="card-text text-dark">Project Images</a>
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>  

        <?php if($row->proyek_status == 1 ):?>
          <div class="card card-statistics mb-30"> 
            <div class="card-body">
              <h5 class="card-title">Apakah proyek ini bisa dilanjutkan?</h5>
               <a href="<?php echo base_url()?>Admin/ProjectAdmin/ubah_status2/<?php echo $row->proyek_id;?>"><button class="btn btn-primary mb-10">Bisa dilanjutkan</button></a>
               <a href="<?php echo base_url()?>Admin/ProjectAdmin/ubah_status0/<?php echo $row->proyek_id;?>"><button class="btn btn-danger mb-10">Tidak bisa dilanjutkan</button></a>
            </div>
          </div>
        <?php else:?>
          
        <?php endif;?>

      <div class="card card-statistics mt-30"> 
        <div class="card-body">
            <h5 class="card-title">Project Location</h5>
            <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $row->proyek_latitude;?>,<?php echo $row->proyek_longitude;?>&hl=es;z=14&amp;output=embed" style="width: 100%;"></iframe>
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
        
        <?php if(empty($row->proyek_tgl_penawaran) AND $row->proyek_status == 1):?>
        <div class="card card-statistics mb-30"> 
          <div class="card-body">
            <h6 class="card-title">Masukkan Tanggal Penawaran</h6>
            <form action="<?php echo base_url()?>Admin/ProjectAdmin/updateTglPenawaran/<?php echo $row->proyek_id;?>" method="post">
              <input type="date" name="tgl_penawaran" class="form-control">
              <button type="submit" class="btn btn-primary mt-10" >Save</button>
            </form> 
          </div>
        </div>
        <?php else:?>

        <?php endif;?>

        <?php if((empty($row->proyek_tgl_awal_spk) OR empty($row->proyek_tgl_akhir_spk) ) AND $row->proyek_status == 2):?>
        <div class="card card-statistics mb-30"> 
          <div class="card-body">
            <h6 class="card-title">Masukkan Tanggal SPK</h6>
            <form action="<?php echo base_url()?>Admin/ProjectAdmin/updateTglSPK/<?php echo $row->proyek_id;?>" method="post">
              <label class="control-label">Tanggal Awal SPK</label>
              <input type="date" name="tgl_awal_spk" class="form-control" required>
              <label class="control-label">Tanggal Akhir SPK</label>
              <input type="date" name="tgl_akhir_spk" class="form-control" required>
              <button type="submit" class="btn btn-primary mt-10" >Save</button>
            </form> 
          </div>
        </div>
        <?php else:?>

        <?php endif;?>

        <div class="card card-statistics mb-30"> 
          <div class="card-body">
            <a href="<?php echo base_url()?>Pekerjaan/lihat_perkerjaan/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Lihat Daftar Pekerjaan</button></a>
            <a href="<?php echo base_url()?>Admin/ProjectAdmin/Harian/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Laporan Harian</button></a>
          </div>
        </div>

        <div class="card card-statistics mb-30"> 
          <div class="card-body">
            <h5 class="card-title">Lihat File</h5>

             <a href="<?php echo base_url()?>Admin/ProjectAdmin/LihatBQ/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Lihat BQ </button></a>
             <a href="<?php echo base_url()?>Admin/ProjectAdmin/LihatJadwal/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Lihat Jadwal</button></a>
             <a href="<?php echo base_url()?>Admin/ProjectAdmin/LihatPermintaanBarang/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Lihat Permintaan Barang</button></a>
             <?php foreach ($data_laporan->result() as $i): ?>
              <a href="<?php echo base_url()?>Admin/ProjectAdmin/LihatLaporanKeuangan/<?php echo $row->proyek_id;?>"><button class="btn btn-success mb-10">Lihat Laporan Keuangan</button></a>
             <?php endforeach;?>
          </div>
        </div>

        <div class="card card-statistics "> 
          <div class="card-body">
            <div class="d-block d-md-flex justify-content-between border-bottom mb-10">
              <div class="d-block">
                 <h5 class="mb-10 card-title border-0 pb-0">Project Users</h5>
              </div>
              <div class="d-block d-md-flex sm-mb-15">
                <div class="clearfix">
                  <?php if($row->qc_id == NULL OR $row->qc_id == 0) :?>
                    <a href="#" class="text-dark float-right" data-toggle="modal" data-target="#add-user"><i class="fa fa-plus"></i> </a>
                  <?php else:?>

                  <?php endif;?>
                  <?php endforeach;?>
                </div>
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
                     <a href="#" class="text-dark float-right" data-toggle="modal" data-target="#add-user"><i class="fa fa-pencil"></i> </a>
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
                    <form action="<?php echo base_url()?>Admin/ProjectAdmin/updateuserQC/<?php echo $row->proyek_id;?>" method="post">
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php endforeach;?>
                                    <label class="control-label">Quality Control</label>
                                    <select class="form-control" name="qc">
                                        <option selected value="">Pilih</option>
                                         <?php
                                            $no=0;
                                            foreach ($qc->result_array() as $i) :
                                              $no++;
                                                 $qc_id=$i['qc_id'];
                                                 $qc_nama=$i['qc_nama'];
                                                 
                                              ?>
                                            <option value="<?php echo $qc_id;?>"><?php echo $qc_nama;?></option>
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

        <div class="modal" tabindex="-1" role="dialog" id="ModalHapus">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="" method="post">
                      <div class="modal-body p-20">
                        <div class="row">
                          <div class="col-md-12">
                            <!-- <input type="hidden" name="kode" value="<?php echo $album_id;?>"/>  -->
                            <p>Apakah kamu yakin ingin menghapus user <b><i>Puji</i></b></p>
                          </div>
                        </div>  
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ripple save-category">Save</button>
                    </div>
                    </form>
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
    
    <!--=================================Start wrapper 3 --> 

<div class="content-wrapper" id="content-message" style="display: none;">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Mail Box</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="default-color" onclick="showMessage()">Projects Summary</a></li>
              <li class="breadcrumb-item active">Mail Box</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-md-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">  
            <div class="row">
              <div class="col-sm-12 col-md-8 col-lg-8 col-xl-4">
                <div class="scrollbar max-h-600">
                <ul class="list-unstyled">
                  <li class="pt-15">
                    <a href="#">
                    <div class="media px-2">
                     <div class="position-relative">
                      <img class="img-fluid mr-15 avatar-small" src="<?php echo base_url()?>assets/admin/images/team/05.jpg" alt="">
                     </div> 
                      <div class="media-body">
                         <h6 class="mt-0 ">Martin smith <small class="float-right"> 22 May</small> </h6>
                         <div class="float-right">
                           <span class="badge badge-pill badge-primary">Private</span>
                         </div> 
                         <p class="text-muted"> We know this in our </p>
                      </div>
                    </div>
                    </a>
                    <div class="divider mt-15"></div>
                  </li>
                  
                  <li class="pt-15">
                    <a href="#">
                    <div class="media px-2">
                     <div class="position-relative">
                        <img class="img-fluid mr-15 avatar-small" src="<?php echo base_url()?>assets/admin/images/team/04.jpg" alt="">
                     </div> 
                      <div class="media-body">
                         <h6 class="mt-0 ">Sara Lisbon  <small class="float-right text-warning">15 Feb</small> </h6>
                         <div class="float-right text-muted">
                           <i class="fa fa-star-o pr-1"></i>
                         </div> 
                         <p class="text-muted">Remind yourself you. </p>
                      </div>
                    </div>
                    </a>
                    <div class="divider mt-15"></div>
                  </li>
                  <li>
                    <a href="#">
                    <div class="media px-2">
                     <div class="position-relative">
                        <img class="img-fluid mr-15 avatar-small" src="<?php echo base_url()?>assets/admin/images/team/09.jpg" alt="">
                     </div> 
                      <div class="media-body">
                         <h6 class="mt-0 ">Paul Flavius <small class="float-right">25 May</small> </h6>
                         <p class="text-muted">Give yourself the  </p>
                      </div>
                    </div>
                    </a>
                    <div class="divider mt-15"></div>
                  </li>
                </ul>
               </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                 <div class="mail-body">
                  <div class="mb-4 d-block">
                   <h4 class="d-inline-block">We know this in our </h4><span class="badge badge-pill badge-danger ml-3">Friend </span>
                    </div>
                  <div class="media px-2">
                   <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="<?php echo base_url()?>assets/admin/images/team/02.jpg" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 d-inline-block">Paul Flavius, </h6> <a class="pl-2 text-muted" href="#">Paulavius256@gmail.com</a> 
                       <p class="text-dark"> To <b>Me</b> </p>
                    </div>
                   </div>

                   <div class="mt-3">
                     <p>Hi Sir,</p>
                     <p>Give yourself the power of responsibility</p>
                     <p>Make a list of your achievements toward your long-term goal and remind yourself that intentions don’t count, only action’s.</p>
                     <p class="mt-20">The first thing to remember about success is that it is a process – nothing more, nothing less. There is really no magic to it and it’s not reserved only for a select few people. As such, success really has nothing to do with luck, coincidence or fate. It really comes down to understanding the steps in the process and then executing on those steps.
                     There are basically six key areas to higher achievement. Some people will tell you there are four while others may tell you there are eight. One thing for certain though, is that irrespective of the number of steps the experts talk about, they all originate from the same roots.</p>
                   </div>

                  </div>
              </div>
            </div> 
          </div>
        </div>   
      </div> 
  </div> 


 
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

     <!--================================= wrapper 3 end -->

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
   function showMessage(){
    var x = document.getElementById("content-message");
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
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-tglspk'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Update Tanggal SPK Berhasil",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-tglp'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Tanggal penawaran berhasil diupdate",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#FF7F00'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-qc'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Update User Proyek QC Berhasil.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>