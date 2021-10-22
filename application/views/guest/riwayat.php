<div class="container-fluid">
    <div class="row justify-content-center my-6">
        <div class="col-md-8 ">
            <hr>
            <div class="alert alert-primary text-center">
                <h6>Berikut Data Transaksi Anda <strong> :</strong></h6>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMOR PEMBAYARAN</th>
                            <th>NAMA BUS</th>
                            <th>TANGGAL PEMBAYARAN</th>
                            <th>TOTAL PEMBAYARAN</th>
                            <th>BUKTI</th>
                            <th>STATUS</th>

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
                                <td><?= $p['nama_bus']; ?></td>
                                <td><?= $p['tgl_pembayaran']; ?></td>
                                <td><?= $p['total_pembayaran']; ?></td>
                                <td><?= $p['bukti']; ?></td>
                                <td>
                                    <?php if ($p['status'] == 0) : ?>
                                        <span class="badge badge-danger">Belum Bayar</span>
                                    <?php elseif ($p['status'] == 1) : ?>
                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                    <?php else : ?>
                                        <span class="badge badge-success">Sudah Bayar</span>
                                    <?php endif ?>
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>


        </div>


        <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
          -->

        </div>
    </div>
</div>
</div>
</div>