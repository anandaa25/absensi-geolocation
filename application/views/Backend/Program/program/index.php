 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <?php if ($this->session->flashdata('flash')) : ?>
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                 <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
         <?php endif ?>

         <!-- <h6 class="mb-2">Datatable</h6> -->
         <div class="row border-bottom mb-4">
             <div class="col-sm-8 pt-2">
                 <h6 class="mb-4 bc-header"><?= $title ?></h6>
             </div>

             <div class="col-sm-4 text-right pb-3">
                 <!-- <button class="btn btn-round btn-theme" href="<?= base_url(); ?>pegawai/tambah/"><i class="fa fa-plus"></i> Tambah Program</button> -->
                 <a class="btn btn-round btn-theme" href="<?= base_url(); ?>program/tambah/"><i class="fa fa-plus"></i> Tambah Program</a>
             </div>
         </div>

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Nama Program</th>
                         <th>Action</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($program as $pg) : ?>
                         <tr>
                             <td scope="row"><?= $i++ ?></td>
                             <td><?= $pg['nama_program']; ?></td>
                             <td>
                                 <a href="<?= base_url(); ?>program/edit/<?= $pg['id']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>
                                 <a href="<?= base_url(); ?>program/hapus/<?= $pg['id']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>

             </table>
         </div>