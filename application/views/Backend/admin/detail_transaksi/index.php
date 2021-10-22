 <!--Content right-->

 <?php

    function rupiah($angka)
    {

        $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }


    function nmbulan($angka)
    {

        switch ($angka) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
    ?>

 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
     <?php if ($this->session->flashdata('flash')) : ?>
         <div class="alert alert-info alert-dismissible fade show" role="alert">
             <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
     <?php endif ?>
     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">

         <div class="row">
             <div class="col-md-12">

                 <div class="row border-bottom mb-4">
                     <div class="col-sm-8 pt-2">
                         <h6 class="mb-4 bc-header"><?= $title ?></h6>

                     </div>
                     &nbsp;<a target="_blank" href="<?= base_url(); ?>admin/cetakdetail-Transaksi/<?= $detail_transaksi['kode_booking'] ?>" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>

                 </div>
                 <!-- PENCARIAN BERDASARKAN BULAN DAN TAHUN-->
                 <font size=3>
                     <div class="table-responsive text-gray-800">
                         <table class=border="2" width="100%" height="300">
                             <tr>
                                 <td rowspan="2" width=50%>
                                     <table width="100%">
                                         <tr>
                                             <td>Nama Pemesan</td>
                                             <td>:</td>
                                             <td><?= $detail_transaksi['nama_pelanggan'] ?></td>
                                         </tr>
                                         <tr>
                                             <td>Kode Pembayaran</td>
                                             <td>:</td>
                                             <td><?= $detail_transaksi['nomor_pembayaran'] ?></td>
                                         </tr>
                                         <tr>
                                             <td>Nama Bus</td>
                                             <td>:</td>
                                             <td>
                                                 PCX <?= $detail_transaksi['nama_pelanggan'] ?>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Penumpang</td>
                                             <td>:</td>
                                             <td>
                                                 <?php
                                                    foreach ($penumpang as $p) : ?>
                                                     - <?= $p['nama_penumpang'] ?><br>
                                                 <?php endforeach ?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Rute</td>
                                             <td>:</td>
                                             <td>
                                                 <?php foreach ($lokasi as $l) : ?>
                                                     <?php if ($detail_transaksi['id_asal']  ==  $l['id_lokasi']) : ?>
                                                         <?= $l['nama_daerah']; ?>
                                                     <?php endif; ?>
                                                     <?php endforeach; ?>-<?php foreach ($lokasi as $l) : ?>
                                                     <?php if ($detail_transaksi['id_tujuan'] ==  $l['id_lokasi']) : ?>
                                                         <?= $l['nama_daerah']; ?>
                                                     <?php endif; ?>
                                                 <?php endforeach; ?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Tanggal</td>
                                             <td>:</td>
                                             <td>
                                                 <?= $detail_transaksi['tgl_berangkat'] ?>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Harga</td>
                                             <td>:</td>
                                             <td>
                                                 <?= $detail_transaksi['total_pembayaran'] ?>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Status</td>
                                             <td>:</td>
                                             <td>
                                                 <?php if ($detail_transaksi['status'] == null) : ?>
                                                     -
                                                 <?php else : ?>
                                                     <?php if ($detail_transaksi['status'] == 2) : ?>
                                                         <span class="badge badge-primary">aktif</span>
                                                     <?php else : ?>
                                                         <span class="badge badge-danger">tidak aktif</span>
                                                     <?php endif ?>
                                                 <?php endif ?>
                                             </td>
                                         </tr>
                                     </table>
                                 </td>

                                 <td>
                                     <?php if ($detail_transaksi['bukti'] == null) : ?>
                                         <center><small> Bukti Transfer</small>
                                         <?php else : ?>
                                             <center><img src="<?php echo base_url() . '/assets/bukti/' . $detail_transaksi['bukti']; ?>" class="card-img" alt="Responsive image" style="width: 80%;">
                                             <?php endif ?>
                                 </td>

                             </tr>

                         </table>
                     </div>
                 </font>
             </div>
         </div>