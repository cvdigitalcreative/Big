<?php
	/**
	 * 
	 */
	class M_surveyor extends CI_Model
	{
		function get_all_surveyor()
		{
			$hsl=$this->db->query("SELECT * FROM surveyor");
			return $hsl;	
		}

		function simpan_surveyor($nama,$alamat,$hp,$username,$password,$gambar)
		{
			$hsl=$this->db->query("INSERT INTO surveyor (surveyor_nama,surveyor_alamat,surveyor_hp,surveyor_username,surveyor_password,surveyor_foto) VALUES ('$nama','$alamat','$hp','$username','$password','$gambar')");
			return $hsl;
		}

		function edit_surveyor($id,$nama,$alamat,$hp,$username,$password,$gambar)
		{
			$hsl=$this->db->query("UPDATE surveyor set surveyor_nama='$nama',surveyor_alamat='$alamat',surveyor_hp='$hp',surveyor_username='$username',surveyor_password='$password',surveyor_foto = '$gambar' where surveyor_id='$id'");
			return $hsl;
		}

		function edit_surveyor_tanpa_gambar($id,$nama,$alamat,$hp,$username,$password)
		{
			$hsl=$this->db->query("UPDATE surveyor set surveyor_nama='$nama',surveyor_alamat='$alamat',surveyor_hp='$hp',surveyor_username='$username',surveyor_password='$password' where surveyor_id='$id'");
			return $hsl;
		}

		function hapus_surveyor($kode)
		{
			$hsl=$this->db->query("DELETE from surveyor where surveyor_id='$kode'");
		return $hsl;
		}
	}
?>