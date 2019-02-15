<?php
class M_laporan extends CI_Model{

	function insert_laporan($pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$proyek_id){
		$hasil = $this->db->query("INSERT INTO laporan_keuangan(lk_pengirim,lk_keterangan,lk_uang_masuk,lk_uang_keluar,lk_sisa_uang,lk_nota,proyek_id) VALUES ('$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$nota','$proyek_id')");
		return $hasil;
	}

	function insert_material($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$proyek_id){
		$hasil = $this->db->query("INSERT INTO laporan_material(lm_bahan,lm_pengirim,lm_keterangan,lm_uang_masuk,lm_uang_keluar,lm_sisa_uang,lm_nota,proyek_id) VALUES ('$bahan','$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$nota','$proyek_id')");
		return $hasil;
	}

	function insert_upah($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$proyek_id){
		$hasil = $this->db->query("INSERT INTO laporan_upah(lu_jenis_pekerjaan,lu_pengirim,lu_keterangan,lu_uang_masuk,lu_uang_keluar,lu_sisa_uang,lu_nota,proyek_id) VALUES ('$bahan','$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$nota','$proyek_id')");
		return $hasil;
	}

	function insert_laporan_tanpa_nota($pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$proyek_id){
		$hasil = $this->db->query("INSERT INTO laporan_keuangan(lk_pengirim,lk_keterangan,lk_uang_masuk,lk_uang_keluar,lk_sisa_uang,proyek_id) VALUES ('$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$proyek_id')");
		return $hasil;
	}

	function insert_material_tanpa_nota($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$proyek_id){
		$hasil = $this->db->query("INSERT INTO laporan_material(lm_bahan,lm_pengirim,lm_keterangan,lm_uang_masuk,lm_uang_keluar,lm_sisa_uang,proyek_id) VALUES ('$bahan','$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$proyek_id')");
		return $hasil;
	}

	function insert_upah_tanpa_nota($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$proyek_id){
		$hasil = $this->db->query("INSERT INTO laporan_upah(lu_jenis_pekerjaan,lu_pengirim,lu_keterangan,lu_uang_masuk,lu_uang_keluar,lu_sisa_uang,proyek_id) VALUES ('$bahan','$pengirim','$keterangan','$uang_masuk','$uang_keluar','$sisa_uang','$proyek_id')");
		return $hasil;
	}

	function update_laporan($keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$lk_id){
		$hasil = $this->db->query("UPDATE laporan_keuangan SET lk_keterangan='$keterangan',lk_uang_masuk='$uang_masuk',lk_uang_keluar='$uang_keluar',lk_sisa_uang='$sisa_uang',lk_nota='$nota' WHERE lk_id='$lk_id'");
		return $hasil;
	}

	function update_laporan_tanpa_nota($keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$lk_id){
		$hasil = $this->db->query("UPDATE laporan_keuangan SET lk_keterangan='$keterangan',lk_uang_masuk='$uang_masuk',lk_uang_keluar='$uang_keluar',lk_sisa_uang='$sisa_uang' WHERE lk_id='$lk_id'");
		return $hasil;
	}

	function update_material($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$id){
		$hasil = $this->db->query("UPDATE laporan_material SET lm_bahan='$bahan', lm_keterangan='$keterangan',lm_uang_masuk='$uang_masuk',lm_uang_keluar='$uang_keluar',lm_sisa_uang='$sisa_uang',lm_nota='$nota' WHERE lm_id='$id'");
		return $hasil;
	}

	function update_material_tanpa_nota($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$id){
		$hasil = $this->db->query("UPDATE laporan_material SET lm_bahan='$bahan', lm_keterangan='$keterangan',lm_uang_masuk='$uang_masuk',lm_uang_keluar='$uang_keluar',lm_sisa_uang='$sisa_uang' WHERE lm_id='$id'");
		return $hasil;
	}

	function update_upah($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$id){
		$hasil = $this->db->query("UPDATE laporan_upah SET lu_jenis_pekerjaan='$bahan', lu_keterangan='$keterangan',lu_uang_masuk='$uang_masuk',lu_uang_keluar='$uang_keluar',lu_sisa_uang='$sisa_uang',lu_nota='$nota' WHERE lu_id='$id'");
		return $hasil;
	}

	function update_upah_tanpa_nota($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$id){
		$hasil = $this->db->query("UPDATE laporan_upah SET lu_jenis_pekerjaan='$bahan', lu_keterangan='$keterangan',lu_uang_masuk='$uang_masuk',lu_uang_keluar='$uang_keluar',lu_sisa_uang='$sisa_uang' WHERE lu_id='$id'");
		return $hasil;
	}

	function get_lk_by_id($id){
		$hsl=$this->db->query("SELECT laporan_keuangan.*,DATE_FORMAT(lk_tanggal,'%d/%m/%Y') AS tanggal FROM laporan_keuangan WHERE proyek_id ='$id'");
		return $hsl;
	}

	function get_lm_by_id($id){
		$hsl=$this->db->query("SELECT laporan_material.*,DATE_FORMAT(lm_tanggal,'%d/%m/%Y') AS tanggal FROM laporan_material WHERE proyek_id ='$id'");
		return $hsl;
	}

	function get_lu_by_id($id){
		$hsl=$this->db->query("SELECT laporan_upah.*,DATE_FORMAT(lu_tanggal,'%d/%m/%Y') AS tanggal FROM laporan_upah WHERE proyek_id ='$id'");
		return $hsl;
	}

	function getdataMaterial($id){
		$hsl=$this->db->query("SELECT data_material.* FROM data_material WHERE proyek_id ='$id'");
		return $hsl;
	}  

	function getdataUpah($id){
		$hsl=$this->db->query("SELECT data_upah.* FROM data_upah WHERE proyek_id ='$id'");
		return $hsl;
	}

	function get_lk_by_id_limit($id){
		$hsl=$this->db->query("SELECT laporan_keuangan.*,DATE_FORMAT(lk_tanggal,'%d/%m/%Y  %H:%i') AS tanggal FROM laporan_keuangan WHERE proyek_id ='$id' LIMIT 1");
		return $hsl;
	}

	function get_pengirim_by_id($id){
		$hsl=$this->db->query("SELECT * FROM pengawas WHERE pengawas_id='$id'");
		return $hsl;
	}	

	function SUM($id){
		$hsl=$this->db->query("SELECT SUM(lk_uang_masuk) AS j_uangMasuk,SUM(lk_uang_keluar) AS j_uangKeluar,SUM(lk_sisa_uang) AS j_sisaUang FROM laporan_keuangan WHERE proyek_id ='$id'");
		return $hsl;
	}

	function SUM_lm($id){
		$hsl=$this->db->query("SELECT SUM(lm_uang_masuk) AS j_uangMasuk,SUM(lm_uang_keluar) AS j_uangKeluar,SUM(lm_sisa_uang) AS j_sisaUang FROM laporan_material WHERE proyek_id ='$id'");
		return $hsl;
	}

	function SUM_lu($id){
		$hsl=$this->db->query("SELECT SUM(lu_uang_masuk) AS j_uangMasuk,SUM(lu_uang_keluar) AS j_uangKeluar,SUM(lu_sisa_uang) AS j_sisaUang FROM laporan_upah WHERE proyek_id ='$id'");
		return $hsl;
	}
}