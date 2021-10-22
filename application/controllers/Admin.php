<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk_admin') != TRUE) {
			$url = base_url('auth');
			redirect($url);
		};
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->db->from('jadwal');
		$data['jumjad'] = $this->db->count_all_results();



		$this->db->from('pembayaran');
		$data['jumtran'] = $this->db->count_all_results();



		$this->db->from('pelanggan');
		$data['jumpel'] = $this->db->count_all_results();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/dashboard/index', $data);
		$this->load->view('backend/template/footer');
	}

	public function lokasi()
	{
		$data['title'] = 'Kelola Lokasi';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();

		$data['lokasi'] = $this->Admin_model->getAlllokasi();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/lokasi/index', $data);
		$this->load->view('backend/template/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Kelola Lokasi';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();
		$nama = $this->input->post('xnama', true);
		$data = [
			"nama_daerah" => $nama,

		];
		$this->db->insert('lokasi', $data);
		$this->session->set_flashdata('flash', 'Berhasil ditambah');
		redirect('admin/lokasi');
	}
	public function edit($id)
	{
		$data['title'] = 'Kelola Lokasi';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();
		$nama = $this->input->post('xnama', true);
		$data = [
			"nama_daerah" => $nama,

		];
		$this->db->where('id_lokasi', $id);
		$this->db->update('lokasi', $data);
		$this->session->set_flashdata('flash', 'Berhasil diedit');
		redirect('admin/lokasi');
	}


	public function hapus($id)
	{
		$this->db->where('id_lokasi', $id);
		$this->db->delete('lokasi');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/lokasi');
	}

	// bus
	public function bus_index()
	{
		$data['title'] = 'Kelola Bus';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['bus'] = $this->Admin_model->getAllbus();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/bus/index', $data);
		$this->load->view('backend/template/footer');
	}

	public function tambah_bus()
	{
		$data['title'] = 'Kelola Bus';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();
		$nama = $this->input->post('xnama', true);
		$fasilitas = $this->input->post('xfasilitas', true);
		$plat = $this->input->post('xplat', true);
		$kursi = $this->input->post('xkursi', true);
		$data = [
			"nama_bus" => $nama,
			"fasilitas" => $fasilitas,
			"plat" => $plat,
			"kursi" => $kursi,
		];
		$this->db->insert('bus', $data);
		$this->session->set_flashdata('flash', 'Berhasil ditambah');
		redirect('admin/bus');
	}
	public function edit_bus($id)
	{
		$data['title'] = 'Kelola Lokasi';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();
		$nama = $this->input->post('xnama', true);
		$fasilitas = $this->input->post('xfasilitas', true);
		$plat = $this->input->post('xplat', true);

		$kursi = $this->input->post('xkursi', true);

		$data = [
			"nama_bus" => $nama,
			"fasilitas" => $fasilitas,
			"kursi" => $kursi,
			"plat" => $plat,

		];
		$this->db->where('id_bus', $id);
		$this->db->update('bus', $data);
		$this->session->set_flashdata('flash', 'Berhasil diedit');
		redirect('admin/bus');
	}


	public function hapus_bus($id)
	{
		$this->db->where('id_bus', $id);
		$this->db->delete('bus');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/bus');
	}



	// sat
	public function seat_index()
	{
		$data['title'] = 'Kelola Seat';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();

		$data['seat'] = $this->Admin_model->getAllseat();
		$data['idseat'] = $this->Admin_model->getAllseatbyid();
		// var_dump($data1);
		// die;
		$data['bus'] = $this->Admin_model->getAlljadwalbus();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/seat/index', $data);
		$this->load->view('backend/template/footer');
	}

	// public function tambah_seat()
	// {
	// 	$data['title'] = 'Kelola Seat';
	// 	// mengambil data user berdasarkan email yang ada di session
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

	// 	// $data['petugas'] = $this->db->get_where('user')->result_array();
	// 	$bus = $this->input->post('xbus', true);
	// 	$jumlah = $this->input->post('xjumlah', true);



	// 	$this->Admin_model->insertKursi($bus, $jumlah);
	// 	$this->session->set_flashdata('flash', 'Berhasil ditambah');
	// 	redirect('admin/seat');
	// }



	public function hapus_seat($id)
	{
		$this->db->where('id_kursi', $id);
		$this->db->delete('kursi');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/seat');
	}

	public function hapus_semua_seat()
	{

		$idjadwal = $this->input->post('xbus', true);
		$this->db->where('id_jadwal', $idjadwal);
		$this->db->delete('kursi');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/seat');
	}

	// jadwal
	public function jadwal_index()
	{
		$data['title'] = 'Kelola Jadwal';
		// mengambil data user yang login berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$data['jadwal'] = $this->Admin_model->getAlljadwal();
		$data['bus'] = $this->Admin_model->getAllbus();
		$data['lokasi'] = $this->Admin_model->getAlllokasi();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/jadwal/index', $data);
		$this->load->view('backend/template/footer');
	}

	public function tambah_jadwal()
	{
		$data['title'] = 'Kelola Jadwal';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$bus = $this->input->post('xbus', true);
		$asal = $this->input->post('xasal', true);
		$tujuan = $this->input->post('xtujuan', true);
		$tanggal = $this->input->post('xtanggal', true);
		$hargga = $this->input->post('xharga', true);
		$status = $this->input->post('xstatus', true);

		$data1 = $this->db->get_where('bus', ['id_bus' => $bus])->row_array();

		$idjadwal = $this->Admin_model->getN_AI();
		$idjadwal = $idjadwal['id_jadwal'] + 1;

		$data = [
			"id_jadwal" => $idjadwal,
			"id_bus" => $bus,
			"id_asal" => $asal,
			"id_tujuan" => $tujuan,
			"tgl_berangkat" => $tanggal,
			"harga" => $hargga,
			"status" => $status

		];
		$this->db->insert('jadwal', $data);
		$totkursi = $data1['kursi'];
		$this->Admin_model->insertKursi($idjadwal, $totkursi);
		$this->session->set_flashdata('flash', 'Berhasil ditambah');
		redirect('admin/jadwal');
	}

	public function edit_jadwal()
	{
		$data['title'] = 'Kelola jadwal';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();
		$nama = $this->input->post('xnama', true);
		$fasilitas = $this->input->post('xfasilitas', true);

		$id_jadwal = $this->input->post('kode', true);
		$bus = $this->input->post('xbus', true);
		$asal = $this->input->post('xasal', true);
		$tujuan = $this->input->post('xtujuan', true);
		$tanggal = $this->input->post('xtanggal', true);
		$hargga = $this->input->post('xharga', true);
		$status = $this->input->post('xstatus', true);

		$data = [
			"id_bus" => $bus,
			"id_asal" => $asal,
			"id_tujuan" => $tujuan,
			"tgl_berangkat" => $tanggal,
			"harga" => $hargga,
			"status" => $status

		];

		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('jadwal', $data);
		$this->session->set_flashdata('flash', 'Berhasil diedit');
		redirect('admin/jadwal');
	}

	public function hapus_jadwal($id)
	{
		$this->db->where('id_jadwal', $id);
		$this->db->delete('jadwal');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/jadwal');
	}


	public function berangkat_jadwal($id)
	{
		$data['title'] = 'Kelola jadwal';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jadwal'] = $this->Admin_model->getAlljadwal();
		$status_berangkat = $this->Admin_model->CekstatusBerangkat($id);


		if ($status_berangkat['status'] == 0) {
			$data = [
				"status" => 1,
			];
		}
		if ($status_berangkat['status'] == 1) {
			$data = [
				"status" => 0,
			];
		}

		$this->db->where('id_jadwal', $id);
		$this->db->update('jadwal', $data);
		$this->session->set_flashdata('flash', 'Berhasil diedit');
		redirect('admin/jadwal');
	}
	public function printjadwal()
	{
		// var_dump('haha');
		// die;
		$this->load->library('mypdf');
		$data['jadwal'] = $this->Admin_model->getAlljadwal();
		$data['lokasi'] = $this->Admin_model->getAlllokasi();
		$this->mypdf->generate('backend/admin/jadwal/cetakjadwal', $data);
	}

	//pembayaran
	public function pembayaran_index()
	{
		$data['title'] = 'Pembayaran';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();

		$data['pembayaran'] = $this->Admin_model->getAllpembayaran();
		// $data['bus'] = $this->Admin_model->getAllbus();
		// $data['lokasi'] = $this->Admin_model->getAlllokasi();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/pembayaran/index', $data);
		$this->load->view('backend/template/footer');
	}

	public function pembayaran_verifikasi($id)
	{

		$status = $this->Admin_model->getStatusPem($id);

		if ($status['status'] == 1) {
			$data = [
				"status" => 2,
			];
		}
		if ($status['status'] == 2) {
			$data = [
				"status" => 1,
			];
		}
		$this->db->where('nomor_pembayaran', $id);
		$this->db->update('pembayaran', $data);
		$this->session->set_flashdata('flash', 'Berhasil diedit');
		redirect('admin/konfirmasi-pembayaran');
	}

	public function hapus_pembayaran($id)
	{
		$this->db->where('id_jadwal', $id);
		$this->db->delete('jadwal');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/jadwal');
	}




	// BATAS RIRI

	//petugas
	public function petugas()
	{
		$data['title'] = 'Petugas';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();

		$data['petugas'] = $this->Admin_model->getAllPetugas();
		// var_dump($data1);
		// die;

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/petugas/index', $data);
		$this->load->view('backend/template/footer');
	}
	public function editpetugas($id)
	{
		$data['title'] = 'Petugas';
		$data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['petugasdetail'] =  $this->db->get_where('user', ['id' => $id])->row_array();
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama belum diisi!'
		]);

		if ($this->form_validation->run() == false) {

			$this->load->view('backend/template/header', $data);
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/template/sidebar', $data);
			$this->load->view('backend/admin/petugas/edit', $data);
			$this->load->view('backend/template/footer');
		} else {
			$nama = $this->input->post('nama', true);
			$notelp = $this->input->post('notelp', true);
			$email = $this->input->post('email', true);
			$data = [
				"name" => $nama,
				"no_telp" => $notelp,
				"email" => $email,
			];
			$this->db->where('id', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('flash', 'Berhasil diedit');
			redirect('admin/petugas');
		}
	}

	public function resetpasswordpetugas()
	{
		$id = $_GET['id'];
		$passwordbaru = "12345";

		$data = [
			"password" => password_hash($passwordbaru, PASSWORD_DEFAULT)
		];

		$this->db->where('id', $id);
		$this->db->update('user', $data);


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Password suda direset!
		 	 </div>');

		redirect('admin/petugas');
	}

	public function konfirmasi_petugas()
	{
		$id = $_GET['id'];
		$status = $_GET['status'];
		// var_dump($status);
		// die;
		if ($status == 0) {
			$data = [
				"is_active" => 1,
			];

			$this->db->where('id', $id);
			$this->db->update('user', $data);
			redirect('admin/petugas');
		} else if ($status == 1) {
			$data = [
				"is_active" => 0,
			];

			$this->db->where('id', $id);
			$this->db->update('user', $data);
			redirect('admin/petugas');
		}
	}

	/// PELANGGAN

	public function index_pelanggan()
	{
		$data['title'] = 'Pelanggan';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();

		$data['pelanggan'] = $this->Admin_model->getAllPelanggan();
		// var_dump($data1);
		// die;

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/pelanggan/index', $data);
		$this->load->view('backend/template/footer');
	}

	public function editpelanggan($id)
	{
		$data['title'] = 'Pelanggan';
		$data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pelanggandetail'] =  $this->db->get_where('pelanggan', ['id_pelanggan' => $id])->row_array();
		$data['jekel'] = ['L', 'P'];

		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama belum diisi!'
		]);

		if ($this->form_validation->run() == false) {

			$this->load->view('backend/template/header', $data);
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/template/sidebar', $data);
			$this->load->view('backend/admin/pelanggan/edit', $data);
			$this->load->view('backend/template/footer');
		} else {
			$id = $this->input->post('id', true);
			$nama = $this->input->post('nama', true);
			$jekel = $this->input->post('jekel', true);
			$alamat = $this->input->post('alamat', true);
			$telp = $this->input->post('telp', true);
			$data = [
				"id_pelanggan" => $id,
				"nama_pelanggan" => $nama,
				"jekel_pelanggan" => $jekel,
				"alamat" => $alamat,
				"telp" => $telp,
			];
			$this->db->where('id_pelanggan', $id);
			$this->db->update('pelanggan', $data);
			$this->session->set_flashdata('flash', 'Berhasil diedit');
			redirect('admin/index_pelanggan');
		}
	}

	public function tambah_pelanggan()
	{
		$data['title'] = 'Pelanggan';
		$data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jekel'] = ['L', 'P'];

		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama belum diisi!'
		]);

		$this->form_validation->set_rules('jekel', 'jekel', 'required', [
			'required' => 'jenis kelamin belum diisi!'
		]);

		if ($this->form_validation->run() == false) {

			$this->load->view('backend/template/header', $data);
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/template/sidebar', $data);
			$this->load->view('backend/admin/pelanggan/tambah', $data);
			$this->load->view('backend/template/footer');
		} else {
			$id = $this->input->post('id', true);
			$nama = $this->input->post('nama', true);
			$jekel = $this->input->post('jekel', true);
			$alamat = $this->input->post('alamat', true);
			$telp = $this->input->post('telp', true);
			$data = [
				"id_pelanggan" => $id,
				"nama_pelanggan" => $nama,
				"jekel_pelanggan" => $jekel,
				"alamat" => $alamat,
				"telp" => $telp,
			];
			$this->db->insert('pengaduan', $data);
			$this->session->set_flashdata('flash', 'Berhasil ditambah');
			redirect('admin/index_pelanggan');
		}
	}

	public function hapuspelanggan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pelanggan');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/index_pelanggan');
	}


	///pengaduan
	public function index_pengaduan()
	{
		$data['title'] = 'Pengaduan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengaduan'] = $this->Admin_model->getAllPelaporan();
		// $data['notif'] = $this->Admin_model->getAllNewNotif();


		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/pengaduan/index', $data);
		$this->load->view('backend/template/footer');
	}


	public function editpengaduan($idpeg, $id)
	{
		$data['title'] = 'Pengaduan';

		$data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pengaduandetail'] = $this->Admin_model->getPelaporanDetail($id);
		// var_dump($data1);
		// die;

		$data['stapeng'] = ['0', '1', '2'];
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama belum diisi!'
		]);


		if ($this->form_validation->run() == false) {

			$this->load->view('backend/template/header', $data);
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/template/sidebar', $data);
			$this->load->view('backend/admin/pengaduan/edit', $data);
			$this->load->view('backend/template/footer');
		} else {
			$status = $this->input->post('status', true);

			$data = [
				"status" => $status,
				"notif" => 1
			];

			// var_dump($id	);
			// die;
			$this->db->where('id', $id);
			$this->db->update('pengaduan', $data);
			$this->session->set_flashdata('flash', 'Berhasil diedit');
			redirect('admin/index_pengaduan');
		}
	}

	public function hapuspengaduan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pengaduan');
		$this->session->set_flashdata('flash', ' Berhasil Dihapus');
		redirect('admin/index_pengaduan');
	}

	// datatransaksi
	public function datatransaksi_index()
	{
		$data['title'] = 'Data Transaksi';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['petugas'] = $this->db->get_where('user')->result_array();
		// 
		$data['list_th'] = $this->Admin_model->getTahun();
		$data['list_bln'] = $this->Admin_model->getBln();
		$thn = $this->input->post('th');
		$bln = $this->input->post('bln');
		$thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
		$thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
		// 
		$data['datatransaksi'] = $this->Admin_model->getAllTransaksi($thnpilihan1, $thnpilihan2);
		$data['lokasi'] = $this->Admin_model->getAlllokasi();
		// var_dump($data['datatransaksi']);
		// die;
		$data['blnnya'] = $bln;
		$data['thn'] = $thn;


		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/transaksi/index', $data);
		$this->load->view('backend/template/footer');
	}
	public function detailtransaksi($kodebooking)
	{
		$data['title'] = 'Detail Transaksi';


		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail_transaksi'] = $this->Admin_model->getAllDetailTransaksi($kodebooking);
		$data['penumpang'] = $this->Admin_model->getPenumpang($kodebooking);
		$data['lokasi'] = $this->Admin_model->getAlllokasi();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/detail_transaksi/index', $data);
		$this->load->view('backend/template/footer');
	}


	public function cetak_transaksi($thn, $bln)
	{
		$this->load->library('mypdf');

		$data['blnnya'] = $bln;
		$data['thn'] = $thn;


		$thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
		$thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
		$data['lokasi'] = $this->Admin_model->getAlllokasi();
		$data['transaksi'] = $this->Admin_model->getAllTlaporan($thnpilihan1, $thnpilihan2);
		// var_dump($data['transaksi']);
		// die;
		$this->mypdf->generate('backend/admin/transaksi/cetaktransaksi', $data);
	}

	public function cetak_detailtransaksi($booking)
	{
		$this->load->library('mypdf');

		$data['detail_transaksi'] = $this->Admin_model->getAllDetailTransaksi($booking);
		$data['penumpang'] = $this->Admin_model->getPenumpang($booking);
		$data['lokasi'] = $this->Admin_model->getAlllokasi();
		// var_dump($data['transaksi']);
		// die;
		$this->mypdf->generate('backend/admin/detail_transaksi/cetakdetailtransaksi', $data);
	}
}
