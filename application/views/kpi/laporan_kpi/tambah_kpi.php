<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <a href="<?= base_url('kpi_karyawan/laporan_kpi'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> <span>Kembali..</span></a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="modal-content">
                    <form role="form" action="<?= base_url(); ?>kpi_karyawan/proses_kpi" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Laporan Pencapaian KPI INDIVIDUAL </h4>
                        </div>
                        <?php $detail_kpi = $this->db->query("SELECT DATE_FORMAT(a.tgl, '%M %Y') as tgl, a.no_scan, b.nama
                                                                FROM
                                                                        `laporan_kpi` a
                                                                        LEFT JOIN (SELECT * FROM tbl_makar b)b ON b.no_scan = a.no_scan
                                                                WHERE
                                                                        a.no_scan='$no_scan' AND a.tgl = '$tgl'")->row(); ?>
                        <div class="modal-body" style="border-radius: 5px; background-color: #F5FFFA; padding: 20px;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            <input type="date" name="tgl" title="tanggal lapor KPI" style="background-color: #EED9D2;" class="form-control input-sm" required>
                                        </div>
                                    </div>
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated">
                                                <span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <select name="no_scan" style='width: 100%' class="form-control input-sm" readonly>
                                                <?php $makar = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan='$detail_kpi->no_scan'")->result_array(); ?>
                                                <?php foreach ($makar as $dMakar) : ?>
                                                    <option value="<?= $dMakar['no_scan'] ?>"><?= $dMakar['no_scan']; ?> | <?= $dMakar['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated">
                                                <span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <select name="no_scan_atasan" style='width: 100%; background-color: #EED9D2;' class="form-control input-sm select2" required>
                                                <option value="" disabled selected>No scan atasan karyawan</option>
                                                <?php
                                                    $dept = $user['dept'];
                                                    $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1")->result_array();
                                                ?>
                                                <?php foreach ($makar as $dMakar) : ?>
                                                    <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == set_value('no_scan')) {
                                                        echo "SELECTED";
                                                    } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- INDIVIDUAL PERFORMANCE PLAN -->
                                        <div class="col-lg-12" style="width: 100%; background-color: #AFEEEE; color: black; padding: 2px 0px; margin: 1px 1px; border: none; border-radius: 10px; cursor: pointer;">
                                            <center><label class="col-lg-12" style="font-weight: bold;">INDIVIDUAL PERFORMANCE PLAN</label></center>
                                            <?php $detail_kpi = $this->db->query("SELECT * FROM kpi_individu WHERE no_scan = '$no_scan' AND NOT kode5kpd LIKE '%KPIM%' ORDER BY SUBSTR(kode5kpd, 4) ASC")->result_array();?>
                                            <?php foreach($detail_kpi AS $value) : ?>
                                                <div class="col-lg-6" style="margin-top: 5px;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="sepreated">
                                                            <span class="fa fa-tags"></span>
                                                        </span>
                                                        <input type="hidden" name="kpi_dept[]" value="<?= $value['target1']; ?>">
                                                        <input type="hidden" name="kode5kpd[]" value="<?=$value['kode5kpd']; ?>" class="form-control input-sm">
                                                        <?php 
                                                            $kode5 = $value['kode5kpd']; 
                                                            $ket = $this->db->query("SELECT kode5, kpi_dept FROM kode5kpd WHERE kode5='$kode5'")->row(); 
                                                            if (!empty($ket->kpi_dept)) {
                                                                $ket_dept = $value['kode5kpd'].' - '.$ket->kpi_dept;
                                                            } else {
                                                                $ket_dept = "KODE5KPD TIDAK TERSEDIA. SILAHKAN HUBUNGI HRD UNTUK UPDATE KODE5KPD.";
                                                            }
                                                        ?>
                                                        <input type="text" value="<?= $ket_dept; ?>" class="form-control input-sm" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 5px;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="sepreated">
                                                            <span class="fa">Target</span>
                                                        </span>
                                                        <input type="text" name="target[]" value="<?=$value['target1']; ?>" class="form-control input-sm" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 5px;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="sepreated">
                                                            <span class="fa">Aktual</span>
                                                        </span>
                                                        <input type="text" name="aktual[]" style="background-color: #EED9D2;" placeholder="Wajib diisi" class="form-control input-sm">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <!-- INDIVIDUAL PERFORMANCE PLAN -->
                                    <!-- KPI MANDATORY -->
                                        <div class="col-lg-12" style="width: 100%; background-color: #AFEEEE; color: black; padding: 2px 0px; margin: 1px 1px; border: none; border-radius: 10px; cursor: pointer;">
                                            <center><label class="col-lg-12" style="font-weight: bold;">KPI MANDATORY (October)</label></center>
                                            <?php $detail_kpi = $this->db->query("SELECT * FROM kpi_individu WHERE no_scan = '$no_scan' AND kode5kpd LIKE '%KPIM%'")->result_array();?>
                                            <?php foreach($detail_kpi AS $value) : ?>
                                                <div class="col-lg-6" style="margin-top: 5px;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="sepreated">
                                                            <span class="fa fa-tags"></span>
                                                        </span>
                                                        <input type="hidden" name="kpi_dept[]" value="<?= $value['target1']; ?>">
                                                        <input type="hidden" name="kode5kpd[]" value="<?=$value['kode5kpd']; ?>" class="form-control input-sm">

                                                        <?php 
                                                            $kode5 = $value['kode5kpd']; 
                                                            $ket = $this->db->query("SELECT kode5, kpi_dept FROM kode5kpd WHERE kode5='$kode5'")->row(); 
                                                            if (!empty($ket->kpi_dept)) {
                                                                $ket_dept = $value['kode5kpd'].' - '.$ket->kpi_dept;
                                                            } else {
                                                                $ket_dept = "KODE5KPD TIDAK TERSEDIA. SILAHKAN HUBUNGI HRD UNTUK UPDATE KODE5KPD.";
                                                            }
                                                        ?>

                                                        <input type="text" value="<?= $ket_dept; ?>" class="form-control input-sm" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 5px;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="sepreated">
                                                            <span class="fa">Target</span>
                                                        </span>
                                                        <input type="text" name="target[]" value="<?=$value['target1']; ?>" class="form-control input-sm" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 5px;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="sepreated">
                                                            <span class="fa">Aktual</span>
                                                        </span>
                                                        <input type="text" name="aktual[]" style="background-color: #EED9D2;" value="<?=$value['target1']; ?>" class="form-control input-sm">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <!-- KPI MANDATORY -->
                                    <!-- PENAMBAHAN KPI -->
                                        <div class="col-lg-12" style="width: 100%; background-color: #AFEEEE; color: black; padding: 2px 0px; margin: 1px 1px; border: none; border-radius: 10px; cursor: pointer;">
                                            <center><label class="col-lg-12" style="font-weight: bold;">Jika ingin menambahkan KPI baru silahkan isi pada bagian dibawah ini:</label></center>
                                            <?php for($x=1; $x<=5; $x++) : ?> <!-- MEMBUAT KPI BARU SEBANYAK 5 FORM -->
                                                <script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
                                                <script type="text/javascript">
                                                    $(document).ready(function(){
                                                        $('#tambah_kode5kpd<?= $x; ?>').change(function(){
                                                            var kode5kpd = document.getElementById('tambah_kode5kpd<?= $x; ?>').value;
                                                            $.ajax ({
                                                                type: 'POST',
                                                                url: '<?= base_url()."kpi_karyawan/search_kode5kpd" ?>/' + kode5kpd,   
                                                                dataType: 'json',
                                                                success: function(data){
                                                                    document.getElementById('kpi_dept<?= $x; ?>').value = data[0].kpi_dept;
                                                                }
                                                            });
                                                        });
                                                    });
                                                </script>
                                                <div class='col-lg-6' style='margin-top: 5px;'>
                                                    <div class='input-group'>
                                                        <span class='input-group-addon' style="background-color: #FDF5E6;">
                                                            <span class='fa fa-book'></span>
                                                        </span>
                                                        <select name='tambah_kode5kpd[]' style='width: 100%' title='KPI Departemen' id="tambah_kode5kpd<?= $x; ?>" class='form-control input-sm select2'>
                                                            <option value='' disabled selected>KPI Departemen</option>
                                                            
                                                            <?php $dept = $user['dept']; $kode5kpd = $this->db->query("SELECT kode5, kpi_dept FROM kode5kpd WHERE dept='$dept'")->result_array(); ?>
                                                                <?php foreach ($kode5kpd as $Dkode5) : ?>
                                                                    <option value='<?= $Dkode5['kode5'] ?>' <?php if ($Dkode5['kode5'] == set_value('tambah_kode5kpd')) { echo 'SELECTED'; } ?>>
                                                                        <?= $Dkode5['kode5']; ?> - <?= $Dkode5['kpi_dept']; ?> 
                                                                    </option>
                                                                <?php endforeach; ?>
                                                        </select>
                                                        <input type="text" name="tambah_kpi_dept[]" id="kpi_dept<?= $x; ?>" hidden>
                                                    </div>
                                                </div>
                                                <div class='col-lg-3' style='margin-top: 5px;'>
                                                    <div class='input-group'>
                                                        <span class='input-group-addon'>
                                                            <span class='fa'>Target</span>
                                                        </span>
                                                        <input type='text' name="tambah_target[]" id="tambah_target<?= $x; ?>" style="background-color: #FDF5E6;" id='target' class='form-control input-sm'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-3' style='margin-top: 5px;'>
                                                    <div class='input-group'>
                                                        <span class='input-group-addon'>
                                                            <span class='fa'>Aktual</span>
                                                        </span>
                                                        <input type='text' name='tambah_aktual[]' id="tambah_aktual<?= $x; ?>" style="background-color: #FDF5E6;" class='form-control input-sm'>
                                                    </div>
                                                </div>
                                                
                                            <?php endfor; ?>
                                        </div>
                                    <!-- PENAMBAHAN KPI -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <h4 class="title" style="color: red">Informasi</h4>
                                <ol>
                                    <li>Anda diwajibkan mengisi seluruh record yang ditampilkan berwarna <span style="color: red;">merah</span>.</li>
                                    <li>Periksa sekali lagi sebelum menekan tombol SIMPAN PERUBAHAN.</li>
                                </ol=>
                            </div>
                        <div class="modal-footer">

                            <button type="submit" name="submit" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
            