<script type="text/javascript">
function functionGaji() {
    var checkBox = document.getElementById('gaji');
    if (checkBox.checked == true){
        $.ajax ({
        type: 'POST',
        url: '<?= base_url()."data_karyawan/search_gaji" ?>',
        dataType: 'json',
        success: function(data){
            document.getElementById('upah').value = data[0].gaji;
            }
        });
    } else {
        document.getElementById('upah').value = " "
    }
}

     // Mendapatkan elemen input
     var inputTanggalMasuk = document.getElementById('kontrak_awal');
    var inputJumlahBulan = document.getElementById('input_jumlah_bulan');
    var inputTanggalEvaluasi = document.getElementById('kontrak_akhir');

    // Menonaktifkan input tanggal masuk
    inputTanggalMasuk.disabled = true;

    // Menambahkan event listener pada input jumlah bulan
    inputJumlahBulan.addEventListener('input', function() {
        // Aktifkan tanggal masuk setelah jumlah bulan diisi
        inputTanggalMasuk.disabled = false;

        // Ambil nilai dari input tanggal masuk
        var tglMasuk = new Date(inputTanggalMasuk.value);

        // Ambil nilai dari input jumlah bulan
        var jumlahBulan = parseInt(inputJumlahBulan.value, 10);

        // Tambahkan jumlah bulan ke tanggal masuk
        tglMasuk.setMonth(tglMasuk.getMonth() + jumlahBulan);

        // Format tanggal untuk input tanggal evaluasi
        var tglEvaluasi = tglMasuk.toISOString().split('T')[0];

        // Set nilai pada input tanggal evaluasi
        inputTanggalEvaluasi.value = tglEvaluasi;
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                    <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <div class="row mb">
                        <p>
                            <center><h4><b>DATA HABIS KONTRAK</b></h4></center>
                            <?php if ($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
                                <a href="#" data-toggle="modal" data-target="#modalAddKontrak" class="btn btn-primary btn-xs">Tambah data karyawan kontrak</a>
                                <a href="<?= base_url('PKWT/ExportToExcell'); ?>" class="btn btn-warning btn-xs">Export data karyawan kontrak</a>
                            <?php endif; ?>
                            <div class="modal fade" id="modalAddKontrak" tabindex="-1" role="dialog" aria-labelledby="modalAddKontrak" aria-hidden="true">
                                <form action="<?= base_url('PKWT/add_karyawan_kontrak') ?>" method="POST">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah data karyawan kontrak </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label col-lg-4">Nama Karyawan <span style="color: red">(*)</span></label>
                                                        <div class="col-lg-8">
                                                            <select class="form-control input-sm" tabindex="2" data-placeholder="Pilih NIP Karyawan..." name="no_scan" required>
                                                                <option value="" disabled selected></option>
                                                                <?php
                                                                    $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_karyawan = 'Resigned' ORDER BY tgl_masuk DESC")->result_array();
                                                                ?>
                                                                <?php foreach ($queryShift as $dk) : ?>
                                                                    <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == set_value('no_scan')) {
                                                                        echo "SELECTED";
                                                                    } ?>><?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label col-lg-4">Status Karyawan <span style="color: red">(*)</span></label>
                                                        <div class="col-lg-8">
                                                            <select class="form-control input-sm" name="status_karyawan" required>
                                                                <?php
                                                                    $queryStatus = $this->db->query('SELECT * FROM `status` WHERE NOT id="tetap" AND NOT id="Resigned"')->result_array();
                                                                ?>
                                                                <option value="" disabled selected></option>
                                                                <?php foreach ($queryStatus as $ds) : ?>
                                                                    <option value="<?= $ds['id']; ?>" <?php if ($ds['id'] == set_value('status_karyawan')) {
                                                                    echo "SELECTED";
                                                                    } ?>><?= $ds['jabatan'] . ' - ' . $ds['id'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label col-lg-4">Upah</label>
                                                        <div class="col-lg-4">
                                                            <input class="form-control input-sm" name="upah" id="upah" type="text">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" onclick="functionGaji()" name="gaji" id="gaji"> Upah Minimum Regional 
                                                                (<i>Rp. 
                                                                    <?php 
                                                                        $Gaji = $this->db->query("SELECT * FROM tbl_gaji LIMIT 1")->row();
                                                                        echo $Gaji->gaji;
                                                                    ?>
                                                                </i>)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label for="kontrak_awal" class="control-label col-lg-4">Tgl kontrak awal</label>
                                                        <div class="col-lg-4">
                                                            <input class="form-control input-sm" value="<?= set_value('kontrak_awal'); ?>" id="kontrak_awal" name="kontrak_awal" type="date">
                                                            <label class="control-label">*Tanggal masuk karyawan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label col-lg-4">Durasi</label>
                                                        <!-- <label for="input_jumlah_bulan">Tambahkan Jumlah Bulan:</label> -->
                                                          <div class="col-lg-8">
                                                            <!-- <input class="form-control input-sm" id="durasi" name="durasi" type="text">/Bulan <br><i style="font-size: 10px">(To change, please press "Tab")</i> -->
                                                            <input type="number" id="input_jumlah_bulan" name="durasi" placeholder="Jumlah Bulan" value="" min="1" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label col-lg-4">Tgl kontrak akhir</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-control input-sm" id="kontrak_akhir" name="kontrak_akhir" type="date" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label col-lg-4">Keterangan</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-control input-sm" name="libur" type="text" placeholder="Kosongkan jika tidak ada libur">
                                                            <label style="font-size: 10px;">(Contoh: 01 Maret 2020 - 02 Maret 2020)</label>
                                                            <input value=" <?php echo $this->session->name ;?>" name="username" type="hidden">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="submit" class="btn btn-success">Save & Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </p>
                        <p>
                            <label><b>*Note: Menampilkan data habis kontrak pertanggal saat ini sampai dengan 6 bulan kedepan.</b></label>
                        </p>
                        <div class="content-panel">
                            <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT">
                                <thead>
                                    <tr>
                                        <th width="25"><i class="fa fa-gear"></i></th>
                                        <th width="100">No Scan</th>
                                        <th width="300">Nama</th>
                                        <th width="75">Dept</th>
                                        <th width="200">Kontrak Akhir</th>
                                        <th width="50">Ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dpt = $user['dept'];
                                    // $tglInterval = '2020-01-01';
                                    if ($dpt == "HRD") {
                                        $data = $this->db->query("SELECT id,
                                                                        no_scan,
                                                                        nama,
                                                                        dept,
                                                                        DATE_FORMAT( kontrak_akhir, '%d %b %Y' ) AS kontrak_akhir,
                                                                        keterangan 
                                                                    FROM (
                                                                        SELECT
                                                                            a.id,
                                                                            a.no_scan,
                                                                            a.nama,
                                                                            a.dept,
                                                                            b.kontrak_akhir,
                                                                            b.keterangan,
                                                                            ROW_NUMBER() OVER (PARTITION BY a.no_scan ORDER BY b.kontrak_akhir DESC) AS row_num
                                                                        FROM
                                                                            tbl_makar a
                                                                            INNER JOIN tbl_kontrak b ON b.no_scan = a.no_scan
                                                                        WHERE
                                                                            b.kontrak_akhir BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
                                                                            AND DATE_ADD(NOW(), INTERVAL 12 MONTH)
                                                                            and NOT a.status_karyawan = 'Resigned'
                                                                            AND NOT a.status_karyawan = 'perubahan_status'
                                                                    ) AS ranked
                                                                    WHERE row_num = 1
                                                                    ORDER BY kontrak_akhir DESC ")->result_array();
                                    } else {
                                        $data = $this->db->query(" SELECT id,
                                                                        no_scan,
                                                                        nama,
                                                                        dept,
                                                                        DATE_FORMAT( kontrak_akhir, '%d %b %Y' ) AS kontrak_akhir,
                                                                        keterangan 
                                                                    FROM (
                                                                        SELECT
                                                                            a.id,
                                                                            a.no_scan,
                                                                            a.nama,
                                                                            a.dept,
                                                                            b.kontrak_akhir,
                                                                            b.keterangan,
                                                                            ROW_NUMBER() OVER (PARTITION BY a.no_scan ORDER BY b.kontrak_akhir DESC) AS row_num
                                                                        FROM
                                                                            tbl_makar a
                                                                            INNER JOIN tbl_kontrak b ON b.no_scan = a.no_scan
                                                                        WHERE
                                                                            b.kontrak_akhir BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
                                                                            AND DATE_ADD(NOW(), INTERVAL 12 MONTH)
                                                                            and NOT a.status_karyawan = 'Resigned'
                                                                            AND NOT a.status_karyawan = 'perubahan_status'
                                                                    ) AS ranked
                                                                    WHERE row_num = 1
                                                                    and dept = '$dpt'
                                                                    ORDER BY kontrak_akhir DESC")->result_array();
                                    }
                                ?>
                                <?php foreach($data AS $result) : ?>
                                    <tr class="gradeX">
                                        <td>
                                            <li class="dropdown" style="list-style-type:none;">
                                                <a href="" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?= base_url(); ?>PKWT/index_pkwt/<?= $result['no_scan']; ?>" style="color: black; font-size:13px;">Perpanjang kontrak</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#modalHapusKontrak<?= $result['id'] ?>" style="color: black; font-size:13px;"><i class="fa fa-trash"></i> Hapus</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <div class="modal fade" id="modalHapusKontrak<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusKontrak" aria-hidden="true">
                                                <form role="form" action="<?= base_url('PKWT/hapus_kontrak/') . $result['no_scan']; ?>" method="POST">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h3 class="modal-title">Apakah anda yakin ingin menghapus data ini ? </h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <input value=" <?php echo $this->session->name ;?>" name="username" type="hidden">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td><?= $result['no_scan'] ?></td>
                                        <td><?= $result['nama'] ?></td>
                                        <td><?= $result['dept'] ?></td>
                                        <td><?= $result['kontrak_akhir'] ?></td>
                                        <td><?= $result['keterangan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                        <p>
                            <center><h4><b>KARYAWAN YANG DIPERPANJANG</b></h4></center>
                            <a href="#" data-toggle="modal" data-target="#modalPrint" class="btn btn-theme04 btn-xs">Buat Internal Memo</a>
                            <a href="#" data-toggle="modal" data-target="#modalMemo" class="btn btn-theme btn-xs">Daftar Memo Karyawan Kontrak</a>
                            <a href="<?= base_url('PKWT/ExportToExcell_perpanjang'); ?>" class="btn btn-warning btn-xs">Export data karyawan yang diperpanjang</a>
                        </p>
                        <div class="modal fade" id="modalPrint" tabindex="-1" role="dialog" aria-labelledby="modalPrint" aria-hidden="true">
                            <form action="<?= base_url('PKWT/add_memo') ?>" method="POST">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-calendar"></i> Internal Memo Karyawan Kontrak </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><b>No Memo :</b> <input type="text" name="nomor_memo" class="form-control input-sm" required></li>
                                                        <li class="list-group-item"><b>Periode Awal :</b> <input type="date" name="tgl_mulai" class="form-control input-sm" required></li>
                                                        <li class="list-group-item"><b>Periode Akhir :</b> <input type="date" name="tgl_akhir" class="form-control input-sm" required></li>
                                                        <li class="list-group-item">
                                                            <b>Dibuat Oleh :</b>
                                                            <select class="form-control input-sm" tabindex="2" name="dibuat_oleh">
                                                                <option value="" disabled selected></option>
                                                                <option value="-" <?php if ("-" == set_value('dibuat_oleh')) {
                                                                        echo "SELECTED";
                                                                    } ?>>-</option>
                                                                <?php
                                                                    $dept = $user['dept'];
                                                                    $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' ORDER BY nama")->result_array();
                                                                ?>
                                                                <?php foreach ($queryShift as $dk) : ?>
                                                                    <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == set_value('dibuat_oleh')) {
                                                                        echo "SELECTED";
                                                                    } ?>><?= $dk['nama']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Mengetahui :</b> 
                                                            <select class="form-control input-sm" tabindex="2" name="mengetahui">
                                                                <option value="" disabled selected></option>
                                                                <option value="-" <?php if ("-" == set_value('mengetahui')) {
                                                                        echo "SELECTED";
                                                                    } ?>>-</option>
                                                                <?php
                                                                    $dept = $user['dept'];
                                                                    $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned'  ORDER BY nama")->result_array();
                                                                ?>
                                                                <?php foreach ($queryShift as $dk) : ?>
                                                                    <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == set_value('mengetahui')) {
                                                                        echo "SELECTED";
                                                                    } ?>><?= $dk['nama']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Menyetujui :</b>
                                                            <input type="text" class="form-control input-sm" name="menyetujui"> 
                                                            <input type="text" class="form-control input-sm" name="jabatan" placeholder="Jabatan"> 
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            <button type="submit" name="submit" class="btn btn-success">Save & Print</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <p>
                            <label><b>*Note: Menampilkan data karyawan yang diperpanjang per 1 bulan kebelakang dari hari ini sampai dengan 1 tahun berikutnya.</b></label>
                        </p>
                        <div class="modal fade" id="modalMemo" tabindex="-1" role="dialog" aria-labelledby="modalMemo" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-list-alt"></i> Daftar Memo Karyawan Kontrak </h4>                       
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT-memo">
                                                    <thead>
                                                        <tr>
                                                            <th width="150">No Memo</th>
                                                            <th width="300">Periode</th>
                                                            <th width="300">Dibuat Oleh</th>
                                                            <th width="200">Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            $dpt = $user['dept'];
                                                            $data = $this->db->query("SELECT a.id,
                                                                                            a.nomor_memo,
                                                                                            DATE_FORMAT( a.periode_awal, '%d %b %Y' ) AS fperiode_awal,
                                                                                            DATE_FORMAT( a.periode_akhir, '%d %b %Y' ) AS fperiode_akhir,
                                                                                            a.periode_awal,
                                                                                            a.periode_akhir,
                                                                                            b.nama,
                                                                                            b.dept,
                                                                                            a.dibuat_oleh,
                                                                                            a.mengetahui,
                                                                                            a.menyetujui,
                                                                                            a.jabatan
                                                                                        FROM
                                                                                            `memo_pkwt` a
                                                                                            LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.dibuat_oleh 
                                                                                        WHERE
                                                                                            dept = '$dpt'")->result_array();
                                                        ?>
                                                        <?php foreach($data AS $result): ?>
                                                            <tr>
                                                                <td><?= $result['nomor_memo']; ?></td>
                                                                <td><?= $result['fperiode_awal']; ?> s/d <?= $result['fperiode_akhir']; ?></td>
                                                                <td><?= $result['nama']; ?></td>
                                                                <td>
                                                                    <a href="#" data-toggle="modal" data-target="#modalMemoEdit<?= $result['id']; ?>" class="btn btn-theme04 btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                                                    <a href="<?= base_url('PKWT/print_memo/') ?><?= $result['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print</a>
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="modalMemoEdit<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalMemoEdit" aria-hidden="true">
                                                                <form action="<?= base_url('PKWT/edit_memo/'); ?><?= $result['id']; ?>" method="POST">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title"><i class="fa fa-calendar"></i> Edit Internal Memo </h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="form-group col-sm-12">
                                                                                        <ul class="list-group">
                                                                                            <li class="list-group-item"><b>No Memo :</b> <input type="text" name="nomor_memo" value="<?= $result['nomor_memo']; ?>" class="form-control input-sm" required></li>
                                                                                            <li class="list-group-item"><b>Periode Awal :</b> <input type="date" name="tgl_mulai" value="<?= $result['periode_awal']; ?>" class="form-control input-sm" required></li>
                                                                                            <li class="list-group-item"><b>Periode Akhir :</b> <input type="date" name="tgl_akhir"value="<?= $result['periode_akhir']; ?>" class="form-control input-sm" required></li>
                                                                                            <li class="list-group-item">
                                                                                                <b>Dibuat Oleh :</b>
                                                                                                <select class="form-control input-sm" tabindex="2" name="dibuat_oleh">
                                                                                                    <option value="" disabled selected></option>
                                                                                                    <option value="-" <?php if ("-" == $result['dibuat_oleh']) {
                                                                                                            echo "SELECTED";
                                                                                                        } ?>>-</option>
                                                                                                    <?php
                                                                                                        $dept = $user['dept'];
                                                                                                        $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' ORDER BY nama")->result_array();
                                                                                                    ?>
                                                                                                    <?php foreach ($queryShift as $dk) : ?>
                                                                                                        <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == $result['dibuat_oleh']) {
                                                                                                            echo "SELECTED";
                                                                                                        } ?>><?= $dk['nama']; ?></option>
                                                                                                    <?php endforeach ?>
                                                                                                </select>
                                                                                            </li>
                                                                                            <li class="list-group-item">
                                                                                                <b>Mengetahui :</b> 
                                                                                                <select class="form-control input-sm" tabindex="2" name="mengetahui">
                                                                                                    <option value="" disabled selected></option>
                                                                                                    <option value="-" <?php if ("-" == $result['mengetahui']) {
                                                                                                            echo "SELECTED";
                                                                                                        } ?>>-</option>
                                                                                                    <?php
                                                                                                        $dept = $user['dept'];
                                                                                                        $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' ORDER BY nama")->result_array();
                                                                                                    ?>
                                                                                                    <?php foreach ($queryShift as $dk) : ?>
                                                                                                        <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == $result['mengetahui']) {
                                                                                                            echo "SELECTED";
                                                                                                        } ?>><?= $dk['nama']; ?></option>
                                                                                                    <?php endforeach ?>
                                                                                                </select>
                                                                                            </li>
                                                                                            <li class="list-group-item">
                                                                                                <b>Menyetujui :</b> 
                                                                                                <input type="text" class="form-control input-sm" name="menyetujui" value="<?= $result['menyetujui']; ?>"> 
                                                                                                <input type="text" class="form-control input-sm" name="jabatan" placeholder="Jabatan" value="<?= $result['jabatan']; ?>"> 
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" name="submit" class="btn btn-success">Change</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </tbody>  
                                                </table>           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="content-panel">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT-kontrak">
                                <thead>
                                    <tr>
                                        <th width="25"><i class="fa fa-gear"></i></th>
                                        <th width="100">No Scan</th>
                                        <th width="250">Nama</th>
                                        <th width="75">Dept</th>
                                        <th width="150">Kontrak Akhir</th>
                                        <th width="50">Ket</th>
                                        <th width="100">Verifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dept = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
                                    $dpt = $dept['dept'];
                                    if ($dpt == "HRD") {
                                        $data = $this->db->query("SELECT b.id,
																		b.no_scan,
																		a.nama,
																		a.dept,
																		DATE_FORMAT(b.kontrak_akhir, '%d %b %Y') as kontrak_akhir,
																		DATE_FORMAT(b.kontrak_awal, '%d %b %Y') as kontrak_awal,
																		b.keterangan,
																		b.verifikasi,
																		b.durasi,
																		b.gaji,
																		a.status_karyawan
																	FROM
																		tbl_makar a
																		INNER JOIN ( SELECT * FROM tbl_kontrak b) b ON b.no_scan = a.no_scan 
																	WHERE
																		b.kontrak_akhir BETWEEN DATE_ADD( NOW( ), INTERVAL -1 MONTH ) 
																		AND DATE_ADD( NOW( ), INTERVAL '13' MONTH ) 
																		-- AND b.`status_karyawan` = ' ' 
																		AND  a.status_karyawan like '%Kontrak%'
																	ORDER BY
																		b.kontrak_akhir")->result_array();
                                    }else{
                                        $data = $this->db->query("SELECT b.id,
                                                                        b.no_scan,
                                                                        a.nama,
                                                                        a.dept,
                                                                        DATE_FORMAT(b.kontrak_akhir, '%d %b %Y') as kontrak_akhir,
                                                                        DATE_FORMAT(b.kontrak_awal, '%d %b %Y') as kontrak_awal,
                                                                        b.keterangan,
                                                                        b.verifikasi,
                                                                        b.durasi,
                                                                        b.gaji,
                                                                        a.status_karyawan
                                                                    FROM
                                                                        tbl_makar a
                                                                        INNER JOIN ( SELECT * FROM tbl_kontrak b) b ON b.no_scan = a.no_scan 
                                                                    WHERE
                                                                        b.kontrak_akhir BETWEEN DATE_ADD( NOW( ), INTERVAL -1 MONTH ) 
                                                                        AND DATE_ADD( NOW( ), INTERVAL '13' MONTH ) 
                                                                        -- AND b.`status` = ' '
                                                                        AND a.dept= '$dpt'
                                                                        AND  a.status_karyawan like '%Kontrak%'
                                                                    ORDER BY
                                                                        b.kontrak_akhir")->result_array();
                                    }
                                ?>
                                <?php foreach($data AS $result) : ?>
                                <tr class="gradeX">
                                    <td>
                                        <li class="dropdown" style="list-style-type:none;">
                                            <a href="" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="<?= base_url(); ?>PKWT/index_pkwt_history/<?= $result['no_scan']; ?>" style="color: black; font-size:13px;"><i class="fa fa-eye"></i> Lihat History Kontrak</a>
                                                </li>
                                                <?php if($user['dept'] == "HRD") : ?>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#modalVerifikasi<?= $result['id']; ?>" style="color: black; font-size:13px;"><i class="fa fa-check"></i> Verifikasi</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#modalHapus<?= $result['id'] ?>" style="color: black; font-size:13px;"><i class="fa fa-trash"></i> Hapus</a>
                                                    </li>
                                                    
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                        <div class="modal fade" id="modalHapus<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
                                            <form role="form" action="<?= base_url('PKWT/hapus_kontrak/') . $result['no_scan']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="modal-title">Apakah anda yakin ingin menghapus data ini ? </h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal fade" id="modalVerifikasi<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalVerifikasi" aria-hidden="true">
                                            <form action="<?= base_url(); ?>PKWT/verifikasi/<?= $result['id']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-check"></i> Verifikasi data Perjanjian Kerja Waktu Tertentu </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group">
                                                                <li class="list-group-item"><b>Nama Karyawan :</b> <?= $result['nama']; ?></li>
                                                                <li class="list-group-item"><b>Tanggal Kontrak Awal  :</b> <?= $result['kontrak_awal']; ?></li>
                                                                <li class="list-group-item"><b>Durasi  :</b> <?= $result['durasi']; ?> Bulan</li>
                                                                <li class="list-group-item"><b>Tanggal Kontrak Akhir  :</b> <?= $result['kontrak_akhir']; ?></li>
                                                                <li class="list-group-item"><b>Gaji/Upah pokok:</b> <?= $result['gaji']; ?>/Bulan</li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Verifikasi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td><?= $result['no_scan'] ?></td>
                                    <td><?= $result['nama'] ?></td>
                                    <td><?= $result['dept'] ?></td>
                                    <td><?= $result['kontrak_akhir'] ?></td>
                                    <td><?= $result['keterangan'] ?></td>
                                    <td>
                                        <?php if($result['verifikasi'] == 1) : ?>
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
         </section>
</section>
