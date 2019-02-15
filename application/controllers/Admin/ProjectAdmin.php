<?php
/**
 * 
 */
class ProjectAdmin extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
		$this->load->model('m_proyek');
		$this->load->model('m_files');
        $this->load->model('m_laporan');
		$this->load->model('m_surveyor');
		$this->load->model('m_qc');
		$this->load->model('m_foto');
		$this->load->model('m_pengawas');
		$this->load->library('upload');
		$this->load->model('m_pekerjaan');
		$this->load->model('m_permintaan_barang');
		$this->load->helper('download');
	}

	//Admin Start Function Project
	function index(){
		if($this->session->userdata("akses") == 2){	
			$y['title'] = 'Admin';
			$x['proyek_fase'] = $this->m_proyek->getAllProyek(1);
			$x['proyek_proses'] = $this->m_proyek->getAllProyek(2);
			$x['proyek_selesai'] = $this->m_proyek->getAllProyek(3);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_project_admin',$x);
		}else{
			redirect("Login");
		}
	}



	function detailforAdmin($kode)
	{
		if($this->session->userdata("akses") == 2){	
			$y['title'] = 'Admin';
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
			$x['qc']				= $this->m_qc->get_all_qc();
			$x['data'] 				= $this->m_proyek->forDetailproyek($kode);
			$x['pengawas'] 			= $this->m_pengawas->get_all_pengawas();
			$x['data_laporan'] 		= $this->m_laporan->get_lk_by_id_limit($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_project_detail_admin',$x);
		}else{
			redirect("Login");
		}
	}

	function LihatBQ($kode){
		if($this->session->userdata("akses") == 2){
			$y['title']="BQ data";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['file'] = $this->m_files->get_file_bq_byid($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_lihat_bq',$x);
		}else{
			redirect("Login");
		}	
	}

	function LihatJadwal($kode){
		if($this->session->userdata("akses") == 2){
			$y['title']="Jadwal data";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['file'] = $this->m_files->get_file_jadwal_byid($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_lihat_jadwal',$x);
		}else{
			redirect("Login");
		}	
	}

	function LihatPermintaanBarang($kode){
		if($this->session->userdata("akses") == 2){
			$y['title']="Lihat Permintaan Barang";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['dataPB'] = $this->m_permintaan_barang->getPBbyProyekId($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_lihat_permintaan_barang',$x);
		}else{
			redirect("Login");
		}	
	}

	function LihatLaporanKeuangan($kode){
		if($this->session->userdata("akses") == 2){
			$y['title'] = "Laporan Keuangan Koordinator";
			$x['proyek_id'] = $kode;
			$x['data'] 	= $this->m_proyek->forDetailproyek($kode);
			$x['data_laporan'] = $this->m_laporan->get_lk_by_id($kode);
			$x['sum'] = $this->m_laporan->SUM($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_lihat_keuangan',$x);
		}else{
			redirect("Login");
		}	
	}

	function LihatLaporanMaterial($kode){
		if($this->session->userdata("akses") == 2){
			$y['title'] = "Laporan Keuangan Material";
			$x['proyek_id'] = $kode;
			$x['data'] 	= $this->m_proyek->forDetailproyek($kode);
			$x['data_laporan'] = $this->m_laporan->get_lm_by_id($kode);
			$x['sum'] = $this->m_laporan->SUM_lm($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_lihat_material',$x);
		}else{
			redirect("Login");
		}	
	}

	function LihatLaporanUpah($kode){
		if($this->session->userdata("akses") == 2){
			$y['title'] = "Laporan Keuangan Material";
			$x['proyek_id'] = $kode;
			$x['data'] 	= $this->m_proyek->forDetailproyek($kode);
			$x['data_laporan'] = $this->m_laporan->get_lu_by_id($kode);
			$x['sum'] = $this->m_laporan->SUM_lu($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_lihat_upah',$x);
		}else{
			redirect("Login");
		}	
	}


	function cetakPermintaanBarang($kode){
		if($this->session->userdata("akses") == 2){
			$y['title']="Cetak Permintaan Barang";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['dataPB'] = $this->m_permintaan_barang->getPBbyProyekId($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/cetak_permintaan_barang',$x);
		}else{
			redirect("Login");
		}
	}

	function cetakLaporanKeuangan($kode){
		if($this->session->userdata("akses") == 2){
			$id = $this->uri->segment(5);
			$x['data_pengirim'] = $this->m_laporan->get_pengirim_by_id($id);
			$y['title']="Cetak Laporan Keuangan";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['dataPB'] = $this->m_permintaan_barang->getPBbyProyekId($kode);
			$x['data_laporan'] = $this->m_laporan->get_lk_by_id($kode);
			$x['sum'] = $this->m_laporan->SUM($kode);
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/cetak_laporan_keuangan',$x);
		}else{
			redirect("Login");
		}
	}

	function download_bq(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_bq_byid($id);
		$q=$get_db->row_array();
		$file=$q['pf_bq'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function download_jadwal(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_jadwal_byid($id);
		$q=$get_db->row_array();
		$file=$q['pfj_jadwal'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function ubah_status0($kode){
		$this->m_proyek->updateStatus0($kode);

		echo $this->session->set_flashdata('msg','success');
		redirect("Admin/ProjectAdmin/detailforAdmin/$kode");
	}

	function ubah_status2($kode){
		$this->m_proyek->updateStatus2($kode);

		echo $this->session->set_flashdata('msg','success');
		redirect("Admin/ProjectAdmin/detailforAdmin/$kode");
	}

	function updateuserQC($kode){
		 $id = $this->input->post('qc');
		 $this->m_proyek->updateUserProyekQC($id,$kode);

		 echo $this->session->set_flashdata('msg','success-qc');
		 redirect("Admin/ProjectAdmin/detailforAdmin/$kode");
	}


	function updateTglPenawaran($kode){
		$tanggal = $this->input->post('tgl_penawaran');
		$this->m_proyek->updateTglPenawaran($tanggal,$kode);

		echo $this->session->set_flashdata('msg','success-tglp');
		redirect("Admin/ProjectAdmin/detailforAdmin/$kode");
	}

	function updateTglSPK($kode){
		$awalSPK 	= $this->input->post('tgl_awal_spk');
		$akhirSPK 	= $this->input->post('tgl_akhir_spk');
		$this->m_proyek->updateTglSPK($awalSPK,$akhirSPK,$kode);

		echo $this->session->set_flashdata('msg','success-tglspk');
		redirect("Admin/ProjectAdmin/detailforAdmin/$kode");
	}
	//Admin End Function Project
}
?>