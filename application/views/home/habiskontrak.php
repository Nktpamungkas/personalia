<?php
$dpt = $user['dept'];
$datablm = $this->db->query("SELECT b.no_scan,
                                    a.nama,
                                    a.dept,
                                    DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                    b.keterangan,
                                    a.status_email_kontrak,
                                    count( a.status_email_kontrak) as jumlah
                                FROM
                                    tbl_makar a
                                    INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                WHERE
                                b.kontrak_akhir BETWEEN DATE_ADD( NOW(), INTERVAL -1 week )
                                            AND DATE_ADD( NOW(), INTERVAL '1' week )
                                AND a.status_email_kontrak = 1
                                    AND b.`status` != 'diperpanjang'
                                    AND a.dept = '$dpt'
                                    and NOT a.status_karyawan in( 'Resigned' ,'perubahan_status')

                                ORDER BY
                                    b.kontrak_akhir ASC")->result_array();

// Inisialisasi totaldata
$totaldata = 0;

// Menghitung total data dari setiap baris hasil query
foreach ($datablm as $data) {
    $totaldata += $data['jumlah'];
}
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                    <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div> 
                <p>  <center><h4><b>  DATA KARYAWAN HABIS KONTRAK</b></h4></center></p>
                <?php if ($user['dept'] != "HRD" && $totaldata !==0 ):?>
                <div class="row mb">
                    <p>
                                               <br>
                        <h5 style="display: inline;"><b>  Belum Tanda Tangan Kontrak</b></h5> <br>
                        <?php if ($totaldata >= 1) : ?>
                        <h4 id="important" style="display: inline;"><span style="color: red;">IMPORTANT...!!!  </span></h4>
                            <script>
                                // Fungsi untuk membuat teks berkelap-kelip
                                function blink() {
                                    var element = document.getElementById('important');
                                    setInterval(function () {
                                        element.style.visibility = (element.style.visibility == 'hidden' ? '' : 'hidden');
                                    }, 500); // Interval dalam milidetik (500ms = setengah detik)
                                }
                                blink(); // Panggil fungsi blink untuk membuat teks berkelap-kelip
                              </script>
                        <?php endif; ?>
                    <div class="content-panel">
                            <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT2">
                                <thead>
                                <tr>
                                    <th width="25">No</th>
                                    <th width="125">No Scan</th>
                                    <th width="300">Nama</th>
                                    <th width="100">Departemen</th>
                                    <th width="200">Tgl Kontrak Akhir</th>
                                    <th width="50">Keterangan</th>                                                
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dpt = $user['dept'];
                                        $datablmTTD = $this->db->query("SELECT b.no_scan,
                                            a.nama,
                                            a.dept,
                                            DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                            b.keterangan,
                                            a.status_email_kontrak
                                        FROM
                                            tbl_makar a
                                            INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                        WHERE
                                        b.kontrak_akhir BETWEEN DATE_ADD( NOW(), INTERVAL -1 week )
                                                    AND DATE_ADD( NOW(), INTERVAL '1' week )
                                        AND a.status_email_kontrak = 1
                                            AND b.`status` != 'diperpanjang'
                                            AND a.dept = '$dpt'
                                            and NOT a.status_karyawan in( 'Resigned' ,'perubahan_status')

                                        ORDER BY
                                            b.kontrak_akhir ASC")->result_array();
                                    $no = 1;
                                ?>
                                <?php foreach ($datablmTTD as $result2) : ?>
                                    <tr class="gradeY">
                                        <td>
                                          <a style="color: <?= ($result2['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>"> <?= $no++; ?>
                                        </td>
                                        <td style="color: <?= ($result2['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result2['no_scan'] ?>
                                        </td>
                                        <td>
                                            <a style="color: <?= ($result2['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>"> <?= $result2['nama'] ?>
                                        </td>
                                        <td style="color: <?= ($result2['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result2['dept'] ?>
                                        </td> 
                                        <td style="color: <?= ($result2['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result2['kontrak_akhir'] ?>
                                        </td> 
                                        <td style="color: <?= ($result2['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result2['keterangan'] ?>
                                        </td> 
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                            <br>
                            <br>
                            <?php if ($dpt <> "HRD") : ?>
                                <ol>
                                    <label><span style="color: red;">Note :</span></label><br>
                                    <label>Semua karyawan kontrak yang sudah di kirim email pemberitahuan untuk mempebaharui kontrak oleh HRD, akan berwana biru.  </label><br>
                                    <label>Jika sudah menerima email pemberitahuan di harapkan segera menghubungi HRD.</label>
                                </ol>
                            <?php endif; ?> 
                    </div>
                </div>                               
                <?php endif; ?>

                <div class="row mb">
                    <p>
                        <?php if ($dpt == "HRD") : ?>
                        <!-- <center><h4><b>DATA HABIS KONTRAK</b></h4></center> -->
                        <?php endif; ?> 
                    <div class="content-panel">
                        <form method="POST" action="<?= base_url('home/Kirim_email_habiskontrak'); ?>">
                            <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT3">
                                <thead>
                                <tr>
                                    <!-- <th width="25">No</th> -->
                                    <?php if ($user['dept'] == "HRD") : ?>
                                            <th width="25">*</th>
                                    <?php else: ?>
                                        <th width="25">No</th>
                                    <?php endif; ?>
                                    <th width="125">No Scan</th>
                                    <th width="300">Nama</th>
                                    <th width="100">Departemen</th>
                                    <th width="200">Tgl Kontrak Akhir</th>
                                    <th width="50">Keterangan</th>                                                
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dpt = $user['dept'];
                                    if ($dpt == "HRD") {
                                        $data = $this->db->query("SELECT b.no_scan,
                                            a.nama,
                                            a.dept,
                                            DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                            b.keterangan,
                                            a.status_email_kontrak
                                        FROM
                                            tbl_makar a
                                            INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                        WHERE
                                            b.kontrak_akhir BETWEEN NOW()
                                            AND DATE_ADD( NOW(), INTERVAL '3' MONTH )
                                            AND b.`status` != 'diperpanjang'
                                            and NOT a.status_karyawan in( 'Resigned' ,'perubahan_status')
                                        ORDER BY
                                            b.kontrak_akhir ASC")->result_array();
                                    } else {
                                       $data = $this->db->query("SELECT b.no_scan,
                                            a.nama,
                                            a.dept,
                                            DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                            b.keterangan ,
                                            a.status_email_kontrak
                                        FROM
                                            tbl_makar a
                                            INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                        WHERE
                                            b.kontrak_akhir BETWEEN NOW()
                                            AND DATE_ADD( NOW(), INTERVAL '6' MONTH )
                                            AND b.`status` != 'diperpanjang'
                                            AND a.dept = '$dpt'
                                            and NOT a.status_karyawan in( 'Resigned' ,'perubahan_status')
                                        ORDER BY b.kontrak_akhir ASC")->result_array();
                                    }
                                    $no = 1;
                                ?>
                                <?php foreach ($data as $result) : ?>
                                    <tr class="gradeX">
                                        <td>
                                            <?php if ($dpt == "HRD" && $result['status_email_kontrak'] <> 1) : ?>
                                                <input type="checkbox" class="checkbox" name="no_scan[]" 
                                                    value="<?= $result['no_scan'] ?>/<?= $result['nama'] ?>/<?= $result['dept'] ?>/<?= $result['kontrak_akhir'] ?>/<?= $result['keterangan'] ?>">
                                            <?php elseif ($dpt == "HRD") : ?>
                                                <input type="checkbox" class="checkbox" name="no_scan[]" checked disabled>
                                            <?php elseif ($dpt <> "HRD"): ?>
                                                <a style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>"> <?= $no++; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result['no_scan'] ?>
                                        </td>
                                        <td>
                                            <?php if ($dpt == "HRD" && $result['status_email_kontrak'] == 1): ?>
                                                <a href="<?= base_url('PKWT/index_pkwt/' . $result['no_scan']); ?>" style="color: blue;">
                                                    <?= $result['nama'] ?>
                                                </a>
                                            <?php else: ?>
                                                <a style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>"> <?= $result['nama'] ?>
                                            <?php endif; ?>
                                        </td>
                                        <!-- <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result['nama'] ?>
                                        </td>  -->
                                        <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result['dept'] ?>
                                        </td> 
                                        <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result['kontrak_akhir'] ?>
                                        </td> 
                                        <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result['keterangan'] ?>
                                        </td> 
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                            <div >
                                <?php if ($dpt == "HRD") : ?>
                                    <input class="btn btn-primary"  type="submit" value="Kirim Email" name="kirim_email">
                                <?php else : ?>                                    
                                <?php endif; ?>
                            </div>                           
                        </form>
                    </div>                    
                </div>                               
            </div>
        </div>
        <?php if ($user['dept'] == "HRD") : ?>
        <div class="row mb">
            <p>
            <h5><span style="color: red;"><b>Belum Tanda Tangan Kontrak</b></span></h5> 
            <div class="content-panel">
                <form method="POST" action="<?= base_url('home/Kirim_email_habiskontrak'); ?>">
                    <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT">
                        <thead>
                        <tr>
                            <th width="25">*</th>
                            <th width="125">No Scan</th>
                            <th width="300">Nama</th>
                            <th width="100">Departemen</th>
                            <th width="200">Tgl Kontrak Akhir</th>
                            <th width="50">Keterangan</th>                                                
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $data = $this->db->query("SELECT b.no_scan,
                                    a.nama,
                                    a.dept,
                                    DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                    b.keterangan,
                                    a.status_email_kontrak
                                FROM
                                    tbl_makar a
                                    INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                WHERE
                                b.kontrak_akhir BETWEEN DATE_ADD( NOW(), INTERVAL -1 week )
                                                    AND DATE_ADD( NOW(), INTERVAL '1' week )
                                AND a.status_email_kontrak = 1
                                    AND b.`status` != 'diperpanjang'
                                    and NOT a.status_karyawan in( 'Resigned' ,'perubahan_status')
                                ORDER BY
                                    b.kontrak_akhir ASC")->result_array();
                            $no = 1;
                        ?>
                        <?php foreach ($data as $result) : ?>
                            <tr class="gradeY">
                                <td>
                                    <?php if ($dpt == "HRD" && $result['status_email_kontrak'] <> 1) : ?>
                                        <input type="checkbox" class="checkbox" name="no_scan[]" 
                                            value="<?= $result['no_scan'] ?>/<?= $result['nama'] ?>/<?= $result['dept'] ?>/<?= $result['kontrak_akhir'] ?>/<?= $result['keterangan'] ?>">
                                    <?php elseif ($dpt == "HRD") : ?>
                                        <input type="checkbox" class="checkbox" name="no_scan[]" checked disabled>
                                    <?php endif; ?>
                                </td>
                                <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                    <?= $result['no_scan'] ?>
                                </td>
                                <td>
                                    <?php if ($dpt == "HRD" && $result['status_email_kontrak'] == 1): ?>
                                        <a href="<?= base_url('PKWT/index_pkwt/' . $result['no_scan']); ?>" style="color: blue;">
                                            <?= $result['nama'] ?>
                                        </a>
                                   <?php endif; ?>
                                </td>
                                <!-- <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                    <?= $result['nama'] ?>
                                </td>  -->
                                <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                    <?= $result['dept'] ?>
                                </td> 
                                <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                    <?= $result['kontrak_akhir'] ?>
                                </td> 
                                <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                    <?= $result['keterangan'] ?>
                                </td> 
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <br>
            <br>
        </div>     
        <?php endif; ?>                          
    </section>
</section>


