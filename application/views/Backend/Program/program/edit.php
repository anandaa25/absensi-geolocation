 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Edit Program</h6>
         <hr>

         <form action="" method="post">
             <div class="form-group floating-label">
                 <input type="text" name="nama" class="form-control" id="nama" value="<?= $program['nama_program'] ?>">
                 <label for="">Nama Program</label>
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>

             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Perbarui</button>
             </div>
         </form>

     </div>