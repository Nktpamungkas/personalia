<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Laporan Absensi </h4>
        <div class="row mt">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="showback">
                    <?php $dept = $user['dept']; ?>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url(); ?>pci/laporan_absen"<?php if($tgl1 && $tgl2 && $noscan && $dept){ echo $tgl1."/".$tgl2."/".$noscan."/".$dept; } ?> method="POST" class="form-group">
                        <label>
                            Nama karyawan <br>
                            <select class="form-control input-sm chosen-select" data-placeholder="Pilih Karyawan..." name="no_scan" required>
                                <option value="" selected required>Pilih karyawan</option>
                                <option value="All">Semua karyawan</option>
                                <?php
                                    $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND status_aktif = 1 ORDER BY nama")->result_array();
                                ?>
                                <?php foreach ($queryShift as $dk) : ?>
                                    <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == set_value('no_scan')) {
                                        echo "SELECTED";
                                    } ?>><?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                        <label>
                            Tanggal
                            <input type="date" name="date1" class="form-control input-sm" required>
                        </label>
                        <label>
                            Sampai Dengan Tanggal
                            <input type="date" name="date2" class="form-control input-sm" required>
                        </label>
                        <button name="submit" type="submit" class="btn btn-success btn-sm">Search</button>
                        <a href="<?= base_url(); ?>pci/export_excel_cuti/<?= $tgl1; ?>/<?= $tgl2; ?>/<?= $noscan; ?>/<?= $dept; ?>" class="btn btn-info btn-sm">Export To Excell</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mb col-sm-12">
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-laporan-absen">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jumlah</th>
                                <th></th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($noscan == "All") {
                                    $query = $this->db->query("SELECT a.nip,
                                                                    b.nama,
                                                                    a.dept,
                                                                    a.tgl_mulai,
                                                                    a.tgl_selesai,
                                                                    SUM( a.lama_izin ) AS Jumlah_izin,
                                                                    a.days_or_month,
                                                                    a.ket
                                                                FROM
                                                                    `permohonan_izin_cuti` a
                                                                    LEFT JOIN ( SELECT b.no_scan, b.nama, b.status_karyawan FROM tbl_makar b ) b ON b.no_scan = a.nip 
                                                                WHERE
                                                                    a.tgl_mulai BETWEEN '$tgl1'
                                                                    AND '$tgl2' 
                                                                    AND a.dept = '$dept'
                                                                GROUP BY
                                                                    a.nip, a.ket,
                                                                    a.days_or_month")->result_array();
                                }else{
                                    $query = $this->db->query("SELECT a.nip,
                                                                    b.nama,
                                                                    a.dept,
                                                                    a.tgl_mulai,
                                                                    a.tgl_selesai,
                                                                    SUM( a.lama_izin ) AS Jumlah_izin,
                                                                    a.days_or_month,
                                                                    a.ket
                                                                FROM
                                                                    `permohonan_izin_cuti` a
                                                                    LEFT JOIN ( SELECT b.no_scan, b.nama, b.status_karyawan FROM tbl_makar b ) b ON b.no_scan = a.nip 
                                                                WHERE
                                                                    a.tgl_mulai BETWEEN '$tgl1'
                                                                    AND '$tgl2' 
                                                                    AND a.dept = '$dept'
                                                                    AND a.nip = '$noscan'
                                                                GROUP BY
                                                                    a.nip, a.ket,
                                                                    a.days_or_month")->result_array();
                                }
                            ?>
                            <?php foreach($query AS $data): ?>
                                <tr>
                                    <td><?= $data['nama'].' ('.$data['nip'].')'; ?></td>
                                    <td align="center"><?= $data['tgl_mulai']; ?></td>
                                    <td align="center"><?= $data['tgl_selesai']; ?></td>
                                    <td align="center"><?= $data['Jumlah_izin']; ?></td>
                                    <td align="center"><?= $data['days_or_month']; ?></td>
                                    <td align="center">
                                        <?php
                                            $kodecuti   = $data['ket'];
                                            $qCuti = $this->db->query("SELECT * FROM cuti WHERE kode_cuti = '$kodecuti'")->row();
                                            echo $qCuti->cuti;                                        
                                        ?>
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
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>