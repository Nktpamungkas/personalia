<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                    <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <div class="row mb">
                    <p>
                        <center><h4><b>DATA KARYAWAN BARU DEPARTEMEN</b></h4></center>
                        <div class="content-panel">
                            <form method="POST" action="">
                                <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT2a">
                                    <thead>
                                        <tr>
                                            <?php if ($user['dept'] == "HRD") : ?>
                                                <th width="25">*</th>
                                            <?php else : ?>
                                                <th width="25">No</th>
                                            <?php endif; ?>
                                            <th width="125">No Scan</th>
                                            <th width="300">Nama</th>
                                            <th width="100">Departemen</th>
                                            <th width="200">Tgl Masuk</th>
                                            <th width="200">Tgl Akhir Evaluasi</th>
                                            <th width="50">Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $name = $user['name'];
										$dept = $user['dept'];
										if($name == "iso.hrd") {
											$data = $this->db->query("SELECT
																			no_scan,
																			nama,
																			dept,
																			tgl_masuk,
																			tgl_evaluasi,
																			DATE_FORMAT(tgl_masuk, '%d %M %Y') AS ftgl_masuk,
																			CASE
																				WHEN tgl_evaluasi <> '' THEN DATE_FORMAT(tgl_evaluasi, '%d %M %Y')
																				ELSE '-'
																			END AS ftgl_evaluasi,
																			jabatan,
																			status_email_kontrak
																		FROM
																			tbl_makar
																		WHERE
																			NOT status_karyawan IN ('Resigned', 'perubahan_status') AND
																			tgl_evaluasi BETWEEN '2024-03-03' AND DATE_ADD(tgl_evaluasi, INTERVAL 12 MONTH)
																			AND status_email_kontrak = 2
																		ORDER BY
																			tgl_masuk DESC;")->result_array();
										} else {
											$data = $this->db->query("SELECT
																			no_scan,
																			nama,
																			dept,
																			tgl_masuk,
																			tgl_evaluasi,
																			DATE_FORMAT(tgl_masuk, '%d %M %Y') AS ftgl_masuk,
																			CASE
																				WHEN tgl_evaluasi <> '' THEN DATE_FORMAT(tgl_evaluasi, '%d %M %Y')
																				ELSE '-'
																			END AS ftgl_evaluasi,
																			jabatan,
																			status_email_kontrak
																		FROM
																			tbl_makar
																		WHERE
																			NOT status_karyawan IN ('Resigned', 'perubahan_status') AND
																			tgl_evaluasi BETWEEN '2024-03-03' AND DATE_ADD(tgl_evaluasi, INTERVAL 12 MONTH)
																			-- AND status_email_kontrak IS NULL
																			AND dept = '$dept'
																		ORDER BY
																			tgl_masuk DESC;")->result_array();
										}
                                        $no = 1;
                                        foreach ($data as $result) : ?>
                                            <tr class="gradey">
                                                <?php if ($user['dept'] == "HRD") : ?>
                                                    <td>
                                                        <?php if ($result['status_email_kontrak'] != 2) : ?>
                                                            <input type="checkbox" class="checkbox" name="no_scan[]" value="<?= $result['no_scan'] ?>/<?= $result['nama'] ?>/<?= $result['dept'] ?>/<?= $result['tgl_masuk'] ?>/<?= $result['tgl_evaluasi'] ?>/<?= $result['jabatan'] ?>">
                                                        <?php elseif ($user['dept'] == "HRD") : ?>
                                                            <input type="checkbox" class="checkbox" name="no_scan[]" checked disabled>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php else : ?>
                                                    <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>"><?= $no++; ?></td>
                                                <?php endif; ?>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['no_scan'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['nama'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['dept'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['ftgl_masuk'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['ftgl_evaluasi'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['jabatan'] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <br>
                        <ol>
                            <br>
                            <label><span style="color: red;">Note :</span></label><br>
                            <label>Mohon kirim Evaluasi Karyawan Baru H-7 Sebelum Masa Training Berakhir.  </label>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt">
            <div class="col-lg-12 main-chart">
                <div class="row mb">
                    <p>
                        <center><h4><b>DATA KARYAWAN BARU SEMUA DEPARTEMEN</b></h4></center>
                        <?php if ($user['dept'] == "DIT" OR $user['dept'] == "HRD" OR $user['dept'] == "GAC" OR $user['dept'] == "ACC") : ?>
                            <div class="row">
                                <div class="col-md-4 mb">
                                    <label>
                                        <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-default btn-sm">Export to Excel</a>
                                        <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                            <form action="<?= base_url('home/export_excel_baru') ?>" method="POST">
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
                                                                        <h4 class="modal-title"><i class="fa fa-calendar"></i></h4>
                                                                        <label>
                                                                            Dari tanggal
                                                                            <input type="date" name="start" class="form-control input-sm" required>
                                                                        </label>
                                                                        <label> s/d </label>
                                                                        <label>
                                                                            tanggal
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
                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="content-panel">
                            <form method="POST" action="<?= base_url('home/Kirim_email_karyawanbaru'); ?>">
                                <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT2">
                                    <thead>
                                        <tr>
                                            <?php if ($user['dept'] == "HRD") : ?>
                                                <th width="25">*</th>
                                            <?php else : ?>
                                                <th width="25">No</th>
                                            <?php endif; ?>
                                            <th width="125">No Scan</th>
                                            <th width="300">Nama</th>
                                            <th width="100">Departemen</th>
                                            <th width="200">Tgl Masuk</th>
                                            <?php if ($user['dept'] == "HRD") : ?>
                                            <th width="200">Tgl Akhir Evaluasi</th>
                                            <?php endif; ?>
                                            <th width="50">Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = $this->db->query("SELECT
                                                                    no_scan,
                                                                    nama,
                                                                    dept,
                                                                    tgl_masuk,
                                                                    tgl_evaluasi,
                                                                    DATE_FORMAT(tgl_masuk, '%d %M %Y') AS ftgl_masuk,
                                                                    CASE
                                                                        WHEN tgl_evaluasi <> '' THEN DATE_FORMAT(tgl_evaluasi, '%d %M %Y')
                                                                        ELSE '-'
                                                                    END AS ftgl_evaluasi,
                                                                    jabatan,
                                                                    status_email_kontrak
                                                                FROM
                                                                    tbl_makar
                                                                WHERE
                                                                    NOT status_karyawan IN ('Resigned', 'perubahan_status') AND
                                                                    tgl_evaluasi BETWEEN '2024-03-03' AND DATE_ADD(tgl_evaluasi, INTERVAL 12 MONTH)
																	AND status_email_kontrak IS NULL
                                                                ORDER BY
                                                                tgl_masuk desc;")->result_array();
                                        $no = 1;
                                        foreach ($data as $result) : ?>
                                            <tr class="gradeX">
                                                <?php if ($user['dept'] == "HRD") : ?>
                                                    <td>
                                                        <?php if ($result['status_email_kontrak'] != 2) : ?>
                                                            <input type="checkbox" class="checkbox" name="no_scan[]" value="<?= $result['no_scan'] ?>/<?= $result['nama'] ?>/<?= $result['dept'] ?>/<?= $result['tgl_masuk'] ?>/<?= $result['tgl_evaluasi'] ?>/<?= $result['jabatan'] ?>">
                                                        <?php elseif ($user['dept'] == "HRD") : ?>
                                                            <input type="checkbox" class="checkbox" name="no_scan[]" checked disabled>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php else : ?>
                                                    <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>"><?= $no++; ?></td>
                                                <?php endif; ?>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['no_scan'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['nama'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['dept'] ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['ftgl_masuk'] ?>
                                                </td>
                                                <?php if ($user['dept'] == "HRD") : ?>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['ftgl_evaluasi'] ?>
                                                <?php endif; ?>
                                                </td>
                                                <td style="color: <?= ($result['status_email_kontrak'] == 2) ? 'blue' : 'black'; ?>">
                                                    <?= $result['jabatan'] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div>
                                    <?php if ($user['dept'] == "HRD") : ?>
                                        <input class="btn btn-primary" type="submit" value="Kirim Email" name="kirim_email">
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
