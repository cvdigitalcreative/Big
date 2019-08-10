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

    <!-- session -->

       <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_sales WHERE id_sales='$id_admin'");
              $c=$q->row_array();
       ?>
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
                    <th>Nama Peminjam</th>
                    <th>Barang yang dipinjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal pengembalian</th>
                    <th>Kondisi Barang</th>
                    <th>foto</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $id = $i['id_pengembalian'];
                       $id_peminjam = $i['id_peminjam'];
                       $nama_peminjam = $i['nama_peminjam'];
                       $nama_barang = $i['nama_barang'];
                       $kondisi_barang = $i['kondisi_barang'];
                       $tanggal_peminjaman = $i['tanggal_peminjaman'];
                       $tanggal = $i['tanggal_pengembalian'];
                       $foto_barang = $i['foto_barang'];
                  ?>
                  <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $nama_peminjam ?></td>
                      <td><?php echo $nama_barang ?></td>
                      <td><?php echo $tanggal_peminjaman ?></td>
                      <td><?php echo $tanggal ?></td>
                      <td><?php echo $kondisi_barang ?></td>
                      <td> <img src="<?php echo base_url() ?>assets/images/<?php echo $foto_barang ?>" width="100px"></td>
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
                    <form action="<?php echo base_url()?>Asets/Aset/adddatapengembalian" method="post" enctype="multipart/form-data">
                      <div class="modal-body p-20">
                              <div class="row">

                                  <div class="col-md-12">
                                      <label>Nama peminjam</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="id" required>
                                       <option selected value="">Choose...</option>
                                          <?php
                                              $no=0;
                                              foreach ($data_peminjam->result_array() as $i) :
                                              $no++;
                                              $id=$i['id_peminjam'];
                                              $nama_barang=$i['nama_barang'];
                                              $nama_peminjam = $i['nama_peminjam'];
                                          ?>
                                           <option value="<?php echo $id?>"><?php echo $nama_peminjam;?></option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                       <label>Nama Barang yang dipinjam</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="nama_barang" required>
                                       <option selected value="">Choose...</option>
                                          <?php
                                              $no=0;
                                              foreach ($data_peminjam->result_array() as $i) :
                                              $no++;
                                              $id=$i['id_peminjam'];
                                              $nama_barang=$i['nama_barang'];
                                              $nama_peminjam = $i['nama_peminjam'];
                                          ?>
                                           <option value="<?php echo $id?>"><?php echo $nama_barang;?></option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Tanggal pengembalian</label>
                                      <input type="date" class="form-control form-white" placeholder="Tanggal" name="tanggal">
                                  </div>

                                    <div class="col-md-12">
                                       <label>Kondisi Barang</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="kondisi" required>
                                       <option selected value="">Choose...</option>
                                          <?php
                                              $no=0;
                                              foreach ($data_peminjam->result_array() as $i) :
                                              $no++;
                                              $id=$i['id_peminjam'];
                                              $nama_barang=$i['nama_barang'];
                                              $kondisi_barang = $i['kondisi_barang']
                                          ?>
                                           <option value="<?php echo $kondisi_barang?>"><?php echo $kondisi_barang;?></option>
                                              <?php endforeach;?>
                                    </select>
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
            $id = $i['id_pengembalian'];
            $id_peminjam = $i['id_peminjam'];
            $nama_peminjam = $i['nama_peminjam'];
            $nama_barang = $i['nama_barang'];
            $kondisi_barang = $i['kondisi_barang'];
            $tanggal = $i['tanggal_pengembalian'];
            $foto_barang = $i['foto_barang'];
        ?>
         <!-- Modal Edit Data -->
        <div class="modal" tabindex="-1" role="dialog" id="EditData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                        <form action="<?php echo base_url().'Asets/Aset/editpengembalian'?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body p-20">
                              <div class="row">
                                    <div class="col-md-12">
                                      <label>Nama peminjam</label>
                                    <input type="hidden" name="id_pengembalian" value="<?php echo $id ?>" >  
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="id" required/>
                                          <?php
                                              $no=0;
                                              foreach ($data_peminjam->result_array() as $i) :
                                              $no++;
                                              $id=$i['id_peminjam'];
                                              $nama_barang=$i['nama_barang'];
                                              $nama_peminjam = $i['nama_peminjam'];
                                          ?>
                                           <option value="<?php echo $id?>"><?php echo $nama_peminjam;?></option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                       <label>Nama Barang yang dipinjam</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="nama_barang" required/>
                                          <?php
                                              $no=0;
                                              foreach ($data_peminjam->result_array() as $i) :
                                              $no++;
                                              $id=$i['id_peminjam'];
                                              $nama_barang=$i['nama_barang'];
                                              $nama_peminjam = $i['nama_peminjam'];
                                          ?>
                                           <option value="<?php echo $id?>"><?php echo $nama_barang;?></option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Tanggal pengembalian</label>
                                      <input type="date" class="form-control form-white" placeholder="Tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                                  </div>

                                    <div class="col-md-12">
                                       <label>Kondisi Barang</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="kondisi" required>
                                          <?php
                                              $no=0;
                                              foreach ($data_peminjam->result_array() as $i) :
                                              $no++;
                                              $id=$i['id_peminjam'];
                                              $nama_barang=$i['nama_barang'];
                                              $kondisi_barang = $i['kondisi_barang'];
                                          ?>
                                           <option value="<?php echo $kondisi_barang?>"><?php echo $kondisi_barang;?></option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                
                                  <div class="col-md-12">
                                    <label class="control-label">Photo</label>
                                    <input type="hidden" name="foto_lama" value="<?php echo $foto_barang ?>">
                                    <input style="padding-left: 1px" class="form-control" type="file" name="filefoto" />
                                  </div>
                              </div>           

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success ripple save-category" id="simpan">Save</button>
                          </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

      <?php endforeach;?>


        <?php
          $no=0;
          foreach ($data->result_array() as $i) :
          $id = $i['id_pengembalian'];
          $id_peminjam = $i['id_peminjam'];
          $nama_peminjam = $i['nama_peminjam'];
          $nama_barang = $i['nama_barang'];
          $kondisi_barang = $i['kondisi_barang'];
          $tanggal = $i['tanggal_pengembalian'];
          $foto_barang = $i['foto_barang'];
        ?>
        <!--Modal Delete Data -->
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Asets/Aset/hapus_pengembalian" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">                     
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" value="<?php echo $id ?>" >
                                    <input type="hidden" name="gambar" value="<?php echo $foto_barang ?>" >
                                    <p>Apakah kamu yakin ingin menghapus Data Pengembalian <b><i><?php echo $nama_peminjam?></i></b></p>
                                </div>
                            </div>                  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success ripple save-category">Hapus</button>
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