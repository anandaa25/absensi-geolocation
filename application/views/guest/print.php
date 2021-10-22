<?php foreach ($detail as $dt) : ?>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <img src="assets/favicon.png" width="100" height="100" style="float:left">
                        <h4 class="text-center">..::PT. ANTAR LINTAS SUMATERA ::..</h4>
                        <h6 class="text-center"><small>Jl.ByPass km 6 no.16 PADANG <br>
                                Telp. (061)-7866685 (Hunting) Fax. (061)7866744 <br>
                                www.alspttransport.com <br>
                                e-mail :office@alspttransport.com <br>
                                Medan - Indonesia
                            </small></h6>

                        <hr>

                        <div class="row">
                            <!-- Kiri -->
                            <div class="col-md-6">
                                <p>Nama Pemesan <br> <strong><?= $dt['nama_penumpang'] ?><br> <?php foreach ($allkursi as $ak) : ?>
                                            <?php if ($ak['id_kursi']  ==  $dt['id_kursi']) : ?>
                                                Seat-<?= $ak['no_kursi'] ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?></strong></p>

                            </div>
                            <!-- Kanan -->
                            <div class="col-md-6">
                                <?php $date = date_create($dt['tgl_booking']); ?>
                                <p class="text-right"><strong> KODE BOOKING - (<?= $dt['kode_booking'] ?>)</strong> <br><strong><?= date_format($date, "d F Y") ?> <?= date_format($date, "h:i:s")  ?></strong>

                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- Kiri -->
                            <div class="col-md-5">
                                <p>Jumlah Penumpang : <strong><?= $jml_penumpang ?></strong></p>

                                <p>Harga Per Tiket <br> <strong><?= "Rp " . number_format($dt['harga'], 2, ',', '.'); ?></strong></p>
                                <p>Harga Total (<?= $jml_penumpang ?>-penumpang) <br> <strong><?= "Rp " . number_format($dt['harga'] * $jml_penumpang, 2, ',', '.'); ?></strong></p>
                                <p>Status : <strong class="text-success">Lunas</strong></p>
                            </div>
                            <!-- Kanan -->
                            <div class="col-md-7">
                                <p>Nama Bus <br> <strong><?= $dt['nama_bus'] ?></strong></p>
                                <?php $date = date_create($dt['tgl_berangkat']); ?>
                                <p>Berangkat <br> <strong><?= date_format($date, 'd F Y h:i:s') ?></strong></p>
                                <p>Plat Mobil <br> <strong><?= $dt['plat'] ?></strong></p>
                            </div>
                        </div>
                        <hr>
                        <p class="text-center">Rute : <strong>
                                <?php foreach ($lokasi as $l) : ?>
                                    <?php if ($dt['id_asal'] ==  $l['id_lokasi']) : ?>
                                        <?= $l['nama_daerah']; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?> - <?php foreach ($lokasi as $l) : ?>
                                    <?php if ($dt['id_tujuan'] ==  $l['id_lokasi']) : ?>
                                        <?= $l['nama_daerah']; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                        </p>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>