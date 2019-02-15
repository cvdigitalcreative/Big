<?php

/**
 * 
 */
class Pekerjaan extends CI_Controller
{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
		$this->load->model('m_pekerjaan');
		$this->load->library('upload');
	}

	function index(){

	}

	public function lihat_perkerjaan($proyek_id)
	{
		$y['title'] = "Lihat Perkerjaan";
		$x['data_pekerjaan'] = $this->m_pekerjaan->getdataPekerjaan($proyek_id); 
		$this->load->view('v_header_khusus',$y);
		$this->load->view('v_pekerjaan',$x);
	}


}
?>