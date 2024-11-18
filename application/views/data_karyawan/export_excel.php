<?php
header("content-type:application/vnd-ms-excel");
header("content-disposition:attachment;filename=Master Karyawan.xls");
header('Cache-Control: max-age=0');
?>
<style>
	.str {
		mso-number-format: \@;
	}
</style>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
	<thead>
		<tr>
			<th>No KTP</th>
			<th>No Scan</th>
			<th>NPWP</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Alamat KTP</th>
			<th>Alamat Domisili</th>
			<th>Alamat NPWP</th>
			<th>RT</th>
			<th>RW</th>
			<th>Kecamatan Domisili</th>
			<th>Kabupaten Domisili</th>
			<th>Agama</th>
			<th>Jenis Kelamin</th>
			<th>Status Keluarga</th>
			<th>Nama Sekolah</th>
			<th>Pendidikan</th>
			<th>Jurusan</th>
			<th>IPK</th>
			<th>Golongan Darah</th>
			<th>Email Pribadi</th>
			<th>Nomor Handphone</th>
			<th>Pengalaman Kerja</th>
			<th>Keterampilan Khusus</th>
			<th>Tgl Masuk</th>
			<th>Status Karyawan</th>
			<th>Tgl tetap</th>
			<th>Golongan</th>
			<th>Jabatan</th>
			<th>Dept</th>
			<th>Bagian</th>
			<th>Atasan 1</th>
			<th>Atasan 2</th>
			<th>No BPJS Ketenagakerjaan</th>
			<th>No BPJS Kesehatan</th>
			<th>Status Aktif</th>
			<th>Tgl Resign</th>
			<th>Kode Jabatan</th>
			<th>Nama Jabatan</th>
			<th>Kode Pos</th>
			<th>Nama Ayah Kandung</th>
			<th>Nama Ibu Kandung</th>
			<th>No Kartu Keluarga</th>
			<th>Keterangan Keluar</th>
			<th>Suku</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$data = $this->db->query("SELECT 
                                            CASE
                                                WHEN LEFT(no_ktp, 1) = '''' THEN SUBSTRING(no_ktp, 2,100)
                                                ELSE no_ktp
                                            END AS no_ktp_kutip,
                                            tbl_makar.* FROM tbl_makar
                                            order by CAST(no_scan AS INTEGER) asc")->result_array();
		?>
		<?php foreach ($data as $dd): ?>
			<tr>
				<td class='str'><?= $dd['no_ktp_kutip']; ?></td>
				<td><?= $dd['no_scan']; ?></td>
				<td class='str'><?= $dd['npwp']; ?></td>
				<td><?= $dd['nama']; ?></td>
				<td><?= $dd['tempat_lahir']; ?></td>
				<td>
					<?php
					if ($dd['tgl_lahir'] == "0000-00-00") {
						$tgllahir = date_create("00/00/000");
						echo "";
					} else {
						$tgllahir = date_create($dd['tgl_lahir']);
						echo date_format($tgllahir, "d/m/Y");
					}
					?>
				</td>
				<td><?= $dd['alamat_ktp']; ?></td>
				<td><?= $dd['alamat_domisili']; ?></td>
				<td><?= $dd['alamat_npwp']; ?></td>
				<td><?= $dd['RT']; ?></td>
				<td><?= $dd['RW']; ?></td>
				<td><?= $dd['kecamatan_domisili']; ?></td>
				<td><?= $dd['kabupaten_domisili']; ?></td>
				<td><?= $dd['agama']; ?></td>
				<td><?= $dd['jenis_kelamin']; ?></td>
				<td><?= $dd['status_kel']; ?></td>
				<td><?= $dd['nama_sekolah']; ?></td>
				<td><?= $dd['pendidikan']; ?></td>
				<td><?= $dd['jurusan']; ?></td>
				<td><?= $dd['ipk']; ?></td>
				<td><?= $dd['gol_darah']; ?></td>
				<td><?= $dd['email_pribadi']; ?></td>
				<td class='str'><?= $dd['no_hp']; ?></td>
				<td><?= $dd['pengalaman_kerja']; ?></td>
				<td><?= $dd['keterampilan_khusus']; ?></td>
				<td>
					<?php
					if ($dd['tgl_masuk'] == "0000-00-00") {
						$tglmasuk = date_create("00/00/000");
						echo "";
					} else {
						$tglmasuk = date_create($dd['tgl_masuk']);
						echo date_format($tglmasuk, "d/m/Y");
					}
					?>
				</td>
				<td><?= $dd['status_karyawan']; ?></td>
				<td>
					<?php
					if ($dd['tgl_tetap'] == "0000-00-00") {
						$tgltetap = date_create("00/00/000");
						echo "";
					} else {
						$tgltetap = date_create($dd['tgl_tetap']);
						echo date_format($tgltetap, "d/m/Y");
					}
					?>
				</td>
				<td><?= $dd['golongan']; ?></td>
				<td><?= $dd['jabatan']; ?></td>
				<td><?= $dd['dept']; ?></td>
				<td><?= $dd['bagian']; ?></td>
				<td><?= $dd['atasan1']; ?></td>
				<td><?= $dd['atasan2']; ?></td>
				<td class='str'><?= $dd['no_bpjs_tk']; ?></td>
				<td class='str'><?= $dd['no_bpjs_kes']; ?></td>
				<td><?= $dd['status_aktif']; ?></td>
				<td>
					<?php
					if ($dd['tgl_resign'] == "0000-00-00" || empty($dd['tgl_resign'])) {
						echo " ";
					} else {
						$tglresign = date_create($dd['tgl_resign']);
						echo date_format($tglresign, "d/m/Y");
					}
					?>
				</td>
				<td><?= $dd['kode_jabatan']; ?></td>
				<td><?= $dd['nama_jabatan']; ?></td>
				<td><?= $dd['kode_pos']; ?></td>
				<td>
					<?php
					error_reporting(0);
					$noscan = $dd['no_scan'];
					$queryDataAyah = $this->db->query("SELECT * FROM data_keluarga WHERE no_scan='$noscan' AND hubungan LIKE '%AYAH%'")->row();
					echo $queryDataAyah->nama;
					?>
				</td>
				<td>
					<?php
					error_reporting(0);
					$noscan = $dd['no_scan'];
					$queryDataIbu = $this->db->query("SELECT * FROM data_keluarga WHERE no_scan='$noscan' AND hubungan LIKE '%IBU%'")->row();
					echo $queryDataIbu->nama;
					?>
				</td>
				<td class='str'><?= $dd['kartu_keluarga']; ?></td>

				<td class='str'><?= $dd['keterangan_resign']; ?></td>
				<td class='str'><?php
				error_reporting(0);
				$id_suku_ = $dd['id_suku'];
				$queryDatasuku = $this->db->query("SELECT * FROM suku WHERE id='$id_suku_'")->row();
				echo $queryDatasuku->nama_suku;
				?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>