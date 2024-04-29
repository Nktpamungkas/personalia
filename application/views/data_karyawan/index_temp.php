<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                    <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <div class="row mb">
                    <div class="col-md-6 mb">
                        <p>
                            <center><h4><b>DATA KARYAWAN BARU BELUM VERIFIKSI</b></h4></center>
                            <?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
                                <a href="<?= base_url('data_karyawan/addNewEmployeeTemp'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Employee Temp</a></<a>
                                <!-- <a href="#" data-toggle="modal" data-target="#modalAddKontrak" class="btn btn-primary btn-xs">Tambah data karyawan kontrak</a>
                                <a href="<?= base_url('PKWT/ExportToExcell'); ?>" class="btn btn-warning btn-xs">Export data karyawan kontrak</a> -->
                            <?php endif; ?>
                        </p>
                        <p>
                            <label><b>*Note: Menampilkan data karyawan baru kontrak pertanggal masuk.</b></label>
                        </p>
                        <div class="content-panel">
                            <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT">
                                <thead>
                                    <tr>
                                        <th width="25"><i class="fa fa-gear"></i></th>
                                        <th width="100">No Scan</th>
                                        <th width="300">Nama</th>
                                        <th width="75">Dept</th>
                                        <th width="200">Tanggal Masuk</th>
                                        <th width="50">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                <?php 
                                    $dpt = $user['dept'];
                                    if ($dpt == "HRD" or $dpt == "DIT" ) {
                                        $data = $this->db->query("SELECT id,
                                                                        no_scan,
                                                                        nama,
                                                                        dept,
                                                                        DATE_FORMAT( tgl_masuk, '%d %b %Y' ) AS tgl_masuk,
                                                                        status_verifikasi 
                                                                    FROM
                                                                        tbl_makar_temp
                                                                    WHERE
                                                                        status_verifikasi = 'UNVERIFIED'
                                                                       ORDER BY
                                                                       tgl_masuk")->result_array();
                                    } else {
                                        $data = $this->db->query("SELECT id,
                                                                        no_scan,
                                                                        nama,
                                                                        dept,
                                                                        DATE_FORMAT( tgl_masuk, '%d %b %Y' ) AS tgl_masuk,
                                                                        status_verifikasi 
                                                                    FROM
                                                                        tbl_makar_temp
                                                                    WHERE
                                                                        status_verifikasi = 'UNVERIFIED'
                                                                                                                                         
                                                                    ORDER BY
                                                                       tgl_masuk")->result_array();
                                    }
                                ?>
                                <?php foreach($data AS $result) : ?>
                                    <tr class="gradeX">
                                        <!-- <td>
                                            <li class="dropdown" style="list-style-type:none;">
                                                <a href="" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                                <ul class="dropdown-menu">
                                                <?php if($user['dept'] == "HRD" or $user['dept'] == "DIT" ) : ?>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#modalVerifikasi<?= $result['id']; ?>" style="color: black; font-size:13px;"><i class="fa fa-check"></i> Verifikasi</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#modalHapusKontrak<?= $result['id'] ?>" style="color: black; font-size:13px;"><i class="fa fa-trash"></i> Hapus</a>
                                                    </li>
                                                <?php endif; ?>
                                                </ul>
                                            </li> <div class="modal fade" id="modalVerifikasi<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalVerifikasi" aria-hidden="true">
                                            <form action="<?= base_url(); ?>data_karyawan/verifikasi/<?= $result['id']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-check"></i> Verifikasi data Karyawan baru </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group">
                                                                <li class="list-group-item"><b>Nama Karyawan :</b> <?= $result['nama']; ?></li>
                                                                <li class="list-group-item"><b>Deptartemen  :</b> <?= $result['dept']; ?></li>
                                                                <li class="list-group-item"><b>Jabatan  :</b> <?= $result['jabatan']; ?></li>
                                                                <li class="list-group-item"><b>Tanggal Masuk  :</b> <?= $result['tgl_masuk']; ?></li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Verifikasi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> -->
                                        <td><?= $result['no_scan'] ?></td>
                                        <td><?= $result['nama'] ?></td>
                                        <td><?= $result['dept'] ?></td>
                                        <td><?= $result['tgl_masuk'] ?></td>
                                        <td><?= $result['status_verifikasi'] ?></td>
                                    </tr>
                                   
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 mb">
                        <p>
                            <center><h4><b>KARYAWAN BARU YANG SUDAH DI VERIFIKASI</b></h4></center>
                            <!-- <a href="#" data-toggle="modal" data-target="#modalPrint" class="btn btn-theme04 btn-xs">Buat Internal Memo</a>
                            <a href="#" data-toggle="modal" data-target="#modalMemo" class="btn btn-theme btn-xs">Daftar Memo Karyawan Kontrak</a> -->
                            <a href="<?= base_url('PKWT/ExportToExcell_perpanjang'); ?>" class="btn btn-warning btn-sm">&nbsp;&nbsp;Export data karyawan yang diverifikasi</a>
                        </p>
                       
                        <p>
                            <label><b>Note: Menampilkan data karyawan baru kontrak pertanggal masuk yang sudah di verifikasi.</b></label>
                        </p>
                        <div class="content-panel">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT-kontrak">
                                <thead>
                                    <tr>
                                        <th width="100">No Scan</th>
                                        <th width="250">Nama</th>
                                        <th width="75">Dept</th>
                                        <th width="150">Tanggal Masuk</th>
                                        <th width="100">Verifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dept = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
                                    $dpt = $dept['dept'];
                                    if ($dpt == "HRD") {
                                        $data = $this->db->query("SELECT id,
                                                                            no_scan,
                                                                            nama,
                                                                            dept,
                                                                            DATE_FORMAT( tgl_masuk, '%d %b %Y' ) AS tgl_masuk,
                                                                            status_verifikasi 
                                                                        FROM
                                                                            tbl_makar_temp
                                                                        WHERE not
                                                                            status_verifikasi = 'UNVERIFIED'
                                                                        
                                                                        ORDER BY
                                                                        tgl_masuk")->result_array();
                                        } else {
                                            $data = $this->db->query("SELECT id,
                                                                            no_scan,
                                                                            nama,
                                                                            dept,
                                                                            DATE_FORMAT( tgl_masuk, '%d %b %Y' ) AS tgl_masuk,
                                                                            status_verifikasi 
                                                                        FROM
                                                                            tbl_makar_temp
                                                                        WHERE NOT
                                                                            status_verifikasi = 'UNVERIFIED'
                                                                        
                                                                        ORDER BY
                                                                        tgl_masuk")->result_array();
                                    }
                                ?>
                                <?php foreach($data AS $result) : ?>
                                <tr class="gradeX">
                                    <td><?= $result['no_scan'] ?></td>
                                    <td><?= $result['nama'] ?></td>
                                    <td><?= $result['dept'] ?></td>
                                    <td><?= $result['tgl_masuk'] ?></td>
                                     <td>
                                        <?php if($result['status_verifikasi'] == 'VERIFIED') : ?>
                                            <span class="fa fa-check" style="color: #326ada;"> <b>Terverifikasi Oleh HRD.</b></span>
                                        <?php else : ?>
                                            <span class="fa fa-envelope" style="color: #FF4500;"> <b>On Proses.</b></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</section>