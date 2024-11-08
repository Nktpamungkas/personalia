<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Surat Peringatan.xls");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-index-discipline">
    <thead>
        <tr>
            <th>Kode SP</th>
            <th>Tanggal SP</th>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Dept</th>
            <th>Jabatan</th>
            <th>SP ke-</th>
            <th>Alasan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = $this->db->query("SELECT a.id,a.tgl_sp,a.no_scan,b.nama,b.dept,b.jabatan,a.sp,a.alasan,DATE_FORMAT( a.tgl_sp, '%d %M %Y' ) AS tgl_sp2	
                                        FROM
                                            dicipline a
                                        LEFT JOIN ( SELECT * FROM tbl_makar b) b ON b.no_scan = a.no_scan
                                        WHERE a.tgl_sp BETWEEN '$tgl_mulai' AND '$tgl_selesai'")->result_array(); 
        ?>
        <?php foreach($query AS $result) : ?>
        <tr>
            <td>
                SP<?php echo sprintf("%04d", $result['id']); ?>
            </td>
            <td><?= $result['tgl_sp2']; ?></td>
            <td><?= $result['no_scan']; ?></td>
            <td><?= $result['nama']; ?></td>
            <td><?= $result['dept']; ?></td>
            <td><?= $result['jabatan']; ?></td>
            <td><?= $result['sp']; ?></td>
            <td><?= $result['alasan']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>