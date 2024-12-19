<section id="main-content">
	<section class="wrapper">
		<h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Historis Pengajuan Tugas
			Dinas </h4>
		<div id="editRequestModal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Request</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="editRequestForm" method="post">
							<!-- Form fields for editing request will be added dynamically here -->
							<input type="hidden" id="requestId" name="id">
							<!-- Tambahkan input lainnya sesuai kebutuhan -->
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" form="editRequestForm">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<?= $this->session->flashdata('message'); ?>
		<div class="row mb col-sm-12">
			<div class="content-panel">
				<div class="adv-table">
					<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered"
						id="table-indexAll-pci-ver">
						<thead>
							<tr>
								<th width="30">*</th>
								<th width="160">Kode Cuti</th>
								<th width="150">Tanggal</th>
								<th width="50">NIP</th>
								<th width="150">Nama</th>
								<th width="50">Dept</th>
								<th width="150">Mulai</th>
								<th width="80">Lama Izin</th>
								<th width="120">Selesai</th>
								<th width="250">Alasan</th>
								<th width="150">Status Aproval</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no_scan_ = $user['no_scan'];
							$query = $this->db->query("SELECT DISTINCT 
														p.*,
														case
														when p.status_approval_1 is null then 'not yet Approved'
														else p.status_approval_1
														end as status_approval_1_
														CONCAT(p.kode_cuti, '-', LPAD(p.id, 7, '0')) AS fkode_cuti   
													FROM 
														permohonan_izin_cuti p
													LEFT JOIN (
														SELECT 
															tm.nama,
															tm.no_scan,
															tm.dept,
															tm2.no_scan AS no_scan_atasan1,
															tm2.nama AS nama_atasan1,
															tm2.jabatan AS jabatan_atasan1,
															tm3.nama AS nama_atasan2,
															tm3.jabatan AS jabatan_atasan2,
															tm3.no_scan AS no_scan_atasan2,
															u.fcm AS fcm_atasan1,
															u2.fcm AS fcm_atasan2
														FROM 
															tbl_makar tm
														LEFT JOIN 
															tbl_makar tm2 
															ON tm.atasan1 = tm2.nama
														LEFT JOIN 
															tbl_makar tm3 
															ON tm.atasan2 = tm3.nama
														LEFT JOIN 
															user u 
															ON tm2.no_scan = u.no_scan
														LEFT JOIN 
															user u2 
															ON tm3.no_scan = u2.no_scan
														WHERE 
															tm2.status_aktif = 1
															AND (tm3.no_scan IS NULL OR tm3.status_aktif = 1)
													) tm 
														ON tm.no_scan = p.nip
													WHERE 
														p.ket <> 'A15' 
														AND (p.status = 'Verifikasi' OR p.status = 'Printed')
														and p.hash_creation is not null
														AND (
															(tm.no_scan = '$no_scan_' AND status_approval_1 IS NULL) OR 
															(tm.no_scan_atasan1 = '$no_scan_' AND status_approval_1 = 'Approved') OR 
															(tm.no_scan_atasan2 = '$no_scan_' AND status_approval_1 = 'Approved' 
															AND (status_approval_2 IS NULL OR status_approval_2 = 'Approved'))
														)
													ORDER BY 
														p.tgl_surat_pemohon DESC")->result_array();
							?>
							<?php foreach ($query as $data): ?>
								<tr>
									<td></td>
									<td><a href="#"
											style="text-decoration: underline;"><?= $data['kode_cuti'] . '-' . sprintf("%07s", $data['id']); ?></a>
									</td>
									<td><?= $data['tgl_surat_pemohon']; ?></td>
									<td><?= $data['nip']; ?></td>
									<td><?= $data['nama']; ?></td>
									<td><?= $data['dept']; ?></td>
									<td><?= $data['tgl_mulai']; ?></td>
									<td><?= $data['lama_izin']; ?></td>
									<td><?= $data['tgl_selesai']; ?></td>
									<td><?= $data['alasan']; ?></td>
									<td><?= $data['status_approval_1_']; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</section>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js">
</script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<scri type="text/javascript" language="javascript"
	src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></scri pt>