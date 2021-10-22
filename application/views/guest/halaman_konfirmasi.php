<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-md-6 ">

            <?php if ($this->session->flashdata('surat') !== null) :  ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('surat') ?>
                </div>

            <?php endif; ?>
            <div class="card">
                <div class="card-header text-black font-weight-bold text-center" style="background-color: #8FBC8F">
                    Konfirmasi Pembayaran
                </div>
                <div class="card-body">
                    <form action="<?= base_url('cekKonfirmasi') ?>" method="POST">
                        <div class="form-group">
                            <label>Kode Booking</label>
                            <input type="text" name='kode' class="form-control" placeholder="Kode Booking">
                        </div>

                        <button class="btn font-weight-bold float-right" style="background-color: #8FBC8F">Cek Kode Booking</button>
                    </form>
                </div>
            </div>
            <hr>
            <?php if (isset($_GET['kode']) && $stat_pem['id_pelanggan'] == $user['id']) : ?>
                <h5>Kode Booking : <?= $_GET['kode'] ?></h5>
                <div class="card">
                    <div class="card-header text-black font-weight-bold text-center" style="background-color: #8FBC8F">
                        Detail Pembayaran Anda
                    </div>
                    <div class="card-body">
                        <h3 class='text-center'>
                            <?php if ($stat_pem['status'] === '0') : ?>
                                <i class="fa fa-times text-danger"></i> Belum Dibayar <i class="fa fa-times text-danger"></i>
                            <?php elseif ($stat_pem['status'] === '1') : ?>
                                <i class="fa fa-times text-danger"></i> Menunggu Konfirmasi <i class="fa fa-times text-danger"></i>
                            <?php elseif ($stat_pem['status'] === '2') : ?>
                                <i class="fa fa-check text-success"></i> Sudah Dibayar <i class="fa fa-check text-success"></i>
                            <?php endif; ?>

                        </h3>
                        <?php if ($this->session->flashdata('alert') !== null) : ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('alert') ?>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama</th>
                                        <th>Tgl Berangkat</th>
                                        <th>Identitas</th>
                                        <th>Bus</th>
                                        <th>No Kursi</th>

                                        <?php if ($stat_pem['status'] === '0') : ?>
                                            <th>Aksi</th>
                                        <?php else : endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $dt) : ?>
                                        <tr class="text-center">
                                            <td><?= $dt->nama_penumpang ?></td>
                                            <td><?= $dt->tgl_berangkat ?></td>
                                            <td><?= $dt->no_identitas ?></td>
                                            <td><?= $dt->nama_bus ?></td>
                                            <td>

                                                <?php foreach ($allkursi as $ak) : ?>
                                                    <?php if ($ak['id_kursi']  ==  $dt->id_kursi) : ?>
                                                        Seat-<?= $ak['no_kursi'] ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                            </td>
                                            <?php if ($stat_pem['status'] === '0') : ?>
                                                <td>
                                                    <?php if ($dt->id_kursi === NULL) : ?>
                                                        <a data-toggle="modal" data-target="#pilihSeat<?= $dt->id_penumpang ?>" class="btn btn-sm btn-warning">Pilih</a>

                                                    <?php else : ?>
                                                        <a data-toggle="modal" data-target="#gantiSeat<?= $dt->id_penumpang ?>" class="btn btn-sm btn-success">Ganti</a>
                                                    <?php endif; ?>
                                                </td>
                                            <?php else : endif; ?>
                                        </tr>
                                        <?php if ($dt->id_kursi === NULL) : ?>
                                            <div class="modal fade" id="pilihSeat<?= $dt->id_penumpang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pilih Seat</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="<?= base_url('PilihSeat') ?>" method="post">
                                                            <input type="hidden" name="kode" value="<?= $_GET['kode'] ?>">
                                                            <input type="hidden" name="kodebooking" value="<?= $dt->kode_booking ?>">
                                                            <input type="hidden" name="idpenumpang" value="<?= $dt->id_penumpang ?>">
                                                            <div class="modal-body">
                                                                <img class="img-fluid img_bus" src="" alt="">
                                                                <br>
                                                                <p class="text-danger">Silahkan Pilih Kursi Yang Tersedia</p>
                                                                <select class="form-control " name="kursi" required>
                                                                    <?php foreach ($kursikosong as $kk) : ?>
                                                                        <option value="<?= $kk->id_kursi ?>"><?= $kk->no_kursi ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Pilih Seat</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="modal fade" id="gantiSeat<?= $dt->id_penumpang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Perbarui Seat</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="<?= base_url('PilihSeat') ?>" method="post">
                                                            <input type="text" name="kode" value="<?= $_GET['kode'] ?>">
                                                            <input type="text" name="kodebooking" value="<?= $dt->kode_booking ?>">
                                                            <input type="text" name="idpenumpang" value="<?= $dt->id_penumpang ?>">
                                                            <div class="modal-body">
                                                                <img class="img-fluid img_bus" src="" alt="">
                                                                <br>
                                                                <p class="text-danger">Silahkan Pilih Kursi</p>
                                                                <select class="form-control " name="kursi" required>
                                                                    <?php foreach ($kursikosong as $kk) : ?>
                                                                        <option value="<?= $kk->id_kursi ?>"><?= $kk->no_kursi ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Pilih Seat</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php $kodebooking = $dt->kode_booking ?>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <p><b>Total Pembayaran Anda : Rp. <?= $stat_pem['total_pembayaran'] ?></b></p>
                            <?php if ($stat_pem['status'] === '2') : ?>
                                <form action="<?= base_url('print') ?>" method="post">
                                    <input type="hidden" name="kode_booking" value="<?= $kodebooking ?>">
                                    <button type="submit" class="btn btn-block text-black" style="background-color: #8FBC8F">PRINT</button>
                                </form>
                            <?php endif; ?>
                            <?php if ($stat_pem['status'] === '0') : ?>
                                <h6 class='text-danger'>*pilih seat sesuai tiket yang di pesan</h6>
                                <div class="card-body text-danger">
                                    *NOTE:
                                    <br>SILAHKAN PILIH KURSI YANG BELUM TERISI
                                    <br>APABILA BUKTI PEMBAYARAN SUDAH TERUPLOAD ANDA TIDAK DAPAT MEMILIH KURSI LAGI
                                </div>
                                <?= form_open_multipart("kirimKonfirmasi"); ?>
                                <?php $i = 1;
                                foreach ($detail as $dt) : ?>

                                    <input type="hidden" name="idpenumpang<?= $i ?>" value="<?= $dt->id_penumpang ?>">
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                                <input type="hidden" name='jum_pen' value='<?= $i ?>'>
                                <input type="hidden" name='nomor_pembayaran' value='<?= $stat_pem['nomor_pembayaran'] ?>'>
                                <p class='text-danger'>Silahkan Kirim Bukti Pembayaran pada Kolom di Bawah.</p>
                                <input id="foto" type="file" name='userfile' class='form-control' required>
                                <br>
                                <p class="d-none" id="pesan"></p>
                                <?php if ($dt->id_kursi === null) : ?>
                                    <a class="btn btn-success btn-block" href="#" onclick="return confirm('Kursi Anda Kosong!');"> Kirim Bukti Pembayaran</a>

                                <?php else : ?>
                                    <button id="btn_konfirmasi" type='submit' class='btn btn-success btn-block'>Kirim Bukti Pembayaran</button>
                                <?php endif; ?>
                                <?= form_close(); ?>
                            <?php else : ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>