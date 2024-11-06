<script>
function searchsisacuti_disabled() {
    var _status = document.getElementById('status').value;
    if(_status='Resign'){
        $dataDept = $this->db->query("SELECT * FROM tbl_makar WHERE status_karyawan='Tetap'")->result_array();
        } 
        $dataDept = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 and status_karyawan='Tetap'")->result_array();
            
    }
    </script>
<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Laporan Sisa Cuti Karyawan Resigned</h4>
        <p>
            <a href="<?= base_url('pci/generate_cuti'); ?>" data-toggle="modal" class="btn btn-default btn-sm" ><i class=" fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
        </p>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
               <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-cuti">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Scan</th>
                                <th>Nama</th>
                                <th>Dept</th>
                                <th>Tgl Tetap</th>
                                <th>Masa berlaku cuti (thn <?= date("Y"); ?>/<?= date("Y")+1; ?>)</th>
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
                            <?php foreach($data AS $result): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $result['no_scan']; ?></td>
                                <td><a href="<?= base_url('pci/histori_cuti/').$result['no_scan']; ?>" title="Histori Cuti"><?= $result['nama']; ?></a></td>
                                <td><?= $result['dept']; ?></td>
                                <td><?= $result['tgl_tetap']; ?></td>
                                <td>
                                    <?php if ($result['gaji'] == "atas") : ?>
                                        Januari <b>s/d</b> Desember
                                    <?php else : ?>
                                        <?= $result['th_awal'].'<b> s/d </b>'.$result['th_akhir']; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= $result['sisa_cuti']; ?></td>
                                <td><?= $result['status_karyawan']; ?></td>
                                <!-- <td><a href="<?= base_url('pci/export_histori_cuti/').$result['no_scan']; ?>" title="Cetak Histori Cuti">Cetak Histori</a></td> -->
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