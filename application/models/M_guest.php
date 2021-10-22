<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_guest extends CI_Model
{

    public function getDataBus()
    {
        return $this->db->get('lokasi');
    }

    public function cari_tiket($id_asal, $id_tujuan, $tgl)
    {
        $sql = "SELECT jadwal.*,bus.nama_bus, bus.fasilitas,count(kursi.no_kursi) as totkur from jadwal,lokasi,bus,kursi where jadwal.id_bus=bus.id_bus and jadwal.id_asal=lokasi.id_lokasi  
        and kursi.id_jadwal=jadwal.id_jadwal and jadwal.id_asal = $id_asal and jadwal.id_tujuan = $id_tujuan and jadwal.status=0 and jadwal.tgl_berangkat like '%$tgl%' and kursi.status=0 group by jadwal.id_jadwal";
        $result = $this->db->query($sql);
        return $result;

        // $sql = "SELECT jadwal.*,bus.nama_bus, bus.fasilitas from jadwal,lokasi,bus where jadwal.id_bus=bus.id_bus and jadwal.id_asal=lokasi.id_lokasi  
        // and jadwal.id_asal = $id_asal and jadwal.id_tujuan = $id_tujuan and jadwal.status=0 and jadwal.tgl_berangkat like '%$tgl%'";
        // $result = $this->db->query($sql);
        // return $result;
    }

    public function getDataInfoPesan($id)
    {
        $sql = "SELECT jadwal.*, lokasi.nama_daerah,bus.nama_bus from jadwal, lokasi, bus where jadwal.id_bus = bus.id_bus and jadwal.id_asal=lokasi.id_lokasi
        and jadwal.id_jadwal=$id";
        $result = $this->db->query($sql);
        return $result;
    }
    public function cekDetailPenumpang($kode_booking, $idpelanggan)
    {
        $sql = "SELECT penumpang.id_kursi as nokur, penumpang.*, bus.nama_bus, jadwal.tgl_berangkat,booking.id_pelanggan from pelanggan,penumpang, jadwal, kursi, bus, booking where penumpang.kode_booking = booking.kode_booking and booking.id_jadwal= jadwal.id_jadwal and
        jadwal.id_bus = bus.id_bus and pelanggan.id_pelanggan=booking.id_pelanggan and jadwal.id_jadwal = kursi.id_jadwal  and booking.kode_booking = '$kode_booking' and pelanggan.id_pelanggan='$idpelanggan' group by penumpang.id_penumpang;";
        $result = $this->db->query($sql);
        return $result;
        // $sql = "SELECT penumpang.*, bus.nama_bus, kursi.no_kursi, jadwal.tgl_berangkat from penumpang, jadwal, kursi, bus, booking where penumpang.kode_booking = booking.kode_booking and booking.id_jadwal= jadwal.id_jadwal and
        // jadwal.id_bus = bus.id_bus and  jadwal.id_jadwal = kursi.id_jadwal  and booking.kode_booking = '$kode_booking' group by penumpang.id_penumpang;";
        // $result = $this->db->query($sql);
        // return $result;
    }
    public function getAllpembayaranbyid($idpelanggan)
    {
        $sql = "SELECT pembayaran.*, bus.nama_bus from pembayaran,booking, jadwal, bus where bus.id_bus=jadwal.id_bus and pembayaran.kode_booking=booking.kode_booking and jadwal.id_jadwal=booking.id_jadwal
        and booking.id_pelanggan='$idpelanggan'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getKursi($kode_booking, $idpelanggan)
    {
        $sql = "SELECT kursi.*,booking.id_pelanggan from booking, jadwal, kursi where booking.id_jadwal= jadwal.id_jadwal and jadwal.id_jadwal=kursi.id_jadwal and kursi.status = 0 and booking.kode_booking = '$kode_booking' and booking.id_pelanggan='$idpelanggan';";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getAllkursi()
    {
        $sql = "SELECT * from kursi";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getAlllokasi()
    {
        $sql = "SELECT * from lokasi";
        $result = $this->db->query($sql);
        return $result->result_array();
    }


    public function getTiket()
    {
        return $this->db->get('tiket');
    }

    public function insertPenumpang($data)
    {
        return $this->db->insert('penumpang', $data);
    }
    public function insertTiket($data)
    {
        return $this->db->insert('tiket', $data);
    }

    public function insertBooking($data)
    {
        return $this->db->insert('booking', $data);
    }

    public function insertPembayaran($data)
    {
        return $this->db->insert('pembayaran', $data);
    }

    public function getPembayaran()
    {
        return $this->db->get('pembayaran');
    }
    public function getBooking()
    {
        return $this->db->get('booking');
    }
    public function getPenumpang()
    {
        return $this->db->get('penumpang');
    }

    public function getPembayaranWhere($kode)
    {

        $sql = "SELECT pembayaran.*,booking.id_pelanggan from booking, pembayaran where booking.kode_booking = pembayaran.kode_booking
        and pembayaran.nomor_pembayaran='$kode';";
        $result = $this->db->query($sql);
        return $result;
        // $this->db->where('nomor_pembayaran', $kode);
        // return $this->db->get('pembayaran');
    }

    public function cekKonfirmasi($kode_booking)
    {
        $this->db->where('kode_booking', $kode_booking);

        return $this->db->get('penumpang');
    }
    public function cek_booking($nomor)
    {
        $sql = "SELECT booking.* from booking,pembayaran where booking.kode_booking=pembayaran.kode_booking and pembayaran.nomor_pembayaran='$nomor'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function insertBukti($name, $no)
    {
        $data = array(
            'bukti' => $name,
            'tgl_pembayaran' => date('Y-m-d'),
            'status' => 1
        );
        $this->db->where('nomor_pembayaran', $no);
        return $this->db->update('pembayaran', $data);
    }

    public function pilihNoKursi($data, $no)
    {
        $this->db->where('nomor_pembayaran', $no);
        return $this->db->update("pembayaran", $data);
    }

    public function PilihSeat($data, $no, $nama)
    {
        $this->db->where('nomor_tiket', $no);
        $this->db->where('nama', $nama);
        return $this->db->update("penumpang", $data);
    }

    public function getTiketWhere($tiket)
    {
        return $this->db->get_where('tiket', array('nomor_tiket' => $tiket));
    }


    public function validasiSeat($seat, $bagian, $no_kursi, $id_jadwal)
    {
        $this->db->where('seat', $seat);
        $this->db->where('bagian', $bagian);
        $this->db->where('no_kursi', $no_kursi);
        $this->db->where('tiket.id_jadwal', $id_jadwal);
        $this->db->join('tiket', 'tiket.nomor_tiket=penumpang.nomor_tiket');

        return $this->db->get('penumpang');
    }

    public function getPrint($kode_booking)
    {
        $sql = "SELECT penumpang.id_kursi, penumpang.nama_penumpang, booking.tgl_booking, bus.plat, bus.nama_bus, booking.kode_booking, jadwal.harga, jadwal.tgl_berangkat,
        pembayaran.total_pembayaran, pembayaran.status, jadwal.id_asal,jadwal.id_tujuan from penumpang,booking,bus,jadwal,pembayaran where
        bus.id_bus= jadwal.id_bus and booking.id_jadwal=jadwal.id_jadwal and booking.kode_booking=penumpang.kode_booking and 
        pembayaran.kode_booking=booking.kode_booking and booking.kode_booking='$kode_booking'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getKursiWhere($bagian, $no_tiket, $id_jadwal)
    {
        $this->db->select('*, kursi.kursi AS KURSI');
        $this->db->where('kursi.id_jadwal', $id_jadwal);
        $this->db->where('kursi.bagian', $bagian);
        $this->db->where('kursi.status', 0);
        return $this->db->get('kursi');
    }

    public function updateKursi($id)
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('id', $id);
        return $this->db->update('kursi', $data);
    }
}
