<div class="content-wrapper">
      <div class="row" style="margin-left: 14rem;margin-right: 14rem;">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                      <div class="form-group col-md-12">
                          <form id="form" method="post">
                            <label class="control-label mt-10" for="Diterima">Nama yang menyerahkan</label>
                            <input type="text" class="form-control form-white" id="penerima">
                            <button class="btn btn-primary" id="cetak">Cetak</button>
                          </form>
                      </div>
                  </div>
              </div>  
          </div>
      </div>
<style type="text/css" media="print">

@page {size: landscape;}

th, td {
  font-size: 8px;
  padding: 15px;
}

</style>   
     <div id="spk" hidden>
         <h3><center>LAPORAN HARIAN</center></h3>
         
         <table border="0" cellpadding="0" style="width:80%">
            <tr>
                <td> <b>Proyek</b> :  <?php echo $proyek_nama;?></td>
            </tr>
        </table>
         <?php foreach ($laporan_harian->result_array() as $i) :
                       $lh_id                 = $i['lh_id'];
                       $lh_noSPK              = $i['lh_noSPK'];
                       $lh_tglSPK             = $i['tglSPK'];
                       $lh_tanggal            = $i['tanggal'];
                       $lh_perpanjangan_waktu = $i['perpanjanganwaktu'];
                       $lh_minggu             = $i['lh_minggu'];
                       $lh_hari               = $i['lh_hari'];
                       $proyek_id             = $i['proyek_id'];
        ?>
        <table border="1" cellpadding="4" width="100%" style="border-collapse: collapse;">
            <tr>
                <td><b>No.Spk</b> : <?php echo $lh_noSPK;?></td>
                <th rowspan="2"><center>Perpanjangan Waktu</center></th>
                <th colspan="3"><center>Periode</center></th>   
            </tr>
            <tr>
                <td><b>Tanggal SPK</b> : <?php echo $lh_tglSPK;?></td>
                <th><center>Tanggal</center></th>
                <th><center>Minggu</center></th>
                <th><center>Hari</center></th>
            </tr>
            <tr>
                <td><b>Waktu Pelaksanaan</b> : </td>
                <td><center><?php echo $lh_perpanjangan_waktu;?></center></td>
                <td><center><?php echo $lh_tanggal;?></center></td>
                <td><center><?php echo $lh_minggu;?></center></td>
                <td><center><?php echo $lh_hari;?></center></td>
            </tr>

        </table>
        <?php endforeach;?>
          <br>
             <table border="1" cellpadding="4" style="border-collapse: collapse;" width="100%">
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
                <?php foreach ($data_harian->result_array() as $i) :
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
                  </tr>
                  <?php endforeach;?>
                  <tr>
                    <td colspan="5"></td>
                    <th colspan="2"><center>Keadaan cuaca hari ini</center></th>
                    <th colspan="2"><center>Jumlah jam hujan</center></th>
                  </tr>
                  <tr>
                    <td colspan="5" rowspan="3">
                      <p>Pekerjaan dimulai dari jam 08.00 pagi s/d 17.00 Sore</p>
                      <p>Jam Kerja(Sepenuhnya dapat/ Sebagian tidak dapat digunakan untuk bekerja)</p>
                      <p>Karena :</p>
                    </td>
                    <th>Pagi</th>
                    <th>Cerah</th>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <th>Siang</th>
                    <th>Cerah</th>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <th>Sore</th>
                    <th>Cerah</th>
                    <td colspan="2"></td>
                  </tr>
              </tbody>
             </table>
             <br>
            <div style="max-width: 100%;display: flex;">
              <div style="max-width: 100%;margin-right: 46%;">
                <div style="max-width: 200px;"><p id="xxtanggal"></p></div>
                <div style="max-width: 200px;"><p>Yang menyerahkan,</p></div>
                <br>
                <br>
                
                <div style="max-width: 60px;"><center>.................</center></div>
                <div id="xpenerima"></div>
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

          tanggal = dd+" "+mm+" "+yyyy;
          
          var penerima = $("#penerima").val();

          $("#xpenerima").text(penerima);
          $("#xxtanggal").text("Palembang, "+tanggal);

          w=window.open();
          w.document.write($('#spk').html());
          w.print();
          w.close();
      })
  })
</script>