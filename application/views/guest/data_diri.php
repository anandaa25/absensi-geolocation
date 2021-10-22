<div class="container my-4">
    <div class='card'>
        <div class='card-header' style='background-color: #8FBC8F'>INFO PERJALANAN</div>
        <div class='card-body'>
            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Nama Bus</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->nama_bus ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Waktu Berangkat</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->tgl_berangkat ?>'>
                </div>
            </div>


            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Rute</label>
                </div>
                <div class='col-md-9'>
                    <span>Dari</span>
                    <?php foreach ($lokasi as $l) : ?>
                        <?php if ($info->id_asal  ==  $l['id_lokasi']) : ?>
                            <input class='form-control' readonly disabled type="text" value='<?= $l['nama_daerah']; ?>'>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <span>Ke</span>
                    <?php foreach ($lokasi as $l) : ?>
                        <?php if ($info->id_tujuan  ==  $l['id_lokasi']) : ?>
                            <input class='form-control' readonly disabled type="text" value='<?= $l['nama_daerah']; ?>'>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Jumlah Penumpang</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $_GET['p'] ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Harga Per Tiket</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= 'Rp. ' . number_format($info->harga, 0, ',', '.') ?>'>
                </div>
            </div>


        </div>
    </div>

    <br>
    <form action="<?= base_url('pesanTiket') ?>" method='POST'>
        <input type="hidden" name='penumpang' value='<?= $_GET['p'] ?>'>
        <input type="hidden" name='id_jadwal' value='<?= $id_jadwal ?>'>
        <input type="hidden" name='harga' value='<?= $info->harga ?>'>
        <input type="hidden" name='idpelanggan' value='<?= $user['id'] ?>'>

        <div class='card'>
            <div class='card-header' style='background-color: #8FBC8F'>DETAIL PENUMPANG</div>
            <div class='card-body'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>>= 17 Tahun Nomor ID(KTP, SIM, PASSPORT)*</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= $_GET['p']; $i++) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <input type="text" class='form-control' name='nama<?= $i ?>' require>
                                </td>
                                <td>
                                    <input type="text" class='form-control' name='identitas<?= $i ?>' require>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                <button class='btn btn-success float-right'>Simpan & Lanjutkan</button>
            </div>
        </div>


    </form>
</div>