<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kode5kpd').change(function(){
            var _kode5kpd = document.getElementById('kode5kpd').value;
            $.ajax ({
                type: 'POST',
                url: '<?= base_url()."kpi_karyawan/search_targetkode5kpd" ?>/' + _kode5kpd,   
                dataType: 'json',
                success: function(data){
                    document.getElementById('target1').value = data[0].target;
                    }
            });
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <a href="<?= base_url('kpi_karyawan/setting_ipp'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> <span>Kembali..</span></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="modal-content">
                    <form role="form" action="<?= base_url(); ?>kpi_karyawan/ubah_ipp/<?= $ipp->id; ?>" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ubah Data IPP</h4>
                        </div>
                        <div class="modal-body" style="border-radius: 0px; background-color: #f2f2f2; padding: 0px;">
                            <div class="col-lg-12">
                                <div class="col-lg" style="margin-top: 10px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-tasks"></span>
                                        </span>
                                        <input type="text" name="kode6" title="Kode IPP" value="<?= $ipp->kode6; ?>" placeholder="Kode IPP.." class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input type="date" name="tgl" title="Tanggal IPP" value="<?= $ipp->tgl; ?>" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <select name="no_scan" style='width: 100%' title="Nomor Scan Karyawan" class="form-control input-sm select2">
                                            <option value="" disabled selected>No scan karyawan</option>
                                            <?php
                                                $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1")->result_array();
                                            ?>
                                            <?php foreach ($makar as $dMakar) : ?>
                                                <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == $ipp->no_scan) {
                                                    echo "SELECTED";
                                                } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="fa fa-users"></span>
                                        </span>
                                        <select name="no_scan_atasan" style='width: 100%' title="Nomor Scan Atasan Karyawan" class="form-control input-sm select2">
                                            <option value="" disabled selected>No scan atasan karyawan</option>
                                            <?php
                                                $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1")->result_array();
                                            ?>
                                            <?php foreach ($makar as $dMakar) : ?>
                                                <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == $ipp->no_scan_atasan) {
                                                    echo "SELECTED";
                                                } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="fa fa-tags"></span>
                                        </span>
                                        <select name="kode5kpd" id="kode5kpd" style='width: 100%' title="Kode 5 KPD (KPI Departemen)" class="form-control input-sm select2">
                                            <option value="" disabled selected>Kode 5 KPD (KPI Departemen)</option>
                                            <?php
                                                $kode5kpd = $this->db->query("SELECT kode5, kpi_dept FROM kode5kpd")->result_array();
                                            ?>
                                            <?php foreach ($kode5kpd as $Dkode5) : ?>
                                                <option value="<?= $Dkode5['kode5'] ?>" <?php if ($Dkode5['kode5'] == $ipp->kode5kpd) {
                                                    echo "SELECTED";
                                                } ?>><?= $Dkode5['kode5']; ?> - <?= $Dkode5['kpi_dept']; ?> </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-tasks"></span>
                                        </span>
                                        <input type="text" name="target1" id="target1" title="Target" value="<?= $ipp->target1; ?>" class="form-control input-sm" placeholder="Target..">
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon"  id="sepreated">
                                            <span class="glyphicon glyphicon-tasks"></span>
                                        </span>
                                        <select class="form-control input-sm" title="Jenis" name="jenis" style="width: 100%;">
                                            <option disabled selected>Pilih jenis</option>
                                            <option value="HIG (high is good)" <?php if ($ipp->ket1 == "HIG (high is good)") { echo "SELECTED"; } ?>>High Is Good</option>
                                            <option value="HIB (high is bad)" <?php if ($ipp->ket1 == "HIB (high is bad)") { echo "SELECTED"; } ?>>High Is Bad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-tasks"></span>
                                        </span>
                                        <select class="form-control input-sm" title="Kriteria" name="kriteria" style="width: 100%;">
                                            <option disabled selected>Pilih kriteria</option>
                                            <option value="pencapaian KPI max 100%" <?php if (substr($ipp->ket1,5) == "pencapaian KPI max 100%") { echo "SELECTED"; } ?>>Pencapaian KPI max 100%</option>
                                            <option value="pencapaian KPI bisa >100%" <?php if (substr($ipp->ket1,5) == "pencapaian KPI bisa >100%") { echo "SELECTED"; } ?>>Pencapaian KPI bisa >100%</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>