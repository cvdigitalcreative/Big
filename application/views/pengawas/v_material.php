
<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0">Laporan keuangan material</h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">laporan keuangan material</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body --> 
    <div class="row">
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <ul class="nav nav-tabs mb-10">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()?>Pengawas/Keuangan/laporan_koordinator/<?php echo $proyek_id;?>">Koordinator</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo base_url()?>Pengawas/Keuangan/laporan_material/<?php echo $proyek_id;?>">Material</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()?>Pengawas/Keuangan/laporan_upah/<?php echo $proyek_id;?>">Upah</a>
                </li>
              </ul>
            <div class="col-xl-12 mb-10">
                  <a href="" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Tambah Laporan Keuangan material
                  </a>
            </div>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>Tanggal</th>
                      <th>Nama Pembuat</th>
                      <th>Bahan</th>
                      <th>Keterangan</th>
                      <th>Uang Masuk</th>
                      <th>Uang Keluar</th>
                      <th>Sisa Uang</th>
                      <th>Upload Nota</th>
                      <th style="width:20px;">Status</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($data_laporan->result_array() as $i) :
                       $id            = $i['lm_id'];
                       $bahan         = $i['lm_bahan'];
                       $tanggal       = $i['tanggal'];
                       $pengirim      = $i['lm_pengirim'];
                       $keterangan    = $i['lm_keterangan'];
                       $uang_masuk    = $i['lm_uang_masuk'];
                       $uang_keluar   = $i['lm_uang_keluar'];
                       $sisa_uang     = $i['lm_sisa_uang'];
                       $nota          = $i['lm_nota'];
                  ?>
                  <tr>
                      <td><?php echo $tanggal;?></td>
                      <td><?php echo $pengirim;?></td>
                      <td><?php echo $bahan;?></td>
                      <td><?php echo $keterangan;?></td>
                      <td><?php echo $uang_masuk;?></td>
                      <td><?php echo $uang_keluar;?></td>
                      <td><?php echo $sisa_uang;?></td>
                      <?php if(empty($nota)):?>
                        <td><button class="btn btn-danger">Nota tidak ada</button></td>
                      <?php else:?>
                        <td><button class="btn btn-primary"><?php echo $nota?></button></td>
                      <?php endif;?>
                      <td>
                          <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#EditData<?php echo $id?>"><span class="ti-pencil"></span></a>
                      </td>
                  </tr>
                  <?php endforeach;?>
                   <?php foreach ($sum->result_array() as $i) :
                       $j_uangMasuk   = $i['j_uangMasuk'];
                       $j_uangKeluar  = $i['j_uangKeluar'];
                       $j_sisaUang    = $i['j_sisaUang'];
                  ?> 
                  <tr>
                      <th colspan="4" class="text-center">Jumlah</th>
                      <th><?php echo $j_uangMasuk;?></th>
                      <th><?php echo $j_uangKeluar;?></th>
                      <th><?php echo $j_sisaUang;?></th>
                  </tr>
                  <?php endforeach;?>
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
                    <form action="<?php echo base_url()?>Pengawas/Keuangan/save_material" method="post" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Material</label>
                                    <select class="form-control" name="bahan">
                                        <option selected value="">Pilih</option>
                                         <?php
                                            $no=0;
                                            foreach ($data_material->result_array() as $i) :
                                              $no++;
                                                 $bahan=$i['dm_bahan'];
                                              ?>
                                            <option value="<?php echo $bahan;?>"><?php echo $bahan;?></option>
                                          <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Keterangan</label>
                                    <textarea rows="4" class="form-control form-white" name="keterangan" required></textarea>    
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Uang Masuk</label>
                                    <input type="hidden" name="kode" value="<?php echo $proyek_id;?>">
                                    <input type="hidden" name="pengirim" value="<?php echo $this->session->userdata('nama'); ?>">
                                    <input class="form-control form-white" placeholder="0" type="number" name="uang_masuk" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Uang Keluar</label>
                                    <input class="form-control form-white" placeholder="0" type="number" name="uang_keluar" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Sisa Uang</label>
                                    <input class="form-control form-white" placeholder="0" type="number" name="sisa_uang" required/>
                                </div>
                                
                                <div class="col-md-12">
                                  <label class="control-label">Upload Nota</label>
                                  <input style="padding-left: 1px" class="form-control" type="file" name="nota"/>
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

        <?php foreach ($data_laporan->result_array() as $i) :
                       $id            = $i['lm_id'];
                       $bahan         = $i['lm_bahan'];
                       $tanggal       = $i['tanggal'];
                       $pengirim      = $i['lm_pengirim'];
                       $keterangan    = $i['lm_keterangan'];
                       $uang_masuk    = $i['lm_uang_masuk'];
                       $uang_keluar   = $i['lm_uang_keluar'];
                       $sisa_uang     = $i['lm_sisa_uang'];
                       $nota          = $i['lm_nota'];
        ?>
         <!-- Modal Add Data -->
        <div class="modal" tabindex="-1" role="dialog" id="EditData<?php echo $id?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Pengawas/Keuangan/update_material" method="post" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                            <div class="row">
                                <select class="form-control" name="bahan">
                                  <option selected value="">Pilih</option>
                                  <?php
                                    $no=0;
                                      foreach ($data_material->result_array() as $i) :
                                      $no++;
                                      $bahan1=$i['dm_bahan'];
                                  ?>
                                  <?php if($bahan == $bahan1):?>
                                    <option selected value="<?php echo $bahan;?>"><?php echo $bahan;?></option>
                                  <?php else:?>
                                    <option value="<?php echo $bahan;?>"><?php echo $bahan;?></option>
                                  <?php endif;?>
                                  <?php endforeach;?>
                                </select>
                                <div class="col-md-12">
                                    <label class="control-label">Keterangan</label>
                                    <textarea rows="4" class="form-control form-white" name="keterangan" required><?php echo $keterangan;?></textarea>    
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Uang Masuk</label>
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <input type="hidden" name="kode" value="<?php echo $proyek_id;?>">
                                    <input type="hidden" name="nota1" value="<?php echo $nota;?>">
                                    <input type="hidden" name="pengirim" value="<?php echo $this->session->userdata('nama'); ?>">
                                    <input class="form-control form-white" placeholder="200000" type="number" name="uang_masuk" value="<?php echo $uang_masuk;?>" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Uang Keluar</label>
                                    <input class="form-control form-white" placeholder="200000" type="number" name="uang_keluar" value="<?php echo $uang_keluar;?>" required/>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Sisa Uang</label>
                                    <input class="form-control form-white" placeholder="200000" type="number" name="sisa_uang" value="<?php echo $sisa_uang;?>" required/>
                                </div>
                                
                                <div class="col-md-12">
                                  <label class="control-label">Upload Nota</label>
                                  <input style="padding-left: 1px" class="form-control" type="file" name="nota"/>
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
                    text: "Data berhasil ditambahkan",
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
                    text: "Data diupdate",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php else:?>
<?php endif;?>