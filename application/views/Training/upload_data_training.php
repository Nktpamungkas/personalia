<section id="main-content">
    <section class="wrapper">
        <?php if ($this->session->flashdata('error')) : ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "<?php echo $this->session->flashdata('error'); ?>",
                });
            </script>
        <?php endif; ?>
        <!-- FORM VALIDATION -->
        <div class="col-md-6 offset-md-3 mt-5">
            <h4>Import Data</h4>
            <?php $alert = $this->session->flashdata('alert'); ?>
            <?php if (!empty($alert)) : ?>
                <div class="alert alert-<?= $alert['class'] ?>">
                    <a href="#" class="close" id="btnclose-alert">&times;</a>
                    <?= $alert['message'] ?>
                </div>
                <script type="text/javascript">
                    $('#btnclose-alert').click(function(e) {
                        e.preventDefault();
                        $(this).parent().fadeOut('slow');
                    });
                </script>
            <?php endif; ?>
            <form action="<?= base_url('UploadDataTraining/import'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label class="mr-2">Upload File XLSX :</label>
                    <input type="file" name="file" id="fileInput">
                </div>
                <hr>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
            <?php if ($this->session->flashdata('success')) : ?>
                <script>
                    Swal.fire({
                        position: "bottom-end",
                        icon: "success",
                        title: "Data berhasil di simpan",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
            <?php endif; ?>
            <?php if (isset($list) && is_array($list)) : ?>
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered mt-3" id="table-pci">
                    <thead>
                        <tr>
                            <th>No Scan</th>
                            <th>Nama</th>
                            <th>Kode Training</th>
                            <th>Nama Training</th>
                            <th>Tanggal Training</th>
                            <th>Kode Trainer</th>
                            <th>External Ttrainer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item) : ?>
                            <tr>
                                <td><?= $item['no_scan'] ?></td>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['kode_training'] ?></td>
                                <td><?= $item['nama_training'] ?></td>
                                <td><?= $item['tgl_training'] ?></td>
                                <td><?= $item['kode_trainer'] ?></td>
                                <td><?= $item['external_trainer'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>		
            <?php else : ?>
                <p class="mb-3">Data tidak tersedia.</p>
            <?php endif; ?>
            <div class="row mt-3">
                <div class="col-md-2">
                    <form action="<?= base_url('UploadDataTraining/clearList'); ?>" method="POST">
                        <button type="submit" class="btn btn-danger">Clear List</button>
                    </form>
                </div>
                <div class="col-md-2">
                    <form action="<?= base_url('UploadDataTraining/submitToDatabase'); ?>" method="POST">
                        <button type="submit" class="btn btn-primary">Submit to Database</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</section>

<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        // Mengambil formulir
        var form = document.querySelector('form');
        // Mengirimkan formulir
        form.submit();
    });
</script>

<!-- <script>
    $(document).ready(function() {
        // Mengirim permintaan AJAX saat tombol "Clear List" diklik
        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Refresh halaman setelah data dihapus
                    location.reload();
                }
            });
        });
    });
</script> -->

<!-- <script>
    document.getElementById('submitButton').addEventListener('click', function() {
        Swal.fire({
            title: "Loading",
            html: "Please wait, processing data...",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    });
</script> -->
