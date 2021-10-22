 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Tambah Pelanggan</h6>
         <hr>

         <form action="" method="post">
             <div class="form-group floating-label">
                 <input type="text" name="id" class="form-control" id="id" value="">
                 <label for="">Id Pelanggan</label>
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="nama" class="form-control" id="nama" value="">
                 <label for="">Nama Pelanggan</label>
             </div>
             <div class=" form-group">
                 <label for="jenis_kelamin">jenis kelamin</label>
                 <select class="form-control" id="jekel" name="jekel">
                     <option value="">==PILIH==</option>
                     <?php foreach ($jekel as $jk) : ?>
                         <option value="<?= $jk; ?>"> <?= $jk; ?></option>
                     <?php endforeach; ?>
                 </select>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="alamat" class="form-control" id="alamat" value="">
                 <label for="">Alamat</label>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="telp" class="form-control" id="telp" value="">
                 <label for="">Telp</label>
             </div>

             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
             </div>
         </form>

     </div>