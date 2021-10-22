 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Edit Pelanggan</h6>
         <hr>

         <form action="" method="post">
             <div class="form-group floating-label">
                 <input type="text" name="id" class="form-control" id="id" value="<?= $pelanggandetail['id_pelanggan'] ?>">
                 <label for="">Id Pelanggan</label>
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="nama" class="form-control" id="nama" value="<?= $pelanggandetail['nama_pelanggan'] ?>">
                 <label for="">Nama Pelanggan</label>
             </div>
             <div class=" form-group">
                 <label for="jenis_kelamin">jenis kelamin</label>
                 <select class="form-control" id="jekel" name="jekel">
                     <?php foreach ($jekel as $jk) : ?>
                         <?php if ($jk ==  $pelanggandetail['jekel_pelanggan']) : ?>
                             <option value="<?= $jk; ?>" selected> <?= $jk; ?></option>
                         <?php else : ?>
                             <option value="<?= $jk; ?>"> <?= $jk; ?></option>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 </select>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $pelanggandetail['alamat'] ?>">
                 <label for="">Alamat</label>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="telp" class="form-control" id="telp" value="<?= $pelanggandetail['telp'] ?>">
                 <label for="">Telp</label>
             </div>

             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Perbarui</button>
             </div>
         </form>

     </div>