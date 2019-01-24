<?php
class M_proyek extends CI_Model
{
    function addProyek($proyek,$petugas,$tanggal,$latitude,$longitude,$alamat,$status,$surveyor_id){
        $hasil=$this->db->query("INSERT into proyek(proyek_nama,proyek_petugas,proyek_tanggal,proyek_latitude,proyek_longitude,proyek_alamat,proyek_status,surveyor_id) values ('$proyek','$petugas','$tanggal','$latitude','$longitude','$alamat','$status','$surveyor_id') ");
        return $hasil;
    }

    function updateUserProyekQC($id,$kode){
        $hasil=$this->db->query("UPDATE proyek set qc_id='$id' where proyek_id='$kode'");
        return $hasil;
    }

    function updateUserProyekPengawas($id,$kode){
        $hasil=$this->db->query("UPDATE proyek set pengawas_id='$id' where proyek_id='$kode'");
        return $hasil;
    }

    function editProyek($id,$proyek_nama,$petugas,$latitude,$longitude,$alamat)
    {
        $hasil=$this->db->query("UPDATE proyek set proyek_nama='$proyek_nama',proyek_petugas='$petugas',proyek_latitude='$latitude',proyek_longitude='$longitude',proyek_alamat='$alamat' where proyek_id='$id'");
        return $hasil;
    }

    function hapusProyek($kode)
    {
        $hsl=$this->db->query("DELETE from proyek where proyek_id='$kode'");
        return $hsl;
    }

    function getAllProyek($status){
    	$hasil=$this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d/%m/%Y') AS tanggal FROM proyek WHERE proyek_status='$status'");
    	return $hasil;
    }

    function getProyekSurveyor($id,$status){
    	$hasil=$this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d/%m/%Y') AS tanggal FROM proyek WHERE proyek_status='$status' AND surveyor_id='$id'");
    	return $hasil;
    }

    function getProyekQC($id,$status){
        $hasil=$this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d/%m/%Y') AS tanggal FROM proyek WHERE proyek_status='$status' AND qc_id='$id'");
        return $hasil;
    }

    function getProyekPengawas($id,$status){
        $hasil=$this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d/%m/%Y') AS tanggal FROM proyek WHERE proyek_status='$status' AND pengawas_id='$id'");
        return $hasil;
    }

    function forDetailproyek($kode){
    	$hasil = $this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d/%m/%Y') AS tanggal FROM proyek WHERE proyek_id='$kode'");
    	return $hasil;
    }

    function getSurveyorProyek($kode){
        $hasil = $this->db->query("SELECT a.surveyor_id, b.surveyor_nama, b.surveyor_hp, b.surveyor_foto FROM proyek a, surveyor b WHERE proyek_id='$kode' AND a.surveyor_id = b.surveyor_id");
        return $hasil;
    }
    
    function getQCProyek($kode){
        $hasil = $this->db->query("SELECT a.qc_id, b.qc_nama, b.qc_hp, b.qc_foto FROM proyek a, qc b WHERE proyek_id='$kode' AND a.qc_id = b.qc_id");
        return $hasil;
    }
    
    function getPengawasProyek($kode){
        $hasil = $this->db->query("SELECT a.pengawas_id, b.pengawas_nama, b.pengawas_hp, b.pengawas_foto FROM proyek a, pengawas b WHERE proyek_id='$kode' AND a.pengawas_id = b.pengawas_id");
        return $hasil;
    }

    function updateStatus0($kode){
        $hasil = $this->db->query("UPDATE proyek SET proyek_status = 0 WHERE proyek_id='$kode'");
        return $hasil;
    }

    function updateStatus2($kode){
        $hasil = $this->db->query("UPDATE proyek SET proyek_status = 2 WHERE proyek_id='$kode'");
        return $hasil;
    }

    function updateTglPenawaran($tanggal,$kode){
        $hasil = $this->db->query("UPDATE proyek SET proyek_tgl_penawaran = '$tanggal' WHERE proyek_id='$kode'");
        return $hasil;
    }

    function updateTglSPK($awalSPK,$akhirSPK,$kode){
        $hasil = $this->db->query("UPDATE proyek SET proyek_tgl_awal_spk = '$awalSPK', proyek_tgl_akhir_spk = '$akhirSPK' WHERE proyek_id='$kode'");
        return $hasil;
    }
  
}?>
