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
    <div class="row" id="surveyor" style="display: block">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <div class="col-xl-12 mb-10">
                  <a href="" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Tambah Laporan Harian
                  </a>
            </div>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>Proyek</th>
                      <th>No.SPK</th>
                      <th>Tanggal SPK</th>
                      <th>Tanggal Laporan</th>
                      <th style="width:20px;">Status</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Musi 4</td>
                      <td>4</td>
                      <td>14/10/2018</td>
                      <td>14/10/2018</td>
                      <td><a href="<?php echo base_url()?>Pengawas/Laporan/LaporanDetail"><button class="btn btn-warning">Belum Input Data</button></a></td>
                      <!-- <td>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#EditData"><span class="ti-pencil"></span></a>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#HapusData"><span class="ti-trash"></span></a>
                      </td> -->
                  </tr>
                  <tr>
                      <td>Musi 4</td>
                      <td>4</td>
                      <td>15/10/2018</td>
                      <td>15/10/2018</td>
                      <td><a href="#"><button class="btn btn-success">Sudah Input Data</button></a></td>
                      <!-- <td>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#EditData"><span class="ti-pencil"></span></a>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#HapusData"><span class="ti-trash"></span></a>
                      </td> -->
                  </tr>
              </tbody>
           </table>
          </div>
          </div>
        </div>   
      </div>
      <!-- Modal Add Data -->
        <div class="modal" tabindex="-1" role="dialog" id="tambah-data">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Nama Lengkap</label>
                                    <input class="form-control form-white" placeholder="Masukkan Nama Lengkap" type="text" name="xnama" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Username</label>
                                    <input class="form-control form-white" placeholder="Masukkan Username" type="text" name="xusername" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Password</label>
                                    <input class="form-control form-white" placeholder="Masukkan Password" type="password" name="xpassword" required/>
                                </div>
                                <div class="col-md-12 col mb-20">
                                  <label class="control-label">Jenis Kelamin</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadioInline2" name="customRadioInline2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Alamat Rumah</label>
                                    <textarea rows="4" class="form-control form-white" name="xdeskripsi">Masukkan Alamat Rumah</textarea>
                                    
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Email</label>
                                    <input class="form-control form-white" placeholder="Masukkan Email" type="email" name="xemail" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Nomor HP(Aktif WA)</label>
                                    <input class="form-control form-white" placeholder="Masukkan Nomor HP" type="text" name="xhp" required/>
                                </div>
                                
                                <div class="col-md-12">
                                  <label class="control-label">Photo</label>
                                  <input style="padding-left: 1px" class="form-control" type="file" name="filefotos[]" multiple required/>
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