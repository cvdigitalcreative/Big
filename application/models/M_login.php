<?php
class M_login extends CI_Model
{
    function cekadmin($username,$password){
        $hasil=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_username='$username' AND pengguna_password='$password' ");
        return $hasil;
    }

    function ceksurveyor($username,$password){
        $hasil=$this->db->query("SELECT * FROM surveyor WHERE surveyor_username='$username' AND surveyor_password='$password' ");
        return $hasil;
    }

    function cekqc($username,$password){
        $hasil=$this->db->query("SELECT * FROM qc WHERE qc_username='$username' AND qc_password='$password' ");
        return $hasil;
    }

    function cekpengawas($username,$password){
        $hasil=$this->db->query("SELECT * FROM pengawas WHERE pengawas_username='$username' AND pengawas_password='$password' ");
        return $hasil;
    }
  
}?>
