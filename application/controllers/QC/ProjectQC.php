<?php

/**
 * 
 */
class ProjectQC extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
		$this->load->model('m_proyek');
		$this->load->model('m_files');
		$this->load->model('m_foto');
		$this->load->model('m_surveyor');
		$this->load->model('m_qc');
		$this->load->model('m_pengawas');
		$this->load->model('m_pekerjaan');
		$this->load->library('upload');
		$this->load->helper('download');
	}
	
	//QC Start Function Project
	function index(){
		if($this->session->userdata("akses") == 4){	
			$y['title'] = 'Daftar Proyek';
			$id=$this->session->userdata('idadmin');
			$x['proyek_fase'] = $this->m_proyek->getProyekQC($id,1);
			$x['proyek_proses'] = $this->m_proyek->getProyekQC($id,2);
			$x['proyek_selesai'] = $this->m_proyek->getProyekQC($id,3);
			$this->load->view('v_header_qc',$y);
			$this->load->view('QC/v_sidebar');
			$this->load->view('QC/v_project_qc',$x);
		}else{
			redirect("LoginQC");
		}
	}

	function detailforQC($kode)
	{
		if($this->session->userdata("akses") == 4){				
			$y['title'] = 'Quality Control';
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
			$x['userSurveyor'] 		= $this->m_proyek->getSurveyorProyek($kode);
			$x['userQC'] 			= $this->m_proyek->getQCProyek($kode);
			$x['userPengawas'] 		= $this->m_proyek->getPengawasProyek($kode);
			$x['catatan']		 	= $this->m_foto->get_catatan($kode);
			$x['pengawas'] 			= $this->m_pengawas->get_all_pengawas();
			$x['data'] 				= $this->m_proyek->forDetailproyek($kode);
			$this->load->view('v_header_qc',$y);
			$this->load->view('QC/v_sidebar');
			$this->load->view('QC/v_project_qc_detail',$x);
		}else{
			redirect("LoginQC");
		}	
	}

	function download_bq(){
		$id=$this->uri->segment(4);
		$get_db = $this->m_files->get_file_bq_download($id);
		$q = $get_db->row_array();
		$file = $q['pf_bq'];
		$path = './assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function download_formatBQ(){
		$file = 'bq.xlsx';
		$path = './assets/format/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function download_formatBahan(){
		$file = 'est_material.xlsx';
		$path = './assets/format/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function download_formatUpah(){
		$file = 'est_upah.xlsx';
		$path = './assets/format/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function download_jadwal(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_jadwal_download($id);
		$q=$get_db->row_array();
		$file=$q['pfj_jadwal'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function download_upah(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_upah_download($id);
		$q=$get_db->row_array();
		$file=$q['pfu_nama'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function download_bahan(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_bahan_download($id);
		$q=$get_db->row_array();
		$file=$q['pfb_nama'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
	}

	function simpan_file_bq(){
				$proyek_id = $this->input->post('kode');
				$config['upload_path'] 	 = './assets/files/'; //path folder
	            $config['allowed_types'] = '*';
	            $config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['bq']['name']))
	            {
	                if ($this->upload->do_upload('bq'))
	                {
	                        $fl = $this->upload->data();
	                        $file=$fl['file_name'];
	                        $this->m_files->simpan_file_bq($file,$proyek_id);
	                        echo $this->session->set_flashdata('msg','success');
							redirect("QC/ProjectQC/InputData/$proyek_id");				
					}
	            }else{
					echo $this->session->set_flashdata('msg','info');
					redirect("QC/ProjectQC/InputData/$proyek_id");	
				}	
	}

	function simpan_file_jadwal(){
				$proyek_id = $this->input->post('kode');
				$config['upload_path'] 	 = './assets/files/'; //path folder
	            $config['allowed_types'] = '*';
	            $config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['jadwal']['name']))
	            {
	                if ($this->upload->do_upload('jadwal'))
	                {
	                        $fl = $this->upload->data();
	                        $file=$fl['file_name'];
	                        $this->m_files->simpan_file_jadwal($file,$proyek_id);
	                        echo $this->session->set_flashdata('msg','success');
							redirect("QC/ProjectQC/InputDataJadwal/$proyek_id");				
					}
	            }else{
					echo $this->session->set_flashdata('msg','info');
					redirect("QC/ProjectQC/InputDataJadwal/$proyek_id");	
				}	
	}

	function simpan_file_upah(){
				$proyek_id = $this->input->post('kode');
				$config['upload_path'] 	 = './assets/files/'; //path folder
	            $config['allowed_types'] = '*';
	            $config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['upah']['name']))
	            {
	                if ($this->upload->do_upload('upah'))
	                {
	                        $fl = $this->upload->data();
	                        $file=$fl['file_name'];
	                        $this->m_files->simpan_file_upah($file,$proyek_id);
	                        echo $this->session->set_flashdata('msg','success');
							redirect("QC/ProjectQC/InputDataUpah/$proyek_id");				
					}
	            }else{
					echo $this->session->set_flashdata('msg','info');
					redirect("QC/ProjectQC/InputDataUpah/$proyek_id");	
				}	
	}

	function simpan_file_bahan(){
				$proyek_id = $this->input->post('kode');
				$config['upload_path'] 	 = './assets/files/'; //path folder
	            $config['allowed_types'] = '*';
	            $config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['bahan']['name']))
	            {
	                if ($this->upload->do_upload('bahan'))
	                {
	                        $fl = $this->upload->data();
	                        $file=$fl['file_name'];
	                        $this->m_files->simpan_file_bahan($file,$proyek_id);
	                        echo $this->session->set_flashdata('msg','success');
							redirect("QC/ProjectQC/InputDataBahan/$proyek_id");				
					}
	            }else{
					echo $this->session->set_flashdata('msg','info');
					redirect("QC/ProjectQC/InputDataBahan/$proyek_id");	
				}	
	}

	function InputData($kode){
		if($this->session->userdata("akses") == 4){
			$y['title']="Input Data";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['file'] = $this->m_files->get_file_bq_byid($kode);
			$this->load->view('v_header_qc',$y);
			$this->load->view('QC/v_sidebar');
			$this->load->view('QC/v_input_data',$x);
		}else{
			redirect("LoginQC");
		}	
	}

	function InputDataJadwal($kode){
		if($this->session->userdata("akses") == 4){
			$y['title']="Input Data";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['file'] = $this->m_files->get_file_jadwal_byid($kode);
			$this->load->view('v_header_qc',$y);
			$this->load->view('QC/v_sidebar');
			$this->load->view('QC/v_input_data_jadwal',$x);
		}else{
			redirect("LoginQC");
		}	
	}

	function InputDataUpah($kode){
		if($this->session->userdata("akses") == 4){
			$y['title']="Input Data Upah";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['file'] = $this->m_files->get_file_upah_byid($kode);
			$this->load->view('v_header_qc',$y);
			$this->load->view('QC/v_sidebar');
			$this->load->view('QC/v_input_data_upah',$x);
		}else{
			redirect("LoginQC");
		}	
	}

	function InputDataBahan($kode){
		if($this->session->userdata("akses") == 4){
			$y['title']="Input Data Bahan";
			$x['data'] = $this->m_proyek->forDetailproyek($kode);
			$x['file'] = $this->m_files->get_file_bahan_byid($kode);
			$this->load->view('v_header_qc',$y);
			$this->load->view('QC/v_sidebar');
			$this->load->view('QC/v_input_data_bahan',$x);
		}else{
			redirect("LoginQC");
		}	
	}

	function updateuserPengawas($kode){
		 $id = $this->input->post('pengawas');
		 $this->m_proyek->updateUserProyekPengawas($id,$kode);

		 echo $this->session->set_flashdata('msg','success-pengawas');
		 redirect("QC/ProjectQC/detailforQC/$kode");
	}

	function getDataBQ($file){
		$proyek_id=$this->uri->segment(5);
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
						    
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/files/'.$file); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
						    
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
						    
		$numrow = 1;
		foreach($sheet as $row){
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
			if($numrow > 14){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'dp_jenis_pekerjaan'=>$row['B'],
					'dp_satuan'=>$row['C'],
					'dp_volume'=>$row['D'],
					'dp_hs_material'=>$row['E'],
					'dp_hs_upah'=>$row['F'],
					'dp_th_material'=>$row['G'],
					'dp_th_upah'=>$row['H'],
					'dp_total_harga'=>$row['I'],
					'proyek_id'=>$proyek_id,
					 // Insert data nis dari kolom A di excel
					// Insert data alamat dari kolom D di excel
				));
			}
						      
		$numrow++; // Tambah 1 setiap kali looping
		}
						    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_files->data_pekerjaan($data);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect("QC/ProjectQC/InputData/$proyek_id");	
	}

	function hapusDataBQ($proyek_id){
		$this->m_files->hapus_data_ppekerjaan($proyek_id);
		echo $this->session->set_flashdata('msg','hapus');
		redirect("QC/ProjectQC/InputData/$proyek_id");	
	}

	function getDataMaterial($file){
		$proyek_id=$this->uri->segment(5);
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
						    
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/files/'.$file); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
						    
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
						    
		$numrow = 1;
		foreach($sheet as $row){
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
			if($numrow > 11){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'dm_bahan'=>$row['B'],
					'dm_jumlah'=>$row['C'],
					'dm_satuan'=>$row['D'],
					'dm_harga'=>$row['E'],
					'dm_total'=>$row['F'],
					'proyek_id'=>$proyek_id,
					 // Insert data nis dari kolom A di excel
					// Insert data alamat dari kolom D di excel
				));
			}
						      
		$numrow++;
		 // Tambah 1 setiap kali looping
		}
						    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_files->data_bahan($data);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect("QC/ProjectQC/InputDataBahan/$proyek_id");	
	}

	function hapusDataMaterial($proyek_id){
		$this->m_files->hapus_data_bahan($proyek_id);
		echo $this->session->set_flashdata('msg','hapus');
		redirect("QC/ProjectQC/InputDataBahan/$proyek_id");	
	}

	function getDataUpah($file){
		$proyek_id=$this->uri->segment(5);
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
						    
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/files/'.$file); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
						    
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
						    
		$numrow = 1;
		foreach($sheet as $row){
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
			if($numrow > 11){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'du_jenis_pekerjaan'=>$row['B'],
					'du_satuan'=>$row['C'],
					'du_volume'=>$row['D'],
					'du_harga'=>$row['E'],
					'du_total'=>$row['F'],
					'proyek_id'=>$proyek_id,
					 // Insert data nis dari kolom A di excel
					// Insert data alamat dari kolom D di excel
				));
				echo $numrow;
			}
						      
		$numrow++;
		 // Tambah 1 setiap kali looping
		}
		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_files->data_upah($data);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect("QC/ProjectQC/InputDataUpah/$proyek_id");	
	}

	function hapusDataUpah($proyek_id){
		$this->m_files->hapus_data_upah($proyek_id);
		echo $this->session->set_flashdata('msg','hapus');
		redirect("QC/ProjectQC/InputDataUpah/$proyek_id");	
	}
}
?>