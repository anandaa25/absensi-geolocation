<?php


class Admin_model extends CI_model
{
    public function getAlllokasi()
    {
        $sql = "SELECT * from lokasi";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    // bus
    public function getAllbus()
    {
        $sql = "SELECT * from bus";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAlljadwalbus()
    {
        $sql = "SELECT jadwal.*, bus.nama_bus from bus, jadwal where bus.id_bus=jadwal.id_bus";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    // seat
    public function getAllseat()
    {
        $sql = "SELECT kursi.*, bus.nama_bus,jadwal.tgl_berangkat from kursi,bus,jadwal where jadwal.id_bus=bus.id_bus and jadwal.id_jadwal=kursi.id_jadwal";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getN_AI()
    {
        $sql = "SELECT MAX(id_jadwal) as id_jadwal FROM jadwal";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
    public function getAllseatbyid()
    {
        $sql = "SELECT kursi.*, bus.nama_bus,jadwal.tgl_berangkat from kursi,bus,jadwal where jadwal.id_bus=bus.id_bus and jadwal.id_jadwal=kursi.id_jadwal group by kursi.id_jadwal";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function insertKursi($bus, $jumlah)
    {
        for ($i = 1; $i <= $jumlah; $i++) {
            $data = array(
                'id_jadwal' => $bus,
                'no_kursi' => $i,
            );
            $insert = $this->db->insert('kursi', $data);
        }
        return $insert;
    }
    // jadwal
    public function getAlljadwal()
    {
        $sql = "SELECT jadwal.*, lokasi.nama_daerah,bus.nama_bus from jadwal, lokasi, bus where jadwal.id_bus = bus.id_bus and jadwal.id_asal=lokasi.id_lokasi";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getStatusPem($id)
    {
        $sql = "SELECT pembayaran.status from pembayaran where nomor_pembayaran = '$id'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
    // pembayaran
    public function getAllpembayaran()
    {
        $sql = "SELECT pembayaran.* from pembayaran order by tgl_pembayaran desc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function CekstatusBerangkat($id)
    {
        $sql = "SELECT jadwal.status from jadwal where id_jadwal = $id";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    // BATAS RIRI
    public function getAllPetugas()
    {
        $sql = "SELECT user.* from user where role_id=2";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getPetugas($id)
    {
        $sql = "SELECT user.* from user where role_id=2 and id='$id'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAllPelanggan()
    {
        $sql = "SELECT pelanggan.* from pelanggan";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAllPelaporan()
    {
        $sql = "SELECT pengaduan.*, pelanggan.nama_pelanggan as nampel from pelanggan, pengaduan
        where pelanggan.id_pelanggan=pengaduan.id_pelanggan order by pengaduan.id desc";

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getPelaporanDetail($id)
    {
        $sql = "SELECT pengaduan.*, pelanggan.nama_pelanggan as nampel from pelanggan, pengaduan
        where pelanggan.id_pelanggan=pengaduan.id_pelanggan and pengaduan.id='$id'";

        $result = $this->db->query($sql);
        return $result->row_array();
    }

    //transaksi
    public function getAllTransaksi($tgl1, $tgl2)
    {
        $sql = "SELECT pelanggan.id_pelanggan, booking.kode_booking,pembayaran.nomor_pembayaran, bus.nama_bus, pelanggan.nama_pelanggan, jadwal.id_asal, jadwal.id_tujuan, jadwal.tgl_berangkat, booking.jml_penumpang, pembayaran.total_pembayaran, pembayaran.status
        from pembayaran, bus,pelanggan, booking,jadwal where bus.id_bus= jadwal.id_bus and booking.id_jadwal=jadwal.id_jadwal and pelanggan.id_pelanggan=booking.id_pelanggan and
		pembayaran.status='2' and
                pembayaran.kode_booking=booking.kode_booking and pembayaran.tgl_pembayaran between '$tgl1' and '$tgl2';";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getAllTlaporan($tgl1, $tgl2)
    {
        $sql = "SELECT pelanggan.id_pelanggan, booking.kode_booking,pembayaran.nomor_pembayaran, bus.nama_bus, pelanggan.nama_pelanggan, jadwal.id_asal, jadwal.id_tujuan, jadwal.tgl_berangkat, booking.jml_penumpang, pembayaran.total_pembayaran, pembayaran.status
        from pembayaran, bus,pelanggan, booking,jadwal where bus.id_bus= jadwal.id_bus and booking.id_jadwal=jadwal.id_jadwal and pelanggan.id_pelanggan=booking.id_pelanggan and
                pembayaran.kode_booking=booking.kode_booking and pembayaran.tgl_pembayaran between '$tgl1' and '$tgl2';";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getPenumpang($booking)
    {
        $sql = "SELECT penumpang.* from penumpang where kode_booking='$booking'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getAllDetailTransaksi($kodebooking)
    {
        $sql = "SELECT pelanggan.nama_pelanggan, booking.kode_booking,pembayaran.nomor_pembayaran,pembayaran.bukti, bus.nama_bus, pelanggan.nama_pelanggan, jadwal.id_asal, jadwal.id_tujuan, jadwal.tgl_berangkat, booking.jml_penumpang, pembayaran.total_pembayaran, pembayaran.status
        from pembayaran, bus,pelanggan, booking,jadwal where bus.id_bus= jadwal.id_bus and booking.id_jadwal=jadwal.id_jadwal and pelanggan.id_pelanggan=booking.id_pelanggan and
                pembayaran.kode_booking=booking.kode_booking and booking.kode_booking='$kodebooking';";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
    public function getTahun()
    {
        $this->db->select('year(tgl_pembayaran) as th');
        $this->db->from('pembayaran');
        $this->db->group_by('year(tgl_pembayaran)');
        return $this->db->get()->result_array();
    }
    public function getBln()
    {
        $this->db->select('month(tgl_pembayaran) as bln');
        $this->db->from('pembayaran');
        $this->db->group_by('month(tgl_pembayaran)');
        return $this->db->get()->result_array();
    }
}
