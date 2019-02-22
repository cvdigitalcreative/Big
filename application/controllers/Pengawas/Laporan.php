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
		$this->load->model('m_proyek');
		$this->load->model('m_laporan_harian');
		$this->load->library('upload');
	}

	function index(){}

	function Harian($id){
		if($this->session->userdata("akses") == 3){	
			$y['title'] = "Laporan Harian";
			$x['id'] = $id;
			$x['data_harian'] = $this->m_laporan_harian->getlaporan_byid($id); 
			$this->load->view('v_header_pengawas',$y);
			$this->load->view('pengawas/v_sidebar');
			$this->load->view('pengawas/v_laporan',$x);
		}else{
			redirect("LoginPengawas");
		}
	}

	function LaporanDetail($id){
		if($this->session->userdata("akses") == 3){	
			$proyek_id  = $this->uri->segment(5);
			$y['title'] = "Laporan Harian";
			$x['lh_id'] = $id;
			$x['proyek_id'] = $proyek_id;
			$x['d_harian'] = $this->m_laporan_harian->getdata_byid($id); 
			$this->load->view('v_header_pengawas',$y);
			$this->load->view('pengawas/v_sidebar');
			$this->load->view('pengawas/v_laporan_detail',$x);
		}else{
			redirect("LoginPengawas");
		}
	}

	function addLaporan(){
		$noSPK = $this->input->post('xnoSPK');
		$tglSPK = $this->input->post('xtglSPK');
		$perpanjanganwaktu = $this->input->post('xperpanjanganwaktu');
		$minggu = $this->input->post('xminggu');
		$hari = $this->input->post('xhari');
		$proyek_id = $this->input->post('kode');


		$this->m_laporan_harian->addLaporanHarian($noSPK,$tglSPK,$perpanjanganwaktu,$minggu,$hari,$proyek_id);
		echo $this->session->set_flashdata('msg','success');
		redirect("Pengawas/Laporan/Harian/$proyek_id");
	}

	function addDataharian(){
		$keahlian = $this->input->post('xkeahlian');
		$jkeahlian = $this->input->post('xjkeahlian');
		$material_jenis = $this->input->post('xjenismaterial');
		$j_material = $this->input->post('xjumlahmaterial');
		$alat_yg_digunakan = $this->input->post('xalat');
		$j_alat = $this->input->post('xjumlahalat');
		$pekerjaan = $this->input->post('xpekerjaan');
		$volume = $this->input->post('xvolume');
		$keterangan = $this->input->post('xketerangan');
		$lh_id = $this->input->post('kode');
		
		$this->m_laporan_harian->addDataHarian($keahlian,$jkeahlian,$material_jenis,$j_material,$alat_yg_digunakan,$j_alat,$pekerjaan,$volume,$keterangan,$lh_id);
		echo $this->session->set_flashdata('msg','success');
		redirect("Pengawas/Laporan/LaporanDetail/$lh_id");

	}

	function editDataharian(){
		$keahlian = $this->input->post('xkeahlian');
		$jkeahlian = $this->input->post('xjkeahlian');
		$material_jenis = $this->input->post('xjenismaterial');
		$j_material = $this->input->post('xjumlahmaterial');
		$alat_yg_digunakan = $this->input->post('xalat');
		$j_alat = $this->input->post('xjumlahalat');
		$pekerjaan = $this->input->post('xpekerjaan');
		$volume = $this->input->post('xvolume');
		$keterangan = $this->input->post('xketerangan');
		$lh_id = $this->input->post('kode');
		$dh_id = $this->input->post('kode1');
				
		$this->m_laporan_harian->editDataHarian($dh_id,$keahlian,$jkeahlian,$material_jenis,$j_material,$alat_yg_digunakan,$j_alat,$pekerjaan,$volume,$keterangan);
		echo $this->session->set_flashdata('msg','update');
		redirect("Pengawas/Laporan/LaporanDetail/$lh_id");

	}

	function hapusDataharian(){
		$dh_id = $this->input->post('kode');
		$lh_id = $this->input->post('kode1');
				
		$this->m_laporan_harian->hapusDataHarian($dh_id);
		echo $this->session->set_flashdata('msg','delete');
		redirect("Pengawas/Laporan/LaporanDetail/$lh_id");

	}
}
?>