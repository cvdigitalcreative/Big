<?php 
	/**
	 * 
	 */
	class M_permintaan_barang extends CI_Model
	{
		function addPermintaanBarang($proyek_nama,$nama_barang,$spesifikasi,$jumlah,$satuan,$pemakaian,$proyek_id){
			$hasil = $this->db->query("INSERT INTO permintaan_barang(pb_proyek,pb_nama_barang,pb_spesifikasi,pb_jumlah,pb_satuan,pb_rencana_pemakaian,proyek_id) VALUES ('$proyek_nama','$nama_barang','$spesifikasi','$jumlah','$satuan','$pemakaian','$proyek_id')");
			return $hasil;
		}

		function getPBbyProyekId($proyek_id){
			$hasil = $this->db->query("SELECT permintaan_barang.*,DATE_FORMAT(pb_tanggal,'%d/%m/%Y %H:%i') AS tanggal FROM permintaan_barang WHERE proyek_id = '$proyek_id'");
			return $hasil;
		}
	}
?>