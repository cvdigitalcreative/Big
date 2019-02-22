<?php 
	/**
	 * 
	 */
	class M_laporan_harian extends CI_Model
	{
		
		function addLaporanHarian($noSPK,$tglSPK,$perpanjanganwaktu,$minggu,$hari,$proyek_id){
			$hsl =  $this->db->query("INSERT INTO laporan_harian(lh_noSPK, lh_tglSPK, lh_perpanjangan_waktu, lh_minggu, lh_hari, proyek_id) VALUES ('$noSPK','$tglSPK','$perpanjanganwaktu','$minggu','$hari','$proyek_id')");
			return $hsl; 
		}

		function getlaporan_byid($id){
			$hsl =  $this->db->query("SELECT laporan_harian.*,DATE_FORMAT(lh_tglSPK,'%d/%m/%Y') AS tglSPK,DATE_FORMAT(lh_tanggal,'%d/%m/%Y') AS tanggal, DATE_FORMAT(lh_perpanjangan_waktu,'%d/%m/%Y') AS perpanjanganwaktu FROM laporan_harian WHERE proyek_id='$id'");
			return $hsl; 
		}

		function getdata_byid($id){
			$hsl =  $this->db->query("SELECT * FROM data_harian WHERE lh_id='$id'");
			return $hsl; 
		}

		function addDataHarian($keahlian,$jkeahlian,$material_jenis,$j_material,$alat_yg_digunakan,$j_alat,$pekerjaan,$volume,$keterangan,$lh_id){
			$hsl =  $this->db->query("INSERT INTO data_harian(dh_keahlian, dh_jkeahlian, dh_material_jenis, dh_jumlah_material_terima, dh_alat_yg_digunakan, dh_jumlah_alat, dh_pekerjaan, dh_volume, dh_keterangan, lh_id) VALUES ('$keahlian','$jkeahlian','$material_jenis','$j_material','$alat_yg_digunakan','$j_alat','$pekerjaan','$volume','$keterangan','$lh_id')");
			return $hsl; 
		}

		function editDataHarian($dh_id,$keahlian,$jkeahlian,$material_jenis,$j_material,$alat_yg_digunakan,$j_alat,$pekerjaan,$volume,$keterangan){
			$hsl =  $this->db->query("UPDATE data_harian SET dh_keahlian='$keahlian', dh_jkeahlian='$jkeahlian', dh_material_jenis='$material_jenis', dh_jumlah_material_terima='$j_material', dh_alat_yg_digunakan='$alat_yg_digunakan', dh_jumlah_alat='$j_alat',dh_pekerjaan='$pekerjaan',dh_volume='$volume',dh_keterangan='$keterangan' WHERE dh_id='$dh_id'");
			return $hsl; 
		}

		function hapusDataHarian($id){
			$hsl =  $this->db->query("DELETE FROM data_harian WHERE dh_id='$id'");
			return $hsl; 
		}

		
	}
?>