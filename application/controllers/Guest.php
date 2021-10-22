<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('M_guest');
    }

    public function keHomepage()
    {
        $data['judul'] = 'Home Page';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['bus'] = $this->M_guest->getDataBus()->result();
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/homepage');
        $this->load->view('guest/template/footer');
    }

    public function konfirmasiPage()
    {
        if ($this->session->userdata('masuk_user') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };

        $data['judul'] = 'Halaman Konfirmasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $idpelanggan = $data['user']['id'];

        $data['error'] = '';

        if (isset($_GET['kode'])) :
            $kode = $_GET['kode'];
            $data['stat_pem'] = $this->M_guest->getPembayaranWhere($kode)->row_array();

            $kode_booking = $data['stat_pem']['kode_booking'];

            $data['detail'] = $this->M_guest->cekDetailPenumpang($kode_booking, $idpelanggan)->result();
            $data['kursikosong'] = $this->M_guest->getKursi($kode_booking, $idpelanggan)->result();
            $data['allkursi'] = $this->M_guest->getAllkursi();
        // var_dump($data['kursikosong']);
        // die;
        endif;

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/halaman_konfirmasi');
        $this->load->view('guest/template/footer');
    }

    public function pembatalanPage()
    {
        if ($this->session->userdata('masuk_user') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };

        $data['judul'] = 'Halaman Pembatalan Tiket';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $idpelanggan = $data['user']['id'];

        $data['error'] = '';

        if (isset($_GET['kode'])) :
            $kode = $_GET['kode'];
            $data['stat_pem'] = $this->M_guest->getPembayaranWhere($kode)->row_array();

            $kode_booking = $data['stat_pem']['kode_booking'];

            $data['detail'] = $this->M_guest->cekDetailPenumpang($kode_booking, $idpelanggan)->result();
            $data['kursikosong'] = $this->M_guest->getKursi($kode_booking, $idpelanggan)->result();
            $data['allkursi'] = $this->M_guest->getAllkursi();
        // var_dump($data['kursikosong']);
        // die;
        endif;

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/halaman_pembatalan');
        $this->load->view('guest/template/footer');
    }

    public function cari_tiket()
    {
        // $data = array(
        //     'id_asal' => $this->input->post('dari'),
        //     'id_tujuan' => $this->input->post('tujuan'),
        //     'status' => 0
        // );
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_asal = $this->input->post('dari');
        $id_tujuan = $this->input->post('tujuan');
        $tgl = $this->input->post('tanggal');


        $data['tiket'] = $this->M_guest->cari_tiket($id_asal, $id_tujuan, $tgl)->result_array();
        // var_dump($data1);
        // die;
        $data['penumpang'] = $this->input->post('jumlah');

        $data['judul'] = 'Home Page';
        $data['bus'] = $this->M_guest->getDataBus()->result();
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/homepage');
        $this->load->view('guest/template/footer');
    }

    public function pesan($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Formulir Data Diri';
        $data['info'] = $this->M_guest->getDataInfoPesan($id)->row();
        $data['lokasi'] = $this->M_guest->getAlllokasi();
        $data['id_jadwal'] = $id;
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/data_diri');
        $this->load->view('guest/template/footer');
    }

    public function pesanTiket()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //Generate Nomor Pembayaran
        $cek = $this->M_guest->getPembayaran()->num_rows() + 1;
        $no_pembayaran = 'PBY298' . $cek;

        //Generate kode booking
        $cek1 = $this->M_guest->getBooking()->num_rows() + 1;
        $kode_booking = 'BK000' . $cek1;

        //Generate kode penumpang
        $cek2 = $this->M_guest->getPenumpang()->num_rows() + 1;


        //cek total harga pesanan
        $penumpang = $this->input->post('penumpang');
        $harga = $this->input->post('harga');
        $total_pembayaran = $penumpang * $harga;

        //input pembayaran
        $no_tiket = 'TALS00' . $cek;

        $data = array(
            'nomor_pembayaran' => $no_pembayaran,
            'kode_booking' => $kode_booking,
            'total_pembayaran' => $total_pembayaran,
            'status' => 0
        );

        $this->M_guest->insertPembayaran($data);


        //Generate Nomor Tiket
        $cek = $this->M_guest->getTiket()->num_rows() + 1;

        //input data penumpang
        for ($i = 1; $i <= $penumpang; $i++) {
            $kode_penumpang = 'PN000' . $cek2;
            $data = array(
                'id_penumpang' => $kode_penumpang,
                'kode_booking' => $kode_booking,
                'nama_penumpang' =>  $this->input->post('nama' . $i),
                'no_identitas' =>  $this->input->post('identitas' . $i),
            );
            $this->M_guest->insertPenumpang($data);
            $cek2++;
        }
        //nanti kalau sudah semua jangan lupa, datanya terisi kalau dia sudah login. jadi tambhkan insert untuk data pelanggan

        //input data booking
        $data = array(
            'kode_booking' => $kode_booking,
            'tgl_booking' => date('Y-m-d'),
            'id_jadwal' => $this->input->post('id_jadwal'),
            'jml_penumpang' => $penumpang,
            'id_pelanggan' =>  $this->input->post('idpelanggan'),

        );
        $this->M_guest->insertBooking($data);

        $this->session->set_flashdata('nomor', $no_pembayaran);
        $this->session->set_flashdata('total', $total_pembayaran);
        $this->session->set_flashdata('total_penumpang', $penumpang);
        redirect('pembayaran', $total_pembayaran);
    }

    public function keHalamanPembayaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Konfirmasi Pembayaran';

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/pembayaran');
        $this->load->view('guest/template/footer');
    }

    public function cekKonfirmasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kode = $this->input->post('kode');

        redirect('konfirmasi?kode=' . $kode);
    }

    public function cekPembatalan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kode = $this->input->post('kode');

        redirect('pembatalan?kode=' . $kode);
    }
    public function batalkanTiket()
    {
        //$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kode = $this->input->post('kode_booking');
        $batal_tiket = $this->input->post('batal_tiket');
        $kursi_dipilih = $this->input->post('kursi_dipilih');

        $data = array(
            'status' => $batal_tiket
        );

        $this->db->where('nomor_pembayaran', $kode);
        $this->db->update('pembayaran', $data);

        if ($batal_tiket == "2") {
            $datak = array(
                'status' => 1
            );
        } else {
            $datak = array(
                'status' => 0
            );
        }
        $kk = explode(',', $kursi_dipilih);
        foreach ($kk as $kd) {
            $this->db->where('id_kursi', $kd);
            $this->db->update('kursi', $datak);
        }

        redirect('pembatalan?kode=' . $kode);
    }

    public function PilihSeat()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kodenya = $this->input->post('kode');
        $kode_booking = $this->input->post('kode_booking');
        $idpenumpang = $this->input->post('idpenumpang');
        $idkursi = $this->input->post('kursi');

        $kode = $this->M_guest->getPembayaranWhere($kodenya)->row();

        // asli
        $data['kursi'] = $this->db->get_where('kursi', ['id_kursi' => $idkursi])->row_array();
        $data['penumpang'] = $this->db->get_where('penumpang', ['id_penumpang' => $idpenumpang])->row_array();

        $idkursisebelumnya = $data['penumpang']['id_kursi'];

        if ($idkursisebelumnya != null) {

            $data = array(
                'status' => 0,
            );
            $this->db->where('id_kursi', $idkursisebelumnya);
            $this->db->update('kursi', $data);
        }


        if ($data['kursi']['status'] == 0) {
            $data = array(
                'id_kursi' => $idkursi,
            );
            $this->db->where('id_penumpang', $idpenumpang);
            $this->db->update('penumpang', $data);



            $data = array(
                'status' => 1,
            );
            $this->db->where('id_kursi', $idkursi);
            $this->db->update('kursi', $data);

            redirect('konfirmasi?kode=' . $kodenya);
        } else {

            $this->session->set_flashdata('alert', 'Maaf Seat, Bagian dan Nomor Kursi Sudah Tidak Tersedia');
            redirect('konfirmasi?kode=' . $kodenya);
        }
    }


    public function kirimKonfirmasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //upload gambar
        $config['upload_path'] = './assets/bukti/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 2048;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('konfirmasi', $error);
        } else {
            $data = $this->upload->data();
            $filename = $data['file_name'];
            $no = $this->input->post('nomor_pembayaran');
            $this->M_guest->insertBukti($filename, $no);

            // mendapatkan tiket untuk masing masing penumpang
            $jum_pen = $this->input->post('jum_pen');
            $booking = $this->M_guest->cek_booking($no);
            $id_jadwal = $booking['id_jadwal'];
            $cek = $this->M_guest->getTiket()->num_rows() + 1;
            // var_dump($id_jadwal);
            // die;
            for ($i = 1; $i < $jum_pen; $i++) {
                $kode_tiket = 'TK000' . $cek;
                $data = array(
                    'nomor_tiket' => $kode_tiket,
                    'id_penumpang' =>  $this->input->post('idpenumpang' . $i),
                    'id_jadwal' =>  $id_jadwal,

                );

                $this->M_guest->insertTiket($data);
                $cek++;
            }



            $this->session->set_flashdata('surat', 'Berhasil Mengirim Bukti, Silahkan Cek Kembali 5 Jam
            Kemudian Untuk Mengecek Pembayaran Anda');
            redirect('konfirmasi');
        }
    }

    public function print()
    {
        $data['judul'] = 'Print';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kode_booking = $this->input->post('kode_booking');

        $data['detail'] = $this->M_guest->getPrint($kode_booking)->result_array();
        $data['allkursi'] = $this->M_guest->getAllkursi();
        // var_dump($data['detail']);
        // die;
        $data['lokasi'] = $this->M_guest->getAlllokasi();
        $data['jml_penumpang'] = $this->M_guest->cekKonfirmasi($kode_booking)->num_rows();

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/print', $data);
        $this->load->view('guest/template/footer', $data);
    }

    public function keHomeTentang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tentang PT.ALS';

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/tentang');
        $this->load->view('guest/template/footer');
    }


    public function keHomeKontak()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Kontak PT.ALS';
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/kontak');
        $this->load->view('guest/template/footer');
    }

    public function printpembayaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Print Pembayaran';

        $kopem = $this->input->post('kopem');
        $total = $this->input->post('total');
        $total_penumpang = $this->input->post('total_penumpang');

        $data['kopem'] = $kopem;
        $data['total'] = $total;
        $data['total_penumpang'] = $total_penumpang;

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/printpembayaran', $data);
        $this->load->view('guest/template/footer', $data);
    }


    public function riwayat()
    {
        $data['judul'] = 'Riwayat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $idpelanggan = $data['user']['id'];
        $data['pembayaran'] = $this->M_guest->getAllpembayaranbyid($idpelanggan);

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/riwayat');
        $this->load->view('guest/template/footer');
    }
}
