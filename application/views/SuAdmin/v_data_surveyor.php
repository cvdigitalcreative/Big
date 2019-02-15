<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Data Master | <?php echo $title?></h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Data Master </li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row" id="surveyor" style="display: block">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <div class="col-xl-12 mb-10">
                  <a href="" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Tambah Data
                  </a>
            </div>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $id=$i['surveyor_id'];
                       $nama=$i['surveyor_nama'];
                       $alamat=$i['surveyor_alamat'];
                       $hp=$i['surveyor_hp'];
                       $username=$i['surveyor_username'];
                       $password=$i['surveyor_password'];
                       $foto=$i['surveyor_foto'];
                  ?>
                  <tr>
                    <?php if(empty($foto)):?>
                      <td><img width="60" height="60" src="<?php echo base_url().'assets/images/a.jpg';?>"></td>
                    <?php else:?>
                      <td><img width="60" height="60" src="<?php echo base_url().'assets/images/'.$foto;?>"></td>
                    <?php endif;?>
                      <td><?php echo $nama?></td>
                      <td><?php echo $hp?></td>
                      <td><?php echo $alamat?></td>
                      <td><?php echo $username?></td>
                      <td><?php echo $password?></td>
                      <td>
                        <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#EditData<?php echo $id?>"><span class="ti-pencil"></span></a>
                        <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#HapusData<?php echo $id?>"><span class="ti-trash"></span></a>
                      </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
           </table>
          </div>
          </div>
        </div>   
      </div>

      <!-- Modal Add Data -->
        <div class="modal" tabindex="-1" role="dialog" id="tambah-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>SUAdmin/Data_User/addSurveyor" method="post" enctype="multipart/form-data">
                      <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Lengkap</label>
                                      <input class="form-control form-white" placeholder="Masukkan Nama Lengkap" type="text" name="xnama" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Nomor Hp</label>
                                      <input class="form-control form-white" placeholder="Masukkan nomor hp" type="number" name="xhp" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Alamat Rumah</label>
                                      <textarea rows="4" class="form-control form-white" name="xalamat"></textarea>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Username</label>
                                      <input class="form-control form-white" placeholder="Masukkan Username" type="text" name="xusername" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Password</label>
                                      <input class="form-control form-white" placeholder="Masukkan Password" type="text" name="xpassword" required/>
                                  </div>
                                  <div class="col-md-12">
                                    <label class="control-label">Photo</label>
                                    <input style="padding-left: 1px" class="form-control" type="file" name="filefoto" required/>
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

        <?php
          $no=0;
          foreach ($data->result_array() as $i) :
            $no++;
            $id=$i['surveyor_id'];
            $nama=$i['surveyor_nama'];
            $alamat=$i['surveyor_alamat'];
            $hp=$i['surveyor_hp'];
            $username=$i['surveyor_username'];
            $password=$i['surveyor_password'];
            $foto=$i['surveyor_foto'];
        ?>
         <!-- Modal Edit Data -->
        <div class="modal" tabindex="-1" role="dialog" id="EditData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                        <form action="<?php echo base_url()?>SUAdmin/Data_User/editSurveyor" method="post" enctype="multipart/form-data">
                          <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Lengkap</label>
                                      <input type="hidden" name="kode" value="<?php echo $id;?>">
                                      <input type="hidden" name="foto" value="<?php echo $foto;?>">
                                      <input class="form-control form-white" placeholder="Masukkan Nama Lengkap" type="text" name="xnama" value="<?php echo $nama;?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Nomor Hp</label>
                                      <input class="form-control form-white" placeholder="Masukkan nomor hp" type="number" name="xhp" value="<?php echo $hp;?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Alamat Rumah</label>
                                      <textarea rows="4" class="form-control form-white" name="xalamat"><?php echo $alamat;?></textarea>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Username</label>
                                      <input class="form-control form-white" placeholder="Masukkan Username" type="text" name="xusername" value="<?php echo $username;?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Password</label>
                                      <input class="form-control form-white" placeholder="Masukkan Password" type="text" name="xpassword" value="<?php echo $password;?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                    <label class="control-label">Photo</label>
                                    <input style="padding-left: 1px" class="form-control" type="file" name="filefoto"/>
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

        <?php
          $no=0;
          foreach ($data->result_array() as $i) :
            $no++;
            $id=$i['surveyor_id'];
            $nama=$i['surveyor_nama'];
            $alamat=$i['surveyor_alamat'];
            $hp=$i['surveyor_hp'];
            $username=$i['surveyor_username'];
            $password=$i['surveyor_password'];
            $foto=$i['surveyor_foto'];
        ?>
        <!--Modal Delete Data -->
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>SUAdmin/Data_User/hapusQC" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">                     
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $id;?>">
                                    <input type="hidden" name="gambar" value="<?php echo $foto;?>">
                                    <p>Apakah kamu yakin ingin menghapus surveyor <b><i><?php echo $nama?></i></b></p>
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
 
</body>
</html> 
<script src="<?php echo base_url().'assets/admin/js/jquery.toast.min.js'?>"></script>

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
                    text: "Data Berhasil disimpan ke database.",
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
                    text: "Data berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>