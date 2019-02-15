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
              <li class="breadcrumb-item active"><a href="<?php echo base_url()?>QC/ProjectQC/detailforQC/<?php echo $proyek_id;?>" class="default-color">Project Summary</a></li>
              <li class="breadcrumb-item active">Input Data Jadwal</li>
            </ol>
          </div>
          <?php endforeach; ?> 
        </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <div class="col-xl-12 mb-10" style="display: flex">
                  <div class="col-xl-6">
                      <a href="" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-block ripple m-t-20">
                          <i class="fa fa-plus pr-2"></i> Tambah Data
                      </a>
                  </div>
                  <div class="col-xl-6" >
                    <a href="<?php echo base_url()?>QC/ProjectQC/download_formatUpah" class="btn btn-primary btn-block ripple m-t-20">
                        <i class="fa fa-download pr-2"></i> Download Format Est.Upah
                    </a>
                  </div> 
            </div>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>Tanggal Upload</th>
                      <th>Nama File</th>
                      <th>Get Data</th>
                      <th>Download</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($file->result_array() as $i) :
                    $id = $i['pfu_id'];
                    $tanggal=$i['tanggal'];
                    $file_nama=$i['pfu_nama'];
                    $proyek_id=$i['proyek_id'];
                  ?> 
                  <tr>
                      <td><?php echo $tanggal;?></td>
                      <td class="h-blue"><?php echo $file_nama;?></td>
                      <?php 
                        $q=$this->db->query("SELECT * FROM data_upah WHERE proyek_id='$proyek_id'");
                        $c=$q->num_rows();
                        if($c == 0):
                      ?>
                        <td><a href="<?php echo base_url()?>QC/ProjectQC/getDataUpah/<?php echo $file_nama?>/<?php echo $proyek_id;?>"><button class="btn btn-primary">Get Data</button></a></td>
                      <?php else :?>
                        <td><a href="<?php echo base_url()?>QC/ProjectQC/hapusDataUpah/<?php echo $proyek_id;?>"><button class="btn btn-danger">Reset Data</button></a></td>
                      <?php endif;?>
                      <td><a href="<?php echo base_url()?>QC/ProjectQC/download_upah/<?php echo $id?>"><i class="fa fa-download"></i></a></td>
                  </tr>
                  <?php endforeach; ?> 
              </tbody>
           </table>
          </div>
          </div>
        </div>   
      </div>

      <?php foreach ($data->result_array() as $i) :
          $proyek_id=$i['proyek_id'];
      ?> 
      <!-- Modal Add Data -->
        <div class="modal" tabindex="-1" role="dialog" id="tambah-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>QC/ProjectQC/simpan_file_upah" method="post" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                      <div class="form-group">
                        <label for="BQ / Analisis Harga">File Upah</label>
                        <input type="hidden" name="kode" value="<?php echo $proyek_id;?>">
                        <input  class="form-control" type="file" name="upah" />
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
        <?php endforeach; ?>  
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
<script src="<?php echo base_url().'assets/admin/js/jquery.toast.min.js'?>"></script>
 
</body>
</html> 

<?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "File berhasil diupload.",
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
                    heading: 'Danger',
                    text: "File tidak berhasil diupload",
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
                    text: "Data pekerjaan berhasil diambil",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
<?php elseif($this->session->flashdata('msg')=='hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data pekerjaan berhasil dihapus",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: 'red'
                });
        </script>
    <?php else:?>

    <?php endif;?>