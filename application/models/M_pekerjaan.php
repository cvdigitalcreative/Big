<?php
	/**
	 * 
	 */
	class M_pekerjaan extends CI_Model
	{
		
		function getdataPekerjaan($proyek_id){
			$hsl=$this->db->query("SELECT * FROM data_pekerjaan WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}

		function getdataPekerjaanID($dp_id){
			$hsl=$this->db->query("SELECT * FROM data_pekerjaan WHERE dp_id ='$dp_id'");
			return $hsl;
		}

		function updatepekerjaan($progress,$id){
			$hsl=$this->db->query("UPDATE data_pekerjaan SET dp_progress='$progress' WHERE dp_id='$id'");
			return $hsl;
		}

		function SumPersen($proyek_id){
			$hsl=$this->db->query("SELECT SUM(dp_volume) AS sum_volume,SUM(dp_progress) AS sum_progress FROM data_pekerjaan WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}

		function getFotoPekerjaan($proyek_id, $dp_id){
			$hsl=$this->db->query("SELECT * FROM foto_pekerjaan WHERE proyek_id ='$proyek_id' AND dp_id = '$dp_id'");
			return $hsl;
		}

		function insertFoto($foto,$proyek_id, $dp_id){
			$hsl=$this->db->query("INSERT INTO foto_pekerjaan(fpk_foto,dp_id,proyek_id) VALUES ('$foto','$dp_id','$proyek_id')");
			return $hsl;
		}

		function getdataFotoSS($proyek_id){
			$hsl=$this->db->query("SELECT * FROM foto_pesan WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}

		function insertFotoss($foto,$proyek_id){
			$hsl=$this->db->query("INSERT INTO foto_pesan(fpe_foto,proyek_id) VALUES ('$foto','$proyek_id')");
			return $hsl;
		}
	}
?>