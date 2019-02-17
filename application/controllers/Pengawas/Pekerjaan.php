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
		$this->load->model('m_proyek');
		$this->load->library('upload');
	}

	function index(){

	}

	public function foto_pekerjaan($proyek_id){
		$id = $this->uri->segment(5);
		$y['title'] = 'Foto Pekerjaan';
		$x['proyek_id'] = $proyek_id;
		$x['dp_id'] = $id;
		$pekerjaan = $this->m_pekerjaan->getdataPekerjaanID($id);
		$jenis = $pekerjaan->row_array();
		$x['jenis_pekerjaan'] = $jenis['dp_jenis_pekerjaan'];
		$x['foto_pekerjaan'] = $this->m_pekerjaan->getFotoPekerjaan($proyek_id, $id);
		$this->load->view('v_header_pengawas',$y);
		$this->load->view('pengawas/v_sidebar');
		$this->load->view('pengawas/v_foto_pekerjaan',$x);

	}

	function simpan_foto(){

		$config['upload_path'] 	 = './assets/foto_pekerjaan/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    $config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);

	    if(!empty($_FILES['foto_file']['name']))
	    {
	        if ($this->upload->do_upload('foto_file'))
	        {
	            $fl = $this->upload->data();
	            $foto=$fl['file_name'];
	            $dp_id = $this->input->post('dp_id');
	            $proyek_id = $this->input->post('proyek_id');
	            $this->m_pekerjaan->insertFoto($foto,$proyek_id, $dp_id);
	            echo $this->session->set_flashdata('msg','success');
				redirect("Pengawas/Pekerjaan/foto_pekerjaan/$proyek_id/$dp_id");				
			}
	    }else{
			redirect();
		}
		
	}

	public function lihat_perkerjaan($proyek_id)
	{
			if($this->session->userdata("akses") == 3){	
				$y['title'] = "Lihat Perkerjaan";
				$x['data_pekerjaan'] = $this->m_pekerjaan->getdataPekerjaan($proyek_id); 

				$data3 = $this->m_proyek->forDetailproyek($proyek_id);
                $q=$data3->row_array();
                $proyek_status = $q['proyek_status'];
                $x['proyek_status'] = $proyek_status;
                $x['proyek_id4'] = $proyek_id;

				$data1 = $this->m_pekerjaan->getdataPekerjaan($proyek_id);
                if($data1->num_rows() == 0){
                    $persen1 = 0;
                }elseif($data1->num_rows() > 0){
                    $data2 = $this->m_pekerjaan->SumPersen($proyek_id);
                    $q=$data2->row_array();
                    $sum_volume=$q['sum_volume'];
                    $sum_progress=$q['sum_progress'];
                    $persen = ($sum_progress/$sum_volume)*100;
                    $persen1 = round($persen);
                }
                $x['persen1']=$persen1;
				$this->load->view('v_header_pengawas',$y);
				$this->load->view('pengawas/v_sidebar');
				$this->load->view('pengawas/v_pekerjaan',$x);
			}else{
				redirect("LoginPengawas");
			}
	}

	function Update_Pekerjaan($proyek_id){
		$id = $this->input->post('kode');
		$progress = $this->input->post('xpekerjaan_selesai');

		$this->m_pekerjaan->updatepekerjaan($progress,$id);
		echo $this->session->set_flashdata('msg','Update');
		redirect("Pengawas/Pekerjaan/lihat_perkerjaan/$proyek_id");
	}

	
	function konfirmasi($proyek_id){
		$this->m_proyek->updateStatus3($proyek_id);
		echo $this->session->set_flashdata('msg','info');
		redirect("Pengawas/Pekerjaan/lihat_perkerjaan/$proyek_id");
	}

	function batalkonfirmasi($proyek_id){
		$this->m_proyek->updateStatus2($proyek_id);
		echo $this->session->set_flashdata('msg','batal');
		redirect("Pengawas/Pekerjaan/lihat_perkerjaan/$proyek_id");
	}

}
?>