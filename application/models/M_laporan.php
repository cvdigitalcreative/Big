<?php
class M_laporan extends CI_Model{

	function insert_laporan($pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$id){
		$hasil = $this->db->query("INSERT INTO laporan_keuangan(lk_pengirim,lk_keterangan,lk_uang_masuk,lk_uang_keluar,lk_sisa_uang,lk_nota,proyek_id) VALUES ('$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$nota','$id')");
		return $hasil;
	}

	function insert_laporan_tanpa_nota($pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$id){
		$hasil = $this->db->query("INSERT INTO laporan_keuangan(lk_pengirim,lk_keterangan,lk_uang_masuk,lk_uang_keluar,lk_sisa_uang,proyek_id) VALUES ('$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$id')");
		return $hasil;
	}

	function get_lk_by_id($id){
		$hsl=$this->db->query("SELECT laporan_keuangan.*,DATE_FORMAT(lk_tanggal,'%d/%m/%Y  %H:%i') AS tanggal FROM laporan_keuangan WHERE proyek_id ='$id'");
		return $hsl;
	} 

	function SUM($id){
		$hsl=$this->db->query("SELECT SUM(lk_uang_masuk) AS j_uangMasuk,SUM(lk_uang_keluar) AS j_uangKeluar,SUM(lk_sisa_uang) AS j_sisaUang FROM laporan_keuangan WHERE proyek_id ='$id'");
		return $hsl;
	}
}