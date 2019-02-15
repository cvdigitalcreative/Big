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

	function laporan_koordinator($id){
		if($this->session->userdata("akses") == 3){	
				$y['title'] = "Laporan Keuangan Koordinator";
				$x['proyek_id']=$id;
				$x['data'] 	= $this->m_proyek->forDetailproyek($id);
				$x['data_laporan'] = $this->m_laporan->get_lk_by_id($id);
				$x['sum'] = $this->m_laporan->SUM($id);
				$this->load->view('v_header_pengawas',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('pengawas/v_keuangan',$x);
			}else{
				redirect("LoginPengawas");
			}
	}

	function laporan_material($id){
		if($this->session->userdata("akses") == 3){	
				$y['title'] = "Laporan Keuangan Material";
				$x['proyek_id']=$id;
				$x['data_material'] = $this->m_laporan->getdataMaterial($id);
				$x['data_laporan'] 	= $this->m_laporan->get_lm_by_id($id);
				$x['sum'] = $this->m_laporan->SUM_lm($id);
				$this->load->view('v_header_pengawas',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('pengawas/v_material',$x);
			}else{
				redirect("LoginPengawas");
			}
	}

	function laporan_upah($id){
		if($this->session->userdata("akses") == 3){	
				$y['title'] = "Laporan Keuangan Material";
				$x['proyek_id']=$id;
				$x['data_upah'] = $this->m_laporan->getdataUpah($id);
				$x['data_laporan'] 	= $this->m_laporan->get_lu_by_id($id);
				$x['sum'] = $this->m_laporan->SUM_lu($id);
				$this->load->view('v_header_pengawas',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('pengawas/v_upah',$x);
			}else{
				redirect("LoginPengawas");
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
				redirect("Pengawas/Keuangan/laporan_koordinator/$proyek_id");				
			}
	    }else{
			$this->m_laporan->insert_laporan_tanpa_nota($pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$proyek_id);	
			echo $this->session->set_flashdata('msg','success');
			redirect("Pengawas/Keuangan/laporan_koordinator/$proyek_id");	
		}	
	}

	function update_laporan(){
		$lk_id = $this->input->post('id');
		$proyek_id = $this->input->post('kode');
		$uang_masuk = $this->input->post('uang_masuk');
		$uang_keluar = $this->input->post('uang_keluar');
		$sisa_uang = $this->input->post('sisa_uang');
		$keterangan = $this->input->post('keterangan');
		$nota1 = $this->input->post('nota1');

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
	            $path='./assets/files/'.$nota1;
				unlink($path);
	            $this->m_laporan->update_laporan($keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$lk_id);
	            echo $this->session->set_flashdata('msg','info');
				redirect("Pengawas/Keuangan/laporan_koordinator/$proyek_id");				
			}
	    }else{
			$this->m_laporan->update_laporan_tanpa_nota($keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$lk_id);	
			echo $this->session->set_flashdata('msg','info');
			redirect("Pengawas/Keuangan/laporan_koordinator/$proyek_id");	
		}	
	}

	function save_material(){
		$bahan = $this->input->post('bahan');
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
	            $this->m_laporan->insert_material($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$proyek_id);
	            echo $this->session->set_flashdata('msg','success');
				redirect("Pengawas/Keuangan/laporan_material/$proyek_id");				
			}
	    }else{
			$this->m_laporan->insert_material_tanpa_nota($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$proyek_id);	
			echo $this->session->set_flashdata('msg','success');
			redirect("Pengawas/Keuangan/laporan_material/$proyek_id");	
		}	
	}

	function update_material(){
		$bahan = $this->input->post('bahan');
		$id = $this->input->post('id');
		$proyek_id = $this->input->post('kode');
		$uang_masuk = $this->input->post('uang_masuk');
		$uang_keluar = $this->input->post('uang_keluar');
		$sisa_uang = $this->input->post('sisa_uang');
		$keterangan = $this->input->post('keterangan');
		$nota1 = $this->input->post('nota1');

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
	            $path='./assets/files/'.$nota1;
				unlink($path);
	            $this->m_laporan->update_material($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$id);
	            echo $this->session->set_flashdata('msg','info');
				redirect("Pengawas/Keuangan/laporan_material/$proyek_id");				
			}
	    }else{
			$this->m_laporan->update_material_tanpa_nota($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$id);	
			echo $this->session->set_flashdata('msg','info');
			redirect("Pengawas/Keuangan/laporan_material/$proyek_id");	
		}	
	}

	function save_upah(){
		$bahan = $this->input->post('bahan');
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
	            $this->m_laporan->insert_upah($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$proyek_id);
	            echo $this->session->set_flashdata('msg','success');
				redirect("Pengawas/Keuangan/laporan_upah/$proyek_id");				
			}
	    }else{
			$this->m_laporan->insert_upah_tanpa_nota($bahan,$pengirim,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$proyek_id);	
			echo $this->session->set_flashdata('msg','success');
			redirect("Pengawas/Keuangan/laporan_upah/$proyek_id");	
		}	
	}

	function update_upah(){
		$bahan = $this->input->post('bahan');
		$id = $this->input->post('id');
		$proyek_id = $this->input->post('kode');
		$uang_masuk = $this->input->post('uang_masuk');
		$uang_keluar = $this->input->post('uang_keluar');
		$sisa_uang = $this->input->post('sisa_uang');
		$keterangan = $this->input->post('keterangan');
		$nota1 = $this->input->post('nota1');

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
	            $path='./assets/files/'.$nota1;
				unlink($path);
	            $this->m_laporan->update_upah($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$nota,$id);
	            echo $this->session->set_flashdata('msg','info');
				redirect("Pengawas/Keuangan/laporan_upah/$proyek_id");				
			}
	    }else{
			$this->m_laporan->update_upah_tanpa_nota($bahan,$keterangan,$uang_masuk,$uang_keluar,$sisa_uang,$id);	
			echo $this->session->set_flashdata('msg','info');
			redirect("Pengawas/Keuangan/laporan_upah/$proyek_id");	
		}	
	}
}
?>