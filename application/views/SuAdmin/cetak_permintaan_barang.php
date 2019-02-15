 <div class="content-wrapper">
      <div class="row" style="margin-left: 14rem;margin-right: 14rem;">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                      <div class="form-group col-md-12">
                          <form id="form" method="post">
                          
                          <label class="control-label mt-10" for="No">No</label>
                          <input type="text" class="form-control form-white" id="nomor">
                          <label class="control-label mt-10" for="Pemohonan">Nama Pemohon</label>
                          <input type="text" class="form-control form-white" id="pemohon">
                          <label class="control-label mt-10" for="Diterima">Nama Diterima</label>
                          <input type="text" class="form-control form-white" id="diterima">
                          <label class="control-label mt-10" for="Menyetujui">Menyetujui</label>
                          <input type="text" class="form-control form-white" id="menyetujui">
                          <button class="btn btn-primary" id="cetak">Cetak</button>
                          </form>
                      </div>
                  </div>
              </div>  
          </div>
      </div>
      
     <!-- <?php foreach ($dataPB->result() as $row): ?> -->
     <div id="spk" hidden>
         <h3><center>PERMINTAAN BARANG</center></h3>
         <div><p id="tanggal"></p></div>
         <table border="0" cellpadding="0" style="width:80%" >
            <tr>
              <?php foreach ($data->result() as $row): ?>
                <td>Bagian / Proyek : <?php echo $row->proyek_nama;?></td>
              <?php endforeach;?>
              <td><p>Nomor</p></td>
              <td>:</td>
              <td><p id="nomor1"></p></td>
            </tr>
        </table>
          <br>
             <table border="1" cellpadding="10" width="800">
              <tr>
                <td><b><center>No</b></td>
                <td><b><center>Nama Barang</b></td>
                <td><b><center>Spesifikasi</b></td>
                <td><b><center>Jumlah</b></td>
                <td><b><center>Satuan</b></td>
                <td><b><center>Rencana Pemakaian</b></td>
              </tr>
                <?php
                  $no=0; 
                  foreach ($dataPB->result() as $row): 
                  $no++;
                ?>
              <tr>
                <td><center><?php echo $no;?></td>
                <td><center><?php echo $row->pb_nama_barang;?></td>
                <td><center><?php echo $row->pb_spesifikasi;?></td>
                <td><center><?php echo $row->pb_jumlah;?></td>
                <td><center><?php echo $row->pb_satuan;?></td>
                <td><center><?php echo $row->pb_rencana_pemakaian;?></td>
              </tr>
               <?php endforeach;?>
             </table>
             <br>
            <div style="max-width: 100%;display: flex;">
              <div style="max-width: 100%;margin-right: 46%;">
                <div style="max-width: 60px;"><center>Pemohon</center></div>
                <br>
                <br>
                <br>
                <div style="max-width: 60px;"><center>.................</center></div>
                <div style="max-width: 150px;"><div id="pemohon1"></div></div>
              </div>
              <div style="max-width: 100%;margin-right: 20%;">
                <div style="max-width: 60px;"><center>Pemohon</center></div>
                <br>
                <br>
                <br>
                <div style="max-width: 60px;"><center>.................</center></div>
                <div style="max-width: 150px;"><div id="penerima1"></div></div>
              </div>
              <div style="max-width: 100%;">
                <div style="max-width: 60px;"><center>Pemohon</center></div>
                <br>
                <br>
                <br>
                <div style="max-width: 60px;"><center>.................</center></div>
                <div style="max-width: 150px;"><div id="menyetujui1"></div></div>
              </div>
            </div>

            <!-- <div style="max-width: 100%; display: flex;">
              <div style="max-width: 60px;margin-right: 50%">.................</div>
              <div style="max-width: 60px;margin-right: 20%">.................</div>
              <div style="max-width: 60px;">.................</div>
            </div>
            <div style="max-width: 100%; display: flex;">
              <div style="max-width: 150px;margin-right: 46.5%"></div>
              <div style="max-width: 150px;margin-right: 18.5%"><div id="penerima1"></div></div>
              <div style="max-width: 150px;"><div id="menyetujui1"></div></div>
            </div> -->
           
             
      </div>
      <!-- <?php endforeach;?> -->
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



<script type="text/javascript">
  $(document).ready(function(){
  
      $("#cetak").click(function(){
          var tanggal = new Date();
          var dd = tanggal.getDate();

          var mm = tanggal.getMonth()+1; 
          var yyyy = tanggal.getFullYear();
          if(dd<10) 
          {
              dd='0'+dd;
          } 

          if(mm<10) 
          {
              mm='0'+mm;
          } 

          tanggal = dd+'-'+mm+'-'+yyyy;
          
          nomor = $("#nomor").val();
          pemohon = $("#pemohon").val();
          diterima = $("#diterima").val();
          menyetujui = $("#menyetujui").val();

          $("#tanggal").text("Tanggal : "+tanggal);
          $("#nomor1").text(nomor);
          $("#pemohon1").text(pemohon);
          $("#penerima1").text(diterima);
          $("#menyetujui1").text(menyetujui);
          // // $("#nama_SP").text(SP);
          // // $("#nama_KT").text(KT);
          // // $("#badge_KT_form").text("Badge No."+Badge_KT);

          w=window.open();
          w.document.write($('#spk').html());
          w.print();
          w.close();
      })
  })
</script>