<?php
/**
 * 
 */
class Laporan extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}

	function index(){
		if($this->session->userdata("akses") == 3){	
				$y['title'] = "Laporan Harian";
				$this->load->view('v_header',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('pengawas/v_laporan');
			}else{
				redirect("");
			}
	}

	function LaporanDetail(){
		if($this->session->userdata("akses") == 3){	
				$y['title'] = "Laporan Harian";
				$this->load->view('v_header',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('pengawas/v_laporan_detail');
			}else{
				redirect("");
			}
	}
}
?>