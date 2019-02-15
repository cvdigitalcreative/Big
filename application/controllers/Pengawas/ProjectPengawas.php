<?php

/**
 * 
 */
class ProjectPengawas extends CI_Controller
{
	

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
		$this->load->model('m_proyek');
		$this->load->model('m_foto');
		$this->load->model('m_surveyor');
		$this->load->model('m_qc');
		$this->load->model('m_pengawas');
		$this->load->model('m_pekerjaan');
		$this->load->model('m_permintaan_barang');
		$this->load->library('upload');
	}
	
	//Surveyor Start Function Project
	function index(){
		if($this->session->userdata("akses") == 3){	
			$y['title'] = 'Daftar Proyek';
			$id=$this->session->userdata('idadmin');
			$x['proyek_proses'] = $this->m_proyek->getProyekPengawas($id,2);
			$x['proyek_selesai'] = $this->m_proyek->getProyekPengawas($id,3);
			$this->load->view('v_header_pengawas',$y);
			$this->load->view('pengawas/v_sidebar');
			$this->load->view('pengawas/v_project_pengawas',$x);
		}else{
			redirect("LoginPengawas");
		}
	}

	function detailforPengawas($kode)
	{
		if($this->session->userdata("akses") == 3){				
			$y['title'] = 'Pengawas';
			$x['pam'] 				= $this->m_foto->get_foto_pam($kode);
			$x['depan'] 			= $this->m_foto->get_foto_depan($kode);
			$x['belakang'] 			= $this->m_foto->get_foto_belakang($kode);
			$x['kanan'] 			= $this->m_foto->get_foto_kanan($kode);
			$x['kiri'] 				= $this->m_foto->get_foto_kiri($kode);
			$x['tetangga_kanan'] 	= $this->m_foto->get_foto_tetangga_kanan($kode);
			$x['tetangga_kiri'] 	= $this->m_foto->get_foto_tetangga_kiri($kode);
			$x['kwh_listrik'] 		= $this->m_foto->get_foto_kwh_listrik($kode);
			$x['lantai'] 			= $this->m_foto->get_foto_lantai($kode);
			$x['dak'] 				= $this->m_foto->get_foto_dak($kode);
			$x['toilet']			= $this->m_foto->get_foto_toilet($kode);
			$x['tanah_belakang'] 	= $this->m_foto->get_foto_tanah_belakang($kode);
			$x['parkiran'] 			= $this->m_foto->get_foto_parkiran($kode);
			$x['bahu_jalan'] 		= $this->m_foto->get_foto_bahu_jalan($kode);
			$x['foto_atap'] 		= $this->m_foto->get_foto_atap($kode);
			$x['folding_gate'] 		= $this->m_foto->get_foto_folding_gate($kode);
			$x['pintu_pintu'] 		= $this->m_foto->get_foto_pintu_pintu($kode);
			$x['dinding'] 			= $this->m_foto->get_foto_dinding($kode);
			$x['kondisi_bangunan'] 	= $this->m_foto->get_foto_kondisi_bangunan($kode);
			$x['catatan']		 	= $this->m_foto->get_catatan($kode);
			$x['userSurveyor'] 		= $this->m_proyek->getSurveyorProyek($kode);
			$x['userQC'] 			= $this->m_proyek->getQCProyek($kode);
			$x['userPengawas'] 		= $this->m_proyek->getPengawasProyek($kode);
			$x['data'] 				= $this->m_proyek->forDetailproyek($kode);
			$this->load->view('v_header_pengawas',$y);
			$this->load->view('pengawas/v_sidebar');
			$this->load->view('pengawas/v_project_pengawas_detail',$x);
		}else{
			redirect("LoginPengawas");
		}	
	}

	function permintaanBarang(){
		$proyek_id=$this->input->post('kode');
		$proyek_nama=$this->input->post('nama_proyek');
		$nama_barang=$this->input->post('xnamabarang');
		$spesifikasi=$this->input->post('xspesifikasi');
		$jumlah=$this->input->post('xjumlah');
		$satuan=$this->input->post('xsatuan');
		$pemakaian=$this->input->post('xpemakaian');

		$this->m_permintaan_barang->addPermintaanBarang($proyek_nama,$nama_barang,$spesifikasi,$jumlah,$satuan,$pemakaian,$proyek_id);
		echo $this->session->set_flashdata('msg','success');
		redirect("Pengawas/ProjectPengawas/detailforPengawas/$proyek_id");

	}

	//Surveyor End Function Project
}
?>