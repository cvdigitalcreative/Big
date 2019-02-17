<?php

/**
 * 
 */
class Project extends CI_Controller
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
		$this->load->library('upload');
	}
	
	//Surveyor Start Function Project
	function index()
	{
		if($this->session->userdata("akses") == 1){	
			$y['title'] = 'Daftar Proyek';
			$id=$this->session->userdata('idadmin');
			$x['proyek_fase'] = $this->m_proyek->getProyekSurveyor($id,1);
			$x['proyek_proses'] = $this->m_proyek->getProyekSurveyor($id,2);
			$x['proyek_selesai'] = $this->m_proyek->getProyekSurveyor($id,3);
			$this->load->view('v_header_surveyor',$y);
			$this->load->view('surveyor/v_sidebar');
			$this->load->view('surveyor/v_project',$x);
		}else{
			redirect("LoginSurveyor");
		}
	}

	function detailforSurveyor($kode)
	{
		if($this->session->userdata("akses") == 1){				
			$y['title'] 			= 'Surveyor';
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
			$this->load->view('v_header_surveyor',$y);
			$this->load->view('surveyor/v_sidebar');
			$this->load->view('surveyor/v_project_detail',$x);
		}else{
			redirect("LoginSurveyor");
		}	
	}
	//Surveyor End Function Project


	function AddProyek()
	{
		$id_user 			=$this->session->userdata('idadmin');
		$proyek_nama		=strip_tags($this->input->post('xproyek'));
		$proyek_petugas		=strip_tags($this->input->post('xpetugas'));
		$proyek_tanggal		=strip_tags($this->input->post('xtanggal'));
		$proyek_latitude	=strip_tags($this->input->post('xlatitude'));
		$proyek_longitude	=strip_tags($this->input->post('xlongitude'));
		$proyek_alamat		=strip_tags($this->input->post('xalamat'));
		$proyek_status		= '1';

		//add project
		$this->m_proyek->addProyek($proyek_nama,$proyek_petugas,$proyek_tanggal,$proyek_latitude,$proyek_longitude,$proyek_alamat,$proyek_status,$id_user);

		//show toast
		echo $this->session->set_flashdata('msg','success');

		//redirect page project
		redirect('Surveyor/Project');
	}

	function EditProyek()
	{	
		$id=strip_tags($this->input->post('kode'));
		$proyek_nama=strip_tags($this->input->post('xproyek'));
		$proyek_petugas=strip_tags($this->input->post('xpetugas'));
		$proyek_latitude=strip_tags($this->input->post('xlatitude'));
		$proyek_longitude=strip_tags($this->input->post('xlongitude'));
		$proyek_alamat=strip_tags($this->input->post('xalamat'));

		//edit proyek
		$this->m_proyek->editProyek($id,$proyek_nama,$proyek_petugas,$proyek_latitude,$proyek_longitude,$proyek_alamat);

		//show toast
		echo $this->session->set_flashdata('msg','info');

		//redirect page project
		redirect("Surveyor/Project/detailforSurveyor/$id");	
	}

	function addFoto()
	{
		$proyek_id = $this->input->post('kode');
		$config['upload_path'] 		= './assets/foto_proyek/'; //path folder
	    $config['allowed_types'] 	= '*';
	    $config['max_size']			= 0; //type yang dapat diakses bisa anda sesuaikan

	    $this->upload->initialize($config);
	    
	    //foto pam / sumur
	    if(!empty($_FILES['pam']['name']))
	    {
	        $filesCount = count($_FILES['pam']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['pams']['name'] = $_FILES['pam']['name'][$i];
		       	$_FILES['pams']['type']     = $_FILES['pam']['type'][$i];
		        $_FILES['pams']['tmp_name'] = $_FILES['pam']['tmp_name'][$i];
		        $_FILES['pams']['error']     = $_FILES['pam']['error'][$i];
		        $_FILES['pams']['size']     = $_FILES['pam']['size'][$i];
				if($this->upload->do_upload('pams'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_pam($gambar,$proyek_id);
				}
			}
	    }else{} 

	    // foto tampak depan
	    if(!empty($_FILES['ftd']['name']))
	    {
	        $filesCount = count($_FILES['ftd']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['ftds']['name'] = $_FILES['ftd']['name'][$i];
		       	$_FILES['ftds']['type']     = $_FILES['ftd']['type'][$i];
		        $_FILES['ftds']['tmp_name'] = $_FILES['ftd']['tmp_name'][$i];
		        $_FILES['ftds']['error']     = $_FILES['ftd']['error'][$i];
		        $_FILES['ftds']['size']     = $_FILES['ftd']['size'][$i];
				if($this->upload->do_upload('ftds'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_depan($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	   	// foto tampak belakang
	    if(!empty($_FILES['fb']['name']))
	    {
	        $filesCount = count($_FILES['fb']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fbs']['name'] = $_FILES['fb']['name'][$i];
		       	$_FILES['fbs']['type']     = $_FILES['fb']['type'][$i];
		        $_FILES['fbs']['tmp_name'] = $_FILES['fb']['tmp_name'][$i];
		        $_FILES['fbs']['error']     = $_FILES['fb']['error'][$i];
		        $_FILES['fbs']['size']     = $_FILES['fb']['size'][$i];
				if($this->upload->do_upload('fbs'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_belakang($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	   	// foto tampak kanan
	    if(!empty($_FILES['fk']['name']))
	    {
	        $filesCount = count($_FILES['fk']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fks']['name'] = $_FILES['fk']['name'][$i];
		       	$_FILES['fks']['type']     = $_FILES['fk']['type'][$i];
		        $_FILES['fks']['tmp_name'] = $_FILES['fk']['tmp_name'][$i];
		        $_FILES['fks']['error']     = $_FILES['fk']['error'][$i];
		        $_FILES['fks']['size']     = $_FILES['fk']['size'][$i];
				if($this->upload->do_upload('fks'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_kanan($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto tampak kiri
	    if(!empty($_FILES['fkr']['name']))
	    {
	        $filesCount = count($_FILES['fkr']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fkrs']['name'] = $_FILES['fkr']['name'][$i];
		       	$_FILES['fkrs']['type']     = $_FILES['fkr']['type'][$i];
		        $_FILES['fkrs']['tmp_name'] = $_FILES['fkr']['tmp_name'][$i];
		        $_FILES['fkrs']['error']     = $_FILES['fkr']['error'][$i];
		        $_FILES['fkrs']['size']     = $_FILES['fkr']['size'][$i];
				if($this->upload->do_upload('fkrs'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_kiri($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto tetangga kanan
	    if(!empty($_FILES['ftk']['name']))
	    {
	        $filesCount = count($_FILES['ftk']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['ftks']['name'] = $_FILES['ftk']['name'][$i];
		       	$_FILES['ftks']['type']     = $_FILES['ftk']['type'][$i];
		        $_FILES['ftks']['tmp_name'] = $_FILES['ftk']['tmp_name'][$i];
		        $_FILES['ftks']['error']     = $_FILES['ftk']['error'][$i];
		        $_FILES['ftks']['size']     = $_FILES['ftk']['size'][$i];
				if($this->upload->do_upload('ftks'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_tetangga_kanan($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto tetangga kiri
	    if(!empty($_FILES['ftkr']['name']))
	    {
	        $filesCount = count($_FILES['ftkr']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['ftkrs']['name'] = $_FILES['ftkr']['name'][$i];
		       	$_FILES['ftkrs']['type']     = $_FILES['ftkr']['type'][$i];
		        $_FILES['ftkrs']['tmp_name'] = $_FILES['ftkr']['tmp_name'][$i];
		        $_FILES['ftkrs']['error']     = $_FILES['ftkr']['error'][$i];
		        $_FILES['ftkrs']['size']     = $_FILES['ftkr']['size'][$i];
				if($this->upload->do_upload('ftkrs'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_tetangga_kiri($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	   	// foto kwh listrik
	    if(!empty($_FILES['fkl']['name']))
	    {
	        $filesCount = count($_FILES['fkl']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fkls']['name'] = $_FILES['fkl']['name'][$i];
		       	$_FILES['fkls']['type']     = $_FILES['fkl']['type'][$i];
		        $_FILES['fkls']['tmp_name'] = $_FILES['fkl']['tmp_name'][$i];
		        $_FILES['fkls']['error']     = $_FILES['fkl']['error'][$i];
		        $_FILES['fkls']['size']     = $_FILES['fkl']['size'][$i];
				if($this->upload->do_upload('fkls'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_kwh_listrik($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto lantai
	    if(!empty($_FILES['fl']['name']))
	    {
	        $filesCount = count($_FILES['fl']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fls']['name'] = $_FILES['fl']['name'][$i];
		       	$_FILES['fls']['type']     = $_FILES['fl']['type'][$i];
		        $_FILES['fls']['tmp_name'] = $_FILES['fl']['tmp_name'][$i];
		        $_FILES['fls']['error']     = $_FILES['fl']['error'][$i];
		        $_FILES['fls']['size']     = $_FILES['fl']['size'][$i];
				if($this->upload->do_upload('fls'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_lantai($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto dak
	    if(!empty($_FILES['fd']['name']))
	    {
	        $filesCount = count($_FILES['fd']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fds']['name'] = $_FILES['fd']['name'][$i];
		       	$_FILES['fds']['type']     = $_FILES['fd']['type'][$i];
		        $_FILES['fds']['tmp_name'] = $_FILES['fd']['tmp_name'][$i];
		        $_FILES['fds']['error']     = $_FILES['fd']['error'][$i];
		        $_FILES['fds']['size']     = $_FILES['fd']['size'][$i];
				if($this->upload->do_upload('fds'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_dak($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	   	// foto toilet
	    if(!empty($_FILES['ft']['name']))
	    {
	        $filesCount = count($_FILES['ft']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fts']['name'] = $_FILES['ft']['name'][$i];
		       	$_FILES['fts']['type']     = $_FILES['ft']['type'][$i];
		        $_FILES['fts']['tmp_name'] = $_FILES['ft']['tmp_name'][$i];
		        $_FILES['fts']['error']     = $_FILES['ft']['error'][$i];
		        $_FILES['fts']['size']     = $_FILES['ft']['size'][$i];
				if($this->upload->do_upload('fts'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_toilet($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	   	// foto tanah belakang
	    if(!empty($_FILES['ftb']['name']))
	    {
	        $filesCount = count($_FILES['ftb']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['ftbs']['name'] = $_FILES['ftb']['name'][$i];
		       	$_FILES['ftbs']['type']     = $_FILES['ftb']['type'][$i];
		        $_FILES['ftbs']['tmp_name'] = $_FILES['ftb']['tmp_name'][$i];
		        $_FILES['ftbs']['error']     = $_FILES['ftb']['error'][$i];
		        $_FILES['ftbs']['size']     = $_FILES['ftb']['size'][$i];
				if($this->upload->do_upload('ftbs'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_tanah_belakang($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	   	// foto parkiran
	    if(!empty($_FILES['fp']['name']))
	    {
	        $filesCount = count($_FILES['fp']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fps']['name'] = $_FILES['fp']['name'][$i];
		       	$_FILES['fps']['type']     = $_FILES['fp']['type'][$i];
		        $_FILES['fps']['tmp_name'] = $_FILES['fp']['tmp_name'][$i];
		        $_FILES['fps']['error']     = $_FILES['fp']['error'][$i];
		        $_FILES['fps']['size']     = $_FILES['fp']['size'][$i];
				if($this->upload->do_upload('fps'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_parkiran($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto bahu jalan
	    if(!empty($_FILES['fbj']['name']))
	    {
	        $filesCount = count($_FILES['fbj']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fbjs']['name'] = $_FILES['fbj']['name'][$i];
		       	$_FILES['fbjs']['type']     = $_FILES['fbj']['type'][$i];
		        $_FILES['fbjs']['tmp_name'] = $_FILES['fbj']['tmp_name'][$i];
		        $_FILES['fbjs']['error']     = $_FILES['fbj']['error'][$i];
		        $_FILES['fbjs']['size']     = $_FILES['fbj']['size'][$i];
				if($this->upload->do_upload('fbjs'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_bahu_jalan($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto atap
	    if(!empty($_FILES['fa']['name']))
	    {
	        $filesCount = count($_FILES['fa']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fas']['name'] = $_FILES['fa']['name'][$i];
		       	$_FILES['fas']['type']     = $_FILES['fa']['type'][$i];
		        $_FILES['fas']['tmp_name'] = $_FILES['fa']['tmp_name'][$i];
		        $_FILES['fas']['error']     = $_FILES['fa']['error'][$i];
		        $_FILES['fas']['size']     = $_FILES['fa']['size'][$i];
				if($this->upload->do_upload('fas'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_atap($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto folding gate
	    if(!empty($_FILES['ffg']['name']))
	    {
	        $filesCount = count($_FILES['ffg']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['ffgs']['name'] = $_FILES['ffg']['name'][$i];
		       	$_FILES['ffgs']['type']     = $_FILES['ffg']['type'][$i];
		        $_FILES['ffgs']['tmp_name'] = $_FILES['ffg']['tmp_name'][$i];
		        $_FILES['ffgs']['error']     = $_FILES['ffg']['error'][$i];
		        $_FILES['ffgs']['size']     = $_FILES['ffg']['size'][$i];
				if($this->upload->do_upload('ffgs'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_folding_gate($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto pintu pintu
	    if(!empty($_FILES['fpp']['name']))
	    {
	        $filesCount = count($_FILES['fpp']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fpps']['name'] = $_FILES['fpp']['name'][$i];
		       	$_FILES['fpps']['type']     = $_FILES['fpp']['type'][$i];
		        $_FILES['fpps']['tmp_name'] = $_FILES['fpp']['tmp_name'][$i];
		        $_FILES['fpps']['error']     = $_FILES['fpp']['error'][$i];
		        $_FILES['fpps']['size']     = $_FILES['fpp']['size'][$i];
				if($this->upload->do_upload('fpps'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_pintu_pintu($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto dinding
	    if(!empty($_FILES['fdd']['name']))
	    {
	        $filesCount = count($_FILES['fdd']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fdds']['name'] = $_FILES['fdd']['name'][$i];
		       	$_FILES['fdds']['type']     = $_FILES['fdd']['type'][$i];
		        $_FILES['fdds']['tmp_name'] = $_FILES['fdd']['tmp_name'][$i];
		        $_FILES['fdds']['error']     = $_FILES['fdd']['error'][$i];
		        $_FILES['fdds']['size']     = $_FILES['fdd']['size'][$i];
				if($this->upload->do_upload('fdds'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_dinding($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    // foto kondisi bangunan
	    if(!empty($_FILES['fkb']['name']))
	    {
	        $filesCount = count($_FILES['fkb']['name']);
		    for($i = 0; $i < $filesCount; $i++)
		    {
		        $_FILES['fkbs']['name'] = $_FILES['fkb']['name'][$i];
		       	$_FILES['fkbs']['type']     = $_FILES['fkb']['type'][$i];
		        $_FILES['fkbs']['tmp_name'] = $_FILES['fkb']['tmp_name'][$i];
		        $_FILES['fkbs']['error']     = $_FILES['fkb']['error'][$i];
		        $_FILES['fkbs']['size']     = $_FILES['fkb']['size'][$i];
				if($this->upload->do_upload('fkbs'))
				{
		            // Uploaded file data
		            $fileData = $this->upload->data();
		            $gambar = $fileData['file_name'];
		            $this->m_foto->foto_kondisi_bangunan($gambar,$proyek_id);
				}
			}
	    }
	    else{}

	    //catatan
	    $note = $this->input->post('xnote');	
	    if(!empty($note)){
	    	//add catatan
			$this->m_foto->catatan($note, $proyek_id);
	    }else{}
		
	   	echo $this->session->set_flashdata('msg','success');
		redirect("Surveyor/Project/detailforSurveyor/$proyek_id");
	}
}
?>