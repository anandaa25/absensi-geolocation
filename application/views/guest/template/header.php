<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css ">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css">

    <!-- baru -->

</head>
<style>
    .jumbotron {
        background: url('<?= "assets/bus als1.png" ?>')
    }

    .bayangan {
        text-shadow: 1px 3px 4px #000;
    }
</style>

<body <?php if ($this->uri->segment(1) === 'printpembayaran') : ?> onload="window.print()" <?php else : endif; ?>>

    <body <?php if ($this->uri->segment(1) === 'print') : ?> onload="window.print()" <?php else : endif; ?>>

        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <img src="assets/favicon.png" width="50" height="50" style="float:left">
                <a class="navbar-brand" href="#">Reservation Tiket ALS</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if ($user['role_id'] == 2) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('konfirmasi') ?>">Konfirmasi Pembayaran</a>
                        </li>
						<li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('pembatalan') ?>">Pembatalan Tiket</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('tentang') ?>">Tentang Kami</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('kontak') ?>">Kontak</a>
                    </li>
                    <?php if ($user['role_id'] == 2) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('riwayat') ?>">Riwayat</a>
                        </li>
                    <?php endif ?>

                </ul>
                <?php if ($user['role_id'] == 2) : ?>
                    <div class="mr-4">
                        <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>

                            <img src="<?php echo base_url() . '/gambar/' . $user['image']; ?>" class="rounded-circle" width="40px" height="40px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="fa fa-user pr-2"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fa fa-power-off pr-2"></i> Logout</a>
                        </div>
                    </div>
                <?php else : ?>
                    <a class="nav-link" href="<?= base_url('Login') ?>">Login</a>
                <?php endif ?>
            </div>
        </nav>