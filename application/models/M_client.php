<?php  

class M_client extends CI_Model{

	function get_all_client(){
		$hsl=$this->db->query("SELECT * FROM tbl_client ORDER BY id_client DESC");
		return $hsl;
	}	


	function get_client_by_id($idclient){
		$hsl=$this->db->query("SELECT * FROM tbl_client WHERE id_client='$idclient'");
		return $hsl;
	}


	function get_all_jadwal_pertemuan(){
		$hsl=$this->db->query("SELECT * FROM tbl_jadwal_pertemuan ORDER BY id_jadwal_pertemuan DESC");
		return $hsl;
	}

	function get_all_jadwal_pertemuan_by_id($id){
		$hsl=$this->db->query("SELECT * FROM tbl_jadwal_pertemuan WHERE id_jadwal_pertemuan='$id'");
		return $hsl;
	}

	function get_all_klaim_uang(){
		$hsl=$this->db->query("SELECT * FROM tbl_klaim_uang ORDER BY id_klaim_uang DESC");
		return $hsl;
	}



	// proses(){}
	function addclient($nama,$perusahaan,$jabatan,$contact,$id_sales,$nama_sales){
		$hsl=$this->db->query("INSERT INTO tbl_client (nama_client,nama_perusahaan,jabatan_client,contact_person,id_sales,nama_sales) VALUES ('$nama','$perusahaan','$jabatan','$contact','$id_sales','$nama_sales')");
		return $hsl;
	}

	function hapusjadwalpertemuan_by_id($id){
		return $this->db->query("DELETE FROM tbl_jadwal_pertemuan WHERE id_client=$id");
	}

	function hapusclient($id_client){
		return $this->db->query("DELETE FROM tbl_client WHERE id_client=$id_client");
	}

	function edit_client_by_id($id_client,$nama_client,$nama_perusahaan,$jabatan,$contact){
		$hsl = $this->db->query("UPDATE tbl_client set nama_client='$nama_client',nama_perusahaan='$nama_perusahaan',jabatan_client='$jabatan',contact_person='$contact'
			WHERE id_client='$id_client'");
		return $hsl;
	}

	function addjadwalpertemuan($idclient,$nama,$perusahaan,$tempat,$tanggal,$deskripsi,$id_sales,$nama_sales){
		$hsl=$this->db->query("INSERT INTO tbl_jadwal_pertemuan (id_client,nama_client,nama_perusahaan,tgl_pertemuan,tempat_pertemuan,Deskripsi,id_sales,nama_sales) VALUES ('$idclient','$nama','$perusahaan','$tempat','$tanggal','$deskripsi','$id_sales','$nama_sales')");
		return $hsl;
	}


	function editjadwalpertemuan($id,$nama,$nama_perusahaan,$tanggal,$tempat,$deskripsi){
		$hsl = $this->db->query("UPDATE tbl_jadwal_pertemuan set nama_client='$nama',nama_perusahaan='$nama_perusahaan',tgl_pertemuan='$tanggal',tempat_pertemuan='$tempat',Deskripsi='$deskripsi' WHERE id_jadwal_pertemuan='$id'");
		return $hsl;
	}

	function hapus_klaimuang_by_id(){
		return $this->db->query("DELETE FROM tbl_klaim_uang WHERE id_jadwal_pertemuan");
	}

	function hapusjadwalpertemuan($id){
		return $this->db->query("DELETE FROM tbl_jadwal_pertemuan WHERE id_jadwal_pertemuan='$id'");
	}

	function addklaimuang($id_jadwal_pertemuan,$nama_client,$nama_perusahaan,$tgl_pertemuan,$tempat_pertemuan,$biaya,$foto_klaim_uang,$id_sales,$nama_sales){
		$hsl = $this->db->query("INSERT INTO tbl_klaim_uang (id_jadwal_pertemuan,nama_client,nama_perusahaan,tgl_pertemuan,tempat_pertemuan,biaya_klaim_uang,foto_klaim_uang,id_sales,nama_sales) VALUES ('$id_jadwal_pertemuan','$nama_client','$nama_perusahaan','$tgl_pertemuan','$tempat_pertemuan','$biaya','$foto_klaim_uang','$id_sales','$nama_sales')");
		return $hsl;
	}

	function editklaimuang($id,$nama_client,$nama_perusahaan,$tgl_pertemuan,$tempat_pertemuan,$biaya,$gambar){
		$hsl = $this->db->query("UPDATE tbl_klaim_uang SET nama_client='$nama_client',nama_perusahaan='$nama_perusahaan',tgl_pertemuan='$tgl_pertemuan',tempat_pertemuan='$tempat_pertemuan',biaya_klaim_uang='$biaya',foto_klaim_uang='$gambar'");
		return $hsl;
	}

	function editklaimuang_tanpa_image($id,$nama_client,$nama_perusahaan,$tgl_pertemuan,$tempat_pertemuan,$biaya){
		return $this->db->query("UPDATE tbl_klaim_uang SET nama_client='$nama_client',nama_perusahaan='$nama_perusahaan',tgl_pertemuan='$tgl_pertemuan',tempat_pertemuan='$tempat_pertemuan',biaya_klaim_uang='$biaya' WHERE id_klaim_uang=$id");
	}

	function hapusklaimuang($id){
		return $this->db->query("DELETE FROM tbl_klaim_uang WHERE id_klaim_uang=$id");
	}

}
?>