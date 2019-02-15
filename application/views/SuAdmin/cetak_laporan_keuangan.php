
 <div class="content-wrapper">
      <div class="row" style="margin-left: 14rem;margin-right: 14rem;">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                      <div class="form-group col-md-12">
                          <form id="form" method="post">
                            <label class="control-label mt-10" for="Diterima">Nama penerima</label>
                            <input type="text" class="form-control form-white" id="penerima">
                            <button class="btn btn-primary" id="cetak">Cetak</button>
                          </form>
                      </div>
                  </div>
              </div>  
          </div>
      </div>
      
     <div id="spk" hidden>
         <h3><center>LAPORAN KEUANGAN KEUANGAN KAS PROYEK</center></h3>
         <div><p id="tanggal"></p></div>
         <table border="0" cellpadding="0" style="width:80%" >
            <tr>
              <?php foreach ($data->result() as $row): ?>
                <td> Proyek : <?php echo $row->proyek_nama;?></td>
              <?php endforeach;?>  
            </tr>
            <tr>
              <td id="xpenerima"></td>
            </tr>
        </table>
          <br>
             <table border="1" cellpadding="10" width="800">
              <tr>
                <td><b><center>No</b></td>
                <td><b><center>Tanggal</b></td>
                <td><b><center>Keterangan</b></td>
                <th><b><center>Uang Masuk</b></th>
                <th><b><center>Uang Keluar</b></th>
                <th><b><center>Sisa Uang</th>
              </tr>
                <?php
                  $no=0; 
                  foreach ($data_laporan->result() as $row): 
                  $no++;
                ?>
              <tr>
                <td><center><?php echo $no;?></td>
                <td><center><?php echo $row->tanggal?></td>
                <td><center><?php echo $row->lk_keterangan;?></td>
                <td><center><?php echo $row->lk_uang_masuk;?></td>
                <td><center><?php echo $row->lk_uang_keluar;?></td>
                <td><center><?php echo $row->lk_sisa_uang;?></td>
              </tr>
              <?php endforeach;?>
              <?php foreach ($sum->result_array() as $i) :
                       $j_uangMasuk   = $i['j_uangMasuk'];
                       $j_uangKeluar  = $i['j_uangKeluar'];
                       $j_sisaUang    = $i['j_sisaUang'];
                  ?> 
                  <tr>
                      <th colspan="3"><center>Jumlah</th>
                      <th><center><?php echo $j_uangMasuk;?></th>
                      <th><center><?php echo $j_uangKeluar;?></th>
                      <th><center><?php echo $j_sisaUang;?></th>
                  </tr>
                  <?php endforeach;?>
             </table>
             <br>
            <div style="max-width: 100%;display: flex;">
              <div style="max-width: 100%;margin-right: 46%;">
                <div style="max-width: 200px;"><p id="xxtanggal"></p></div>
                <div style="max-width: 200px;"><p>Yang menyerahkan,</p></div>
                <br>
                <br>
                <br>
                <div style="max-width: 60px;"><center>.................</center></div>
              </div>
            </div>
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

          if(mm==1) 
          {
            mm='Januari';
          }
          else if(mm == 2){
            mm='Febuari';
          }
          else if(mm == 3){
            mm='Maret';
          }
          else if(mm == 4){
            mm='April';
          }
          else if(mm == 5){
            mm='Mei';
          }
          else if(mm == 6){
            mm='Juni';
          }
          else if(mm == 7){
            mm='Juli';
          }
          else if(mm == 8){
            mm='Agustus';
          }
          else if(mm == 9){
            mm='September';
          }
          else if(mm == 10){
            mm='Oktober';
          }
          else if(mm == 11){
            mm='November';
          }
          else if(mm == 12){
            mm='Desember';
          }

          tanggal = dd+' '+mm+' '+yyyy;
          
          var penerima = $("#penerima").val();

          $("#xpenerima").text("Penerima : "+penerima);
          $("#xxtanggal").text("Palembang, "+tanggal);

          w=window.open();
          w.document.write($('#spk').html());
          w.print();
          w.close();
      })
  })
</script>