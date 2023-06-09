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
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Laporan Pencapaian KPI INDIVIDUAL </h4>
                    </div>
                    <?php $detail_kpi = $this->db->query("SELECT DATE_FORMAT( a.tgl, '%M %Y' ) AS tgl,
                                                                a.no_scan,
                                                                b.nama AS nama_karyawan,
                                                                a.no_scan_atasan,
                                                                bb.nama AS nama_atasan,
                                                                tgl AS tgl2 
                                                            FROM 
                                                                `laporan_kpi` a
                                                                LEFT JOIN tbl_makar b ON b.no_scan = a.no_scan 
                                                                LEFT JOIN tbl_makar bb ON bb.no_scan = a.no_scan_atasan
                                                            WHERE
                                                                a.no_scan='$no_scan' AND a.tgl = '$tgl'")->row(); ?>
                    <div class="modal-body" style="border-radius: 5px; background-color: #F5FFFA; padding: 20px;">
                        <div class="row">
                            <label><b>LAPORAN BULAN : </b></label><br>
                            <div class="col-lg-12">
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input type="text" value="<?= $detail_kpi->tgl; ?>" title="tanggal lapor KPI" class="form-control input-sm" disabled>
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="text" value="<?= $detail_kpi->no_scan; ?> | <?= $detail_kpi->nama_karyawan; ?>" class="form-control input-sm" disabled>
                                    </div>
                                </div>
                                <div class="col-lg" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sepreated">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="text" value="<?= $detail_kpi->no_scan_atasan; ?> | <?= $detail_kpi->nama_atasan; ?>" class="form-control input-sm" disabled>
                                    </div>
                                </div>
                                <!-- INDIVIDUAL PERFORMANCE PLAN -->
                                    <div class="col-lg-12" style="width: 100%; background-color: #AFEEEE; color: black; padding: 2px 0px; margin: 1px 1px; border: none; border-radius: 10px; cursor: pointer;">
                                        <center><label class="col-lg-12" style="font-weight: bold;">INDIVIDUAL PERFORMANCE PLAN</label></center>
                                        <?php $detail_kpi_array = $this->db->query("SELECT
                                                                                        a.id,
                                                                                        a.kode8,
                                                                                        a.tgl,
                                                                                        a.no_scan,
                                                                                        b.nama,
                                                                                        a.kode5kpd,
                                                                                        a.target1,
                                                                                        c.kpi_dept,
                                                                                        a.ket1,
                                                                                        c.target,
                                                                                        c.kode5,
                                                                                        a.aktual 
                                                                                    FROM
                                                                                        `laporan_kpi` a
                                                                                        LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan
                                                                                        LEFT JOIN ( SELECT * FROM kode5kpd c ) c ON c.kode5 = a.kode5kpd 
                                                                                    WHERE
                                                                                        a.no_scan = '$no_scan' 
                                                                                        AND a.tgl = '$tgl' 
                                                                                        AND NOT kode5kpd LIKE '%KPIM%' 
                                                                                ORDER BY
                                                                                    SUBSTR( kode5kpd, 4 ) ASC")->result_array(); ?>
                                        <?php foreach($detail_kpi_array AS $value) : ?>
                                            <div class="col-lg-6" style="margin-top: 5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sepreated">
                                                        <span class="fa fa-tags"></span>
                                                    </span>
                                                    <input type="text" value="<?= $value['kode5kpd']; ?> | <?= $value['kpi_dept']; ?>" class="form-control input-sm" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" style="margin-top: 5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sepreated">
                                                        <span class="fa">Target</span>
                                                    </span>
                                                    <input type="text" value="<?= $value['target']; ?>" class="form-control input-sm" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" style="margin-top: 5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sepreated">
                                                        <span class="fa">Aktual</span>
                                                    </span>
                                                    <input type="text" value="<?= $value['aktual']; ?>" class="form-control input-sm" disabled>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <!-- INDIVIDUAL PERFORMANCE PLAN -->
                                <!-- KPI MANDATORY -->
                                    <div class="col-lg-12" style="width: 100%; background-color: #AFEEEE; color: black; padding: 2px 0px; margin: 1px 1px; border: none; border-radius: 10px; cursor: pointer;">
                                        <center><label class="col-lg-12" style="font-weight: bold;">KPI MANDATORY</label></center>
                                        <?php $detail_kpi_array = $this->db->query("SELECT
                                                                                        a.id,
                                                                                        a.kode8,
                                                                                        a.tgl,
                                                                                        a.no_scan,
                                                                                        b.nama,
                                                                                        a.kode5kpd,
                                                                                        a.target1,
                                                                                        c.kpi_dept,
                                                                                        a.ket1,
                                                                                        c.target,
                                                                                        c.kode5,
                                                                                        a.aktual 
                                                                                    FROM
                                                                                        `laporan_kpi` a
                                                                                        LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan
                                                                                        LEFT JOIN ( SELECT * FROM kode5kpd c ) c ON c.kode5 = a.kode5kpd 
                                                                                    WHERE
                                                                                        a.no_scan = '$no_scan' 
                                                                                        AND a.tgl = '$tgl' 
                                                                                        AND kode5kpd LIKE '%KPIM%' 
                                                                                ORDER BY
                                                                                    SUBSTR( kode5kpd, 4 ) ASC")->result_array(); ?>
                                        <?php foreach($detail_kpi_array AS $value) : ?>
                                            <div class="col-lg-6" style="margin-top: 5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sepreated">
                                                        <span class="fa fa-tags"></span>
                                                    </span>
                                                    <input type="text" value="<?= $value['kode5kpd']; ?> | <?= $value['kpi_dept']; ?>" class="form-control input-sm" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" style="margin-top: 5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sepreated">
                                                        <span class="fa">Target</span>
                                                    </span>
                                                    <input type="text" value="<?= $value['target']; ?>" class="form-control input-sm" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" style="margin-top: 5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sepreated">
                                                        <span class="fa">Aktual</span>
                                                    </span>
                                                    <input type="text" value="<?= $value['aktual']; ?>" class="form-control input-sm" disabled>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <!-- KPI MANDATORY -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('kpi_karyawan/tambah_kpi'); ?>/<?= $detail_kpi->no_scan; ?>/<?= $detail_kpi->tgl2; ?>" class="btn btn-success btn-sm" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Buat Laporan KPI disini</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
            