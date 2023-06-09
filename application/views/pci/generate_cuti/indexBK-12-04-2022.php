<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Laporan Sisa Cuti </h4>
        <div class="col-md-12">
            <p>
                <?php if($user['dept'] == 'HRD') : ?>  
                    <a href="#" data-toggle="modal" data-target="#modalImport" class="btn btn-default btn-sm" title="Saat import data, semua cuti karyawan diganti sesuai data yang di import."><i class=" fa fa-download"></i>&nbsp;&nbsp;Import Data (Excel Only)</a>

                    <a href="#" data-toggle="modal" data-target="#modalGenerate" class="btn btn-success btn-sm" title="Proses pembayaran sisa cuti dan mengembalikan sisa cuti karyawan setiap periode."><i class=" fa fa-download"></i>&nbsp;&nbsp;Generate Data</a>

                    <a href="#" data-toggle="modal" data-target="#modalGeneratePersonal" class="btn btn-warning btn-sm" title="Proses pembayaran sisa cuti dan mengembalikan sisa cuti karyawan."><i class=" fa fa-download"></i>&nbsp;&nbsp;Karyawan resign</a>
                    
                    <a href="#" data-toggle="modal" data-target="#modalAnnual" class="btn btn-info btn-sm" title="Sisa cuti karyawan per departemen dipotong berdasarkan libur lebaran yang ditentukan oleh pemerintah."><i class=" fa fa-download"></i>&nbsp;&nbsp;Potong cuti tahunan</a>

                    <a href="#" data-toggle="modal" data-target="#modalAnnualPersonal" class="btn btn-success btn-sm" title="Sisa cuti perkaryawan dopotong berdasarkan libur lebaran yang ditentukan oleh pemerintah."><i class=" fa fa-download"></i>&nbsp;&nbsp;Potong cuti perkaryawan</a>
                    
                    <!-- Modal Import-->
                    <div class="modal fade" id="modalImport" role="dialog" aria-labelledby="modalImport">
                        <form role="form" action="<?= base_url('pci/import_excell_cuti'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title"><i class=" fa fa-gear"></i> Import Data (Excell Only)</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label>Semua cuti karyawan diganti sesuai data yang di import.</label><br>
                                        <label><b>Keterangan : <br>
                                            1. Data yang di import harus format Excel Workbook (*.xlsx )<br>
                                            2. Data yang dimasukan hanya kolom C (NIK/NO SCAN) dan AH (SISA CUTI)
                                        </b></label>
                                            <input type="file" name="userfile" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-default">Import</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Generate-->
                    <div class="modal fade" id="modalGenerate" role="dialog" aria-labelledby="modalGenerate">
                        <form role="form" action="<?= base_url('pci/generate_proses'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title"><i class=" fa fa-gear"></i> Generate Data</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <label class="control-label col-lg-12">Pilih Periode Generate Cuti</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <select class="select2" style="width: 100%;" data-placeholder="Periode generate cuti..." name="periode" required>
                                                            <option value="" disabled selected></option>
                                                            <?php
                                                                $queryShift = $this->db->query("SELECT
                                                                                                        DATE_FORMAT( tgl_tetap, '%d %M' ) AS awal,
                                                                                                        YEAR(CURDATE()-interval '1'year) as thn_awal,
                                                                                                        DATE_FORMAT( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M' ) AS akhir, 
                                                                                                        YEAR(CURDATE()) as thn_akhir
                                                                                                FROM
                                                                                                        tbl_makar 
                                                                                                WHERE
                                                                                                        status_karyawan = 'Tetap' 
                                                                                                        AND status_aktif = 1 
                                                                                                        and not year(tgl_tetap) =  YEAR(CURDATE()-interval '1'year)                                                                                                       
                                                                                                GROUP BY
                                                                                                        awal,
                                                                                                        akhir 
                                                                                                ORDER BY
                                                                                                        ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY ) DESC")->result_array();
                                                            ?>
                                                            <option value="gaji_atas">Januari - Desember (Gaji Atas)</option>
                                                            <?php foreach ($queryShift as $dk) : ?>
                                                                <?php 
                                                                    $periode_generate   = $dk['awal'].' '.$dk['thn_awal'].' - '.$dk['akhir'].' '.$dk['thn_akhir'];
                                                                    $query_sgc          = $this->db->query("SELECT COUNT(*) AS jml_gen FROM status_generate_cuti WHERE awal = '$periode_generate'")->row(); 
                                                                ?>
                                                                
                                                                <!-- <option value="<?= $dk['awal'] ?>" <?php if($query_sgc->jml_gen > 0){ echo 'Disabled Selected'; } ?>><?= $dk['awal'].' '.$dk['thn_awal'].' - '.$dk['akhir'].' '.$dk['thn_akhir']; ?></option> -->
                                                                <?php if($query_sgc->jml_gen <= 0) : ?>
                                                                    <option value="<?= $dk['awal'] ?>"><?= $dk['awal'].' '.$dk['thn_awal'].' - '.$dk['akhir'].' '.$dk['thn_akhir']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="control-label col-lg-12">Tahun Generate Cuti</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <select class="select2" style="width: 100%;" data-placeholder="Tahun generate cuti..." name="tahun" required>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-12">
                                                    <b>Keterangan :</b> <br>
                                                        <label style="font-size: 12px; color: red;">* Sisa cuti karyawan di uangkan dan mengembalikan hak cuti karyawan sebanyak 12 hari.</label>
                                                        <label style="font-size: 12px; color: red;">* Khusus untuk <b>Gaji atas</b> sisa cuti karyawan tidak dapat diuangkan dan mengembalikan hak cuti karyawan sebanyak 12 hari.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Generate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Modal Generate Personal-->
                    <div class="modal fade" id="modalGeneratePersonal" role="dialog" aria-labelledby="modalGeneratePersonal">
                        <form role="form" action="<?= base_url('pci/generate_personal_proses'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title"><i class=" fa fa-gear"></i> Generate Data</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="control-label col-lg-12">Pilih Nama Karyawan</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <select class="form-control input-sm select2" style="width: 100%;" name="no_scan" required>
                                                            <option value="" disabled selected>Nama Karyawan</option>
                                                            <?php
                                                                $queryShift = $this->db->query("SELECT *, MONTHNAME( tgl_tetap ) AS awal, MONTHNAME( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' MONTH) ) AS akhir FROM tbl_makar WHERE status_karyawan = 'Tetap' AND status_aktif = 1 ORDER BY dept")->result_array();
                                                            ?>
                                                            <?php foreach ($queryShift as $dk) : ?>
                                                                <option value="<?= $dk['no_scan'] ?>"><?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-12">
                                                    <b>Keterangan :</b> <br>
                                                        <label style="font-size: 12px; color: red;">* Khusus untuk karyawan yang resign dan ingin dibayarkan sisa cutinya.</label>
                                                        <label style="font-size: 12px; color: red;">* Sisa cuti karyawan di uangkan dan mengembalikan hak cuti karyawan sebanyak 0 hari.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Generate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Annual Leave-->
                    <div class="modal fade" id="modalAnnual" role="dialog" aria-labelledby="modalAnnual">
                        <form role="form" action="<?= base_url('pci/annual_leave'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title"><i class=" fa fa-gear"></i> Annual Leave</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Jumlah potongan <b>Annual Leave</b></label>
                                            <input type="text" name="annual_leave" class="form-control input-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <label ><b>Department (Wajib)</b></label>
                                            <label class="container">
                                                <input type="checkbox" id="myCheck" onclick="myFunction_checkAll()"> All
                                            </label> 
                                                <?php 
                                                $dataDept = $this->db->query("SELECT * FROM dept")->result_array();
                                                $countDept = $this->db->query("SELECT count(*) AS total FROM dept")->row();
                                                ?>
                                                <input type="hidden" id="idf" value="<?= $countDept->total; ?>">
                                                <?php foreach ($dataDept as $dd) : ?>
                                                    <label class="container">
                                                        <input type="checkbox" name="dept[]" id="dept<?= $dd['id']; ?>" value="<?= $dd['code']; ?>"> <?= $dd['dept_name']; ?> 
                                                    </label>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label><b>Keterangan Histori</b></label>
                                            <textarea class="form-control input-sm" name="history"></textarea>
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

                    <!-- Modal Annual Leave Personal-->
                    <div class="modal fade" id="modalAnnualPersonal" role="dialog" aria-labelledby="modalAnnualPersonal">
                        <form role="form" action="<?= base_url('pci/annual_leave_personal'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title"><i class=" fa fa-gear"></i> Potongan cuti perkaryawan</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <div class="form-group">
                                                <label>Jumlah potongan <b>Annual Leave Employee</b></label>
                                                <input type="text" name="annual_leave" class="form-control input-sm" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <select class="select2" style="width: 100%; border-style: none;" multiple="multiple" name="no_scan[]" required>
                                                            <?php 
                                                                $dataDept = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 AND status_karyawan='Tetap'")->result_array();
                                                            ?>
                                                            <?php foreach ($dataDept as $dd) : ?>
                                                                <option value="<?= $dd['no_scan'] ?>" <?php if ($dd['no_scan'] == set_value('no_scan')) {
                                                                    echo "SELECTED";
                                                                } ?>><?= $dd['nama'].' - '.$dd['dept']; ?> / Sisa Cuti <?= $dd['sisa_cuti']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label><b>Keterangan Histori</b></label>
                                                <textarea class="form-control input-sm" name="history"></textarea>
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
                <?php endif ?>
            </p>
        </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                if ($dept == "HRD") {
                                    $data = $this->db->query("SELECT *, 
                                                                    DATE_FORMAT( tgl_tetap, '%d %M' ) AS awal,
                                                                    YEAR(CURDATE()) as thn_awal,
                                                                    DATE_FORMAT( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M' ) AS akhir, 
                                                                    YEAR(CURDATE()+interval '1'year) as thn_akhir,
                                                                     gaji 
                                                                FROM 
                                                                    tbl_makar 
                                                                WHERE 
                                                                    status_karyawan = 'Tetap' AND status_aktif = 1 
                                                                ORDER BY 
                                                                    dept")->result_array(); 
                                } else {
                                    $data = $this->db->query("SELECT *, 
                                                                    DATE_FORMAT( YEAR(tgl_tetap,'Y')) AS thn_tetap,
                                                                    DATE_FORMAT( tgl_tetap, '%d %M' ) AS awal,
                                                                    YEAR(CURDATE()) as thn_awal,
                                                                    DATE_FORMAT( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M' ) AS akhir, 
                                                                    YEAR(CURDATE()+interval '1'year) as thn_akhir,
                                                                    gaji 
                                                                FROM 
                                                                    tbl_makar 
                                                                WHERE 
                                                                    status_karyawan = 'Tetap' AND status_aktif = 1 AND dept='$dept' 
                                                                ORDER BY 
                                                                    dept")->result_array(); 
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
                                        <?= $result['awal'].' '.$result['thn_awal'].'<b> s/d </b>'.$result['akhir'].' '.$result['thn_akhir']; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= $result['sisa_cuti']; ?></td>
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