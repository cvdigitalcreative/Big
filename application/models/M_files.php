<?php
	/**
	 * 
	 */
	class M_files extends CI_Model
	{
		function simpan_file_bq($bq="",$proyek_id)
		{
			$hsl=$this->db->query("INSERT INTO proyek_file(pf_bq,proyek_id) VALUES ('$bq','$proyek_id')");
			return $hsl;
		}

		function simpan_file_jadwal($jadwal="",$proyek_id)
		{
			$hsl=$this->db->query("INSERT INTO proyek_file_jadwal(pfj_jadwal,proyek_id) VALUES ('$jadwal','$proyek_id')");
			return $hsl;
		}

		function simpan_file_upah($upah="",$proyek_id)
		{
			$hsl=$this->db->query("INSERT INTO proyek_file_upah(pfu_nama,proyek_id) VALUES ('$upah','$proyek_id')");
			return $hsl;
		}

		function simpan_file_bahan($bahan="",$proyek_id)
		{
			$hsl=$this->db->query("INSERT INTO proyek_file_bahan(pfb_nama,proyek_id) VALUES ('$bahan','$proyek_id')");
			return $hsl;
		}

		function get_file_bq_byid($proyek_id)
		{
			$hsl=$this->db->query("SELECT proyek_file.*,DATE_FORMAT(pf_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}

		function get_file_bq_download($id)
		{
			$hsl=$this->db->query("SELECT proyek_file.*,DATE_FORMAT(pf_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file WHERE pf_id ='$id'");
			return $hsl;
		}

		function get_file_jadwal_byid($proyek_id)
		{
			$hsl=$this->db->query("SELECT proyek_file_jadwal.*,DATE_FORMAT(pfj_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file_jadwal WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}

		function get_file_jadwal_download($id)
		{
			$hsl=$this->db->query("SELECT proyek_file_jadwal.*,DATE_FORMAT(pfj_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file_jadwal WHERE pfj_id='$proyek_id'");
			return $hsl;
		}

		function get_file_upah_byid($proyek_id)
		{
			$hsl=$this->db->query("SELECT proyek_file_upah.*,DATE_FORMAT(pfu_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file_upah WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}

		function get_file_upah_download($id)
		{
			$hsl=$this->db->query("SELECT proyek_file_upah.*,DATE_FORMAT(pfu_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file_upah WHERE pfu_id ='$id'");
			return $hsl;
		}

		function get_file_bahan_byid($proyek_id)
		{
			$hsl=$this->db->query("SELECT proyek_file_bahan.*,DATE_FORMAT(pfb_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file_bahan WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}

		function get_file_bahan_download($id)
		{
			$hsl=$this->db->query("SELECT proyek_file_bahan.*,DATE_FORMAT(pfb_tanggal,'%d/%m/%Y %H%i') AS tanggal FROM proyek_file_bahan WHERE pfb_id ='$id'");
			return $hsl;
		}

		public function data_pekerjaan($data)
		{
    		$this->db->insert_batch('data_pekerjaan', $data);
  		}

  		public function hapus_data_ppekerjaan($proyek_id)
  		{
  			$hsl=$this->db->query("DELETE FROM data_pekerjaan WHERE proyek_id ='$proyek_id'");
			return $hsl;
  		}

  		public function data_bahan($data)
		{
    		$this->db->insert_batch('data_material', $data);
  		}

  		public function hapus_data_bahan($proyek_id)
  		{
  			$hsl=$this->db->query("DELETE FROM data_material WHERE proyek_id ='$proyek_id'");
			return $hsl;
  		}

  		public function data_upah($data)
		{
    		$this->db->insert_batch('data_upah', $data);
  		}

  		public function hapus_data_upah($proyek_id)
  		{
  			$hsl=$this->db->query("DELETE FROM data_upah WHERE proyek_id ='$proyek_id'");
			return $hsl;
  		}
	
	}
?>