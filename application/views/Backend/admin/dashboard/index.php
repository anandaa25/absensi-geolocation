 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
   <h5 class="mb-3"><strong>Dashboard</strong></h5>
   <?php if ($this->session->flashdata('flash')) : ?>
     <div class="alert alert-info alert-dismissible fade show" role="alert">
       <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
       <?= $this->session->unset_userdata('flash'); ?>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
   <?php endif ?>

   <!--Dashboard widget-->
   <div class="mt-1 mb-3 button-container">
     <div class="alert alert-primary" role="alert">
       <div class="row align-items-center">
         <div class="col-lg-8">
           <p>Selamat Datang, <b><?= $user['name'] ?></b></p>
         </div>
         <div class="col-lg-1" style="left: 45px;">
           <button class="btn" style="background: #B0C4DE   ;" data-toggle="modal" data-target=".myModal"> Ubah Profil</button>
         </div>
         <div class="col-lg-1" style="left: 80px;">
           <button class="btn" style="background: #B0C4DE   ;" data-toggle="modal" data-target=".myModalpassword"> Ubah Password</button>
         </div>
       </div>
     </div>
     <div class="mt-1 mb-3 button-container">
       <div class="row pl-0">
         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-secondary">
             <a href="<?= base_url() ?>admin/pegawai">
               <p class="pw-2 text-center text-white">
                 <i class="fa fa-users"></i>
               </p>
             </a>
             <a href="<?= base_url() ?>admin/pegawai">
               <p class="mt-2 text-white text-center">Data Pegawai</p>
             </a>
           </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-red">
             <a href="<?= base_url() ?>admin/tampil-konfirmasi">
               <p class="pw-2 text-center text-white">
                 <i class="fa fa-bookmark"></i>
               </p>
             </a>
             <a href="<?= base_url() ?>admin/tampil-konfirmasi">
               <p class="mt-2 text-white text-center">Absensi Hari Ini</p>
             </a>
           </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-dark-blue">
             <a href="<?= base_url() ?>admin/absen-bulanan">
               <p class="pw-2 text-center text-white">
                 <i class="fa fa-file-powerpoint"></i>
               </p>
             </a>
             <a href="<?= base_url() ?>admin/absen-bulanan">
               <p class="mt-2 text-white text-center">Laporan Absensi</p>
             </a>
           </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-info">
             <a href="<?= base_url() ?>admin/laporan-tpp-bulanan">
               <p class="pw-2 text-center text-white">
                 <i class="fa fa-credit-card"></i>
               </p>
             </a>
             <a href="<?= base_url() ?>admin/laporan-tpp-bulanan">
               <p class="mt-2 text-white text-center">Gaji Bulanan</small></p>
             </a>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!--/Dashboard widget-->


   <div class="mt-1 mb-5 button-container">
     <div class="card shadow-sm">
       <div class="card-header  bg-dark-blue">
         <h6 class="text-white">Selamat Datang Di Sistem Informasi Absensi Pegawai</h6>
       </div>
       <div class="card-body">
         <p class="card-text p-typo">
           <center>Sistem informasi ini merupakan sebuah sistem informasi yang digunakan oleh PT. Mandiri Rajawali Hutama
             Untuk penggajian dan absensi pegawai</center>
         </p>
       </div>
     </div>
   </div>

   <div class="modal fade myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header text-center">
           <h5 class="modal-title text-secondary"><strong>Edit Profil</strong></h5>
           <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body text-justify">
           <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-profil' ?>/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
             <div class="modal-body">
               <div class="form-group">
                 <label class="col-sm-12">Email</label>
                 <div class="col-sm-12">
                   <input type="text" name="email" class="form-control " value="<?= $user['email'] ?>" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-12">Nama</label>
                 <div class="col-sm-12">
                   <input type="text" name="nama" class="form-control" value="<?= $user['name'] ?>">
                 </div>
               </div>

             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>

             </div>
           </form>
         </div>

       </div>
     </div>
   </div>

   <div class="modal fade myModalpassword" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header text-center">
           <h5 class="modal-title text-secondary"><strong>Perbarui Password</strong></h5>
           <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body text-justify">

           <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-password' ?>/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
             <div class="modal-body">
               <div class="form-group">
                 <label class="col-sm-12">Password Lama</label>
                 <div class="col-sm-12">
                   <input type="text" name="password_lama" class="form-control ">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-12">Password Baru</label>
                 <div class="col-sm-12">
                   <input type="text" name="password_baru" class="form-control">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-12">Konfirmasi Password</label>
                 <div class="col-sm-12">
                   <input type="text" name="password_baru1" class="form-control">
                 </div>
               </div>

             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>

             </div>
           </form>
         </div>

       </div>
     </div>
   </div>