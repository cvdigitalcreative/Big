<?php
	/**
	 * 
	 */
	class M_qc extends CI_Model
	{
		function get_all_qc()
		{
			$hsl=$this->db->query("SELECT * FROM qc");
			return $hsl;	
		}

		function simpan_qc($nama,$alamat,$hp,$username,$password,$gambar)
		{
			$hsl=$this->db->query("INSERT INTO qc (qc_nama,qc_alamat,qc_hp,qc_username,qc_password,qc_foto) VALUES ('$nama','$alamat','$hp','$username','$password','$gambar')");
			return $hsl;
		}

		function edit_qc($id,$nama,$alamat,$hp,$username,$password,$gambar)
		{
			$hsl=$this->db->query("UPDATE qc set qc_nama='$nama',qc_alamat='$alamat',qc_hp='$hp',qc_username='$username',qc_password='$password',qc_foto = '$gambar' where qc_id='$id'");
			return $hsl;
		}

		function edit_qc_tanpa_gambar($id,$nama,$alamat,$hp,$username,$password)
		{
			$hsl=$this->db->query("UPDATE qc set qc_nama='$nama',qc_alamat='$alamat',qc_hp='$hp',qc_username='$username',qc_password='$password' where qc_id='$id'");
			return $hsl;
		}

		function hapus_qc($kode)
		{
			$hsl=$this->db->query("DELETE from qc where qc_id='$kode'");
		return $hsl;
		}
	}
?>