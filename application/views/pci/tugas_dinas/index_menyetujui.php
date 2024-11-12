<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Form Approve Dinas
        </h4>
        <div class="col-md-6">
        </div>
        </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered"
                        id="table-pci">
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
                        <tbody>
                            <?php
							$no_scan_ = $user['no_scan'];
							$query = $this->db->query("SELECT distinct
										*,
										   CONCAT(p.kode_cuti, '-', LPAD(p.id, 7, '0')) AS fkode_cuti
									from
										permohonan_izin_cuti p
									left join (
										select
											tm.nama,
											tm.no_scan,
											tm.dept,
											tm2.no_scan as no_scan_atasan1,
											tm2.nama as nama_atasan,
										tm2.jabatan as jabatan_atasan1,
											tm3.nama as nama_atasan2,
											tm3.jabatan as jabatan_atasan2,
											tm3.no_scan as no_scan_atasan2,
											u.fcm as fcm_atasan1,
											u2.fcm as fcm_atasan2
										from
											tbl_makar tm
										left join 
									tbl_makar tm2 on
											tm.atasan1 = tm2.nama
										left join 
									tbl_makar tm3 on
											tm.atasan2 = tm3.nama
										left join 
									user u on
											tm2.no_scan = u.no_scan
										left join 
									user u2 on
											tm3.no_scan = u2.no_scan
										where
											tm2.status_aktif = 1
											and tm3.status_aktif = 1) tm on
										tm.no_scan = p.nip	
									where
									p.ket = 'A15'and not p.status ='Verifikasi'
									and ((tm.no_scan_atasan1 = '$no_scan_' and status_approval_1 is null) 
									or(tm.no_scan_atasan2='$no_scan_' and status_approval_1 ='Approved' and status_approval_2 is null))")->result_array();
							?>
                            <?php foreach ($query as $data): ?>
                            <tr>
                                <td><?= $data['fkode_cuti']; ?></td>
                                <td><?= $data['tgl_surat_pemohon']; ?></td>
                                <td><?= $data['nip']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['dept']; ?></td>
                                <td><?= $data['tgl_mulai']; ?></td>
                                <td><?= $data['lama_izin']; ?></td>
                                <td><?= $data['tgl_selesai']; ?></td>
                                <td><?= $data['alasan']; ?></td>
                                <td>
                                    <button type="button" class="edit-request-btn btn btn-info btn-xs"
                                        data-toggle="modal" data-target="#modalResign<?= $data['id']; ?>"><i
                                            class="fa fa-sign-out"></i>Approve Pengajuan Dinas</button>
                                </td>
                                <!-- Modal Resign-->
                                <div class="modal fade" id="modalResign<?= $data['id']; ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="modalResign" aria-hidden="true">
                                    <form role="form"
                                        action="<?= base_url('pci/approval_tugas_dinas1/') . $user['name']; ?>"
                                        method="POST">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Approve Pengajuan Dinas
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-lg-5">
                                                            <label class="control-label col-sm-8">Kode Cuti</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['fkode_cuti']; ?>" name="kode_cuti"
                                                                id="kode_cuti" readonly>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <label class="control-label col-lg-12">Nama / No
                                                                Absen</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['nama']; ?> / <?= $data['nip']; ?>"
                                                                name="nama" id="nama" readonly>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <label class="control-label col-lg-12">Departemen</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['dept']; ?>" name="dept" readonly>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <label class="control-label col-lg-12">Alasan
                                                                Cuti/Izin</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <textarea class="form-control input-sm" name="alasan"
                                                                readonly rows="6"><?= $data['alasan']; ?></textarea>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <label class="control-label col-lg-12">Tanggal Mulai</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['tgl_mulai']; ?>" name="tgl_mulai"
                                                                readonly>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <label class="control-label col-lg-12">Tanggal
                                                                Selesai</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input type="hidden" value="<?= $data['id']; ?>" name="id"
                                                                id="id">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['tgl_selesai']; ?>" name="tgl_mulai"
                                                                readonly>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <label class="control-label col-lg-12">Approval</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <?php if ($user['no_scan'] == $data['no_scan_atasan1']): ?>
                                                            <input type="radio" name="ket_approval_1"
                                                                id="ket_approval_1" value="Approved"> Approved
                                                            <br />
                                                            <input type="radio" name="ket_approval_1"
                                                                id="ket_approval_1" value="Rejected"> Rejected
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['nama_atasan']; ?> / <?= $user['no_scan']; ?> / <?= date('Y-m-d h:i:s'); ?>"
                                                                name="getalldata1" type="hidden">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['nama_atasan']; ?>"
                                                                name="user_approval1" type="hidden">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['jabatan_atasan1']; ?>"
                                                                name="jabatan_atasan1" type="hidden">
                                                            <input class="form-control input-sm"
                                                                value="<?= date('Y-m-d h:i:s'); ?>" name="tgl_approval1"
                                                                type="hidden">

                                                            <?php elseif ($user['no_scan'] == $data['no_scan_atasan2']): ?>
                                                            <input type="radio" name="ket_approval_2"
                                                                id="ket_approval_2" value="Approved"> Approved
                                                            <br />
                                                            <input type="radio" name="ket_approval_2"
                                                                id="ket_approval_2" value="Rejected"> Rejected
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['nama_atasan2']; ?> / <?= $user['no_scan']; ?> / <?= date('Y-m-d h:i:s'); ?>"
                                                                name="getalldata2" type="hidden">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['nama_atasan2']; ?>"
                                                                name="user_approval2" type="hidden">
                                                            <input class="form-control input-sm"
                                                                value="<?= $data['jabatan_atasan2']; ?>"
                                                                name="jabatan_atasan2" type="hidden">
                                                            <input class="form-control input-sm"
                                                                value="<?= date('Y-m-d h:i:s'); ?>" name="tgl_approval2"
                                                                type="hidden">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                    </form>
                                </div>
                                <script type="text/javascript" language="javascript"
                                    src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js">
                                </script>
                                <script type="text/javascript"
                                    src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
                                <script type="text/javascript" language="javascript" src="
																														<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js">
                                </script>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </ div>
            </ sect ion>
            </ secti on>