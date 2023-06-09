<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <!-- SERVER STATUS PANELS -->
                <div class="row">
                    <div class="col-md-12 mb">
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-index-discipline">
                                    <thead>
                                        <tr>
                                            <th>Kode SP</th>
                                            <th>Tanggal SP</th>
                                            <th>No Scan</th>
                                            <th>Nama</th>
                                            <th>Dept</th>
                                            <th>Jabatan</th>
                                            <th>SP ke-</th>
                                            <th>Alasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $dept = $user['dept'];
                                            $query = $this->db->query("SELECT a.id,
                                                                            a.tgl_sp,
                                                                            a.no_scan,
                                                                            b.nama,
                                                                            b.dept,
                                                                            b.jabatan,
                                                                            a.sp,
                                                                            a.alasan	
                                                                        FROM
                                                                            dicipline a
                                                                            LEFT JOIN ( SELECT * FROM tbl_makar b) b ON b.no_scan = a.no_scan
                                                                        WHERE b.dept = '$dept'")->result_array(); 
                                        ?>
                                        <?php foreach($query AS $result) : ?>
                                        <tr>
                                            <td>
                                                SP<?php echo sprintf("%04d", $result['id']); ?>
                                            </td>
                                            <td><?= $result['tgl_sp']; ?></td>
                                            <td><?= $result['no_scan']; ?></td>
                                            <td><?= $result['nama']; ?></td>
                                            <td><?= $result['dept']; ?></td>
                                            <td><?= $result['jabatan']; ?></td>
                                            <td><?= $result['sp']; ?></td>
                                            <td><?= $result['alasan']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>