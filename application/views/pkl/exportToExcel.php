<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Daftar Lembur Karyawan.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
    <thead>
        <tr>
            <!-- <th>No</th>
            <th>Kode Lembur</th>
            <th>Tanggal Lembur</th>
            <th>NIP (No Scan)</th>
            <th>Nama</th>
            <th>Total Lembur</th>
            <th>Status Verifikasi</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Status Karyawan</th> -->

            <th>User ID</th>
            <th>Nama</th>
            <th>Date</th>
            <th>Start Early</th>
            <th>End Early</th>
            <th>Start After</th>
            <th>End After</th>
            <th>Total Lembur</th>
            <th>Keterangan</th>
            <th>Departemen</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $data = $this->db->query("SELECT
                                        c.dept,
                                        a.kode_lembur,
                                        a.no_absen,
                                        c.nama,
                                        c.status_karyawan,
                                        a.shift,
                                        DATE_FORMAT( a.tanggal, '%d %M %Y' ) AS tanggal,
                                        a.waktu_lembur_start,
                                        a.waktu_lembur_stop,
                                        a.total_jam_lembur,
                                        a.dibuat_oleh_nama,
                                        a.dibuat_oleh_jabatan,
                                        a.diperiksa_oleh_nama,
                                        a.diperiksa_oleh_jabatan,
                                        a.disetujui_oleh_nama,
                                        a.disetujui_oleh_jabatan,
                                        DATE_FORMAT( a.tanggal_ttd, '%d %M %Y' ) AS tanggal_ttd,
                                        DATE_FORMAT( a.tanggal_permohonan, '%d %M %Y' ) AS tanggal_permohonan,
                                        a.keterangan,
                                    IF
                                        ( a.`status` = 'Verifikasi', 1, 0 ) AS `status` 
                                    FROM
                                        daftar_lembur a
                                        LEFT JOIN ( SELECT c.dept, c.nama, c.status_karyawan, c.no_scan FROM tbl_makar c ) c ON c.no_scan = a.no_absen 
                                    WHERE
                                        a.tanggal BETWEEN '$tgl_mulai' 
                                    AND '$tgl_selesai'
                                    ORDER BY
                                        a.tanggal")->result_array();
            $no = 1;
        ?>
        <?php foreach ($data as $dd) : ?>
        <tr>
            <!-- <td align="center"><?= $no++; ?></td>
            <td><?= $dd['kode_lembur']; ?></td>
            <td><?= $dd['tanggal']; ?></td>
            <td><?= $dd['no_absen']; ?></td>
            <td><?= $dd['nama']; ?></td>
            <td><?= $dd['total_jam_lembur']; ?></td>
            <td><?= $dd['status']; ?></td>
            <td><?= $dd['waktu_lembur_start']; ?></td>
            <td><?= $dd['waktu_lembur_stop']; ?></td>
            <td><?= $dd['status_karyawan']; ?></td> -->

            <td><?= $dd['no_absen']; ?></td>
            <td><?= $dd['nama']; ?></td>
            <td><?= $dd['tanggal']; ?></td>
            <td>00:00</td>
            <td>00:00</td>
            <td><?= $dd['waktu_lembur_start']; ?></td>
            <td><?= $dd['waktu_lembur_stop']; ?></td>
            <td><?= $dd['total_jam_lembur']; ?></td>
            <td><?= $dd['keterangan']; ?></td>
            <td><?= $dd['dept']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>