<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('training_report'); ?>"> Training Report </a><i class="fa fa-angle-right"></i> Form Training</h4>
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('training_report/edit/') . $user['name']; ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Materi Training</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select input-sm" data-placeholder="Choose a Country..." tabindex="2" name="kode_training" required>
                                        <option value="" disabled selected>Select Materi Training</option>
                                        <?php
                                        $queryNoScan = $this->db->get('training')->result_array();
                                        ?>
                                        <?php foreach ($queryNoScan as $dnc) : ?>
                                        <option value="<?= $dnc['id'] ?>" <?php if ($dnc['nama_training'] == $training->nama_training) {
                                                    echo "SELECTED";
                                                } ?>>TRN<?php echo sprintf("%04d", $dnc['id']); ?> - <?= $dnc['nama_training']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Training</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $training->tgl_training; ?>" name="tgl_training" type="date">
                                </div>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <table class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th width="200">No Scan & Nama</th>
                                        <th width="100">Dept</th>
                                        <th width="">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = $this->db->query("SELECT a.id, 
                                                                        a.no_scan,
                                                                        b.nama,
                                                                        b.dept,
                                                                        a.kode_training,
                                                                        DATE_FORMAT(a.tgl_training, '%d %M %Y') as Ftgl_training
                                                                    FROM
                                                                        tbl_training a
                                                                        LEFT JOIN( SELECT b.no_scan, b.dept, b.nama FROM tbl_makar b) b ON b.no_scan = a.no_scan
                                                                    WHERE
                                                                        a.kode_training = '$training->kode_training' AND a.tgl_training = '$training->tgl_training'")->result_array();
                                        $no = 1;
                                    ?>
                                        <?php foreach ($query as $dtt) : ?>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                            <input value="<?= $dtt['id']; ?>" name="id[]" type="hidden">
                                        </td>
                                        <td>
                                            <select class='form-control input-sm select2' tabindex='2' name='no_scan[]' required>
                                                <option value='' disabled selected></option>
                                                <?php 
                                                    $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 ORDER BY nama ASC")->result_array(); 
                                                ?> 
                                                <?php foreach ($queryShift as $dk) : ?> 
                                                    <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == $dtt['no_scan']) { echo 'SELECTED';} ?>>
                                                        <?= $dk['no_scan'].' - '.$dk['nama']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><?= $dtt['dept']; ?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modal-delete<?= $dtt['id']; ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash" title="Hapus"></span> Hapus</a>
                                            <div class="modal fade" id="modal-delete<?= $dtt['id']; ?>">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content">
                                                        <form class="form-horizontal" action="<?= base_url(); ?>training_report/hapus_training_report/<?= $dtt['id']; ?>" method="post">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-trash"> Apakah anda yakin ingin menghapus karyawan atas nama <b><?= $dtt['nama']; ?></b> di training <b><?= $training->nama_training; ?></b> ?</span></h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit" name="submit">Simpan Perubahan</button>
                                    <a href="<?= base_url('training_report'); ?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section> 