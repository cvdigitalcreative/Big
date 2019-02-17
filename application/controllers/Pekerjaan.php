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

	public function foto_pekerjaan($proyek_id){
		$id = $this->uri->segment(4);
		$y['title'] = 'Foto Pekerjaan';
		$x['proyek_id'] = $proyek_id;
		$x['dp_id'] = $id;
		$pekerjaan = $this->m_pekerjaan->getdataPekerjaanID($id);
		$jenis = $pekerjaan->row_array();
		$x['jenis_pekerjaan'] = $jenis['dp_jenis_pekerjaan'];
		$x['foto_pekerjaan'] = $this->m_pekerjaan->getFotoPekerjaan($proyek_id, $id);
		$this->load->view('v_header_khusus',$y);
		$this->load->view('v_foto_pekerjaan',$x);

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