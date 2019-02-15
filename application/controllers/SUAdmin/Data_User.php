<?php 
	/**
	 * 
	 */
	class Data_User extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE){
	            $url=base_url('Login');
	            redirect($url);
	        };
			$this->load->model('m_pengguna');
			$this->load->model('m_surveyor');
			$this->load->model('m_qc');
			$this->load->model('m_pengawas');
			$this->load->library('upload');
		}

		// Surveyor
		function index(){
			if($this->session->userdata("akses") == 5){	
				$y['title'] = "Surveyor";
				$x['data'] = $this->m_surveyor->get_all_surveyor();
				$this->load->view('v_header_su',$y);
				$this->load->view('SuAdmin/v_sidebar');
				$this->load->view('SuAdmin/v_data_surveyor',$x);
			}else{
				redirect("Login");
			}
		}

		function addSurveyor(){

				//Config Upload File 
				$config['upload_path'] = './assets/images/'; //Tempat menyimpan file
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //tipe filenya 
	            $config['max_size']             = 0; //size limits

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))// cek apakah file ada di form
	            {
	                if ($this->upload->do_upload('filefoto'))// cek kondisi do_upload == true
	                {
	                       	$gbr = $this->upload->data(); // upload data 
	                        $gambar=$gbr['file_name']; //ambil file nama
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_surveyor->simpan_surveyor($nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('Admin/Data_User');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('Admin/Data_User');
	                }
	                 
	            }else{
					redirect('Admin/Data_User');
				}		
		}

		function editSurveyor(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	            $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
	            // 	 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                       	$gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $foto=$this->input->post('foto');
							$path='./assets/images/'.$foto;
							unlink($path);
	                        $id=strip_tags($this->input->post('kode'));
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_surveyor->edit_surveyor($id,$nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('SUAdmin/Data_User');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('SUAdmin/Data_User');
	                }
	                 
	            }else{
	            	$id=strip_tags($this->input->post('kode'));
					$nama=strip_tags($this->input->post('xnama'));
	                $alamat=$this->input->post('xalamat');
					$hp=strip_tags($this->input->post('xhp'));
					$username=strip_tags($this->input->post('xusername'));
					$password=strip_tags($this->input->post('xpassword'));
					$this->m_surveyor->edit_surveyor_tanpa_gambar($id,$nama,$alamat,$hp,$username,$password);
					echo $this->session->set_flashdata('msg','info');
					redirect('SUAdmin/Data_User');
				}		
		}

		function hapusSurveyor()
		{
			$kode=$this->input->post('kode');
			$gambar=$this->input->post('gambar');
			$path='./assets/images/'.$gambar;
			unlink($path);
			$this->m_surveyor->hapus_surveyor($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('SUAdmin/Data_User');
		}

		// QC
		function QC(){
			if($this->session->userdata("akses") == 5){	
				$y['title'] = "QC";
				$x['data'] = $this->m_qc->get_all_qc();
				$this->load->view('v_header_su',$y);
				$this->load->view('SuAdmin/v_sidebar');
				$this->load->view('SuAdmin/v_data_qc',$x);
			}else{
				redirect("Login");
			}
		}

		function addQC(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	            $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
	            // 	 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                       	$gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_qc->simpan_qc($nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('SUAdmin/Data_User/QC');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('SUAdmin/Data_User/QC');
	                }
	                 
	            }else{
					redirect('SUAdmin/Data_User/QC');
				}		
		}

		function editQC(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	            $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
	            // 	 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                       	$gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $foto=$this->input->post('foto');
							$path='./assets/images/'.$foto;
							unlink($path);
	                        $id=strip_tags($this->input->post('kode'));
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_qc->edit_qc($id,$nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('SUAdmin/Data_User/QC');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('SUAdmin/Data_User/QC');
	                }
	                 
	            }else{
	            	$id=strip_tags($this->input->post('kode'));
					$nama=strip_tags($this->input->post('xnama'));
	                $alamat=$this->input->post('xalamat');
					$hp=strip_tags($this->input->post('xhp'));
					$username=strip_tags($this->input->post('xusername'));
					$password=strip_tags($this->input->post('xpassword'));
					$this->m_qc->edit_qc_tanpa_gambar($id,$nama,$alamat,$hp,$username,$password);
					echo $this->session->set_flashdata('msg','info');
					redirect('SUAdmin/Data_User/QC');
				}		
		}

		function hapusQC()
		{
			$kode=$this->input->post('kode');
			$gambar=$this->input->post('gambar');
			$path='./assets/images/'.$gambar;
			unlink($path);
			$this->m_qc->hapus_qc($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('SUAdmin/Data_User/QC');
		}

		//Admin
		function Admin(){
			if($this->session->userdata("akses") == 5){	
				$y['title'] = "Admin";
				$x['data'] = $this->m_pengguna->get_all_pengguna();
				$this->load->view('v_header_su',$y);
				$this->load->view('SuAdmin/v_sidebar');
				$this->load->view('SuAdmin/v_data_admin',$x);
			}else{
				redirect("Login");
			}
		}

		function addAdmin(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	            $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
	            // 	 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                       	$gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_pengguna->simpan_pengguna($nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('SUAdmin/Data_User/Admin');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('SUAdmin/Data_User/Admin');
	                }
	                 
	            }else{
					redirect('SUAdmin/Data_User/Admin');
				}		
		}

		function editAdmin(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	            $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
	            // 	 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                       	$gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $foto=$this->input->post('foto');
							$path='./assets/images/'.$foto;
							unlink($path);
	                        $id=strip_tags($this->input->post('kode'));
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_pengguna->update_pengguna($id,$nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('SUAdmin/Data_User/Admin');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('SUAdmin/Data_User/Admin');
	                }
	                 
	            }else{
	            	$id=strip_tags($this->input->post('kode'));
					$nama=strip_tags($this->input->post('xnama'));
	                $alamat=$this->input->post('xalamat');
					$hp=strip_tags($this->input->post('xhp'));
					$username=strip_tags($this->input->post('xusername'));
					$password=strip_tags($this->input->post('xpassword'));
					$this->m_pengguna->update_pengguna_tanpa_gambar($id,$nama,$alamat,$hp,$username,$password);
					echo $this->session->set_flashdata('msg','info');
					redirect('SUAdmin/Data_User/Admin');
				}		
		}

		function hapusAdmin()
		{
			$kode=$this->input->post('kode');
			$gambar=$this->input->post('gambar');
			$path='./assets/images/'.$gambar;
			unlink($path);
			$this->m_pengguna->hapus_pengguna($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('SUAdmin/Data_User/Admin');
		}



		// Pengawas
		function Pengawas(){
			if($this->session->userdata("akses") == 5){	
				$y['title'] = "Pengawas";
				$x['data'] = $this->m_pengawas->get_all_pengawas();
				$this->load->view('v_header_su',$y);
				$this->load->view('SuAdmin/v_sidebar');
				$this->load->view('SuAdmin/v_data_pengawas',$x);
			}else{
				redirect("Login");
			}
		}

		function addPengawas(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	            $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
	            // 	 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                       	$gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_pengawas->simpan_pengawas($nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('SUAdmin/Data_User/Pengawas');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('SUAdmin/Data_User/Pengawas');
	                }
	                 
	            }else{
					redirect('SUAdmin/Data_User/Pengawas');
				}		
		}

		function editPengawas(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	            $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
	            // 	 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                       	$gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $foto=$this->input->post('foto');
							$path='./assets/images/'.$foto;
							unlink($path);
	                        $id=strip_tags($this->input->post('kode'));
	                        $nama=strip_tags($this->input->post('xnama'));
	                        $alamat=$this->input->post('xalamat');
							$hp=strip_tags($this->input->post('xhp'));
							$username=strip_tags($this->input->post('xusername'));
							$password=strip_tags($this->input->post('xpassword'));
							$this->m_pengawas->edit_pengawas($id,$nama,$alamat,$hp,$username,$password,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('SUAdmin/Data_User/Pengawas');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('SUAdmin/Data_User/Pengawas');
	                }
	                 
	            }else{
	            	$id=strip_tags($this->input->post('kode'));
					$nama=strip_tags($this->input->post('xnama'));
	                $alamat=$this->input->post('xalamat');
					$hp=strip_tags($this->input->post('xhp'));
					$username=strip_tags($this->input->post('xusername'));
					$password=strip_tags($this->input->post('xpassword'));
					$this->m_pengawas->edit_pengawas_tanpa_gambar($id,$nama,$alamat,$hp,$username,$password);
					echo $this->session->set_flashdata('msg','info');
					redirect('SUAdmin/Data_User/Pengawas');
				}		
		}

		function hapusPengawas()
		{
			$kode=$this->input->post('kode');
			$gambar=$this->input->post('gambar');
			$path='./assets/images/'.$gambar;
			unlink($path);
			$this->m_pengawas->hapus_pengawas($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('SUAdmin/Data_User/Pengawas');
		}
	}
?>