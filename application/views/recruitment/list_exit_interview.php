<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<body>
    <section id="main-content">
        <section class="wrapper">
            <h4><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> List Pengisian Exit Form</h4>
            <!-- FORM VALIDATION -->
            <?= $this->session->flashdata('message'); ?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <a href="<?= base_url() . 'Recruitment/Exit_interview' ?>"><button class="btn btn-info btn-sm" style="margin-bottom: 10px;">Fill Form Exit</button></a>
                        <a href="#" data-toggle="modal" data-target="#modalExport"><button class="btn btn-success btn-sm" style="margin-bottom: 10px;">Export to Excel</button></a>
                        <div class="modal fade" id="modalExport" role="dialog" aria-labelledby="modalExport" aria-hidden="true">
                            <form action="<?= base_url('Recruitment/export_to_excel') ?>" method="POST">
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
                                                        <b>Range tanggal berdasarkan Tanggal Resign</b>
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
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="tbl-list-exit-interview">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama/Nik</th>
                                    <th>Jabatan</th>
                                    <th>Dept</th>
                                    <th>Tgl.Masuk</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Tgl.Resign</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $dept = $user['dept'];
                                if ($dept == "HRD") {
                                    $form_exit = $this->db->query("SELECT a.no_scan, b.nama,b.jenis_kelamin,b.status_kel,
                                                                        b.tgl_masuk,b.jabatan,b.dept,b.tgl_resign,
                                                                        ( SELECT max( a.id ) FROM hrd.vpot_table_answer GROUP BY a.no_scan ) AS idx 
                                                                    FROM
                                                                        hrd.vpot_table_answer a
                                                                        LEFT JOIN hrd.tbl_makar b ON a.no_scan = b.no_scan 
                                                                    GROUP BY
                                                                        a.no_scan 
                                                                    ORDER BY
                                                                        idx DESC")->result();
                                } else {
                                    $form_exit = $this->db->query("SELECT
                                                                    a.no_scan,
                                                                    b.nama,
                                                                    b.jenis_kelamin,
                                                                    b.status_kel,
                                                                    b.tgl_masuk,
                                                                    b.jabatan,
                                                                    b.dept,
                                                                    b.tgl_resign,
                                                                    ( SELECT max( a.id ) FROM hrd.vpot_table_answer GROUP BY a.no_scan ) AS idx 
                                                                FROM
                                                                    hrd.vpot_table_answer a
                                                                    LEFT JOIN hrd.tbl_makar b ON a.no_scan = b.no_scan 
                                                                    WHERE b.dept = '$dept'
                                                                GROUP BY
                                                                    a.no_scan 
                                                                ORDER BY
                                                                    idx DESC")->result();
                                }
                                
                            ?>
                                <?php $i = 1; ?>
                                <?php foreach ($form_exit as $li) :  ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $li->nama . ' / ' .  $li->no_scan ?></td>
                                        <td><?= $li->jabatan ?></td>
                                        <td><?= $li->dept ?></td>
                                        <td><?= $li->tgl_masuk ?></td>
                                        <td><?= $li->jenis_kelamin ?></td>
                                        <td><?= $li->status_kel ?></td>
                                        <td><?= $li->tgl_resign ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() . 'Recruitment/Print_form_exit2/' . $li->no_scan ?>" style="font-size:13px;"><i class="fa fa-print"></i> Print</a> |
                                            <a href="#" style="font-size:13px;" data-target="#modal-delete<?= $li->no_scan ?>" data-toggle="modal"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                        <div class="modal fade" id="modal-delete<?= $li->no_scan ?>">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <form class="form-horizontal" action="<?= base_url() . 'Recruitment/delete_from_exit/' . $li->no_scan ?>" method="post">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin mengahapus data ini?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </section>
</body>
<script>
    $(document).ready(function() {

    });
</script>