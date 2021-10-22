<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br><br><br>
                <p class="display-4 text-white"> <strong>SELAMAT DATANG DI RESERVATION TIKET ALS</strong> </p>
                <h6 class="text-white bayangan">Selamat datang di website kami Anda Bisa Melakukan Reservasi Tiket Secara Online. <br>
                    Terimakasih atas kepercayaan dalam menggunakan ALS sebagai sarana terpecaya dalam menyediakan <br>
                    transportasi bis di wilayah Sumatera. Tetap Gunakan masker, Stay Safe and Keep Healthy</h6>
            </div>
            <div class="col-md-4">
                <form action="<?= base_url('cariTiket') ?>" method="POST">
                <a class="nav-link text-white font-weight-bold" href="<?= base_url('tentang') ?>">Syarat & Ketentuan</a>
                    <div class="form-group">
                        <label class="text-white bayangan font-weight-bold">Daerah Asal</label>
                        <select name="dari" class="form-control">
                            <?php foreach ($bus as $bs) : ?>
                                <option value="<?= $bs->id_lokasi ?>"><?= $bs->nama_daerah ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-white bayangan font-weight-bold">Tujuan</label>
                        <select name="tujuan" class="form-control">
                            <?php foreach ($bus as $bs) : ?>
                                <option value="<?= $bs->id_lokasi ?>"><?= $bs->nama_daerah ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-white bayangan font-weight-bold">Tanggal Berangkat</label>
                        <input type="date" name="tanggal" class="form-control" min="<?= date('Y-m-d'); ?>" value='<?= date('Y-m-d'); ?>'>
                    </div>
                    <div class="form-group">
                        <label class="text-white bayangan font-weight-bold">Jumlah Penumpang</label>
                        <select name="jumlah" class="form-control">
                            <?php for ($i = 1; $i < 5; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?> Penumpang</option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <button class="btn btn-block font-weight-bold" style="background-color: #8FBC8F">Cari Tiket</button>
                </form>
            </div>
        </div>


    </div>
</div>

<div class="container">
    <hr>
    <?php if (!isset($tiket)) : ?>

    <?php else : ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead style="background-color: #8FBC8F" class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Bus</th>
                        <th>Tanggal Berangkat</th>
                        <th>Total Penumpang</th>
                        <th>Total Kursi Tersedia</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    <?php foreach ($tiket as $tk) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $tk['nama_bus'] ?> || <?= $tk['fasilitas'] ?></td>
                            <td><?php $date = date_create($tk['tgl_berangkat']);
                                echo date_format($date, "d-m-Y h:i:s"); ?>
                            </td>
                            <td><?= $penumpang ?> Orang
                            </td>
                            <td>
                                <?php if ($penumpang <= $tk['totkur']) : ?>
                                    <?= $tk['totkur'] ?>-
                                    <span class="badge badge-success">Kursi Tersedia</span>
                                <?php else : ?>
                                    <?= $tk['totkur'] ?>-
                                    <span class="badge badge-danger">Kursi Penuh</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($penumpang <= $tk['totkur']) : ?>
                                    <?php if (!empty($user['role_id']) && $user['role_id'] != 1) : ?>
                                        <a class=" btn font-weight-bold" style="background-color: #8FBC8F" href="<?= base_url('pesan/' . $tk['id_jadwal'] . '?p=' . $penumpang) ?>">Pesan</a>
                                    <?php else : ?>
                                        <a class="btn font-weight-bold" style="background-color: #8FBC8F" href="<?= base_url('Login') ?>" onclick="return confirm('Harap Login Terlebih Dahulu!');">Pesan</a>
                                    <?php endif ?>
                                <?php else : ?>
                                    <a class="btn font-weight-bold" style="background-color: #8FBC8F" href="#" onclick="return confirm('Jumlah Kursi Yang dipesan tidak tersedia!');">Pesan</a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    </hr>
</div>