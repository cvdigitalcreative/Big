<?php
class LoginQC extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('v_loginQC');
    }

    function authqc(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekqc($u,$p);
        if($cadmin->num_rows() > 0)
        {
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$u);
            $xcadmin=$cadmin->row_array();
            $this->session->set_userdata('akses','4');
            $idadmin=$xcadmin['qc_id'];
            $user_nama=$xcadmin['qc_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            redirect("QC/ProjectQC");
        }
        else{
            redirect('LoginQC/gagallogin');
        }
    }

    function gagallogin(){
        $url=base_url('LoginQC');
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Username Atau Password Salah</div>');
        redirect($url);
    }
    
    function logout_qc(){
        $this->session->sess_destroy();
            $url=base_url('LoginQC');
        redirect($url);
    }
}