<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		if($this->session->userdata("akses") == 3){	
			$kode=$this->session->userdata('idadmin');
			$x['data']=$this->m_pengguna->get_pengguna_login($kode);
			$y['title'] = 'Pengguna';
			$this->load->view('v_header_pengawas',$y);
			$this->load->view('pengawas/v_sidebar');
			$this->load->view('pengawas/v_pengguna',$x);
		}else{
			redirect("LoginPengawas");
		}
	}

	function simpan_pengguna(){
	            $config['upload_path'] = './assets/admin/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/admin/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/admin/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $nama=$this->input->post('xnama');
	                        $jenkel=$this->input->post('xjenkel');
	                        $username=$this->input->post('xusername');
	                        $password=$this->input->post('xpassword');
                            $konfirm_password=$this->input->post('xpassword2');
                            $email=$this->input->post('xemail');
                            $nohp=$this->input->post('xkontak');
							$level='2';
     						if ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('Admin/Pengguna');
     						}else{
	               				$this->m_pengguna->simpan_pengguna($nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar);
	                    		echo $this->session->set_flashdata('msg','success');
	               				redirect('Admin/Pengguna');
	               				
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('Admin/Pengguna');
	                }
	                 
	            }else{
	            	$nama=$this->input->post('xnama');
	                $jenkel=$this->input->post('xjenkel');
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    $email=$this->input->post('xemail');
                    $nohp=$this->input->post('xkontak');
					$level='2';
	            	if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('Admin/Pengguna');
     				}else{
	               		$this->m_pengguna->simpan_pengguna_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','success');
	               		redirect('Admin/Pengguna');
	               	}
	            } 

	}

	function update_pengguna(){
				
	            $config['upload_path'] = './assets/admin/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/admin/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/admin/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
	                        $nama=$this->input->post('xnama');
	                		$jenkel=$this->input->post('xjenkel');
	                		$username=$this->input->post('xusername');
	                		$password=$this->input->post('xpassword');
                    		$konfirm_password=$this->input->post('xpassword2');
                    		$email=$this->input->post('xemail');
                    		$nohp=$this->input->post('xkontak');
							$level='2';
                            if (empty($password) && empty($konfirm_password)) {
                            	$this->m_pengguna->update_pengguna_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('Admin/Pengguna');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('Admin/Pengguna');
     						}else{
	               				$this->m_pengguna->update_pengguna($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('Admin/Pengguna');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('Admin/Pengguna');
	                }
	                
	            }else{
	            	$kode=$this->input->post('kode');
	            	$nama=$this->input->post('xnama');
	                $jenkel=$this->input->post('xjenkel');
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    $email=$this->input->post('xemail');
                    $nohp=$this->input->post('xkontak');
					$level='2';
	            	if (empty($password) && empty($konfirm_password)) {
                       	$this->m_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','info');
	               		redirect('Admin/Pengguna');
     				}elseif ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('Admin/Pengguna');
     				}else{
	               		$this->m_pengguna->update_pengguna_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','warning');
	               		redirect('Admin/Pengguna');
	               	}
	            } 

	}

	function hapus_pengguna(){
		$kode=$this->input->post('kode');
		$data=$this->m_pengguna->get_pengguna_login($kode);
		$q=$data->row_array();
		$p=$q['pengguna_photo'];
		$path=base_url().'assets/images/'.$p;
		delete_files($path);
		$this->m_pengguna->hapus_pengguna($kode);
	    echo $this->session->set_flashdata('msg','success-hapus');
	    redirect('Admin/Pengguna');
	}

	function reset_password(){
   
        $id=$this->uri->segment(4);
        $get=$this->m_pengguna->getusername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['pengguna_username'];
        }
        $pass=rand(123456,999999);
        $this->m_pengguna->resetpass($id,$pass);
        echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('uname',$b);
        echo $this->session->set_flashdata('upass',$pass);
	    redirect('Admin/Pengguna');
   
    }


}