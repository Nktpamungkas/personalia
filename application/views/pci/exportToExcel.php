<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Permohonan Izin Karyawan $tgl_mulai - $tgl_selesai.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
    <thead>
        <tr>
            <th>UserID</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Code</th>
            <th>Durasi</th>
            <th>Keterangan</th>
            <th>Jenis Izin</th>

            <th>Kode</th>
            <th>Tanggal Awal Izin</th>
            <th>NIP(No Scan)</th>
            <th>Nama</th>
            <th>Kode Cuti</th>
            <th>Lama Izin</th>
            <th>Status Verifikasi</th>
            <th>Departement</th>
            <th>Status Karyawan</th>
            <th>Alasan</th>
            <th>Pengganti Kerja</th>
            <th>Nama Pemohon</th>
            <th>Jabatan Pemohon</th>
            <th>Tanggal Pemohon</th>
            <th>Nama Disetujui 1</th>
            <th>Jabatan Disetujui 1</th>
            <th>Nama Disetujui 2</th>
            <th>Jabatan Disetujui 2</th>
            <th>Nama Mengetahui</th>
            <th>Jabatan Mengetahui</th>
            <th>Tanggal Tanda Tangan</th>            
        </tr>
    </thead>
    <tbody>
    <?php
            $data = $this->db->query("SELECT a.nip,
                                            a.id,
                                            a.kode_cuti,
                                            b.nama,
                                            b.status_karyawan,
                                            a.dept,
                                            a.pengganti_kerja,
                                            c.nama AS nama_pengganti_kerja,
                                            a.lama_izin,
                                            a.days_or_month,
                                            DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
                                            DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
                                            a.ket,
                                            d.cuti,
                                            a.dll,
                                            IF(a.`status` = 'Verifikasi', 1,0) AS `status`,
                                            a.alasan,
                                            a.pemohon_nama,
                                            a.pemohon_jabatan,
                                            a.disetujui_nama_1,
                                            a.disetujui_jabatan_1,
                                            a.disetujui_nama_2,
                                            a.disetujui_jabatan_2,
                                            a.mengetahui_nama,
                                            a.mengetahui_jabatan,
                                            DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon,
                                            DATE_FORMAT( a.tgl_diset_mengetehui, '%d %M %Y' ) AS tgl_diset_mengetehui
                                        FROM
                                            permohonan_izin_cuti a
                                            LEFT JOIN(SELECT b.no_scan, b.nama, b.status_karyawan FROM tbl_makar b) b ON b.no_scan = a.nip 
                                            LEFT JOIN(SELECT c.no_scan, c.nama FROM tbl_makar c) c ON c.no_scan = a.pengganti_kerja
                                            LEFT JOIN cuti d ON d.kode_cuti = a.ket
                                        WHERE
                                            a.tgl_mulai BETWEEN '$tgl_mulai' 
                                        AND '$tgl_selesai' 
                                    ORDER BY
                                        a.tgl_mulai")->result_array();
            $no = 1;
        ?>
        <?php foreach ($data as $dd) : ?>
        <tr>

            <td><?= $dd['nip']; ?></td>
            <td><?= $dd['nama']; ?></td>
            <td><?= $dd['tgl_mulai']; ?></td>
            <td><?= $dd['ket']; ?></td>
            <td><?= $dd['lama_izin']; ?></td>
            <td><?= $dd['alasan']; ?></td>
            <td><?= $dd['cuti']; ?></td>

            <td><?= $dd['kode_cuti'].'-'.sprintf("%07s", $dd['id']); ?></a></td>
            <td><?= $dd['tgl_mulai']; ?></td>
            <td><?= $dd['nip']; ?></td>
            <td><?= $dd['nama']; ?></td>
            <td><?= $dd['ket']; ?></td>
            <td><?= $dd['lama_izin']; ?></td>
            <td><?= $dd['status']; ?></td>
            <td><?= $dd['dept']; ?></td>
            <td><?= $dd['status_karyawan']; ?></td>
            <td><?= $dd['alasan']; ?></td>
            <td><?= $dd['nama_pengganti_kerja']; ?></td>
            <td><?= $dd['pemohon_nama']; ?></td>
            <td><?= $dd['pemohon_jabatan']; ?></td>
            <td><?= $dd['tgl_surat_pemohon']; ?></td>
            <td><?= $dd['disetujui_nama_1']; ?></td>
            <td><?= $dd['disetujui_jabatan_1']; ?></td>
            <td><?= $dd['disetujui_nama_2']; ?></td>
            <td><?= $dd['disetujui_jabatan_2']; ?></td>
            <td><?= $dd['mengetahui_nama']; ?></td>
            <td><?= $dd['mengetahui_jabatan']; ?></td>
            <td><?= $dd['tgl_diset_mengetehui']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>