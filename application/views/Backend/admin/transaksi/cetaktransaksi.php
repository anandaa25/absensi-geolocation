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


<!DOCTYPE html>
<html>

<head>
    <title>Cetak Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php base_url(); ?>asset/css/style.css">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <div class="">
        <img src="assets/favicon.png" width="100" height="100" style="float:left" class="mt-0">
    </div><br>
    <div class="">
        <table style="width: 100% ;">
            <tr>

                <td align="center">
                    <h6 class="text-center" style="line-height: 1.1; font-weight:bold;">
                        PT.Antar Lintas Sumatera<br>
                    </h6>
                    <small style=" font-weight:bold;">Jl.ByPass km 6 no.16 PADANG
                        Telp. (061)-7866685 (Hunting) Fax. (061)7866744
                        www.alspttransport.com
                        e-mail :office@alspttransport.com <br> Medan - Indonesia</small>

                </td>
            </tr>
        </table>
    </div>
    <hr class="line-title">

    <small>
        Waktu Cetak Laporan : <?php echo date('d-m-Y'); ?>
    </small>

    <div>

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

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $total = 0; ?>
                    <?php
                    foreach ($transaksi as $b) : ?>
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

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
    <br><br><br><br>
    <table border="0" width="100%">
        <tr>
            <td width="35%"></td>
            <td width="35%"></td>
            <td width="30%" align="center">
                <p>Padang, <?= date('d F Y') ?></p>
                <br><br><br><br>
                <p> (ADMIN ALS)</p>

            </td>
        </tr>

    </table>
</body>

</html>