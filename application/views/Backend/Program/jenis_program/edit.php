 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Tambah Program</h6>

         <form action="" method="post">
             <div class="form-group floating-label">
                 <select name="id_program" id="id_program" class="custom-select" required>
                     <option value=""></option>
                     <?php foreach ($program as $p) : ?>
                         <?php if ($p['id'] == $jeprog['id_program']) : ?>
                             <option value="<?= $p['id']; ?>" selected> <?= $p['nama_program']; ?></option>
                         <?php else : ?>
                             <option value="<?= $p['id']; ?>"> <?= $p['nama_program']; ?></option>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 </select>
                 <label for="" class="mt-1">-Pilih Program-</label>
             </div>


             <div class="form-group floating-label">
                 <input type="text" name="harga" class="form-control" id="harga" value="<?= $jeprog['harga'] ?>">
                 <label for="">Harga</label>
                 <small class="form-text text-danger"><?= form_error('harga'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="kuota" class="form-control" id="kuota" value="<?= $jeprog['kuota'] ?>">
                 <label for="">Kuota</label>
                 <small class="form-text text-danger"><?= form_error('kuota'); ?></small>
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Create account</button>
             </div>
         </form>

     </div>