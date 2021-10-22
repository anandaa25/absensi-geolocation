 <!--Content right-->

 <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
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


         <div class="col-md-12">

             <div class="row border-bottom mb-4">
                 <div class="col-sm-8 pt-2">
                     <h6 class="mb-4 bc-header"><?= $title ?></h6>
                 </div>

             </div>

             <div class="table-responsive">
                 <table id="example" class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>NOMOR PEMBAYARAN</th>
                             <th>KODE BOOKING</th>
                             <th>TANGGAL PEMBAYARAN</th>
                             <th>TOTAL PEMBAYARAN</th>
                             <th>BUKTI</th>
                             <th>STATUS</th>
                             <th>AKSI</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1; ?>
                         <?php
                            foreach ($pembayaran as $p) : ?>
                             <?php $idpem = $p['nomor_pembayaran'] ?>
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $p['nomor_pembayaran']; ?></td>
                                 <td><?= $p['kode_booking']; ?></td>
                                 <td><?= $p['tgl_pembayaran']; ?></td>
                                 
                                 <td><?= rupiah($p['total_pembayaran']) . ',-'; ?></td>
                                 <td><?= $p['bukti']; ?></td>
                                 <td>
                                     <?php if ($p['status'] == 0) : ?>
                                         <span class="badge badge-danger">Belum Bayar</span>
									
									<?php elseif ($p['status'] == 3) : ?>
                                         <span class="badge badge-warning">Tiket Batal</span>
                                     <?php else : ?>
                                         <span class="badge badge-success">Sudah Bayar</span>
                                     <?php endif ?>
                                 </td>
                                 <td>
                                     <?php if ($p['status'] == 1) : ?>
                                         <a onclick='return confirm("Yakin Ingin Verifikasi No Pembayaran <?= $idpem ?> ?");' href="<?= base_url('admin/verifikasi-pembayaran') ?>/<?= $p['nomor_pembayaran']; ?>" class="btn btn-success">Verifikasi</a>
                                     <?php else : ?>
                                         <a onclick='return confirm("Yakin Ingin Verifikasi No Pembayaran <?= $idpem ?> ?");' href="<?= base_url('admin/verifikasi-pembayaran') ?>/<?= $p['nomor_pembayaran']; ?>" class="btn btn-danger">Batal Verifikasi</a>
                                     <?php endif ?>

                                 </td>
                             </tr>
                         <?php endforeach ?>
                     </tbody>

                 </table>
             </div>



         </div>