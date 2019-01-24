
<!--=================================
 Main content -->

 <!--=================================
wrapper -->


 <div class="content-wrapper">
      <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Pengguna</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
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
                      <th>Photo</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis Kelamin</th>
                      <th>Kontak</th>
                      <th style="text-align:center;">Aksi</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data->result_array() as $i) :
                       $pengguna_id=$i['pengguna_id'];
                       $pengguna_nama=$i['pengguna_nama'];
                       $pengguna_jenkel=$i['pengguna_jenkel'];
                       $pengguna_email=$i['pengguna_email'];
                       $pengguna_username=$i['pengguna_username'];
                       $pengguna_password=$i['pengguna_password'];
                       $pengguna_nohp=$i['pengguna_nohp'];
                       $pengguna_level=$i['pengguna_level'];
                       $pengguna_photo=$i['pengguna_photo'];
                    ?>
                <tr>
                  <?php if(empty($pengguna_photo)):?>
                  <td><img width="70" height="70" alt="no picture" src="<?php echo base_url().'assets/admin/images/user_blank.png'?>"></td>
                  <?php else:?>
                  <td><img width="70" height="70" src="<?php echo base_url().'assets/admin/images/'.$pengguna_photo;?>"></td>
                  <?php endif;?>
                  <td><?php echo $pengguna_nama;?></td>
                  <td><?php echo $pengguna_email;?></td>
                  <?php if($pengguna_jenkel=='L'):?>
                        <td>Laki-Laki</td>
                  <?php else:?>
                        <td>Perempuan</td>
                  <?php endif;?>
                  <td><?php echo $pengguna_nohp;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $pengguna_id;?>"><span class="fa fa-pencil"></span></a>
                        <!-- <a class="btn" href="<?php echo base_url().'admin/pengguna/reset_password/'.$pengguna_id;?>"><span class="fa fa-refresh"></span></a> -->
                        <!-- <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $pengguna_id;?>"><span class="fa fa-trash"></span></a> -->
                  </td>
                </tr>
        <?php endforeach;?>
                </tbody>                
            </table>
            </div>
            </div>
          </div>   
        </div>
       



        <?php foreach ($data->result_array() as $i) :
          $pengguna_id=$i['pengguna_id'];
          $pengguna_nama=$i['pengguna_nama'];
          $pengguna_jenkel=$i['pengguna_jenkel'];
          $pengguna_email=$i['pengguna_email'];
          $pengguna_username=$i['pengguna_username'];
          $pengguna_password=$i['pengguna_password'];
          $pengguna_nohp=$i['pengguna_nohp'];
          $pengguna_level=$i['pengguna_level'];
          $pengguna_photo=$i['pengguna_photo'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="ModalEdit<?php echo $pengguna_id;?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body p-20">
                        <form action="<?php echo base_url().'Admin/Pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/> 
                                    <label class="control-label">Nama</label>
                                    <input class="form-control form-white" placeholder="Enter Nama" type="text" name="xnama" value="<?php echo $pengguna_nama;?>" required/>
                                </div>
                                 <div class="col-md-12">
                                    <label class="control-label">Email</label>
                                    <input class="form-control form-white" placeholder="Enter email" type="text" name="xemail" value="<?php echo $pengguna_email;?>" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <?php if($pengguna_jenkel=='L'):?>
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                    <?php else:?>
                                          <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                                            <label for="inlineRadio1"> Laki-Laki </label>
                                          </div>
                                          <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                                            <label for="inlineRadio2"> Perempuan </label>
                                          </div>
                                    <?php endif;?>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Username</label>
                                    <input class="form-control form-white" placeholder="Enter Username" type="text" name="xusername" value="<?php echo $pengguna_username;?>" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Password</label>
                                    <input class="form-control form-white" placeholder="Enter Password" type="password" name="xpassword"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Konfirmasi Password</label>
                                    <input class="form-control form-white" placeholder="Ulangi Password" type="password" name="xpassword2"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Kontak Person</label>
                                    <input class="form-control form-white" placeholder="Enter Kontak" type="text" name="xkontak" value="<?php echo $pengguna_nohp;?>" required/>
                                </div>  
                                <div class="col-md-12">
                                    <label class="control-label">Foto</label>                       
                                    <input class="form-control form-white" type="file" name="filefoto"/>
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
        <?php endforeach;?> 

        <?php foreach ($data->result_array() as $i) :
          $pengguna_id=$i['pengguna_id'];
          $pengguna_nama=$i['pengguna_nama'];
          $pengguna_jenkel=$i['pengguna_jenkel'];
          $pengguna_email=$i['pengguna_email'];
          $pengguna_username=$i['pengguna_username'];
          $pengguna_password=$i['pengguna_password'];
          $pengguna_nohp=$i['pengguna_nohp'];
          $pengguna_level=$i['pengguna_level'];
          $pengguna_photo=$i['pengguna_photo'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="ModalHapus<?php echo $pengguna_id;?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body p-20">
                        <form action="<?php echo base_url().'Admin/Kategori/hapus_kategori'?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/> 
                                    <p>Apakah kamu yakin ingin menghapus kategori <b><i><?php echo $pengguna_nama;?></i></b></p>
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
        <?php endforeach;?> 
    </div> 
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
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
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
                    text: "Berita Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Berita berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Berita Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>



