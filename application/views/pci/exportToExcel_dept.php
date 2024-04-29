<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Permohonan Izin Karyawan $dept $tgl_mulai s/d $tgl_selesai.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
    <thead>
	<tr>
		<th>Kode Cuti</th>
		<th>Tanggal</th>
		<th>NIP</th>
		<th>Nama</th>
		<th>Mulai</th>
		<th>Lama Izin</th>
		<th>Ket. Tidak Masuk</th>
		<th>Selesai</th>
		<th>Keterangan</th>
	</tr>
    </thead>
    <tbody>
		<?php 
			$data = $this->db->query("SELECT a.id, a.kode_cuti,
											DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon,
											a.nip,
											b.nama,
											DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
											a.lama_izin,
											DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
											a.status,
											a.alasan,
											a.ket,
											c.cuti,
											b.status_aktif
										FROM
											permohonan_izin_cuti a
											LEFT JOIN (SELECT * FROM tbl_makar) b ON a.nip = b.no_scan
											LEFT JOIN cuti c ON c.kode_cuti = a.ket
										WHERE
											a.dept = '$dept' AND a.kode_cuti LIKE '%FIC%' AND tgl_surat_pemohon BETWEEN '$tgl_mulai' AND '$tgl_selesai'  AND b.status_aktif = 1
										ORDER BY
											a.tgl_surat_pemohon ASC")->result_array(); 
			$no = 1;
		?>
        <?php foreach ($data as $result) : ?>
        <tr>	
			<td><?= $result['kode_cuti'].'-'.sprintf("%07s", $result['id']); ?></td>
			<td><?= $result['tgl_surat_pemohon']; ?></td>
			<td><?= $result['nip']; ?></td>
			<td><?= $result['nama']; ?></td>
			<td><?= $result['tgl_mulai']; ?></td>
			<td><?= $result['lama_izin']; ?></td>
			<td><?= $result['cuti']; ?></td>
			<td><?= $result['tgl_selesai']; ?></td>
			<td><?= $result['alasan']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
