<?php
/**
 * 
 */
class Keuangan extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
        $this->load->model('m_proyek');
        $this->load->model('m_laporan');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}

	function laporan_keuangan($id){
		if($this->session->userdata("akses") == 3){	
				$y['title'] = "Laporan Keuangan";
				$x['data'] 	= $this->m_proyek->forDetailproyek($id);
				$x['data_laporan'] = $this->m_laporan->get_lk_by_id($id);
				$x['sum'] = $this->m_laporan->SUM($id);
				$this->load->view('v_header',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('pengawas/v_keuangan',$x);
			}else{
				redirect("");
			}
	}

	function save_laporan(){
		$proyek_id = $this->input->post('kode');
		$pengirim = $this->input->post('pengirim');
		$uang_masuk = $this->input->post('uang_masuk');
		$uang_keluar = $this->input->post('uang_keluar');
		$sisa_uang = $this->input->post('sisa_uang');
		$keterangan = $this->input->post('keterangan');

		$config['upload_path'] 	 = './assets/files/'; //path folder
	    $config['allowed_types'] = '*';
	    $config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['nota']['name']))
	    {
	        if ($this->upload->do_upload('nota'))
	        {
	            $fl = $this->upload->data();
	            $nota=$fl['file_name'];
	            $this->m_laporan->insert_laporan($pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$proyek_id);
	            echo $this->session->set_flashdata('msg','success');
				redirect("Pengawas/Keuangan/laporan_keuangan/$proyek_id");				
			}
	    }else{
			$this->m_laporan->insert_laporan_tanpa_nota($pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$proyek_id);	
			echo $this->session->set_flashdata('msg','success');
			redirect("Pengawas/Keuangan/laporan_keuangan/$proyek_id");	
		}	
	}
}
?>