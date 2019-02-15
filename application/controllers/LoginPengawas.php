<?php
class LoginPengawas extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('v_loginPengawas');
    }
   
    function authpengawas(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekpengawas($u,$p);
        if($cadmin->num_rows() > 0)
        {
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$u);
            $xcadmin=$cadmin->row_array();
            $this->session->set_userdata('akses','3');
            $idadmin=$xcadmin['pengawas_id'];
            $user_nama=$xcadmin['pengawas_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            redirect("Pengawas/ProjectPengawas");
        }
        else{
            redirect('Login/gagallogin');
        }
    }
    
        function gagallogin(){
            $url=base_url('LoginPengawas');
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Username Atau Password Salah</div>');
            redirect($url);
        }
        function logout_pengawas(){
            $this->session->sess_destroy();
            $url=base_url('LoginPengawas');
            redirect($url);
        }
}