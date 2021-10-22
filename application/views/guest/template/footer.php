        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

        <div class=" col-md- 8  text-center">
                <br><br>
                &copy; Copyright <strong>PT.Antar Lintas Sumatera2021</strong>. All Rights Reserved
        </div>
        <!-- baru -->
        <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery-1.12.4.min.js"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
        <!--Bootstrap-->

        <!--Datatable-->
        <script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
        <!--  -->
        <script>
                $('#example').DataTable();
        </script>

        <!-- barru -->

        <script>
                $('.bagian_a').hide();
                $('.bagian_b').hide();
                <?php if ($this->uri->segment(1) === "konfirmasi") : ?>
                        $(document).ready(function() {
                                cekBagian();

                                $("select.select_bus").change(function() {

                                        var seat = $(this).children("option:selected").val();

                                        if (seat === "1") {
                                                gambar.attr('src', '<?= base_url('assets/seat/seat_reguler_-_fix-removebg-preview.png') ?>');
                                        } else if (seat === "2") {
                                                gambar.attr('src', '<?= base_url('assets/seat/seat_patas-removebg-preview.png') ?>');
                                        } else if (seat === "3") {
                                                gambar.attr('src', '<?= base_url('assets/seat/seat_executive-removebg-preview.png') ?>');
                                        }


                                        //cek validasi
                                        var bagian = $('.bagian').val();
                                        var button = $('#btn_konfirmasi');
                                        var pesan = $('.pesan');

                                        if (seat === "0" || bagian === "0") {
                                                button.attr("disabled", true);
                                                pesan.removeClass('d-none');
                                                pesan.text("Pastikan Anda Memilih Seat dan Bagian Kursi !!");
                                                pesan.addClass('text-danger');
                                        } else {
                                                button.attr("disabled", false);
                                                pesan.addClass('d-none');
                                                pesan.removeClass('text-danger');
                                        }
                                })
                        });
                <?php endif; ?>

                var gambar = $('.img_bus');
                var seat = $('.select_bus').val();

                function cekBagian() {
                        var bagian = $('.bagian');
                        var bagian_a = $('.bagian_a');
                        var bagian_b = $('.bagian_b');

                        if (bagian.val() === "a") {
                                bagian_a.show();
                                bagian_b.hide();
                                bagian_b.removeAttr('name');
                                bagian_b.removeAttr('required');
                                bagian_a.attr('name', 'no_kursi');
                        } else if (bagian.val() === "b") {
                                bagian_b.show();
                                bagian_a.hide();
                                bagian_a.removeAttr('name');
                                bagian_a.removeAttr('required');
                                bagian_b.attr('name', 'no_kursi');
                        }


                        //cek validasi
                        var seat = $('.select_bus').val();
                        var bagian = $('.bagian').val();
                        var button = $('#btn_konfirmasi');
                        var pesan = $('.pesan');

                        if (seat === "0" || bagian === "0") {
                                button.attr("disabled", true);
                                pesan.removeClass('d-none');
                                pesan.text("Pastikan Anda Memilih Seat dan Bagian Kursi !!");
                                pesan.addClass('text-danger');
                        } else {
                                button.attr("disabled", false);
                                pesan.addClass('d-none');
                                pesan.removeClass('text-danger');
                        }

                }


                $('.foto').change(function() {
                        var seat = $('.select_bus').val();
                        var bagian = $('.bagian').val();
                        var button = $('#btn_konfirmasi');
                        var pesan = $('.pesan');

                        if (seat === 0 || bagian === 0) {
                                button.attr("disabled", true);
                                pesan.removeClass('d-none');
                                pesan.text("Pastikan Anda Memilih Seat dan Bagian Kursi !!");
                                pesan.addClass('text-danger');
                        } else {
                                button.attr("disabled", false);
                                pesan.addClass('d-none');
                                pesan.removeClass('text-danger');
                        }
                })
        </script>
        </body>

        </html>