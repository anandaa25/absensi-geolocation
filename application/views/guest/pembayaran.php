<?php if ($this->session->flashdata('nomor') === NULL) : ?>
    <div class='container-fluid'>
        <div class='row justify-content-center my-3'>
            <div class='col-md-5'>
                <div class='alert alert-danger'>
                    <h4>Anda Telah Merefresh Halaman !!</h4>
                    <p>Silahkan lakukan pemesanan tiket kembali jika belum mendapatkan kode pembayaran</p>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>

    <div class='container-fluid'>
        <div class='row justify-content-center my-3'>
            <div class='col-md-5'>
                <div class='alert alert-danger'>
                    <h4>PERINGATAN !! <br>JANGAN REFRESH HALAMAN INI !</h4>
                    <p> Untuk menghindari kegagalan sistem.</p>
                </div>
                <div class='card'>
                    <div class='card-body'>
                        <h1 class='text-success'>Selamat!</h1>
                        <h4>Anda Berhasil Melakukan Pemesanan Tiket</h4>
                        <hr>
                        <h6 class='text-danger text-center'>Silahkan Lakukan Pembayaran Sesuai Detail Berikut.</h6>
                        <br>
                        <h4 class="text-center">111-00-0211199802</h4>
                        <p class='text-center font-weight-bold mb-0'>a/n PT.Antar Lintas Sumatera</p>
                        <p class='text-center'>Kode Bank Mandiri : 118</p>

                        <hr>

                        <h5 class='text-center'>Total Yang Harus Dibayar</h5>
                        <h3 class='text-center'><?= $this->session->flashdata('total') ?>/<?= $this->session->flashdata('total_penumpang') ?> Penumpang </h3>
                        <br>
                        <h5 class='text-center'>Kode Pembayaran Anda</h5>
                        <h4 class='text-center'><?= $this->session->flashdata('nomor') ?> </h4>
                        <br><br>
                        <form action="<?= base_url('printpembayaran') ?>" method="post">
                            <input type="hidden" name="kopem" value="<?= $this->session->flashdata('nomor') ?>">
                            <input type="hidden" name="total" value="<?= $this->session->flashdata('total') ?>">
                            <input type="hidden" name="total_penumpang" value="<?= $this->session->flashdata('total_penumpang') ?>">
                            <button type="submit" class="btn btn-danger btn-block text-black">PRINT</button>
                        </form>
                        <p class='text-danger'>*Jika sudah transfer silahkan konfirmasi pada link
                            <a target="blank" href="<?= base_url('konfirmasi') ?>">Konfirmasi Pembayaran</a>
                        </p>
                        <h4 class='text-center'>TERIMAKASIH</h4>







                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>