<div class="content-wrapper" id="content-main" style="display: block;">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Tindakan Perbaikan</h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Tindakan Perbaikan</a></li>
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
                  <a href="#" onclick="showTindakanPerbaikan()" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Tambah Tindakan Perbaikan
                  </a>
            </div>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 20%;">Penulis</th>
                      <th style="width: 15%;">Tanggal</th>
                      <th style="width: 60%;">Masalah</th>
                      <th>Lihat Detail</th>
                  </tr>
              </thead>
              <tbody>

                <?php 
                  $no = 0;
                  foreach($data->result() as $row) : 
                  $no++;
                ?>
                  <tr>
                      <td><center><?php echo $no;?></td>
                      <td><?php echo $row->td_penulis;?></td>
                      <td><?php echo $row->tanggal;?></td>
                      <td><?php echo $row->td_masalah;?></td>
                      <td><a href="<?php echo base_url()?>TindakanPerbaikan/detail_tindakan_perbaikan/<?php echo $row->td_id;?>"><button class="btn btn-primary">Lihat Detail</button></a></td>
                  </tr>
                <?php endforeach;?>
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


    <!--=================================wrapper -->

    <div class="content-wrapper" id="content-tindakan-perbaikan" style="display: none;">
      <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Tindakan Perbaikan</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="#" onclick="showTindakanPerbaikan()">Tindakan Perbaikan</a></li>
              <li class="breadcrumb-item active">Form Tindakan Perbaikan</li>
            </ol>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
              <h5 class="mb-0"> Penerimaan Masalah</h5>
          </div>
      </div>
      <form action="<?php echo base_url()?>TindakanPerbaikan/AddTD" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                      <div class="form-group col-md-12">
                          <input type="hidden" name="xpenulis" value="<?php echo $this->session->userdata('nama');?>">
                          <label class="control-label">Masalah yang ditemukan / Kondisi Sekarang</label>
                          <textarea rows="4" class="form-control form-white" name="xmasalah"></textarea>
                          <label class="control-label mt-10">Analisis Sebab Akibat</label>
                          <textarea rows="4" class="form-control form-white" name="xanalisis"></textarea>
                      </div>
                  </div>
              </div>  
          </div>
          <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-51"> 
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Hari / Tanggal / Jam </label>
                    <input type="text" class="form-control" name="xhtj" placeholder="Senin / 11 Januari 2019 / 19:00" required />
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Nama Penemu Masalah</label>
                    <input type="text" class="form-control" name="xpenemu" placeholder="Budiawan" required />
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">Bagian Lokasi</label>
                      <input type="text" class="form-control" name="xlokasi" placeholder="Lokasi" required />
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
                          <textarea rows="8" class="form-control form-white" name="xPerbaikanKerja"></textarea>
                          
                      </div>
                  </div>
              </div>  
          </div>
          <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-51"> 
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-sm-2">P.Jawab</label>
                    <input type="text" class="form-control" name="xPerbaikanJawab" required />
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2">Target Tanggal Selesai</label>
                    <input type="date" class="form-control" name="xPerbaikanTanggalSelesai" required />
                  </div>
                  <div class="form-group">
                      <label class="control-label">Status</label>
                      <select class="custom-select mr-sm-2" name="xPerbaikanStatus" required>
                          <option selected value="">Pilih...</option>
                          <option value="1">Belum</option>
                          <option value="2">Selesai</option>                         
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
                          <textarea rows="8" class="form-control form-white" name="xTDKerja"></textarea>
                          
                      </div>
                  </div>
              </div>  
          </div>
          <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-51"> 
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-sm-2">P.Jawab</label>
                    <input type="text" class="form-control" name="xTDJawab" required/>
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2">Target Tanggal Selesai</label>
                    <input type="date" class="form-control" name="xTDTanggalSelesai" required />
                  </div>
                  <div class="form-group">
                      <label class="control-label">Status</label>
                       <select class="custom-select mr-sm-2" name="xTDStatus" required>
                          <option selected value="">Pilih...</option>
                          <option value="1">Belum</option>
                          <option value="2">Selesai</option>                         
                      </select>
                  </div>
                </div>
            </div>  
          </div>
      </div>

      <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-51"> 
          <div class="card-body" style="text-align: center;">
            <button type="submit" class="btn btn-primary">Kirim Tindakan Perbaikan</button>
          </div>
        </div>
      </div>
      </form>
      
     
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
<script>
  function showTindakanPerbaikan(){
    var x = document.getElementById("content-tindakan-perbaikan");
    var y = document.getElementById("content-main");
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
