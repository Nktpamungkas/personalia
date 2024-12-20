<section id="main-content">
	<t class="wrapper">
		<h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Form Pengajuan Tugas
			Dinas </h4>
		<div class="row mb col-sm-12">
			<?= $this->session->flashdata('message'); ?>
			<div class="content-panel">
				<div class="adv-table">
					<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
						<thead>
							<tr>
								<th width="160">Kode Cuti</th>
								<th width="150">Tanggal</th>
								<th width="50">NIP</th>
								<th width="150">Nama</th>
								<th width="50">Dept</th>
								<th width="150">Mulai</th>
								<th width="80">Lama Izin</th>
								<th width="120">Selesai</th>
								<th width="250">Alasan</th>
								<th width="150">Option</th>
							</tr>
						</thead>
						<tbody id="show_data">
						</tbody>
					</table>
					<script type="text/javascript" language="javascript"
						src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
					<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js">
					</script>
					<script type="text/javascript" language="javascript"
						src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							tampil_data_employee(); //pemanggilan fungsi tampil employee.
							$('#mydata').dataTable({
								"aoColumnDefs": [{
									"bSortable": true,
									"aTargets": [1]
								}],
								"aaSorting": [
									[0, 'asc']
								]
							});

							//fungsi tampil employee
							function tampil_data_employee() {
								$.ajax({
									type: 'ajax',
									url: '<?= base_url() ?>pci/data_tugas_dinas',
									async: false,
									dataType: 'json',
									success: function (data) {
										var html = '';
										var i;
										var no = 1;
										for (i = 0; i < data.length; i++) {
											html +=
												'<tr class="gradeX">' +
												'<td>' + data[i].fkode_cuti + '</td>' +
												'<td>' + data[i].tgl_surat_pemohon + '</td>' +
												'<td>' + data[i].nip + '</td>' +
												'<td>' + data[i].nama + '</td>' +
												'<td>' + data[i].dept + '</td>' +
												'<td>' + data[i].tgl_mulai + '</td>' +
												'<td>' + data[i].lama_izin + '</td>' +
												'<td>' + data[i].tgl_selesai + '</td>' +
												'<td>' + data[i].alasan + '</td>' +
												`<td>
													<?php if ($user['special_user'] == 1): ?>
																<button type="button" class="edit-request-btn btn btn-info btn-xs" data-toggle="modal" data-target="#modalResign` +
													data[i].id + `"><i class="fa fa-sign-out"></i>Approve Pengajuan Dinas</button>
													<?php endif; ?>
													<!-- Modal Resign-->
													<div class="modal fade" id="modalResign` + data[i].id + `" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
														<form role="form" action="<?= base_url('pci/approval_tugas_dinas/') . $user['name']; ?>" method="POST">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																	<h4 class="modal-title" id="myModalLabel">Modal title</h4>
																</div>
																<div class="modal-body">
																	<div class="form-group">
																		<div class="col-lg-5">
																				<label class="control-label col-sm-8">Kode Cuti</label>
																			</div>
																			<div class="col-lg-7">
																			<input class="form-control input-sm" value="` + data[i].fkode_cuti + `" name="kode_cuti" id="kode_cuti" readonly>
																			</div>
																			<div class="col-lg-5">
																				<label class="control-label col-lg-12">Nama / No Absen</label>
																			</div>
																			<div class="col-lg-7">
																			<input class="form-control input-sm" value="` + data[i].nama + ' / ' + data[i].nip + `" name="nama" id="nama" readonly>
																			</div>
																			<div class="col-lg-5">
																				<label class="control-label col-lg-12">Departemen</label>
																			</div>
																			<div class="col-lg-7">
																			<input class="form-control input-sm" value="` + data[i].dept + `" name="dept" readonly>
																			</div>
																			<div class="col-lg-5">
																				<label class="control-label col-lg-12">Alasan Dinas</label>
																			</div>
																			<div class="col-lg-7">
																				<textarea class="form-control input-sm" name="alasan" readonly rows="6">` + data[i].alasan + `</textarea>
																				</div>
																			<div class="col-lg-5">
																				<label class="control-label col-lg-12">Tanggal Mulai</label>
																			</div>
																			<div class="col-lg-7">
																				<input value="` + data[i].id + `" id="id" name="id" type="hidden" >
																				<input class="form-control input-sm" value="` + data[i].tgl_mulai + `" name="tgl_mulai" readonly>
																			</div>
																			<div class="col-lg-5">
																				<label class="control-label col-lg-12">Tanggal Selesai</label>
																			</div>
																			<div class="col-lg-7">
																				<input value="` + data[i].id + `" id="id" name="id" type="hidden" >
																				<input class="form-control input-sm" value="` + data[i].tgl_selesai + `" name="tgl_mulai" readonly>
																			</div>	<div class="col-lg-5">
																				<label class="control-label col-lg-12">Approval</label>
																			</div>
																			<div class="col-lg-7">
																				<input type="radio" name="ket_approval" id="ket_approval" value="Approved"> Approved <br/>
																				<input type="radio" name="ket_approval" id="ket_approval" value="Rejected"> Rejected
																				<input class="form-control input-sm" value="<?= $user['name']; ?>/` + data[i]
													.fkode_cuti + '/' + data[i].nama + '/' + data[i].nip + `/<?= date('Y-m-d h:i:s'); ?>" name="getalldata" type="hidden">
																				<input class="form-control input-sm" value="<?= $user['name']; ?>" name="user_approval" type="hidden">
																				<input class="form-control input-sm" value="<?= date('Y-m-d h:i:s'); ?>" name="tgl_approval" type="hidden">
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-primary">Approve</button>
																</div>
															</div>
														</form>
													</div>											
												</td>` +
												'</tr>';
										}
										$('#show_data').html(html);
									}
								});
							}
						});
					</script>
				</div>
			</div>
		</div>
</section>
</section>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js">
</script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<sc type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js">
</sc ri>