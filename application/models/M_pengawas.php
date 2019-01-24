<?php
	/**
	 * 
	 */
	class M_pengawas extends CI_Model
	{
		function get_all_pengawas()
		{
			$hsl=$this->db->query("SELECT * FROM pengawas");
			return $hsl;	
		}

		function simpan_pengawas($nama,$alamat,$hp,$username,$password,$gambar)
		{
			$hsl=$this->db->query("INSERT INTO pengawas (pengawas_nama,pengawas_alamat,pengawas_hp,pengawas_username,pengawas_password,pengawas_foto) VALUES ('$nama','$alamat','$hp','$username','$password','$gambar')");
			return $hsl;
		}

		function edit_pengawas($id,$nama,$alamat,$hp,$username,$password,$gambar)
		{
			$hsl=$this->db->query("UPDATE pengawas set pengawas_nama='$nama',pengawas_alamat='$alamat',pengawas_hp='$hp',pengawas_username='$username',pengawas_password='$password',pengawas_foto = '$gambar' where pengawas_id='$id'");
			return $hsl;
		}

		function edit_pengawas_tanpa_gambar($id,$nama,$alamat,$hp,$username,$password)
		{
			$hsl=$this->db->query("UPDATE pengawas set pengawas_nama='$nama',pengawas_alamat='$alamat',pengawas_hp='$hp',pengawas_username='$username',pengawas_password='$password' where pengawas_id='$id'");
			return $hsl;
		}

		function hapus_pengawas($kode)
		{
			$hsl=$this->db->query("DELETE from pengawas where pengawas_id='$kode'");
		return $hsl;
		}
	}
?>