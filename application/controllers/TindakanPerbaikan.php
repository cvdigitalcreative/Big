<?php
	/**
	 * 
	 */
	class TindakanPerbaikan extends CI_Controller
	{
		
		function __construct()
		{
        	parent:: __construct();
        	$this->load->model('m_tindakan_perbaikan');
    	}

		function index(){
			// $this->load->view('v_header');
		}

		function tindakan_perbaikan_surveyor(){
			if($this->session->userdata("akses") == 1){	
				$y['title'] = 'Tindakan Perbaikan Surveyor';
				$this->load->view('v_header_surveyor',$y);
				$this->load->view('surveyor/v_sidebar');
				$this->load->view('v_list_td');
			}else{
				redirect("LoginSurveyor");
			}
		}

		function tindakan_perbaikan_qc(){
			if($this->session->userdata("akses") == 4){	
				$y['title'] = 'Tindakan Perbaikan Quality Control';
				$this->load->view('v_header_qc',$y);
				$this->load->view('QC/v_sidebar');
				$this->load->view('v_list_td');
			}else{
				redirect("LoginQC");
			}
		}

		function tindakan_perbaikan_pengawas(){
			if($this->session->userdata("akses") == 3){	
				$y['title'] = 'Tindakan Perbaikan Pengawas';
				$x['data'] = $this->m_tindakan_perbaikan->get_all_td();
				$this->load->view('v_header_pengawas',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('v_list_td',$x);
			}else{
				redirect("LoginPengawas");
			}
		}

		function tindakan_perbaikan_admin(){
			if($this->session->userdata("akses") == 2){	
				$y['title'] = 'Tindakan Perbaikan Admin';
				$x['data'] = $this->m_tindakan_perbaikan->get_all_td();
				$this->load->view('v_header',$y);
				$this->load->view('admin/v_sidebar');
				$this->load->view('v_list_td',$x);
			}else{
				redirect("Login");
			}
		}

		function detail_tindakan_perbaikan($id){
				$y['title'] = 'Tindakan Perbaikan Admin';
				$x['data'] = $this->m_tindakan_perbaikan->get_all_td_byid($id);
				$this->load->view('v_header_khusus',$y);
				$this->load->view('v_detail_TD',$x);
		}

		function AddTD(){
			$nama 							= $this->input->post('xpenulis');
			$masalah 						= $this->input->post('xmasalah');
			$analisis 						= $this->input->post('xanalisis');
			$htj 							= $this->input->post('xhtj');
			$penemu 						= $this->input->post('xpenemu');
			$lokasi 						= $this->input->post('xlokasi');
			$perbaikankerja 				= $this->input->post('xPerbaikanKerja');
			$perbaikanjawab 				= $this->input->post('xPerbaikanJawab');
			$perbaikantanggalselesai 		= $this->input->post('xPerbaikanTanggalSelesai');
			$perbaikanstatus 				= $this->input->post('xPerbaikanStatus');
			$tindakanperbaikankerja 		= $this->input->post('xTDKerja');
			$tindakanperbaikanjawab 		= $this->input->post('xTDJawab');
			$tindakanperbaikantglselesai 	= $this->input->post('xTDTanggalSelesai');
			$tindakanperbaikanstatus		= $this->input->post('xTDStatus');

			//add project
			$this->m_tindakan_perbaikan->tindakan_perbaikan($nama,$masalah,$analisis,$htj,$penemu,$lokasi,$perbaikankerja,$perbaikanjawab,$perbaikantanggalselesai,$perbaikanstatus,$tindakanperbaikankerja,$tindakanperbaikanjawab,$tindakanperbaikantglselesai,$tindakanperbaikanstatus);

			//show toast
			echo $this->session->set_flashdata('msg','success');

			//redirect page project
			redirect($this->agent->referrer());

		} 
	}
?>