<?php

/**
 * 
 */
class M_foto extends CI_Model
{
	
	function foto_pam($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_pam(fp_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_pam($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_pam WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_depan($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_depan(ftd_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_depan($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_depan WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_belakang($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_belakang(fb_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_belakang($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_belakang WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_kanan($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_kanan(fk_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_kanan($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_kanan WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_kiri($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_kiri(fkr_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_kiri($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_kiri WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_tetangga_kanan($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_tetangga_kanan(ftk_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_tetangga_kanan($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_tetangga_kanan WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_tetangga_kiri($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_tetangga_kiri(ftkr_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_tetangga_kiri($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_tetangga_kiri WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_kwh_listrik($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_kwh_listrik(fkl_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_kwh_listrik($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_kwh_listrik WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_lantai($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_lantai(fl_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_lantai($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_lantai WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_dak($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_dak(fd_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_dak($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_dak WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_toilet($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_toilet(ft_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_toilet($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_toilet WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_tanah_belakang($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_tanah_belakang(ftb_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_tanah_belakang($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_tanah_belakang WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_parkiran($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_parkiran(fp_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_parkiran($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_parkiran WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_bahu_jalan($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_bahu_jalan(fbj_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_bahu_jalan($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_bahu_jalan WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_atap($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_atap(fa_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_atap($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_atap WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_folding_gate($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_folding_gate(ffg_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_folding_gate($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_folding_gate WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_pintu_pintu($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_pintu_pintu(fpp_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_pintu_pintu($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_pintu_pintu WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_dinding($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_dinding(fdd_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_dinding($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_dinding WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function foto_kondisi_bangunan($gambar,$proyek_id)
	{
		$hsl=$this->db->query("INSERT INTO foto_kondisi_bangunan(fkb_gambar,proyek_id) VALUES ('$gambar','$proyek_id')");
		return $hsl;
	}

	function get_foto_kondisi_bangunan($proyek_id){
		$hsl = $this->db->query("SELECT * FROM foto_kondisi_bangunan WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}

	function catatan($catatan, $proyek_id){
		$hsl=$this->db->query("INSERT INTO catatan(catatan_text,proyek_id) VALUES ('$catatan','$proyek_id')");
		return $hsl;
	}

	function get_catatan($proyek_id){
		$hsl = $this->db->query("SELECT * FROM catatan WHERE proyek_id = '$proyek_id'");
		return $hsl;
	}



}
?>