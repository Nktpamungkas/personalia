<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Form Izin Cuti </h4>
        <div class="col-md-6">
            <p>
                <?php if($user['dept'] != 'HRD') : ?>  
                    <a href="<?= base_url('pci/add_Request'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add Form Izin Cuti</a>
                <?php else : ?>
                    <a href="<?= base_url('pci/index_all'); ?>" class="btn btn-warning"><i class=" fa fa-list-alt"></i>&nbsp;&nbsp;Show Request for Izin Cuti</a>
                    <a href="<?= base_url('pci/add_Request'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add Form Izin Cuti</a>
					<a href="#" data-toggle="modal" data-target="#modalExportdept" class="btn btn-success">Export to Excel</a>
                <?php endif ?>
            </p>
        </div>
		<div class="modal fade" id="modalExportdept" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                    <form action="<?= base_url('pci/export_excel_dept') ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="fa fa-calendar"></i> Range Tanggal Export : </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <b>Range tanggal berdasarkan Tanggal Surat</b>
                                                <h4 class="modal-title"><i class="fa fa-calendar"></i></h4>
                                                <label>
                                                    Tanggal Mulai
                                                    <input type="date" name="start" class="form-control input-sm" required>
                                                </label>
                                                <label> s/d </label>
                                                <label>
                                                    Tanggal Akhir
                                                    <input type="date" name="stop" class="form-control input-sm" required>
													<input type="text" value="<?=  $user['dept']; ?>" onkeyup="this.value = this.value.toUpperCase();" name="dept" hidden>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Export Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-pci">
                        <thead>
                            <tr>
                                <th><i class="fa fa-gear"></i></th>
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
                                $dept = $user['dept'];
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
                                                                a.dept = '$dept' AND a.kode_cuti LIKE '%FIC%' AND tgl_surat_pemohon BETWEEN '2021-01-01' AND now() AND b.status_aktif = 1
                                                            ORDER BY
                                                                a.tgl_surat_pemohon DESC")->result_array(); 
                            ?>
                            <?php foreach($data AS $result): ?>
                            <tr>
                                <td>
                                    <li class="dropdown" style="list-style-type:none;">
                                        <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                        <?php if($result['status'] == "Verifikasi") : ?>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Ubah tidak aktif">Ubah</a></li> -->
                                            <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Cetak tidak aktif">Cetak</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Hapus tidak aktif">Hapus</a></li>
                                        </ul>
                                        <?php elseif($result['status'] == "Printed") : ?>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Ubah tidak aktif">Ubah</a></li> -->
                                            <li><a href="<?= base_url(); ?>pci/print_izin_cuti/<?= $result['id']; ?>" style="color: black; font-size:13px;" title="Cetak">Cetak</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Hapus tidak aktif">Hapus</a></li>
                                        </ul>
                                        <?php else : ?>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a href="<?= base_url(); ?>pci/edit_Request/<?= $result['id']; ?>" style="color: black; font-size:13px;">Ubah</a></li> -->
                                            <li><a href="<?= base_url(); ?>pci/print_izin_cuti/<?= $result['id']; ?>" style="color: black; font-size:13px;">Cetak</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" style="color: black; font-size:13px;" data-target="#modal-delete<?= $result['id']; ?>" data-toggle="modal">Hapus</a></li>
                                        </ul>
                                        <div class="modal fade" id="modal-delete<?= $result['id']; ?>">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <form class="form-horizontal" action="<?= base_url(); ?>pci/delete/<?= $result['id']; ?>" method="post">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin mengahapus data ini?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </li>
                                </td>
                                <td><a href="#" style="text-decoration: underline;"><?= $result['kode_cuti'].'-'.sprintf("%07s", $result['id']); ?></a></td>
                                <td><?= $result['tgl_surat_pemohon']; ?></td>
                                <td><?= $result['nip']; ?></td>
                                <td><?= $result['nama']; ?></td>
                                <td><?= $result['tgl_mulai']; ?></td>
                                <td><?= $result['lama_izin']; ?></td>
                                <td><?= $result['cuti']; ?></td>
                                <td><?= $result['tgl_selesai']; ?></td>
                                <td><?= $result['alasan']; ?></td>
                                <!-- <td>
                                    <?php if($result['status'] == "Verifikasi") : ?>
                                        <span class="fa fa-check" style="color: #326ada;"> <b>Terverifikasi Oleh HRD.</b></span>
                                        <a href="#" style="border-bottom: 1px black dashed;" data-target="#modal-detail<?= $result['id']; ?>" data-toggle="modal"> Lihat detail!</a>

                                        <div class="modal fade" id="modal-detail<?= $result['id']; ?>">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <form class="form-horizontal" action="<?= base_url(); ?>pci/delete/<?= $result['id']; ?>" method="post">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"><span class="fa fa-info-circle"> Detail izin cuti</span></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                                $id = $result['id'];
                                                                $data = $this->db->query("SELECT a.id,
                                                                                                a.tgl_surat_pemohon,
                                                                                                a.nip,
                                                                                                b.nama,
                                                                                                b.dept,
                                                                                                b.jabatan,
                                                                                                c.nama AS pengganti_kerja,
                                                                                                DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
                                                                                                a.lama_izin,
                                                                                                a.days_or_month,
                                                                                                DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
                                                                                                a.alasan,
                                                                                                DATE_FORMAT( a.tgl_diset_mengetehui, '%d %M %Y' ) AS tgl_diset_mengetehui,
                                                                                                a.pemohon_nama,
                                                                                                a.pemohon_jabatan,
                                                                                                a.disetujui_nama_1,
                                                                                                a.disetujui_jabatan_1,
                                                                                                a.disetujui_nama_2,
                                                                                                a.disetujui_jabatan_2,
                                                                                                a.mengetahui_nama,
                                                                                                a.mengetahui_jabatan,
                                                                                                DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon 
                                                                                            FROM
                                                                                                permohonan_izin_cuti a
                                                                                                LEFT JOIN ( SELECT b.nama, b.dept, b.jabatan, b.no_scan FROM tbl_makar b) b ON a.nip = b.no_scan
                                                                                                LEFT JOIN ( SELECT c.nama, c.no_scan FROM tbl_makar c) c ON a.pengganti_kerja = c.no_scan 
                                                                                            WHERE
                                                                                                a.id = '$id'")->row();
                                                            ?>
                                                                <label>Nama : <b><?= $data->nama; ?></b></label><br>
                                                                <label>NIP : <b><?= $data->nip; ?></b></label><br>
                                                                <label>Departement : <b><?= $data->dept; ?></b></label><br>
                                                                <label>Jabatan : <b><?= $data->jabatan; ?></b></label><br>
                                                                <hr>
                                                                <label>Personel pengganti : <b><?= $data->pengganti_kerja; ?></b></label><br>
                                                                <label>Lama Izin : <b><?= $data->lama_izin; ?></b></label><br>
                                                                <label>Tanggal Izin : <b><?= $data->tgl_mulai; ?></b></label> s/d <label><b><?= $data->tgl_selesai; ?></b></label><br>
                                                                <label>Alasan : <b><?= $data->alasan; ?></b></label><br>
                                                                <hr>
                                                                <label>Tanggal Surat : <b><?= $data->tgl_surat_pemohon; ?></b></label><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif($result['status'] == "Printed") : ?>
                                        <span class="fa fa-info-circle" style="color: #FF4500;"> <b>On Proses.</b></span>
                                    <?php else : ?>
                                        <span class="fa fa-info-circle" style="color: #228B22;"> <b>Noted.</b></span>
                                    <?php endif; ?>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
