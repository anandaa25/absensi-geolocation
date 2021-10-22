<!DOCTYPE html>
<?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
?>
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

        <table class="table table-hover text-gray-800 mt-9" width="100%" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAMA BUS</th>
                    <th>ASAL</th>
                    <th>TUJUAN</th>
                    <th>TGL BERANGKAT</th>
                    <th>HARGA</th>
                    <th>STATUS</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php
                foreach ($jadwal as $b) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b['nama_bus']; ?></td>
                        <td>
                            <?php foreach ($lokasi as $l) : ?>
                                <?php if ($b['id_asal'] ==  $l['id_lokasi']) : ?>
                                    <?= $l['nama_daerah']; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($lokasi as $l) : ?>
                                <?php if ($b['id_tujuan'] ==  $l['id_lokasi']) : ?>
                                    <?= $l['nama_daerah']; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?= $b['tgl_berangkat']; ?></td>
                        <td><?= rupiah($b['harga']) . ',-'; ?></td>
                        <td>
                            <?php if ($b['status'] == 0) : ?>
                                <span class="badge badge-danger">Belum Berangkat</span>
                            <?php else : ?>
                                <span class="badge badge-success">Sudah Berangkat</span>
                            <?php endif ?>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
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