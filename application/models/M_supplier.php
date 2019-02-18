<?php 
	/**
	 * 
	 */
	class m_supplier extends CI_Model
	{
		
		function get_all_supplier()
		{
			$hsl=$this->db->query("SELECT * FROM supplier");
			return $hsl;	
		}

		function simpan_supplier($nama,$alamat,$hp)
		{
			$hsl=$this->db->query("INSERT INTO supplier(supplier_nama,supplier_alamat,supplier_nohp) VALUES ('$nama','$alamat','$hp')");
			return $hsl;
		}

		function edit_supplier($id,$nama,$alamat,$hp)
		{
			$hsl=$this->db->query("UPDATE supplier set supplier_nama='$nama',supplier_alamat='$alamat',supplier_nohp='$hp' where supplier_id='$id'");
			return $hsl;
		}

		function hapus_supplier($kode)
		{
			$hsl=$this->db->query("DELETE from supplier where supplier_id='$kode'");
			return $hsl;
		}

	}
?>