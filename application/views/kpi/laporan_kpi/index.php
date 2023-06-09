<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="showback">
                <?= $this->session->flashdata('message'); ?>
                    <h4><i class="fa fa-angle-right"></i> Laporan KPI</h4>
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>No Scan</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Departemen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $dept = $user['dept'];
                                    $roleID = $user['role_id'];
                                    if($roleID = "2"){
                                        $data = $this->db->query("SELECT
                                                                        a.id,
                                                                        a.kode8,
                                                                        a.tgl,
                                                                        a.no_scan,
                                                                        b.nama,
                                                                        b.jabatan,
                                                                        b.dept,
                                                                        a.no_scan_atasan,
                                                                        a.kode5kpd,
                                                                        a.target1,
                                                                        a.ket1
                                                                    FROM
                                                                        `laporan_kpi` a
                                                                        LEFT JOIN (SELECT * FROM tbl_makar b WHERE status_aktif = 1)b ON b.no_scan = a.no_scan
                                                                    WHERE b.status_aktif = 1 AND NOT jabatan = 'OPERATOR'
                                                                    GROUP BY a.no_scan
                                                                    ORDER BY a.id ")->result_array(); 
                                    }else {
                                        $data = $this->db->query("SELECT
                                                                    a.id,
                                                                    a.kode8,
                                                                    a.tgl,
                                                                    a.no_scan,
                                                                    b.nama,
                                                                    b.jabatan,
                                                                    b.dept,
                                                                    a.no_scan_atasan,
                                                                    a.kode5kpd,
                                                                    a.target1,
                                                                    a.ket1
                                                                FROM
                                                                    `laporan_kpi` a
                                                                    LEFT JOIN (SELECT * FROM tbl_makar b)b ON b.no_scan = a.no_scan
                                                                WHERE
                                                                    dept = '$dept' AND b.status_aktif = 1 AND NOT jabatan = 'OPERATOR' 
                                                                GROUP BY a.no_scan
                                                                ORDER BY a.id ")->result_array(); 
                                    }
                                ?>
                                <?php foreach($data AS $result): ?>
                                    <tr>
                                        <td><?= $result['no_scan']; ?></td>
                                        <td><a href="#" style="color: Dark Turquoise; font-size:13px;" data-target="#modal-tambah<?= $result['id']; ?>" data-toggle="modal"><b><?= $result['nama']; ?></b></a></td>
                                        <td><?= $result['jabatan']; ?></td>
                                        <td><?= $result['dept']; ?></td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-lg" id="modal-tambah<?= $result['id']; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form role="form" action="<?= base_url(); ?>kpi_karyawan/" method="POST">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">LAPORAN BULANAN KPI</h4>
                                                    </div>
                                                    <div class="modal-body" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <b>KODE KPI</b>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <b>BULAN TAHUN PELAPORAN KPI</b>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <b>NO SCAN</b>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <b>NAMA</b>
                                                            </div>
                                                            <hr>
                                                            <?php
                                                                $no_scan = $result['no_scan'];
                                                                $dataKPI = $this->db->query("SELECT
                                                                                                a.id,
                                                                                                a.kode8,
                                                                                                DATE_FORMAT(a.tgl, '%M %Y') as tgl,
                                                                                                tgl as tgl2,
                                                                                                a.no_scan,
                                                                                                b.nama
                                                                                            FROM
                                                                                                `laporan_kpi` a
                                                                                                LEFT JOIN (SELECT * FROM tbl_makar b)b ON b.no_scan = a.no_scan
                                                                                            WHERE
                                                                                                a.no_scan = '$no_scan'
                                                                                            GROUP BY a.no_scan, a.tgl
                                                                                            ORDER BY a.tgl DESC")->result_array(); 
                                                            ?>
                                                            <?php foreach($dataKPI AS $value) : ?>
                                                                <div class="col-sm-2">
                                                                    <a href="<?= base_url('kpi_karyawan/detail_kpi'); ?>/<?= $value['no_scan']; ?>/<?= $value['tgl2']; ?>" style="color: blue; font-size:13px;" title="Klik untuk melihat detail"><?= $value['kode8'].$value['id']; ?></a>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <?= $value['tgl']; ?>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <?= $value['no_scan']; ?>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <?= $value['nama']; ?>
                                                                </div>
                                                            <?php endforeach; ?>  
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="<?= base_url('kpi_karyawan/tambah_kpi'); ?>/<?= $value['no_scan']; ?>/<?= $value['tgl2']; ?>" class="btn btn-success btn-sm" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Buat Laporan KPI disini</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>  
                            </tbody>
                        </table>
                    <br><br>
                </div>
            </div>
        </div>
    </section>
</section>