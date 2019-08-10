<?php
class Login_Sales extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('v_login_sales');
    }

    function authadmin(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekAdminSales($u,$p);
        if($cadmin->num_rows() > 0){
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$u);
            $xcadmin=$cadmin->row_array();
            $idadmin=$xcadmin['id_sales'];
            $user_nama=$xcadmin['pengguna_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            redirect('Sales/Client');
        }
        else{
            redirect('Login_Sales/gagallogin');
        }
    }

    
        function gagallogin(){
            $url=base_url('Login_Sales');
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Username Atau Password Salah</div>');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('Login_Sales');
            redirect($url);
        }
}