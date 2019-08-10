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

    <!-- session admin -->

    <!-- akhir session -->
    <!-- Modal alert -->



    <!--  -->
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
                    <th>No</th>
                    <th>Nama Client</th>
                    <th>Perusahaan</th>
                    <th>Tanggal Pertemuan</th>
                    <th>Tempat Pertemuan</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $id=$i['id_jadwal_pertemuan'];
                       $id_client=$i['id_client'];
                       $nama_client=$i['nama_client'];
                       $nama_perusahaan=$i['nama_perusahaan'];
                       $tgl_pertemuan=$i['tgl_pertemuan'];
                       $tempat_pertemuan=$i['tempat_pertemuan'];
                       $deskripsi=$i['Deskripsi'];
                       $status_client=$i['status_client'];
                  ?>
                  <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $nama_client?></td>
                      <td><?php echo $nama_perusahaan?></td>
                      <td><?php echo $tgl_pertemuan?></td>
                      <td><?php echo $tempat_pertemuan?></td>
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
                    <form action="<?php echo base_url()?>Sales/Client/addjadwalpertemuan" method="post" enctype="multipart/form-data">
                      <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                    <label>Nama Client</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="xidclient" required>
                                       <option selected value="">Choose...</option>
                                          <?php
                                              $no=0;
                                              foreach ($data_client->result_array() as $i) :
                                              $no++;
                                              $id_client=$i['id_client'];
                                              $nama_client=$i['nama_client'];
                                          ?>
                                           <option value="<?php echo $id_client?>"><?php echo $nama_client;?></option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Perusahaan</label>
                                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="xnamaperusahaan" required>
                                       <option selected value="">Choose...</option>
                                          <?php
                                              $no=0;
                                              foreach ($data_client->result_array() as $i) :
                                              $no++;
                                              $id_client=$i['id_client'];
                                              $nama_perusahaan=$i['nama_perusahaan'];
                                          ?>
                                           <option value="<?php echo $id_client?>"><?php echo $nama_perusahaan;?></option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Tanggal Pertemuan</label>
                                      <input type="date" class="form-control" placeholder="Date" name="xtanggal" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Tempat Pertemuan</label>
                                      <input class="form-control form-white" placeholder="Tempat Pertemuan" type="text" name="xtempat" required/>
                                  </div>

                                  <div class="col-md-12">
                                      <label class="control-label">Deskripsi</label>
                                      <textarea rows="4" class="form-control form-white" placeholder="deskripsi" type="text" name="xdeskripsi" required/> </textarea>
                                  </div>

                               <!--    <div class="col-md-12">
                                    <label class="control-label">Photo</label>
                                    <input style="padding-left: 1px" class="form-control" type="file" name="filefoto" />
                                  </div> -->
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
                       $id=$i['id_jadwal_pertemuan'];
                       $id_client=$i['id_client'];
                       $nama_client=$i['nama_client'];
                       $nama_perusahaan=$i['nama_perusahaan'];
                       $tgl_pertemuan=$i['tgl_pertemuan'];
                       $tempat_pertemuan=$i['tempat_pertemuan'];
                       $deskripsi=$i['Deskripsi'];
                       $status_client=$i['status_client'];
                  ?>
         <!-- Modal Edit Data -->
         <div class="modal" tabindex="-1" role="dialog" id="EditData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                        <form action="<?php echo base_url()?>Sales/Client/editjadwalpertemuan" method="post" enctype="multipart/form-data">
                          <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Client</label>
                                      <input type="hidden" name="id" value="<?php echo $id;?>">

                                      <input class="form-control form-white" placeholder="Nama Cient" type="text" name="xnama" value="<?php echo $nama_client;?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Perusahaan</label>
                                      <input class="form-control form-white" placeholder="Nama Perusahaan" type="text" name="xperusahaan" value="<?php echo $nama_perusahaan;?>" required/>
                                  </div>

                                   <div class="col-md-12">
                                      <label class="control-label">Tanggal Pertemuan</label>
                                      <input class="form-control form-white" placeholder="Tanggal Pertemuan" type="date" name="xtanggal" value="<?php echo $tgl_pertemuan ?>" required/>
                                  </div>


                                   <div class="col-md-12">
                                      <label class="control-label">Tempat Pertemuan</label>
                                      <input class="form-control form-white" placeholder="Tempat Pertemuan" type="text" name="xtempat" value="<?php echo $tempat_pertemuan;?>" required/>
                                  </div>

                                  <div class="col-md-12">
                                      <label class="control-label">Deskripsi</label>
                                      <textarea rows="5" class="form-control form-white" placeholder="Deskripsi" type="text" name="xdeskripsi" value="<?php echo $deskripsi;?>" required/> <?php echo $deskripsi ?> </textarea>
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
                       $id=$i['id_jadwal_pertemuan'];
                       $id_client=$i['id_client'];
                       $nama_client=$i['nama_client'];
                       $nama_perusahaan=$i['nama_perusahaan'];
                       $tgl_pertemuan=$i['tgl_pertemuan'];
                       $tempat_pertemuan=$i['tempat_pertemuan'];
                       $deskripsi=$i['Deskripsi'];
                       $status_client=$i['status_client'];
                  ?>
        <!--Modal Delete Data -->
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Sales/Client/hapusjadwalpertemuan" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">                     
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $id;?>">
                                    <p>Apakah kamu yakin ingin menghapus Jadwal Client <b><i><?php echo $nama_client?></i></b></p>
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