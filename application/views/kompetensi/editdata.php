<style>
    .abu {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
</style>
<section id="main-content">
    <section class="wrapper">
    <h4><i class="fa fa-angle-right"></i> People Development <i class="fa fa-angle-right"></i><a href="<?= base_url('kompetensi'); ?>"> Kompetensi </a><i class="fa fa-angle-right"></i> Ubah Data</h4>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('Kompetensi/proses_editdata'); ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Pemangku Jabatan</label>
                                <div class="col-lg-10">
                                    <select class='form-control input-sm select2' tabindex='2' name='no_scan' required>
                                        <option value='' disabled selected>-Pilih Nama Karyawan-</option>
                                        <?php  
                                            $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$kompetensi->no_scan'")->result_array(); ?> 
                                        <?php foreach ($queryShift as $dk) : ?> 
                                            <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == $kompetensi->no_scan) { echo 'SELECTED';} ?>>
                                            <?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    Kompetensi Teknis <br><i>(min. 3 kompetensi teknis)</i>
                                </label>

                                <div class="col-lg-10 abu" id="divSitekt">
                                    <input id="kt" value="1" type="hidden">
                                    <?php 
                                        $data = $this->db->query("SELECT * FROM kompetensi_teknis WHERE no_scan = '$no_scan'")->result_array(); 
                                    ?>
                                    <?php foreach($data AS $result_kt): ?>
                                        <input name="id_kt[]" value="<?= $result_kt['id']; ?>" type="hidden">
                                        <textarea class="form-control input-sm" name="kompetensi_teknis_edit[]" placeholder="Abaikan pesan ini atau isi kolom kosong dengan Kompetensi Teknis"><?= $result_kt['kompetensi_teknis']; ?></textarea>
                                        <a href="<?= base_url('kompetensi/hapus_kt/').$result_kt['id']; ?>" class="btn btn-outline-danger"><b>Hapus</b></a>
                                        <br><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    Kompetensi Non Teknis <br><i>(min. 3 kompetensi non teknis)</i> 
                                </label>

                                <div class="col-lg-10 abu" id="divSitekt">
                                    <input id="kt" value="1" type="hidden">
                                    <?php 
                                        $data = $this->db->query("SELECT * FROM kompetensi_nonteknis WHERE no_scan = '$no_scan'")->result_array(); 
                                    ?>
                                    <?php foreach($data AS $result_knt): ?>
                                        <input name="id_knt[]" value="<?= $result_knt['id']; ?>" type="hidden">
                                        <textarea class="form-control input-sm" name="kompetensi_nonteknis_edit[]" placeholder="Abaikan pesan ini atau isi kolom kosong dengan Kompetensi Non Teknis"><?= $result_knt['kompetensi_nonteknis']; ?></textarea>
                                        <a href="<?= base_url('kompetensi/hapus_knt/').$result_knt['id']; ?>" class="btn btn-outline-danger"><b>Hapus</b></a>
                                        <br><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-default" type="submit" name="duplicate" value="1">Duplicate</button>
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan Perubahan</button>
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