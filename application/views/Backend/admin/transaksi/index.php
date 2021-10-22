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

                 </div>
                 <!-- PENCARIAN BERDASARKAN BULAN DAN TAHUN-->
                 <form action="data-transaksi" method="post">
                     <div class=" row">

                         &nbsp;Tahun : &nbsp;
                         <select name="th" id="th" class="form-control mb-3 col-md-3">
                             <option value="">- PILIH -</option>
                             <?php
                                foreach ($list_th as $t) {
                                    if ($thn == $t['th']) {
                                ?>
                                     <option selected value="<?php echo $t['th'];  ?>"><?php echo $t['th']; ?></option>
                                 <?php
                                    } else {
                                    ?>
                                     <option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
                             <?php
                                    }
                                }
                                ?>
                         </select>
                         &nbsp;Bulan : &nbsp;

                         <select name="bln" id="bln" class="form-control mb-3 col-md-3">
                             <option value="">- PILIH -</option>
                             <?php
                                foreach ($list_bln as $t) {
                                    if ($blnnya == $t['bln']) {
                                ?>
                                     <option selected value="<?php $t['bln'];  ?>"><?php echo nmbulan($t['bln']); ?></option>
                                 <?php
                                    } else {
                                    ?>
                                     <option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
                             <?php
                                    }
                                }
                                ?>
                         </select>
                         &nbsp;
                         <?php if ($datatransaksi == null) : ?>
                             <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i>Cari</button>
                         <?php else : ?>
                             <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i>Refresh</button>
                         <?php endif ?>
                         &nbsp;
                         <?php if ($blnnya == '' || $thn == '') { ?>
                             &nbsp;<a target="_blank" href="" class="btn btn-danger mb-3" hidden><i class="fa fa-print"></i> Cetak</a>
                         <?php } else { ?>
                             &nbsp;<a target="_blank" href="<?= base_url(); ?>admin/cetak-Transaksi/<?php echo $thn  ?>/<?php echo $blnnya  ?>" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
                         <?php } ?>


                         <!--  -->
                     </div>
                 </form>

                 <div class="table-responsive">
                     <table id="example" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>KODE PEMBAYARAN</th>
                                 <th>NAMA PEMESAN</th>
                                 <th>NAMA BUS</th>
                                 <th>JUMLAH PESANAN</th>
                                 <th>RUTE</th>
                                 <th>TANGGAL</th>
                                 <th>HARGA</th>
                                 <th>STATUS</th>
                                 <th>AKSI</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1;
                                $total = 0; ?>
                             <?php
                                foreach ($datatransaksi as $b) : ?>
                                 <tr>
                                     <td><?= $no++ ?></td>
                                     <td><?= $b['nomor_pembayaran']; ?></td>
                                     <td><?= $b['nama_pelanggan']; ?></td>
                                     <td><?= $b['nama_bus']; ?></td>
                                     <td><?= $b['jml_penumpang']; ?> Penumpang</td>
                                     <td> <?php foreach ($lokasi as $l) : ?>
                                             <?php if ($b['id_asal'] ==  $l['id_lokasi']) : ?>
                                                 <?= $l['nama_daerah']; ?>
                                             <?php endif; ?>
                                             <?php endforeach; ?>-<?php foreach ($lokasi as $l) : ?>
                                             <?php if ($b['id_tujuan'] ==  $l['id_lokasi']) : ?>
                                                 <?= $l['nama_daerah']; ?>
                                             <?php endif; ?>
                                         <?php endforeach; ?>
                                     </td>
                                     <td><?= $b['tgl_berangkat']; ?></td>
                                     <td><?= rupiah($b['total_pembayaran']); ?>
                                         <?php $total = $total + $b['total_pembayaran']; ?>
                                     </td>
                                     <td>
                                         <?php if ($b['status'] == 0) : ?>
                                             <span class="badge badge-danger">Belum Bayar</span>
                                         <?php else : ?>
                                             <span class="badge badge-success">Lunas</span>
                                         <?php endif ?>
                                     </td>
                                     <td>
                                         <div class='btn-group btn-group-sm'>

                                             <a class="btn btn-info ml-3" href="<?= base_url('admin/detail-transaksi') ?>/<?= $b['kode_booking'] ?>">Detail Pelanggan</a>


                                         </div>
                                     </td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                     <?php if ($blnnya != '' && $thn != '') : ?>
                         <tr>
                             <td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                 &nbsp; &nbsp;&nbsp; &nbsp; <strong> Pendapatan Bulan Ini : <?= rupiah($total) ?></strong></td>
                         </tr>
                     <?php endif ?>
                 </div>
             </div>


         </div>