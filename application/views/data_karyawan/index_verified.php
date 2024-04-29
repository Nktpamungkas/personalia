<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Import Data Employee</title>
</head>
<body>
</body>
<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Employee Information <i class="fa fa-angle-right"></i> Data New Employee Verified </h4>
        <div class="col-md-6">
            <p>
                <a href="<?= base_url('users/index'); ?>" class="btn btn-warning"><i class=" fa fa-reply"></i>&nbsp;&nbsp;Back</a>
                <a href="<?= base_url('Data_karyawan/ExportToExcell_verified'); ?>" class="btn btn-default">Export to Excel</a>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-pci">
                        <thead>
                        <tr>
                                <th><center>No Scan</center></th>
                                <th><center>Nama Karyawan</center></th>
                                <th><center>Department</center></th>
                                <th><center>Bagian</center></th>
                                <th><center>Jabatan</center></th>
                                <th><center>Tanggal Masuk</center></th>
                                <th><center>Status Karyawan</center></th>
                                <th><center>HRD Verifikasi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                           $query = $this->db->query("SELECT id,
                                                              no_scan, 
                                                              nama,
                                                              dept,
                                                              bagian,
                                                              jabatan,
                                                              DATE_FORMAT( tgl_masuk, '%d %M %Y' ) AS tgl_masuk,
                                                              status_karyawan,
                                                              status_verifikasi
                                                        FROM
                                                              tbl_makar_temp
                                                              where status_verifikasi ='VERIFIED'
                                                        ORDER BY
                                                              id ASC")->result_array(); 
                            ?>
                              <?php foreach($query AS $data): ?>
                                <tr class="gradeX">
                                    <td><a href="#" style="text-decoration: underline;"><?= $data['no_scan']; ?></a></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['dept']; ?></td>
                                    <td><?= $data['bagian']; ?></td>
                                    <td><?= $data['jabatan']; ?></td>
                                    <td><?= $data['tgl_masuk']; ?></td>
                                    <td align="center"><?= $data['status_karyawan']; ?></td>
                                    <td align="center"><?= $data['status_verifikasi']; ?></td>
                                </tr>
                              <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
</html>