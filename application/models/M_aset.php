<?php  

class M_aset extends CI_Model{

	function get_all_aset(){
		return $this->db->query("SELECT * FROM tbl_aset ORDER BY id_aset DESC");
	}

	function get_aset_by_id($id){
		return $this->db->query("SELECT * FROM tbl_aset WHERE id_aset = $id");
	}

	function get_all_peminjaman(){
		return $this->db->query("SELECT * FROM tbl_peminjaman_aset ORDER BY id_peminjam DESC");
	}

	function get_peminjam_by_id($id){
		return $this->db->query("SELECT * FROM tbl_peminjaman_aset WHERE id_peminjam = $id");
	}

	function get_all_pengembalian(){
		return $this->db->query("SELECT * FROM tbl_pengembalian_aset ORDER BY id_pengembalian DESC");
	}


	// proses(){}

	function addasets($nomor,$tanggal,$lokasi,$tipe,$nomor_barang,$merk_barang,$tahun_barang,$nama_barang,$kondisi,$gambar){
		return $this->db->query("INSERT INTO tbl_aset (nomor_rak,tgl_masuk,lokasi,tipe,nomor_barang,merk_barang,tahun_barang,nama_barang,kondisi_barang,foto_barang) VALUES
							('$nomor','$tanggal','$lokasi','$tipe','$nomor_barang','$merk_barang','$tahun_barang','$nama_barang','$kondisi','$gambar') ");
	}

	function editasets($id,$nomor,$tanggal,$lokasi,$tipe,$nomor_barang,$merk_barang,$tahun_barang,$nama_barang,$kondisi,$gambar){
		return $this->db->query("UPDATE tbl_aset SET nomor_rak='$nomor',tgl_masuk='$tanggal',lokasi='$lokasi',tipe='$tipe',nomor_barang='$nomor_barang',merk_barang='$merk_barang',tahun_barang='$tahun_barang',nama_barang='$nama_barang',kondisi_barang='$kondisi',foto_barang='$gambar' WHERE id_aset=$id");
	}

	function editasets_tanpa_img($id,$nomor,$tanggal,$lokasi,$tipe,$nomor_barang,$merk_barang,$tahun_barang,$nama_barang,$kondisi){
		return $this->db->query("UPDATE tbl_aset SET nomor_rak='$nomor',tgl_masuk='$tanggal',lokasi='$lokasi',tipe='$tipe',nomor_barang='$nomor_barang',merk_barang='$merk_barang',tahun_barang='$tahun_barang',nama_barang='$nama_barang',kondisi_barang='$kondisi' WHERE id_aset=$id");
	}

	function hapusaset_peminjam($id){
		return $this->db->query("DELETE FROM tbl_peminjaman_aset WHERE id_aset=$id");
	}

	function hapusaset($id){
		return $this->db->query("DELETE FROM tbl_aset WHERE id_aset=$id");
	}

	function add_datapeminjam($nama,$id_aset,$nama_barang,$kondisi,$tanggal,$gambar){
		return $this->db->query("INSERT INTO tbl_peminjaman_aset (nama_peminjam,id_aset,nama_barang,kondisi_barang,tanggal_peminjaman,foto_barang) VALUES ('$nama','$id_aset','$nama_barang','$kondisi','$tanggal','$gambar')");
	}

	function edit_datapeminjam($id,$nama,$id_aset,$nama_barang,$kondisi,$tanggal,$gambar){
		return $this->db->query("UPDATE tbl_peminjaman_aset SET nama_peminjam='$nama',id_aset='$id_aset',nama_barang='$nama_barang',kondisi_barang='$kondisi',tanggal_peminjaman='$tanggal',foto_barang='$gambar' WHERE id_peminjam=$id ");
	}

	function edit_datapeminjam_tanpa_img($id,$nama,$id_aset,$nama_barang,$kondisi,$tanggal){
		return $this->db->query("UPDATE tbl_peminjaman_aset SET nama_peminjam='$nama',id_aset='$id_aset',nama_barang='$nama_barang',kondisi_barang='$kondisi',tanggal_peminjaman='$tanggal' WHERE id_peminjam = $id ");
	}

	function hapus_peminjam($id){
		return $this->db->query("DELETE FROM tbl_peminjaman_aset WHERE id_peminjam=$id");
	}

	function hapus_pengembalian_by_id_peminjam($id){
		return $this->db->query("DELETE FROM tbl_pengembalian_aset WHERE id_peminjam=$id");
	}

	function add_datapengembalian($id_peminjam,$nama,$nama_barang,$kondisi,$tanggal_peminjaman,$tanggal,$gambar){
		return $this->db->query("INSERT INTO tbl_pengembalian_aset (id_peminjam,nama_peminjam,nama_barang,kondisi_barang,tanggal_peminjaman,tanggal_pengembalian,foto_barang) VALUES ('$id_peminjam','$nama','$nama_barang','$kondisi','$tanggal_peminjaman','$tanggal','$gambar')" ) ;
	}

	function edit_pengembalian($id,$id_peminjam,$nama,$nama_barang,$kondisi,$tanggal,$gambar){
		return $this->db->query("UPDATE tbl_pengembalian_aset SET id_peminjam='$id_peminjam',nama_peminjam='$nama',nama_barang='$nama_barang',kondisi_barang='$kondisi',tanggal_pengembalian='$tanggal',foto_barang='$gambar' WHERE id_pengembalian='$id' ");
	}

	function edit_pengembalian_tanpa_image($id,$id_peminjam,$nama,$nama_barang,$kondisi,$tanggal){
		return $this->db->query("UPDATE tbl_pengembalian_aset SET id_peminjam='$id_peminjam',nama_peminjam='$nama',nama_barang='$nama_barang',kondisi_barang='$kondisi',tanggal_pengembalian='$tanggal' WHERE id_pengembalian='$id' ");
	}

	function hapus_pengembalian($id){
		return $this->db->query("DELETE FROM tbl_pengembalian_aset WHERE id_pengembalian=$id ");
	}


	

}
?>