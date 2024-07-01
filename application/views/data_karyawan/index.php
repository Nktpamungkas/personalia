<section id="main-content">
	<section class="wrapper">
		<h4><i class="fa fa-angle-right"></i> Employee Information</h4>
		<div class="col-md-6">
			<?php if ($user['dept'] == "HRD") : ?>
				<p class="inline">
					<a href="<?= base_url('data_karyawan/addNewEmployee'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Employee</a></<a>
					<!-- <a href="<?= base_url('users/index'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Upload Data New Employee</a></<a> -->
					<a href="<?= base_url('data_karyawan/ExportToExcell'); ?>" class="btn btn-default btn-sm">Export to Excel</a>
				<?php endif; ?>
				</p>
		</div>
		<div class="row mb col-sm-12">
			<?= $this->session->flashdata('message'); ?>
			<div class="content-panel">
				<div class="adv-table">
					<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
						<thead>
							<tr>
								<?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
									<th>*</th>
								<?php endif; ?>
								<th>No</th>
								<th>No Scan</th>
								<th>Nama Karyawan</th>
								<th>Department</th>
								<?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
									<th>Bagian</th>
								<?php endif; ?>
								<th>Jabatan</th>
								<?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
									<th>Tanggal Masuk</th>
									<th>Tanggal Tetap</th>
									<th>Status Karyawan</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($employees as $key => $employee) : ?>

								<?php
								$encrypt_no_scan = $this->encryption->encrypt($employee['no_scan']);
								?>

								<tr class="gradeX">
									<?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
										<td>
											<?php if ($user['special_user'] == 1) : ?>
												<li class="dropdown" style="list-style-type:none;">
													<a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
													<ul class="dropdown-menu">
														<!-- Modal Delete Karyawan -->
														<li><a href="<?= base_url('data_karyawan/edit_employee/' . $encrypt_no_scan); ?>"><i class="fa fa-edit"></i> Edit</a></li>
														<li><a href="#" data-toggle="modal" data-target="#modalResign` + data[i].no_scan + `"><i class="fa fa-sign-out"></i>Pengajuan Resign</a></li>
														<li><a href="<?= base_url('data_karyawan/print_datakaryawan/' . $encrypt_no_scan); ?>"><i class="fa fa-print"></i> Print</a></li>
														<li><a href="<?= base_url('data_karyawan/tanda_tangan/' . $encrypt_no_scan); ?>"><i class="fa fa-gears"></i> Buat Tanda Tangan</a></li>
														<li><a href="<?= base_url('Career_adm/AddCareerTransition/' . $encrypt_no_scan); ?>"><i class="fa fa-gears"></i> Career Transition</a></li>
														<li class="divider"></li>
														<li><a href="#" data-toggle="modal" data-target="#modalDelete<?= $employee['no_scan']; ?>"><i class="fa fa-trash"></i> Delete</a></li>
													</ul>
												</li>
											<?php endif; ?>
											<!-- Modal Delete Karyawan -->
											<div class="modal fade" id="modalDelete<?= $employee['no_scan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
												<form role="form" action="<?= base_url('data_karyawan/delete/' . $user['name']); ?>" method="POST">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure?</h4>
															</div>
															<input class="form-control input-sm" value="<?= $employee['no_scan']; ?>" name="no_scan" type="hidden">
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-danger">Yes</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</td>
									<?php endif; ?>
									<td><?= $key + 1; ?></td>
									<td><?= $employee['no_scan']; ?></td>
									<td><?= $employee['nama']; ?></td>
									<td><?= $employee['dept']; ?></td>
									<?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
										<td><?= $employee['bagian']; ?></td>
									<?php endif; ?>
									<td><?= $employee['jabatan']; ?></td>
									<?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
										<td>
											<center><?= $employee['tgl_masuk']; ?></center>
										</td>
										<td>
											<center><?= $employee['tgl_tetap']; ?></center>
										</td>
										<td><?= $employee['status_karyawan']; ?></td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
			<div class="row mb col-sm-12">
				<div class="content-panel">
					<div class="adv-table">
						<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table">
							<thead>
								<tr>
									<th>No Scan</th>
									<th>Nama Karyawan</th>
									<th>Department</th>
									<th>Tanggal Masuk</th>
									<th>Kontrak Awal</th>
									<th>Kontrak Akhir</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$data = $this->db->query("SELECT no_scan, nama, dept,
                                                            date_format(tgl_masuk, '%d-%m-%Y') as tgl_masuk
                                                            FROM
                                                                tbl_makar 
                                                            WHERE
                                                                status_karyawan LIKE '%Kontrak%' 
                                                            ORDER BY
                                                                no_scan DESC")->result_array();
								?>
								<?php foreach ($data as $dd) : ?>
									<?php
									$noscan = $dd['no_scan'];
									$data_kontrak = $this->db->query("SELECT no_scan,
                                                                        kontrak_awal,
                                                                        kontrak_akhir 
                                                                    FROM
                                                                        tbl_kontrak 
                                                                    WHERE
                                                                        id IN ( SELECT MAX( id ) FROM tbl_kontrak GROUP BY no_scan ) AND no_scan = '$noscan'")->row();
									?>
									<tr>
										<td><?= $dd['no_scan']; ?></td>
										<td><?= $dd['nama']; ?></td>
										<td><?= $dd['dept']; ?></td>
										<td><?= $dd['tgl_masuk']; ?></td>
										<td><?php error_reporting(0);
											echo $data_kontrak->kontrak_awal; ?></td>
										<td><?php error_reporting(0);
											echo $data_kontrak->kontrak_akhir; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</section>
</section>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#mydata').dataTable({
			"aoColumnDefs": [{
				"bSortable": true,
				"aTargets": [1]
			}],
			"aaSorting": [
				[0, 'asc']
			]
		});
	});
</script>
