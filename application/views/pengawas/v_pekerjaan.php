<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Daftar Pekerjaan</h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pekerjaan</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <?php if($persen1 >= 100 && $proyek_status == 2):?>
            <div class="col-xl-12 mb-10">
                  <a href="#" data-toggle="modal" data-target="#konfirmasi" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Konfirmasi
                  </a>
            </div>
            <?php elseif($proyek_status==3):?>
              <div class="col-xl-12 mb-10">
                  <a href="<?php echo base_url()?>Pengawas/Pekerjaan/batalkonfirmasi/<?php echo $proyek_id4?>" class="btn btn-danger btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Batal Konfirmasi
                  </a>
            </div>
            <?php endif;?>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>Pekerjaan</th>
                      <th>Volume</th>
                      <th>Pekerjaan Selesai</th>
                      <th>Progress(%)</th>
                      <th style="width:20px;">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($data_pekerjaan->result_array() as $i) :
                       $id                  = $i['dp_id'];
                       $pekerjaan           = $i['dp_jenis_pekerjaan'];
                       $satuan              = $i['dp_satuan'];
                       $volume              = $i['dp_volume'];
                       $perkerjaan_selesai  = $i['dp_progress'];
                       $proyek_id           = $i['proyek_id'];
                       $persen = ($perkerjaan_selesai/$volume)*100;
                       $persen1 = round($persen);
                  ?>
                  <tr>
                      <td><?php echo $pekerjaan;?></td>
                      <td><?php echo $volume." ".$satuan?></td>
                      <td><?php echo $perkerjaan_selesai." ".$satuan?></td>
                      <td><?php echo $persen1."%";?></td>
                      <td><a href="" data-toggle="modal" data-target="#edit-data<?php echo $id?>" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Update Pekerjaan</a></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
           </table>
          </div>
          </div>
        </div>   
      </div>

      <?php foreach ($data_pekerjaan->result_array() as $i) :
                       $id                  = $i['dp_id'];
                       $pekerjaan           = $i['dp_jenis_pekerjaan'];
                       $satuan              = $i['dp_satuan'];
                       $volume              = $i['dp_volume'];
                       $perkerjaan_selesai  = $i['dp_progress'];
                       $proyek_id           = $i['proyek_id'];
                  ?>
      <!-- Modal Add Data -->
        <div class="modal" tabindex="-1" role="dialog" id="edit-data<?php echo $id?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update data progress</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Pengawas/Pekerjaan/Update_Pekerjaan/<?php echo $proyek_id;?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Masukkan Jumlah Volume Perkejaan Yang Selesai</label>
                                    <input type="hidden" name="kode" value="<?php echo $id?>">
                                    <input class="form-control form-white" type="number" name="xpekerjaan_selesai" />
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
        <?php endforeach;?>

         <?php foreach ($data_pekerjaan->result_array() as $i) :
                       $id                  = $i['dp_id'];
                       $pekerjaan           = $i['dp_jenis_pekerjaan'];
                       $satuan              = $i['dp_satuan'];
                       $volume              = $i['dp_volume'];
                       $perkerjaan_selesai  = $i['dp_progress'];
                       $proyek_id           = $i['proyek_id'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="konfirmasi">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Pengawas/Pekerjaan/konfirmasi/<?php echo $proyek_id?>" method="post" >
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Apakah anda ingin mengkonfirmasi bahwa perkerjaan ini selesai?</p>
                                </div>
                            </div>          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ripple save-category" id="simpan">Konfirmasi</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach;?>   
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
                    text: "Anda telah mengkonfirmasi bahwa pekerjaan sudah selesai",
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
<?php elseif($this->session->flashdata('msg')=='Update'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Update Progress Pekerjaan Selesai",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
<?php elseif($this->session->flashdata('msg')=='batal'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Anda telah membatalkan konfirmasi bahwa pekerjaan sudah selesai",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#blue'
                });
        </script>
<?php else:?>
<?php endif;?>
