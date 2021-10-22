 <!--Content right-->

 <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
    ?>

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




         <div class="row border-bottom mb-4">
             <div class="col-sm-8 pt-2">
                 <h6 class="mb-4 bc-header"><?= $title ?></h6>
             </div>
             <div class="col-sm-4 text-right pb-3">
                 <button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Jadwal</button>
                 <a target="_blank" class="btn btn-round btn-danger" href="<?= base_url('admin/cetak-jadwal') ?>"><i class="fa fa-plus"></i> Report</a>
             </div>



         </div>

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>NAMA BUS</th>
                         <th>ASAL</th>
                         <th>TUJUAN</th>
                         <th>TGL BERANGKAT</th>
                         <th>HARGA</th>
                         <th>STATUS</th>
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1; ?>
                     <?php
                        foreach ($jadwal as $b) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $b['nama_bus']; ?></td>
                             <td>
                                 <?php foreach ($lokasi as $l) : ?>
                                     <?php if ($b['id_asal'] ==  $l['id_lokasi']) : ?>
                                         <?= $l['nama_daerah']; ?>
                                     <?php endif; ?>
                                 <?php endforeach; ?>
                             </td>
                             <td>
                                 <?php foreach ($lokasi as $l) : ?>
                                     <?php if ($b['id_tujuan'] ==  $l['id_lokasi']) : ?>
                                         <?= $l['nama_daerah']; ?>
                                     <?php endif; ?>
                                 <?php endforeach; ?>
                             </td>
                             <td><?= $b['tgl_berangkat']; ?></td>
                             <td><?= rupiah($b['harga']) . ',-'; ?></td>
                             <td>
                                 <?php if ($b['status'] == 0) : ?>
                                     <span class="badge badge-danger">Belum Berangkat</span>
                                 <?php else : ?>
                                     <span class="badge badge-success">Sudah Berangkat</span>
                                 <?php endif ?>
                             <td>
                                 <div class='btn-group btn-group-sm'>
                                     <a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-jadwal') ?>/<?= $b['id_jadwal']; ?>" onclick="return confirm('Yakin Ingin Menghapus Daerah?');">Hapus</a>
                                     <a class="btn btn-theme ml-1" href="" data-toggle="modal" data-target=".bd-example-modal<?php echo $b['id_jadwal']; ?>">Edit</a>

                                     <?php if ($b['status'] == 0) : ?>
                                         <a class="btn btn-success ml-1" href="<?= base_url('admin/berangkat-jadwal') ?>/<?= $b['id_jadwal']; ?>">Berangkat</a>
                                     <?php else : ?>
                                         <a class="btn btn-info ml-1" href="<?= base_url('admin/berangkat-jadwal') ?>/<?= $b['id_jadwal']; ?>">Sudah Sampai</a>
                                     <?php endif; ?>
                                 </div>
                             </td>
                         </tr>
                     <?php endforeach ?>
                 </tbody>

             </table>
         </div>



         <!-- modal tambah -->


         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

             <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                     <div class="modal-header text-center">
                         <h5 class="modal-title text-secondary"><strong> Tambah Jadwal</strong></h5>
                         <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body text-justify">
                         <form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-jadwal' ?>" method="post" enctype="multipart/form-data">
                             <div class="modal-body">
                                 <div class=" form-group">
                                     <label for="jenis_kelamin" class="col-sm-4">Pilih Bus</label>

                                     <select class="form-control ml-3 " id="jekel" name="xbus">
                                         <option value="">==PILIH==</option>
                                         <?php foreach ($bus as $b) : ?>
                                             <option value="<?= $b['id_bus']; ?>"> <?= $b['nama_bus']; ?> - <?= $b['plat']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class=" form-group">
                                     <label for="jenis_kelamin" class="col-sm-4">Pilih Asal</label>
                                     <select class="form-control ml-3 " id="jekel" name="xasal">
                                         <option value="">==PILIH==</option>
                                         <?php foreach ($lokasi as $l) : ?>
                                             <option value="<?= $l['id_lokasi']; ?>"> <?= $l['nama_daerah']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class=" form-group">
                                     <label for="jenis_kelamin" class="col-sm-4">Pilih Tujuan</label>
                                     <select class="form-control ml-3 " id="jekel" name="xtujuan">
                                         <option value="">==PILIH==</option>
                                         <?php foreach ($lokasi as $l) : ?>
                                             <option value="<?= $l['id_lokasi']; ?>"> <?= $l['nama_daerah']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-sm-4">Tanggal Berangkat</label>
                                     <input type="datetime-local" name="xtanggal" min="<?= date('Y-m-d\TH:i'); ?>" value='<?= date('Y-m-d\TH:i'); ?>' class="form-control ml-3" required>
                                 </div>


                                 <div class="form-group">
                                     <label for="inputPassword3" class="col-sm-4 control-label">Harga</label>
                                     <div class="col-sm-12">
                                         <input type="text" name="xharga" class="form-control" id="inputPassword3" placeholder="Harga" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                                     <div class="col-sm-12">
                                         <select class="form-control" name="xstatus" required>
                                             <option value="0">Belum Berangkat</option>
                                             <option value="1">Sudah Berangkat</option>
                                         </select>
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



         <!-- edit modal -->

         <?php foreach ($jadwal as $i) :
                $id_jadwal = $i['id_jadwal'];
                $nama_bus = $i['id_bus'];
                $id_asal = $i['id_asal'];
                $id_tujuan = $i['id_tujuan'];
                $tgl_berangkat = $i['tgl_berangkat'];

                $harga = $i['harga'];
                $status = $i['status'];
            ?>
             <div class="modal fade bd-example-modal<?php echo $id_jadwal; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div class="modal-header text-center">
                             <h5 class="modal-title text-secondary"><strong> Edit Bus</strong></h5>
                             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                         </div>
                         <div class="modal-body text-justify">
                             <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-jadwal' ?>" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="kode" value="<?php echo $id_jadwal; ?>" />
                                 <div class="modal-body">
                                     <div class=" form-group">
                                         <label for="jenis_kelamin" class="col-sm-4">Pilih Bus</label>
                                         <select class="form-control ml-3 " id="jekel" name="xbus">
                                             <option value="">==PILIH==</option>
                                             <?php foreach ($bus as $b) : ?>
                                                 <?php if ($nama_bus ==  $b['id_bus']) : ?>
                                                     <option value="<?= $b['id_bus']; ?>" selected> <?= $b['nama_bus']; ?></option>
                                                 <?php else : ?>
                                                     <option value="<?= $b['id_bus']; ?>"> <?= $b['nama_bus']; ?></option>
                                                 <?php endif; ?>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                     <div class=" form-group">
                                         <label for="jenis_kelamin" class="col-sm-4">Pilih Asal</label>
                                         <select class="form-control ml-3 " id="jekel" name="xasal">
                                             <option value="">==PILIH==</option>
                                             <?php foreach ($lokasi as $l) : ?>
                                                 <?php if ($id_asal ==  $l['id_lokasi']) : ?>
                                                     <option value="<?= $l['id_lokasi']; ?>" selected> <?= $l['nama_daerah']; ?></option>
                                                 <?php else : ?>
                                                     <option value="<?= $l['id_lokasi']; ?>"> <?= $l['nama_daerah']; ?></option>
                                                 <?php endif; ?>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                     <div class=" form-group">
                                         <label for="jenis_kelamin" class="col-sm-4">Pilih Tujuan</label>
                                         <select class="form-control ml-3 " id="jekel" name="xtujuan">
                                             <option value="">==PILIH==</option>
                                             <?php foreach ($lokasi as $l) : ?>
                                                 <?php if ($id_tujuan ==  $l['id_lokasi']) : ?>
                                                     <option value="<?= $l['id_lokasi']; ?>" selected> <?= $l['nama_daerah']; ?></option>
                                                 <?php else : ?>
                                                     <option value="<?= $l['id_lokasi']; ?>"> <?= $l['nama_daerah']; ?></option>
                                                 <?php endif; ?>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <?php $date = date_create($tgl_berangkat); ?>
                                         <label class="col-sm-12">Tanggal Berangkat</label>
                                         <input type="datetime-local" name="xtanggal" min="<?= date_format($date, 'Y-m-d\TH:i'); ?>" value='<?= date_format($date, 'Y-m-d\TH:i'); ?>' class="form-control ml-3" required>
                                     </div>


                                     <div class="form-group">
                                         <label for="inputPassword3" class="col-sm-4 control-label">Harga</label>
                                         <div class="col-sm-12">
                                             <input type="text" name="xharga" class="form-control" id="inputPassword3" placeholder="Harga" value="<?= $harga ?>" required>
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                                         <div class="col-sm-12">
                                             <select class="form-control" name="xstatus" required>
                                                 <?php if ($status ==  0) : ?>
                                                     <option value="0" selected>Belum Berangkat</option>
                                                     <option value="1">Sudah Berangkat</option>
                                                 <?php else : ?>
                                                     <option value="0">Belum Berangkat</option>
                                                     <option value="1" selected>Sudah Berangkat</option>
                                                 <?php endif; ?>
                                             </select>
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
         <?php endforeach; ?>