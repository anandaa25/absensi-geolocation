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
                                 <th>NAMA DAERAH</th>
                                 <th>AKSI</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1; ?>
                             <?php
                                foreach ($lokasi as $lok) : ?>
                                 <tr>
                                     <td><?= $no++ ?></td>
                                     <td><?= $lok['nama_daerah']; ?></td>
                                     <td>
                                         <div class='btn-group btn-group-sm'>
                                             <a class="btn btn-theme" data-toggle="modal" data-target=".bd-example-modal<?php echo $lok['id_lokasi']; ?>"><span class="fa fa-pencil"></span></a>
                                             <a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-lokasi') ?>/<?= $lok['id_lokasi']; ?>" onclick="return confirm('Yakin Ingin Menghapus Daerah?');"><span class="fa fa-trash "></span></a>
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
                     <div class="card">
                         <div class="card-header bg-theme text-center text-white">Form Tambah Daerah</div>
                         <div class="card-body">
                             <form action="<?= base_url('admin/tambah-lokasi') ?>" method="POST">
                                 <div class="form-group">
                                     <label>Nama Daerah</label>
                                     <input type="text" class="form-control" name="xnama" placeholder="Nama Daerah">
                                 </div>
                                 <button class="btn btn-block btn-info">Tambah Daerah</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

         </div>







         <?php foreach ($lokasi as $i) :
                $id_lokasi = $i['id_lokasi'];
                $nama_daerah = $i['nama_daerah'];

            ?>
             <div class="modal fade bd-example-modal<?php echo $id_lokasi; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header text-center">
                             <h5 class="modal-title text-secondary"><strong> Edit Daerah</strong></h5>
                             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                         </div>
                         <div class="modal-body text-justify">
                             <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-lokasi/' ?>/<?php echo $id_lokasi; ?>" method="post" enctype="multipart/form-data">
                                 <div class="modal-body">

                                     <div class="form-group">
                                         <label for="inputEmail3" class="col-sm-4 control-label">Nama Daerah</label>
                                         <div class="col-sm-7">
                                             <input type="text" name="xnama" class="form-control" value="<?php echo $nama_daerah; ?>" id="inputEmail3" placeholder="Email" required>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                                 </div>
                             </form>
                         </div>

                     </div>
                 </div>
             </div>
         <?php endforeach; ?>