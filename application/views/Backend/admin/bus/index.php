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
                                 <th>NAMA BUS</th>
                                 <th>FASILITAS</th>
                                 <th>PLAT MOBIL</th>
                                 <th>TOTAL KURSI</th>
                                 <th>AKSI</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1; ?>
                             <?php
                                foreach ($bus as $b) : ?>
                                 <tr>
                                     <td><?= $no++ ?></td>
                                     <td><?= $b['nama_bus']; ?></td>
                                     <td><?= $b['fasilitas']; ?></td>
                                     <td><?= $b['plat']; ?></td>
                                     <td><?= $b['kursi']; ?></td>
                                     <td>
                                         <div class='btn-group btn-group-sm'>

                                             <a class="btn btn-theme" data-toggle="modal" data-target=".bd-example-modal<?php echo $b['id_bus']; ?>"><span class="fa fa-pencil"></span></a>
                                             <a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-bus') ?>/<?= $b['id_bus']; ?>" onclick="return confirm('Yakin Ingin Menghapus Daerah?');"><span class="fa fa-trash "></span></a>
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
                         <div class="card-header bg-theme text-center text-white">Form Tambah BUS</div>
                         <div class="card-body">
                             <form action="<?= base_url('admin/tambah-bus') ?>" method="POST">
                                 <div class="form-group">
                                     <label>Nama Bus</label>
                                     <input type="text" class="form-control" name="xnama" placeholder="Nama Bus">
                                 </div>
                                 <div class="form-group">
                                     <label>Fasilitas</label>
                                     <input type="text" class="form-control" name="xfasilitas" placeholder="Fasilitas">
                                 </div>
                                 <div class="form-group">
                                     <label>Plat</label>
                                     <input type="text" class="form-control" name="xplat" placeholder="Plat Mobil">
                                 </div>
                                 <div class="form-group">
                                     <label>Kursi</label>
                                     <input type="text" class="form-control" name="xkursi" placeholder="Jumlah Kursi">
                                 </div>
                                 <button class="btn btn-block btn-info">Tambah</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

         <?php foreach ($bus as $i) :
                $id_bus = $i['id_bus'];
                $nama_bus = $i['nama_bus'];
                $fasilitas = $i['fasilitas'];
                $kursi = $i['kursi'];
                $plat = $i['plat'];
            ?>
             <div class="modal fade bd-example-modal<?php echo $id_bus; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header text-center">
                             <h5 class="modal-title text-secondary"><strong> Edit Bus</strong></h5>
                             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                         </div>
                         <div class="modal-body text-justify">
                             <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-bus/' ?>/<?php echo $id_bus; ?>" method="post" enctype="multipart/form-data">
                                 <div class="modal-body">

                                     <div class="form-group">
                                         <label for="inputEmail3" class="col-sm-4 control-label">Nama Bus</label>
                                         <div class="col-sm-12">
                                             <input type="text" name="xnama" class="form-control" value="<?php echo $nama_bus; ?>" id="inputEmail3" placeholder="Email" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="inputEmail3" class="col-sm-4 control-label">Fasilitas</label>
                                         <div class="col-sm-12">
                                             <input type="text" name="xfasilitas" class="form-control" value="<?php echo $fasilitas; ?>" id="inputEmail3" placeholder="Email" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Kursi</label>
                                         <div class="col-sm-12">
                                             <input type="text" name="xkursi" class="form-control" value="<?php echo $kursi; ?>" id="inputEmail3" placeholder="Email" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="inputEmail3" class="col-sm-4 control-label">Plat Mobil</label>
                                         <div class="col-sm-12">
                                             <input type="text" name="xplat" class="form-control" value="<?php echo $plat; ?>" id="inputEmail3" placeholder="Email" required>
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