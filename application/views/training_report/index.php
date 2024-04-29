<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Training Record</h3>
        <div class="col-md-6">
            <p class="inline">
                <!-- <a href="<?= base_url('training_report/addTraining'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Training</a> -->
                <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-default btn-sm">Export to Excel</a>
                <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                    <form action="<?= base_url('Training_report/export_excel') ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="fa fa-calendar"></i> Range Tanggal Export </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <b>Range tanggal berdasarkan Tanggal Training</b>
                                                <h4 class="modal-title"><i class="fa fa-calendar"></i></h4>
                                                <label>
                                                    Tanggal Mulai
                                                    <input type="date" name="start" class="form-control input-sm" required>
                                                </label>
                                                <label> s/d </label>
                                                <label>
                                                    Tanggal Akhir
                                                    <input type="date" name="stop" class="form-control input-sm" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Export Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </p>
        </div>

        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-training">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Training</th>
                                <th>Materi Training</th>
                                <th width="150">Tgl Training</th>
                                <th width="200">Nama Trainer</th>
                                <th width="250">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data = $this->db->query("SELECT a.id, a.kode_training,
                                                                b.nama_training,
                                                                DATE_FORMAT( a.tgl_training, '%d %b %Y' ) AS Ftgl_training,
                                                                a.tgl_training,
                                                                c.nama
                                                            FROM
                                                                tbl_training a
                                                                LEFT JOIN ( SELECT b.id, b.nama_training FROM training b ) b ON b.id = a.kode_training
                                                                LEFT JOIN ( SELECT c.no_scan,c.nama FROM tbl_makar c ) c ON c.no_scan = a.trainer
                                                            WHERE
                                                                a.tgl_training BETWEEN '2020-01-01' 
                                                                AND now() 
                                                            GROUP BY
                                                                a.tgl_training,
                                                                a.kode_training")->result_array();
                                $no = 1;
                            ?>
                            <?php foreach ($data as $dt) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    TRN<?php echo sprintf("%04d", $dt['kode_training']); ?>
                                </td>
                                <td><?= $dt['nama_training']; ?></td>
                                <td><?= $dt['Ftgl_training']; ?></td>
                                <td><?= $dt['nama']; ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modalView<?= $dt['kode_training']; ?><?= $dt['tgl_training']; ?>"><i class="fa fa-eye"></i> View</a> | 
                                    <div class="modal fade" id="modalView<?= $dt['kode_training']; ?><?= $dt['tgl_training']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-folder-open-o"></i> Materi : <?= '('.$dt['kode_training'].') '.$dt['nama_training']; ?> - <?= $dt['Ftgl_training']; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="display table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>No Scan</th>
                                                                <th>Nama</th>
                                                                <th>Jabatan</th>
                                                                <th>Dept</th>
                                                                <th>Tanggal Training</th>
                                                                <!-- <th width="250">Option</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $kode = $dt['kode_training'];
                                                                $tgltraining = $dt['tgl_training'];
                                                                $query = $this->db->query("SELECT distinct
                                                                                                a.no_scan,
                                                                                                b.nama,
                                                                                                b.dept,
                                                                                                b.jabatan,
                                                                                                a.kode_training,
                                                                                                DATE_FORMAT(a.tgl_training, '%d %M %Y') as Ftgl_training,
                                                                                                a.durasi_jam
                                                                                            FROM
                                                                                                tbl_training a
                                                                                                LEFT JOIN( SELECT b.no_scan, b.dept, b.nama, b.jabatan FROM tbl_makar b) b ON b.no_scan = a.no_scan
                                                                                            WHERE
                                                                                                a.kode_training = '$kode' 
                                                                                                AND a.tgl_training = '$tgltraining' 
                                                                                            order by 
                                                                                                b.dept asc")->result_array();
                                                                $noUrut = 1;
                                                            ?>
                                                             <?php foreach ($query as $dtt) : ?>
                                                            <tr>
                                                                <td><?= $noUrut++; ?></td>
                                                                <td><?= $dtt['no_scan']; ?></td>
                                                                <td><?= $dtt['nama']; ?></td>
                                                                <td><?= $dtt['jabatan']; ?></td>
                                                                <td><?= $dtt['dept']; ?></td>
                                                                <td><?= $dtt['Ftgl_training']; ?></td>
                                                                <!-- <td></td> -->
                                                            </tr>
                                                             <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url(); ?>training_report/tampil/<?= $dt['id']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section> 