<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="showback">
                    <h4><i class="fa fa-angle-right"></i> Setting</h4>
                    <p>Silahkan pilih opsi dibawah ini.</p>
                    <form class="form-style-4" action="<?= base_url('kpi_karyawan/pilihan'); ?>" method="post">
                        <div class="form-group">
                            <select class="form-control input-sm select2" name="kode">
                                <option value="kode1bsc">Kode 1 BSC (Balanced Scorecard)</option>
                                <option value="kode2sto">Kode 2 STO (Strategic Objective)</option>
                                <option value="kode3kpc">Kode 3 KPC (KPI Company)</option>
                                <option value="kode4stn">Kode 4 STN (Strategic Initiative)</option>
                                <option value="kode5kpd">Kode 5 KPD (KPI Departemen)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="submit">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>