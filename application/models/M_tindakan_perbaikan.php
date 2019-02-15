<?php
	/**
	 * 
	 */
	class M_tindakan_perbaikan extends CI_Model
	{
		
		function tindakan_perbaikan($nama,$masalah,$analisis,$htj,$penemu,$lokasi,$perbaikankerja,$perbaikanjawab,$perbaikantanggalselesai,$perbaikanstatus,$tindakanperbaikankerja,$tindakanperbaikanjawab,$tindakanperbaikantglselesai,$tindakanperbaikanstatus){
			$hsl = $this->db->query("INSERT INTO tindakan_perbaikan(td_penulis, td_masalah, td_analisis, td_htj, td_nama_penemu, td_bagian_lokasi, td_perbaikan_hh, td_perbaikan_j, td_perbaikan_ts, td_perbaikan_s, td_tindakan_perbaikan_hh, td_tindakan_perbaikan_j, td_tindakan_perbaikan_ts, td_tindakan_perbaikan_s) VALUES ('$nama','$masalah','$analisis','$htj','$penemu','$lokasi','$perbaikankerja','$perbaikanjawab','$perbaikantanggalselesai','$perbaikanstatus','$tindakanperbaikankerja','$tindakanperbaikanjawab','$tindakanperbaikantglselesai','$tindakanperbaikanstatus')");
			return $hsl;
		}

		function get_all_td(){
			$hsl = $this->db->query("SELECT tindakan_perbaikan.*,DATE_FORMAT(td_tanggal,'%d %M %Y') AS tanggal FROM tindakan_perbaikan");
			return $hsl;
		}

		function get_all_td_byid($id){
			$hsl = $this->db->query("SELECT tindakan_perbaikan.*,DATE_FORMAT(td_tanggal,'%d %M %Y') AS tanggal,DATE_FORMAT(td_perbaikan_ts,'%d %M %Y') AS perbaikants, DATE_FORMAT(td_tindakan_perbaikan_ts,'%d %M %Y') AS tindakanperbaikants FROM tindakan_perbaikan WHERE td_id='$id'");
			return $hsl;
		}
	}
?>