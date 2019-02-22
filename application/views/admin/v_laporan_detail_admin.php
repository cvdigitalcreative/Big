<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Data Laporan Harian</h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/ProjectAdmin/Harian/<?php echo $proyek_id?>" class="default-color">Laporan harian</a></li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <div class="col-xl-12 mb-10">
                  <a href="" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Cetak Laporan Harian
                  </a>
            </div>
            <!-- <div class="col-xl-12 mb-10">
                  <a href="" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Tambah Data Laporan Harian
                  </a>
            </div> -->
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th colspan="2" style="text-align: center;">Tenaga Keahlian</th>
                      <th colspan="2" style="text-align: center;">Material yang digunakan</th>
                      <th rowspan="2">Alat-alat yang digunakan</th>
                      <th rowspan="2">Jumlah</th>
                      <th rowspan="2">Pekerjaan</th>
                      <th rowspan="2">Volume</th>
                      <th rowspan="2">Keterangan</th>
                      <!-- <th rowspan="2">Aksi</th> -->
                  </tr>
                  <tr class="dark">
                        <th class="text-center">Keahlian</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Jenis Bahan</th>
                        <th class="text-center">Jumlah yang diterima</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($d_harian->result_array() as $i) :
                       $dh_id               = $i['dh_id'];
                       $keahlian            = $i['dh_keahlian'];
                       $jumlah_keahlian     = $i['dh_jkeahlian'];
                       $material_jenis      = $i['dh_material_jenis'];
                       $jumlah_material     = $i['dh_jumlah_material_terima'];
                       $alat_yg_digunakan   = $i['dh_alat_yg_digunakan'];
                       $jumlah_alat         = $i['dh_jumlah_alat'];
                       $pekerjaan           = $i['dh_pekerjaan'];
                       $volume              = $i['dh_volume'];
                       $keterangan          = $i['dh_keterangan'];
                  ?>
                  <tr>
                      <td><?php echo $keahlian;?></td>
                      <td><?php echo $jumlah_keahlian;?></td>
                      <td><?php echo $material_jenis;?></td>
                      <td><?php echo $jumlah_material;?></td>
                      <td><?php echo $alat_yg_digunakan;?></td>
                      <td><?php echo $jumlah_alat;?></td>
                      <td><?php echo $pekerjaan;?></td>
                      <td><?php echo $volume;?></td>
                      <td><?php echo $keterangan;?></td>
                      <!-- <td>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#editdata<?php echo $dh_id;?>"><span class="ti-pencil"></span></a>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#hapusdata<?php echo $dh_id;?>"><span class="ti-trash"></span></a>
                      </td> -->
                  </tr>
                  <?php endforeach;?>
              </tbody>
           </table>
          </div>
          </div>
        </div>   
      </div>
      <!-- Modal Add Data -->
        <!-- <div class="modal" tabindex="-1" role="dialog" id="tambah-data">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Pengawas/Laporan/addDataharian" method="post" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Keahlian</label>
                                    <input type="hidden" name="kode" value="<?php echo $lh_id?>">
                                    <input class="form-control form-white" type="text" name="xkeahlian"  />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jumlah Keahlian</label>
                                    <input class="form-control form-white" type="number" name="xjkeahlian" />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jenis Bahan Material</label>
                                    <input class="form-control form-white"  type="text" name="xjenismaterial" />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jumlah Material Yang Diterima</label>
                                    <input class="form-control form-white"  type="number" name="xjumlahmaterial" />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Alat-Alat Yang Digunakan</label>
                                    <input class="form-control form-white" type="text" name="xalat" />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jumlah Alat</label>
                                    <input class="form-control form-white" type="text" name="xjumlahalat" />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Pekerjaan</label>
                                    <input class="form-control form-white" type="text" name="xpekerjaan" />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Volume</label>
                                    <input class="form-control form-white" type="text" name="xvolume" />
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Keterangan</label>
                                    <input class="form-control form-white" type="text" name="xketerangan" />
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
        </div>  -->

        <!-- <?php foreach ($d_harian->result_array() as $i) :
          $dh_id               = $i['dh_id'];
          $keahlian            = $i['dh_keahlian'];
          $jumlah_keahlian     = $i['dh_jkeahlian'];
          $material_jenis      = $i['dh_material_jenis'];
          $jumlah_material     = $i['dh_jumlah_material_terima'];
          $alat_yg_digunakan   = $i['dh_alat_yg_digunakan'];
          $jumlah_alat         = $i['dh_jumlah_alat'];
          $pekerjaan           = $i['dh_pekerjaan'];
          $volume              = $i['dh_volume'];
          $keterangan          = $i['dh_keterangan'];
        ?> -->
        <!-- Modal edit Data -->
        <!-- <div class="modal" tabindex="-1" role="dialog" id="editdata<?php echo $dh_id?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Pengawas/Laporan/editDataharian" method="post" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Keahlian</label>
                                    <input type="hidden" name="kode" value="<?php echo $lh_id?>">
                                    <input type="hidden" name="kode1" value="<?php echo $dh_id?>">
                                    <input class="form-control form-white" type="text" name="xkeahlian" value="<?php echo $keahlian;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jumlah Keahlian</label>
                                    <input class="form-control form-white" type="number" name="xjkeahlian" value="<?php echo $jumlah_keahlian;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jenis Bahan Material</label>
                                    <input class="form-control form-white"  type="text" name="xjenismaterial" value="<?php echo $material_jenis;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jumlah Material Yang Diterima</label>
                                    <input class="form-control form-white"  type="number" name="xjumlahmaterial" value="<?php echo $jumlah_material;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Alat-Alat Yang Digunakan</label>
                                    <input class="form-control form-white" type="text" name="xalat" value="<?php echo $alat_yg_digunakan;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Jumlah Alat</label>
                                    <input class="form-control form-white" type="text" name="xjumlahalat" value="<?php echo $jumlah_alat;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Pekerjaan</label>
                                    <input class="form-control form-white" type="text" name="xpekerjaan" value="<?php echo $pekerjaan;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Volume</label>
                                    <input class="form-control form-white" type="text" name="xvolume" value="<?php echo $volume;?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Keterangan</label>
                                    <input class="form-control form-white" type="text" name="xketerangan" value="<?php echo $keterangan;?>"/>
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
        <?php endforeach;?>  -->

         <!-- <?php foreach ($d_harian->result_array() as $i) :
          $dh_id               = $i['dh_id'];
          $keahlian            = $i['dh_keahlian'];
          $jumlah_keahlian     = $i['dh_jkeahlian'];
          $material_jenis      = $i['dh_material_jenis'];
          $jumlah_material     = $i['dh_jumlah_material_terima'];
          $alat_yg_digunakan   = $i['dh_alat_yg_digunakan'];
          $jumlah_alat         = $i['dh_jumlah_alat'];
          $pekerjaan           = $i['dh_pekerjaan'];
          $volume              = $i['dh_volume'];
          $keterangan          = $i['dh_keterangan'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="hapusdata<?php echo $dh_id;?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body p-20">
                        <form action="<?php echo base_url()?>Pengawas/Laporan/hapusDataharian" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $dh_id;?>"/> 
                                    <input type="hidden" name="kode1" value="<?php echo $lh_id?>">
                                    <p>Apakah kamu yakin ingin menghapus data harian ini?</i></b></p>
                                </div>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach;?>     --> 
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

<?php if($this->session->flashdata('msg')=='update'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Update',
                    text: "Data Harian berhasil Diupdate.",
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
<?php elseif($this->session->flashdata('msg')=='delete'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Delete',
                    text: "Data berhasil didelete",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: 'red'
                });
        </script>
<?php else:?>
<?php endif;?>
