 <!--Main Content-->

 <div class="row main-content">
     <!--Sidebar left-->
     <div class="col-sm-3 col-xs-6 sidebar pl-0">
         <div class="inner-sidebar mr-3">
             <!--Image Avatar-->
             <div class="avatar text-center">
                 <img src="<?php echo base_url() . '/gambar/' . $user['image']; ?>" alt="" class="rounded-circle" />
                 <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span> -->
                 <p><strong><?= $user['name']; ?></strong></p>
                 <span class="text-primary small"><strong>Selamat Datang</strong></span>
             </div>

             <!--Sidebar Navigation Menu-->
             <div class="sidebar-menu-container">
                 <ul class="sidebar-menu mt-4 mb-4">
                     <li class="parent">
                         <a href="<?= base_url() ?>admin/dashboard" class=""><i class="fa fa-puzzle-piece mr-3"></i>
                             <span class="none">Dashboard </span>
                         </a>
                     </li>

                     <li class="parent">
                         <a href="<?= base_url() ?>admin/lokasi" class=""><i class="fab fa-meetup mr-3"></i>
                             <span class="none">Kelola Lokasi </span>
                         </a>
                     </li>
                     <li class="parent">
                         <a href="<?= base_url() ?>admin/bus" class=""><i class="fab fa-meetup mr-3"></i>
                             <span class="none">Kelola Bus </span>
                         </a>
                     </li>
                     <li class="parent">
                         <a href="<?= base_url() ?>admin/jadwal" class=""><i class="fas fa-podcast mr-3"> </i>
                             <span class="none">Kelola Jadwal </span>
                         </a>
                     </li>
                     <li class="parent">
                         <a href="<?= base_url() ?>admin/seat" class=""><i class="fab fa-bandcamp mr-3"> </i>
                             <span class="none">Kelola Seat </span>
                         </a>
                     </li>

                     <li class="parent">
                         <a href="<?= base_url() ?>admin/konfirmasi-pembayaran" class=""><i class="fas fa-handshake mr-3"> </i>
                             <span class="none">Konfirmasi Pembayaran </span>
                         </a>
                     </li>
                     <li class="parent">
                         <a href="<?= base_url() ?>admin/data-transaksi" class=""><i class="fas fa-handshake mr-3"> </i>
                             <span class="none">Data Transaksi </span>
                         </a>
                     </li>
                 </ul>
             </div>

             <!--Sidebar Naigation Menu-->
         </div>
     </div>
     <!--Sidebar left-->