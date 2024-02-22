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
                    <div class="content-panel">
                        <form method="POST" action="<?= base_url('home/Kirim_email_habiskontrak'); ?>">
                            <table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="PKWT">
                                <thead>
                                <tr>
                                    <!-- <th width="25">No</th> -->
                                    <th width="50">*</th>
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
                                                AND DATE_ADD( NOW(), INTERVAL '2' MONTH )
                                                AND b.`status` = ''
                                                -- AND (a.status_email_kontrak is null or a.status_email_kontrak = 0)
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
                                            AND b.`status` = ''
                                            AND a.dept = '$dpt'
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
                                                <?= $no++; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result['no_scan'] ?>
                                        </td>
                                        <td style="color: <?= ($result['status_email_kontrak'] == 1) ? 'blue' : 'black'; ?>">
                                            <?= $result['nama'] ?>
                                        </td> 
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
    </section>
</section>


