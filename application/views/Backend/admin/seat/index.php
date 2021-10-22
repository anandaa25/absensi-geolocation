 <!--Content right-->



 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
     <?php if ($this->session->flashdata('flash')) : ?>
         <div class="alert alert-info alert-dismissible fade show" role="alert">
             <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
     <?php endif ?>
     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <div class="alert alert-danger">
             <h6><strong>Perhatian !</strong> Pastikan Admin Untuk Menginput Mengelola " <strong>Data Jadwal </strong>" Terlebih Dahulu, Sebelum mengisi data pada menu <strong>Kelola Seat!!</strong></h6>
         </div>
         <div class="row">
             <div class="col-md-8">

                 <div class="row border-bottom mb-4">
                     <div class="col-sm-8 pt-2">
                         <h6 class="mb-4 bc-header"><?= $title ?></h6>
                     </div>

                 </div>

                 <div class="table-responsive">
                     <table id="example" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>NAMA BUS</th>
                                 <th>TANGGAL BERANGKAT</th>
                                 <th>KURSI</th>
                                 <th>STATUS</th>
                                 <th>AKSI</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1; ?>
                             <?php
                                foreach ($seat as $b) : ?>
                                 <tr>
                                     <td><?= $no++ ?></td>
                                     <td><?= $b['nama_bus']; ?></td>
                                     <td><?= $b['tgl_berangkat']; ?></td>
                                     <td><?= $b['no_kursi']; ?></td>
                                     <td>
                                         <?php if ($b['status'] == 0) : ?>
                                             <span class="badge badge-danger">Belum Dipesan</span>
                                         <?php else : ?>
                                             <span class="badge badge-success">Sudah Dipesan</span>
                                         <?php endif ?>
                                     <td>
                                         <div class='btn-group btn-group-sm'>
                                             <a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-seat') ?>/<?= $b['id_kursi']; ?>" onclick="return confirm('Yakin Ingin Menghapus Daerah?');"><span class="fa fa-trash "></span></a>
                                         </div>
                                     </td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>

                     </table>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="row border-bottom mb-4">
                     <div class="col-sm-8 pt-2">
                         <h6 class="mb-4 bc-header">_</h6>
                     </div>
                 </div>
                 <div>
                     <!-- <div class="card">
                         <div class="card-header bg-theme text-center text-white">Form Tambah Seat</div>
                         <div class="card-body">
                             <form action="<?= base_url('admin/tambah-seat') ?>" method="POST">
                                 <div class=" form-group">
                                     <label for="jenis_kelamin">Pilih Bus</label>
                                     <?php $i = 0 ?>
                                     <?php foreach ($idseat as $s) : ?>
                                         <?php $idseat[$i] = $s['id_jadwal'];
                                            $i++ ?>
                                     <?php endforeach; ?>
                                     <select class="form-control" id="jekel" name="xbus">
                                         <option value="">==PILIH==</option>
                                         <?php $h = 0 ?>
                                         <?php foreach ($bus as $b) : ?>
                                             <?php if ($b['id_jadwal'] == $idseat[$h]) : ?>
                                                 <option hidden value="<?= $b['id_jadwal']; ?>"> <?= $b['nama_bus']; ?> ||| <?= $b['tgl_berangkat']; ?></option>
                                             <?php else : ?>
                                                 <option value="<?= $b['id_jadwal']; ?>"> <?= $b['nama_bus']; ?> ||| <?= $b['tgl_berangkat']; ?></option>
                                             <?php endif ?>
                                             <?php $h++ ?>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label>Jumlah Seat</label>
                                     <input type="text" class="form-control" name="xjumlah" placeholder="jumlah seat">
                                 </div>
                                 <button class="btn btn-block btn-info">Tambah</button>
                             </form>
                         </div>
                     </div> -->
                     <div class="card">
                         <div class="card-header bg-theme text-center text-white">Form Hapus Seat</div>
                         <div class="card-body">
                             <form action="<?= base_url('admin/hapus-allseat') ?>" method="POST">
                                 <div class=" form-group">
                                     <label for="jenis_kelamin">Pilih Bus</label>
                                     <select class="form-control" id="jekel" name="xbus">
                                         <option value="">==PILIH==</option>
                                         <?php $h = 0 ?>
                                         <?php foreach ($bus as $b) : ?>
                                             <option value="<?= $b['id_jadwal']; ?>"> <?= $b['nama_bus']; ?> ||| <?= $b['tgl_berangkat']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <button class="btn btn-block btn-danger">Hapus Kursi</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

         </div>