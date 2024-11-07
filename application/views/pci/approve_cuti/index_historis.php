<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Form Pengajuan Tugas
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
							$dept = $user['dept'];
							if ($dept == 'BOD') {
								$query = $this->db->query("SELECT a.id, a.kode_cuti,
																DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon,
																a.nip,
																b.nama,
																b.dept,
																DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
																a.lama_izin,
																DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
																a.alasan,
																a.status,
																a.status_approval 
															FROM
																permohonan_izin_cuti a
																LEFT JOIN ( SELECT * FROM tbl_makar ) b ON a.nip = b.no_scan 
															WHERE
																a.status_approval IS NOT NULL AND (a.status_approval_1 = 'Approved'  or a.status_approval_1 = '-') and (a.status_approval_2 = 'Approved' or a.status_approval_2 = '-' ) 
																AND a.kode_cuti LIKE '%FIC%' and a.ket NOT in('A15') and not a.status = 'Verifikasi'
																AND tgl_surat_pemohon BETWEEN DATE_ADD( NOW( ), INTERVAL -1 month ) AND DATE_ADD( NOW( ), INTERVAL '14' MONTH )
															ORDER BY
																a.tgl_mulai DESC")->result_array();
							} else {
								$query = $this->db->query("SELECT a.id, a.kode_cuti,
																DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon,
																a.nip,
																b.nama,
																b.dept,
																DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
																a.lama_izin,
																DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
																a.alasan,
																a.status,
																a.status_approval_1,
																a.status_approval_2
															FROM
																permohonan_izin_cuti a
																LEFT JOIN ( SELECT * FROM tbl_makar ) b ON a.nip = b.no_scan 
															WHERE
																a.status_approval IS NULL AND a.kode_cuti LIKE '%FIC%' and a.ket NOT in ('A15') and b.dept = '$dept' and not a.status = 'Verifikasi'
																AND tgl_surat_pemohon BETWEEN DATE_ADD( NOW( ), INTERVAL -1 month ) AND DATE_ADD( NOW( ), INTERVAL '14' MONTH )
															ORDER BY
																a.tgl_mulai DESC")->result_array();
							}
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
                                <?php if ($user['dept'] == "BOD"): ?>
                                <td><?= $data['status_approval']; ?></td>
                                <?php elseif ($user['dept'] != "BOD"): ?>
                                <td><?= $data['status_approval_2']; ?></td>
                                <?php endif; ?>
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
    src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></scri 
pt>