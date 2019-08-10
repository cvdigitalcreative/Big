<?php  

class Client extends CI_Controller{
	
	function __construct(){
	parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
	            $url=base_url('Login_Sales');
	            redirect($url);
	        };	
	$this->load->model('m_pengguna');
	$this->load->model('m_surveyor');
	$this->load->model('m_qc');
	$this->load->model('m_pengawas');
	$this->load->model('m_supplier');
	$this->load->model('m_client');
	$this->load->library('upload');
	
	}


	// data client
	function index(){

		if($this->session->userdata('masuk') !=TRUE){
	            $url=base_url('Login_Sales');
	            redirect($url);
	        };
		$y['title']="Client"; 
		$x['data']=$this->m_client->get_all_client();
		$this->load->view('sales/v_header',$y);
		$this->load->view('sales/v_sidebar');
		$this->load->view('sales/v_data_client',$x);
	}

	function addclient(){

		$id_admin = $this->session->userdata('idadmin');
		$q = $this->db->query("SELECT * FROM tbl_sales WHERE id_sales='$id_admin'");
		$i = $q->row_array();
		$id_sales = $i['id_sales'];
		$nama_sales = $i['nama_sales'];

		$nama=strip_tags($this->input->post('xnama'));
		$perusahaan=strip_tags($this->input->post('xperusahaan'));
		$jabatan=strip_tags($this->input->post('xjabatan'));
		$contact=strip_tags($this->input->post('xcontact'));

		$this->m_client->addclient($nama,$perusahaan,$jabatan,$contact,$id_sales,$nama_sales);
		echo $this->session->set_flashdata('msg','success');
		redirect('Sales/Client');
	}

	function editdataclient(){
		$id_client = $this->input->post('kode');
		$nama_sales = $this->input->post('xnama');
		$nama_perusahaan = $this->input->post('xperusahaan');
		$jabatan = $this->input->post('xjabatan');
		$contact = $this->input->post('xcontact');

		$this->m_client->edit_client_by_id($id_client,$nama_sales,$nama_perusahaan,$jabatan,$contact);
		$this->session->set_flashdata('msg','info');
		redirect("Sales/Client");
	}

	function hapusdataclient(){

		$id_client = $this->input->post('id');
		$this->m_client->hapusjadwalpertemuan_by_id($id);
		$this->m_client->hapusclient($id_client);
		$this->session->set_flashdata('msg','success-hapus');
		redirect("Sales/Client");
	}

	function jadwalpertemuan(){
		$y['title']="Jadwal Pertemuan"; 
		$x['data']=$this->m_client->get_all_jadwal_pertemuan();
		$x['data_client']=$this->m_client->get_all_client();
		$this->load->view('sales/v_header',$y);
		$this->load->view('sales/v_sidebar');
		$this->load->view('sales/v_jadwal_pertemuan',$x);
	}

	
	function addjadwalpertemuan(){

	$id_admin = $this->session->userdata('idadmin');
    $q = $this->db->query("SELECT * FROM tbl_sales WHERE id_sales='$id_admin'");
    $i = $q->row_array();
    
    $id_sales = $i['id_sales'];
    $nama_sales = $i['nama_sales'];

	$idclient = strip_tags($this->input->post('xidclient'));
	$data_client=$this->m_client->get_client_by_id($idclient);
	$i=$data_client->row_array();
	$nama_client =strip_tags($i['nama_client']);
	$nama_perusahaan=strip_tags($i['nama_perusahaan']);
	$perusahaan=strip_tags($this->input->post('xperusahaan'));
	$tanggal=strip_tags($this->input->post('xtanggal'));
	$tempat=strip_tags($this->input->post('xtempat'));
	$deskripsi=strip_tags($this->input->post('xdeskripsi'));
	$this->m_client->addjadwalpertemuan($idclient,$nama_client,$nama_perusahaan,$tanggal,$tempat,$deskripsi,$id_sales,$nama_sales);
	echo $this->session->set_flashdata('msg','success');
	redirect('Sales/Client/jadwalpertemuan');
	}

	function editjadwalpertemuan(){

	$id = $this->input->post('id');
	$nama = $this->input->post('xnama');
	$nama_perusahaan = $this->input->post('xperusahaan');
	$tanggal = $this->input->post('xtanggal');
	$tempat_pertemuan = $this->input->post('xtempat');
	$deskripsi = $this->input->post('xdeskripsi');

	$this->m_client->editjadwalpertemuan($id,$nama,$nama_perusahaan,$tanggal,$tempat_pertemuan,$deskripsi);
	$this->session->set_flashdata('msg','info');
	redirect('Sales/Client/jadwalpertemuan');

	}

	function hapusjadwalpertemuan(){
		$id = $this->input->post('kode');

		$this->m_client->hapus_klaimuang_by_id($id);
		$this->m_client->hapusjadwalpertemuan($id);

		$this->session->set_flashdata('msg','success-hapus');
		redirect('Sales/Client/jadwalpertemuan');
	}


	function klaimuang(){
	$y['title'] = 'Jadwal Pertemuan - klaimuang';
	$x['data'] = $this->m_client->get_all_klaim_uang();
	$x['data_jadwal'] = $this->m_client->get_all_jadwal_pertemuan();
	$this->load->view('sales/v_header',$y);
	$this->load->view('sales/v_sidebar');
	$this->load->view('sales/v_klaimuang',$x);	
	}

	function addklaimuang(){
		// config upload file
		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){

				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama

				$id = $this->input->post('xid');
				$q = $this->m_client->get_all_jadwal_pertemuan_by_id($id);
				$i = $q->row_array();

				$id_jadwal = $i['id_jadwal_pertemuan'];
				$nama_client = $i['nama_client'];
				$nama_perusahaan = $i['nama_perusahaan'];
				$tgl_pertemuan = $i['tgl_pertemuan'];
				$tempat_pertemuan = $i['tempat_pertemuan'];
				$id_sales = $i['id_sales'];
				$nama_sales= $i['nama_sales'];

				$biaya = $this->input->post('xbiaya');

				echo $this->session->set_flashdata('msg','success');
				$this->m_client->addklaimuang($id_jadwal,$nama_client,$nama_perusahaan,$tgl_pertemuan,$tempat_pertemuan,$biaya,$gambar,$id_sales,$nama_sales);
				redirect('Sales/Client/klaimuang');

			}

		else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('Sales/Client/klaimuang');
			}
		}

	}

	function editklaimuang(){

		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){

				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama

	            $foto=$this->input->post('filefoto');
				$path='./assets/images/'.$foto;
				unlink($path);

				$id = strip_tags($this->input->post('kode'));
				$nama_client = strip_tags($this->input->post('xnama'));
				$nama_perusahaan = strip_tags($this->input->post('xperusahaan'));
				$tgl_pertemuan = strip_tags($this->input->post('xtanggal'));
				$tempat_pertemuan = strip_tags($this->input->post('xtempat'));
				$biaya = strip_tags($this->input->post('xbiaya'));

				echo $this->session->set_flashdata('msg','info');
				$this->m_client->editklaimuang($id_jadwal,$nama_client,$nama_perusahaan,$tgl_pertemuan,$tempat_pertemuan,$biaya,$gambar);
				redirect('Sales/Client/klaimuang');

			}

		else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('Sales/Client/klaimuang');
			}

		}else{

			$id = strip_tags($this->input->post('kode'));
			$nama_client = strip_tags($this->input->post('xnama'));
			$nama_perusahaan = strip_tags($this->input->post('xperusahaan'));
			$tgl_pertemuan = strip_tags($this->input->post('xtanggal'));
			$tempat_pertemuan = strip_tags($this->input->post('xtempat'));
			$biaya = strip_tags($this->input->post('xbiaya'));

			echo $this->session->set_flashdata('msg','info');
			$this->m_client->editklaimuang_tanpa_image($id,$nama_client,$nama_perusahaan,$tgl_pertemuan,$tempat_pertemuan,$biaya);
			redirect('Sales/Client/klaimuang');
		}

	}

	function hapusklaimuang(){
		$id = $this->input->post('kode');
		$this->m_client->hapusklaimuang($id);
		echo $this->session->set_flashdata('msg','delete');
		redirect('Sales/Client/klaimuang');
	}


} 
?>