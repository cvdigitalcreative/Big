<?php  

class Aset extends CI_Controller{
	
	function __construct(){
	parent::__construct();	
	$this->load->model('m_pengguna');
	$this->load->model('m_surveyor');
	$this->load->model('m_qc');
	$this->load->model('m_pengawas');
	$this->load->model('m_supplier');
	$this->load->model('m_client');
	$this->load->model('m_aset');
	$this->load->library('upload');
	
	}


	// data client
	function index(){


		$y['title']="Asets"; 
		$x['data']=$this->m_aset->get_all_aset();
		$this->load->view('Aset/v_header',$y);
		$this->load->view('Aset/v_sidebar');
		$this->load->view('Aset/v_data_aset',$x);
	}

	function addasets(){
		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){

				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama

				$nomor = $this->input->post('nomor_rak');
				$tanggal = $this->input->post('tgl_masuk');
				$lokasi = $this->input->post('lokasi');
				$tipe = $this->input->post('tipe');
				$nomor_barang = $this->input->post('nomor_barang');
				$nama_barang  = $this->input->post('nama_barang');
				$merk_barang = $this->input->post('merk_barang');
				$tahun_barang = $this->input->post('tahun_barang');
				$kondisi = $this->input->post('kondisi_barang');

				echo $this->session->set_flashdata('msg','success');
				$this->m_aset->addasets($nomor,$tanggal,$lokasi,$tipe,$nomor_barang,$merk_barang,$tahun_barang,$nama_barang,$kondisi,$gambar);
				redirect('Asets/Aset');

			}

		else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('Asets/Aset');
			}
		}
	
	}

	function editasets(){
		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){

				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama


	            $foto=$this->input->post('foto_lama');
				$path='./assets/images/'.$foto;
				unlink($path);

				$id = $this->input->post('id_aset');
				$nomor = $this->input->post('nomor_rak');
				$tanggal = $this->input->post('tgl_masuk');
				$lokasi = $this->input->post('lokasi');
				$tipe = $this->input->post('tipe');
				$nomor_barang = $this->input->post('nomor_barang');
				$nama_barang  = $this->input->post('nama_barang');
				$merk_barang = $this->input->post('merk_barang');
				$tahun_barang = $this->input->post('tahun_barang');
				$kondisi = $this->input->post('kondisi_barang');

				echo $this->session->set_flashdata('msg','info');
				$this->m_aset->editasets($id,$nomor,$tanggal,$lokasi,$tipe,$nomor_barang,$merk_barang,$tahun_barang,$nama_barang,$kondisi,$gambar);
				redirect('Asets/Aset');

			}

		else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('Asets/Aset');
			}
		}

		else{

				$id = $this->input->post('id_aset');
				$nomor = $this->input->post('nomor_rak');
				$tanggal = $this->input->post('tgl_masuk');
				$lokasi = $this->input->post('lokasi');
				$tipe = $this->input->post('tipe');
				$nomor_barang = $this->input->post('nomor_barang');
				$nama_barang  = $this->input->post('nama_barang');
				$merk_barang = $this->input->post('merk_barang');
				$tahun_barang = $this->input->post('tahun_barang');
				$kondisi = $this->input->post('kondisi_barang');

				echo $this->session->set_flashdata('msg','info');
				$this->m_aset->editasets_tanpa_img($id,$nomor,$tanggal,$lokasi,$tipe,$nomor_barang,$merk_barang,$tahun_barang,$nama_barang,$kondisi);
				redirect('Asets/Aset');
		}

	}

	function hapusaset(){
		$id = $this->input->post('id');

		$foto = $this->input->post('foto_lama');
		$path = './assets/images/'.$foto;
		unlink($path);

		$this->m_aset->hapusaset_peminjam($id);
		$this->m_aset->hapusaset($id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Asets/Aset');
	}

	function peminjaman(){

		$y['title']="Peminjaman Asets"; 
		$x['data']=$this->m_aset->get_all_peminjaman();
		$x['data_aset'] = $this->m_aset->get_all_aset();
		$this->load->view('Aset/v_header',$y);
		$this->load->view('Aset/v_sidebar');
		$this->load->view('Aset/v_data_peminjaman',$x);

	}

	function adddatapeminjam(){

		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){

				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama

		$id = $this->input->post('id');
		$q = $this->m_aset->get_aset_by_id($id);

		$i = $q->row_array();

		$id_aset = $i['id_aset'];
		$nama_barang = $i['nama_barang'];

		$nama = $this->input->post('nama');
		$kondisi = $this->input->post('kondisi') ;
		$tanggal = $this->input->post('tanggal');

		$this->m_aset->add_datapeminjam($nama,$id_aset,$nama_barang,$kondisi,$tanggal,$gambar);
		echo $this->session->set_flashdata('msg','success');
		redirect('Asets/Aset/peminjaman');
			}
		else{

		echo $this->session->set_flashdata('msg','warning');
		redirect('Asets/Aset/peminjaman');
		}
		}

	}

	function edit_datapeminjam(){
		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){

				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama


	            $foto=$this->input->post('foto_lama');
				$path='./assets/images/'.$foto;
				unlink($path);



		$id_aset = $this->input->post('id_aset');
		$q = $this->m_aset->get_aset_by_id($id_aset);
		$i = $q->row_array();

		$id_aset = $i['id_aset'];
		$nama_barang = $i['nama_barang'];

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$kondisi = $this->input->post('kondisi') ;
		$tanggal = $this->input->post('tanggal');

		$this->m_aset->edit_datapeminjam($id,$nama,$id_aset,$nama_barang,$kondisi,$tanggal,$gambar);
		echo $this->session->set_flashdata('msg','info');
		redirect('Asets/Aset/peminjaman');
		} 
		else{
		echo $this->session->set_flashdata('msg','warning');
		redirect('Asets/Aset/peminjaman');
		}
	}
		else{

		$id_aset = $this->input->post('id_aset');
		$q = $this->m_aset->get_aset_by_id($id_aset);
		$i = $q->row_array();
		$nama_barang = $i['nama_barang'];

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$kondisi = $this->input->post('kondisi') ;
		$tanggal = $this->input->post('tanggal');

		$this->m_aset->edit_datapeminjam_tanpa_img($id,$nama,$id_aset,$nama_barang,$kondisi,$tanggal);
		echo $this->session->set_flashdata('msg','info');
		redirect('Asets/Aset/peminjaman');
			
		}


	}

	function hapuspeminjam(){
		$id = $this->input->post('id');

		$foto=$this->input->post('foto_lama');
		$path='./assets/images/'.$foto;
		unlink($path);

		$this->m_aset->hapus_pengembalian_by_id_peminjam($id);
		$this->m_aset->hapus_peminjam($id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Asets/Aset/peminjaman');
	}


	function pengembalian(){

		$y['title'] = 'Pengembalian - Aset';
		$x['data'] = $this->m_aset->get_all_pengembalian();
		$x['data_peminjam'] = $this->m_aset->get_all_peminjaman();
		$this->load->view('Aset/v_header',$y);
		$this->load->view('Aset/v_sidebar');
		$this->load->view('Aset/v_data_pengembalian',$x);
	}

	function adddatapengembalian(){

		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){

				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama

		$id = $this->input->post('id');

		$q = $this->m_aset->get_peminjam_by_id($id);

		$i = $q->row_array();

		$id_peminjam = $i['id_peminjam'];
		$nama = $i['nama_peminjam'];
		$nama_barang = $i['nama_barang'];	
		$tanggal_peminjaman = $i['tanggal_peminjaman'];
		$kondisi = $this->input->post('kondisi') ;
		$tanggal = $this->input->post('tanggal');

		$this->m_aset->add_datapengembalian($id_peminjam,$nama,$nama_barang,$kondisi,$tanggal_peminjaman,$tanggal,$gambar);
		echo $this->session->set_flashdata('msg','success');
		redirect('Asets/Aset/pengembalian');
			}
		else{

			$this->session->set_flashdata('msg','warning');
			redirect('Asets/Aset/pengembalian');
		}
		}
	}

	function editpengembalian(){
		$config['upload_path']='./assets/images/'; //tempat penyimpanan
		$config['allowed_types']='jpg|jpeg|png|pdf|gif|bmp'; //size foto
		$config['max_size'] = 0; //size foto

		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if($this->upload-> do_upload('filefoto')){
				
				$gbr = $this->upload->data(); // upload data 
	            $gambar=$gbr['file_name']; //ambil file nama


	            $foto=$this->input->post('foto_lama');
				$path='./assets/images/'.$foto;
				unlink($path);




		$id = $this->input->post('id');

		$q = $this->m_aset->get_peminjam_by_id($id);

		$i = $q->row_array();

		$id_peminjam = $i['id_peminjam'];
		$nama = $i['nama_peminjam'];
		$nama_barang = $i['nama_barang'];	
		$kondisi = $this->input->post('kondisi') ;
		$tanggal = $this->input->post('tanggal');
		$id = $this->input->post('id_pengembalian');

		$this->m_aset->edit_pengembalian($id,$id_peminjam,$nama,$nama_barang,$kondisi,$tanggal,$gambar);
		echo $this->session->set_flashdata('msg','info');
		redirect('Asets/Aset/pengembalian');

		}
		else{
			echo $this->session->set_flashdata('msg','warning');
		}
	}

		else{
		$id = $this->input->post('id');
		$q = $this->m_aset->get_peminjam_by_id($id);
		$i = $q->row_array();

		$id_peminjam = $i['id_peminjam'];
		$nama = $i['nama_peminjam'];
		$nama_barang = $i['nama_barang'];	
		$kondisi = $this->input->post('kondisi') ;
		$tanggal = $this->input->post('tanggal');
		$id = $this->input->post('id_pengembalian');

		$this->m_aset->edit_pengembalian_tanpa_image($id,$id_peminjam,$nama,$nama_barang,$kondisi,$tanggal);
		echo $this->session->set_flashdata('msg','info');
		redirect('Asets/Aset/pengembalian');	
		
		}

	}


	function hapus_pengembalian(){
		$id = $this->input->post('id');

		$gambar = $this->input->post('gambar');

		$path = './assets/images/'.$gambar;
		unlink($path);

		$this->m_aset->hapus_pengembalian($id);
		$this->session->set_flashdata('msg','success-hapus');
		redirect('Asets/Aset/pengembalian');
	}


}

?>