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

		function updatepekerjaan($progress,$id){
			$hsl=$this->db->query("UPDATE data_pekerjaan SET dp_progress='$progress' WHERE dp_id='$id'");
			return $hsl;
		}

		function SumPersen($proyek_id){
			$hsl=$this->db->query("SELECT SUM(dp_volume) AS sum_volume,SUM(dp_progress) AS sum_progress FROM data_pekerjaan WHERE proyek_id ='$proyek_id'");
			return $hsl;
		}
	}
?>