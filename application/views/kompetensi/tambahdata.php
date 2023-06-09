<script language="javascript">
    function hapusElemenPekerjaanInti(pi) {
        $(pi).remove();
    }
    
    function TambahKompetensiTeknis() {
        var kt = document.getElementById("kt").value;
        var stre = "<p id='srowkt" + kt + "'><input class='form-control input-sm' name='kompetensi_teknis[]' value='<?= set_value('kompetensi_teknis[]') ?>' placeholder=''><a href='#' style=\"color:#3399FD;\" onclick='hapusElemenKompetensiTeknis(\"#srowkt" + kt + "\"); return false;' required><i class='fa fa-close red'></i> Hapus</a></p>";
        $("#divSitekt").append(stre);
        kt = (kt - 1) + 1;
        
        document.getElementById("kt").value = kt;
    }

    function hapusElemenKompetensiTeknis(kt) {
        $(kt).remove();
    }
    
    function TambahKompetensiNonTeknis() {
        var knt = document.getElementById("knt").value;
        var stre = "<p id='srowknt" + knt + "'><input class='form-control input-sm' name='kompetensi_nonteknis[]' value='<?= set_value('kompetensi_nonteknis[]') ?>' placeholder=''><a href='#' style=\"color:#3399FD;\" onclick='hapusElemenKompetensiNonTeknis(\"#srowknt" + knt + "\"); return false;' required><i class='fa fa-close red'></i> Hapus</a></p>";
        $("#divSiteknt").append(stre);
        knt = (knt - 1) + 1;
        
        document.getElementById("knt").value = knt;
    }

    function hapusElemenKompetensiNonTeknis(knt) {
        $(knt).remove();
    }
</script>
<section id="main-content">
    <section class="wrapper">
    <h4><i class="fa fa-angle-right"></i> People Development <i class="fa fa-angle-right"></i><a href="<?= base_url('kompetensi'); ?>"> Kompetensi </a><i class="fa fa-angle-right"></i> Tambah Data</h4>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('Kompetensi/proses_tambahdata'); ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Pemangku Jabatan</label>
                                <div class="col-lg-10">
                                    <select class='form-control input-sm select2' tabindex='2' name='no_scan' required>
                                        <option value='' disabled selected>-Pilih Nama Karyawan-</option>
                                        <?php  
                                            $dept = $user['dept']; 
                                            $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' ORDER BY nama ASC")->result_array(); ?> 
                                        <?php foreach ($queryShift as $dk) : ?> 
                                        <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == set_value('no_scan')) { echo 'SELECTED';} ?>>
                                        <?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    <a href="#" class="fa fa-plus" onclick="TambahKompetensiTeknis(); return false;"> Kompetensi Teknis <br><i>(min. 3 kompetensi teknis)</i></a> 
                                </label>

                                <div class="col-lg-10" id="divSitekt">
                                    <input id="kt" value="0" type="hidden">
                                    <input class='form-control input-sm' name='kompetensi_teknis[]' value='<?= set_value('kompetensi_teknis[]') ?>' placeholder=''><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    <a href="#" class="fa fa-plus" onclick="TambahKompetensiNonTeknis(); return false;"> Kompetensi Non Teknis <br><i>(min. 3 kompetensi non teknis)</i></a> 
                                </label>

                                <div class="col-lg-10" id="divSiteknt">
                                    <input id="knt" value="0" type="hidden">
                                    <input class='form-control input-sm' name='kompetensi_nonteknis[]' value='<?= set_value('kompetensi_nonteknis[]') ?>' placeholder=''><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    <a href="<?= base_url('kompetensi'); ?>" class="btn btn-theme04">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>