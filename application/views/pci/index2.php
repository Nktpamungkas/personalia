<script>
	function searchsisacuti_disabled() {
		var _status = document.getElementById('status').value;
		if (_status = 'Resign') {
			$dataDept = $this - > db - > query("SELECT * FROM tbl_makar WHERE status_karyawan='Tetap'") - > result_array();
		}
		$dataDept = $this - > db - > query("SELECT * FROM tbl_makar WHERE status_aktif = 1 and status_karyawan='Tetap'") - >
			result_array();

	}
</script>
<section id="main-content">
	<section class="wrapper">
		<h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Laporan Sisa Cuti
			Karyawan Resigned</h4>

		<p>
			<a href="<?= base_url('pci/generate_cuti'); ?>" data-toggle="modal" class="btn btn-default btn-sm"><i
					class=" fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
			<a href="#" data-toggle="modal" data-target="#modalAnnualPersonal2" class="btn btn-danger btn-sm"
				title="Pembayaran Sisa cuti karyawan resign atau Pemutihan."><i
					class=" fa fa-download"></i>&nbsp;&nbsp;Pembayaran Cuti Karyawan</a>
		</p>

		<div class="row mb col-sm-12">
			<!-- Modal Annual Leave Personal 2-->
			<div class="modal fade" id="modalAnnualPersonal2" role="dialog" aria-labelledby="modalAnnualPersonal">
				<form role="form" action="<?= base_url('pci/annual_leave_personal3'); ?>" method="POST"
					enctype="multipart/form-data">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h3 class="modal-title"><i class=" fa fa-gear"></i> Pembayaran cuti perkaryawan
									Pemutihan
								</h3>
							</div>
							<div class="modal-body">
								<div class="form">
									<div class="form-group">
										<label>Jumlah potongan <b>Sisa Cuti Karyawan</b></label>
										<input type="text" name="annual_leave2" class="form-control input-sm" required>
										<label><b>Hutang Cuti Karyawan</b>
											<font color='red'>*jika tidak ada hutang cuti isi dengan 0 </font>
										</label>
										<input type="text" name="hutang_cuti" class="form-control input-sm" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<option value="" disabled selected></option>
												<select class="select2" style="width: 100%; border-style: none;"
													multiple="multiple" name="no_scan[]" required>
													<?php
													$dataDept = $this->db->query("SELECT * FROM tbl_makar WHERE status_karyawan='Resigned' and sisa_cuti is not null order by nama ASC")->result_array();
													?>
													<?php foreach ($dataDept as $dd): ?>
														<option value="<?= $dd['no_scan'] ?>" <?php if ($dd['no_scan'] == set_value('no_scan')) {
															  echo "SELECTED";
														  } ?>>
															<?= $dd['no_scan'] . ' - ' . $dd['nama'] . ' - ' . $dd['dept']; ?>
															/
															Sisa
															Cuti <?= $dd['sisa_cuti']; ?>
														</option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<label><b>Keterangan Histori</b></label>
										<textarea class="form-control input-sm" name="history2"></textarea>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- modal print sisa cuti diuangkan -->
			<?= $this->session->flashdata('message'); ?>
			<div class="content-panel">
				<div class="adv-table">
					<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered"
						id="table-cuti">
						<thead>
							<tr>
								<th>No</th>
								<th>No Scan</th>
								<th>Nama</th>
								<th>Dept</th>
								<th>Tgl Tetap</th>
								<th>Masa berlaku cuti (thn <?= date("Y"); ?>/<?= date("Y") + 1; ?>)</th>
								<th>Sisa Cuti</th>
								<th>Keterangan</th>
								<!-- <th>Option</th> -->
							</tr>
						</thead>
						<tbody>
							<?php
							$dept = $user['dept'];
							if ($dept == "HRD") {
								$data = $this->db->query("SELECT *, 
                                                                    DATE_FORMAT( tgl_generate_cuti, '%d %M %Y' ) AS th_awal,
                                                                     DATE_FORMAT( ( tgl_generate_cuti + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M %Y' ) as th_akhir,
                                                                     gaji 
                                                                FROM 
                                                                    tbl_makar 
                                                                WHERE 
                                                                    status_karyawan = 'Resigned'
                                                                    and tgl_tetap <>0 
                                                                ORDER BY 
                                                                    dept ASC, no_scan ASC, nama asc")->result_array();
							} else {
								$data = $this->db->query("SELECT *, 
                                                                     DATE_FORMAT( tgl_generate_cuti, '%d %M %Y' ) AS th_awal,
                                                                     DATE_FORMAT( ( tgl_generate_cuti + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M %Y' ) as th_akhir,
                                                                    gaji  
                                                                FROM 
                                                                    tbl_makar 
                                                                WHERE 
                                                                    status_karyawan = 'Resigned' 
                                                                  -- and not year( tgl_tetap) = YEAR(CURDATE()) 
                                                                ORDER BY 
                                                                    dept ASC,DATE_FORMAT( tgl_tetap, '%d' )ASC, DATE_FORMAT( tgl_tetap, '%M' )ASC, nama ASC")->result_array();
							}
							$no = 1;
							?>
							<?php foreach ($data as $result): ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $result['no_scan']; ?></td>
									<td><a href="<?= base_url('pci/histori_cuti/') . $result['no_scan']; ?>"
											title="Histori Cuti"><?= $result['nama']; ?></a></td>
									<td><?= $result['dept']; ?></td>
									<td><?= $result['tgl_tetap']; ?></td>
									<td>
										<?php if ($result['gaji'] == "atas"): ?>
											Januari <b>s/d</b> Desember
										<?php else: ?>
											<?= $result['th_awal'] . '<b> s/d </b>' . $result['th_akhir']; ?>
										<?php endif; ?>
									</td>
									<td><?= $result['sisa_cuti']; ?></td>
									<td><?= $result['status_karyawan']; ?></td>

									<!-- <td><a href="<?= base_url('pci/export_histori_cuti/') . $result['no_scan']; ?>" title="Cetak Histori Cuti">Cetak Histori</a></td> -->
									<!-- <td style="font-size: 12px;"> <a href="<?= base_url(); ?>pci/export_histori_cuti/<?= $result['no_scan']; ?>" style="text-decoration: underline;"></a>Cetak Histori</td> -->
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>


</section>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>