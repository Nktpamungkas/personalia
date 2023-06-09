<section id="main-content">
    <section class="wrapper">
    <h5><i class="fa fa-angle-right"></i><a href="<?= base_url('training'); ?>"> Training </a><i class="fa fa-angle-right"></i> <a href="<?= base_url('training/pelatihan'); ?>"> Ikut Pelatihan </a><i class="fa fa-angle-right"></i> Ubah peserta pelatihan</h5>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('Training/UbahTNA'); ?>" method="post">
                            <input id="idf" value="1" type="hidden">
                            <div class="adv-table">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Kode Training </th>
                                            <th>Level</th>
                                            <th><center>Rencana Pelaksanaan Kegiatan Pelatihan(Bulan/Minggu)</center></th>
                                            <th>Nama Pelatih</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($TNA as $value) :  ?>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="id[]" value="<?= $value['id']; ?>">
                                                <select class='input-sm select2' name='id_training[]' style='width:400px' required>
                                                    <option value='' disabled selected></option>
                                                    <?php $queryTraining = $this->db->query("SELECT * FROM training")->result_array(); ?>
                                                    <?php foreach ($queryTraining as $dt) : ?>
                                                        <option value='<?= $dt['id'] ?>' <?php if($value['id_training'] == $dt['id']){ echo "selected"; } ?>>TR<?php echo sprintf("%04d", $dt['id']); ?> - <?= $dt['nama_training'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class='input-sm ' name='level[]' style='width:150px' required>
                                                    <option value='' disabled selected></option>
                                                    <option value='Opr' <?php if($value['level'] == "Opr"){ echo "selected"; } ?>>OPR</option>
                                                    <option value='GL' <?php if($value['level'] == "GL"){ echo "selected"; } ?>>GL</option>
                                                    <option value='Spv' <?php if($value['level'] == "Spv"){ echo "selected"; } ?>>SPV</option>
                                                    <option value='GL, Opr' <?php if($value['level'] == "GL, Opr"){ echo "selected"; } ?>>GL + OPR</option>
                                                    <option value='Opr, Spv' <?php if($value['level'] == "Opr, Spv"){ echo "selected"; } ?>>OPR + SPV</option>
                                                    <option value='Spv, GL' <?php if($value['level'] == "Spv, GL"){ echo "selected"; } ?>>SPV + GL</option>
                                                    <option value='Spv, Opr' <?php if($value['level'] == "Spv, Opr"){ echo "selected"; } ?>>SPV + OPR</option>
                                                    <option value='Spv, GL, Opr' <?php if($value['level'] == "Spv, GL, Opr"){ echo "selected"; } ?>>SPV + GL + OPR</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class='input-sm select2' name='bulan[]' style='width:200px' required>
                                                    <option value='' disabled selected></option>
                                                    <option value='Jan' <?php if($value['bulan'] == "Jan"){ echo "selected"; } ?>>Januari</option>
                                                    <option value='Feb' <?php if($value['bulan'] == "Feb"){ echo "selected"; } ?>>Februari</option>
                                                    <option value='Mar' <?php if($value['bulan'] == "Mar"){ echo "selected"; } ?>>Maret</option>
                                                    <option value='Apr' <?php if($value['bulan'] == "Apr"){ echo "selected"; } ?>>April</option>
                                                    <option value='Mei' <?php if($value['bulan'] == "Mei"){ echo "selected"; } ?>>Mei</option>
                                                    <option value='Jun' <?php if($value['bulan'] == "Jun"){ echo "selected"; } ?>>Juni</option>
                                                    <option value='Jul' <?php if($value['bulan'] == "Jul"){ echo "selected"; } ?>>Juli</option>
                                                    <option value='Agt' <?php if($value['bulan'] == "Agt"){ echo "selected"; } ?>>Agustus</option>
                                                    <option value='Sept' <?php if($value['bulan'] == "Sept"){ echo "selected"; } ?>>September</option>
                                                    <option value='Okt' <?php if($value['bulan'] == "Okt"){ echo "selected"; } ?>>Oktober</option>
                                                    <option value='Nov' <?php if($value['bulan'] == "Nov"){ echo "selected"; } ?>>November</option>
                                                    <option value='Des' <?php if($value['bulan'] == "Des"){ echo "selected"; } ?>>Desember</option>
                                                </select>
                                                <select class='input-sm' name='mingguke[]' style='width:75px' required>
                                                    <option value='' disabled selected>Minggu Ke-</option>
                                                    <option value='1' <?php if($value['mingguke'] == "1"){ echo "selected"; } ?>>1</option>
                                                    <option value='2' <?php if($value['mingguke'] == "2"){ echo "selected"; } ?>>2</option>
                                                    <option value='3' <?php if($value['mingguke'] == "3"){ echo "selected"; } ?>>3</option>
                                                    <option value='4' <?php if($value['mingguke'] == "4"){ echo "selected"; } ?>>4</option>
                                                    <option value='1,2' <?php if($value['mingguke'] == "1,2"){ echo "selected"; } ?>>1 2</option>
                                                    <option value='1,3' <?php if($value['mingguke'] == "1,3"){ echo "selected"; } ?>>1 3</option>
                                                    <option value='1,4' <?php if($value['mingguke'] == "1,4"){ echo "selected"; } ?>>1 4</option>
                                                    <option value='2,3' <?php if($value['mingguke'] == "2,3"){ echo "selected"; } ?>>2 3</option>
                                                    <option value='2,4' <?php if($value['mingguke'] == "2,4"){ echo "selected"; } ?>>2 4</option>
                                                    <option value='1,2,3' <?php if($value['mingguke'] == "1,2,3"){ echo "selected"; } ?>>1 2 3</option>
                                                    <option value='1,2,4' <?php if($value['mingguke'] == "1,2,4"){ echo "selected"; } ?>>1 2 4</option>
                                                    <option value='2,3,4' <?php if($value['mingguke'] == "2,3,4"){ echo "selected"; } ?>>2 3 4</option>
                                                    <option value='1,2,3,4' <?php if($value['mingguke'] == "1,2,3,4"){ echo "selected"; } ?>>1 2 3 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class='input-sm select2' name='no_scan[]' style='width:300px' required>
                                                    <option value='' disabled selected></option>
                                                    <?php $dept = $user['dept']; $queryMakar = $this->db->query("SELECT * FROM tbl_makar")->result_array(); ?>
                                                    <?php foreach ($queryMakar as $dm) : ?>
                                                        <option value='<?= $dm['no_scan'] ?>' <?php if($value['no_scan'] == $dm['no_scan']){ echo "selected"; } ?>><?= $dm['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <a href='<?= base_url(); ?>Training/hapus/<?= $value['id']; ?>'>Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><center>Diajukan Oleh :</center></th>
                                            <th><center>Diketahui Oleh :</center></th>
                                            <th><center>Disetujui Oleh :</center></th>
                                        </tr>
                                        <tr>
                                            <th><input class="form-control input-sm" type="text" name="diajukan_oleh_nama" value="<?= $value['diajukan_oleh_nama']; ?>" placeholder="Nama yg mengajukan" required></th>
                                            <th><input class="form-control input-sm" type="text" name="diketahui_oleh_nama" value="<?= $value['diketahui_oleh_nama']; ?>" placeholder="Nama yg mengetahui" required></th>
                                            <th><input class="form-control input-sm" type="text" name="disetujui_oleh_nama" value="<?= $value['disetujui_oleh_nama']; ?>" placeholder="Nama yg menyetujui" required></th>
                                        </tr>
                                        <tr>
                                            <th><input class="form-control input-sm" type="text" name="diajukan_oleh_jabatan" value="<?= $value['diajukan_oleh_jabatan']; ?>" placeholder="Jabatan yg mengajukan" required></th>
                                            <th><input class="form-control input-sm" type="text" name="diketahui_oleh_jabatan" value="<?= $value['diketahui_oleh_jabatan']; ?>" placeholder="Jabatan yg mengetahui" required></th>
                                            <th><input class="form-control input-sm" type="text" name="disetujui_oleh_jabatan" value="<?= $value['disetujui_oleh_jabatan']; ?>" placeholder="Jabatan yg menyetujui" required></th>
                                        </tr>
                                        <tr>
                                            <th><input class="form-control input-sm" type="date" name="diajukan_oleh_tanggal" value="<?= $value['diajukan_oleh_tanggal']; ?>" readonly></th>
                                            <th><input class="form-control input-sm" type="date" name="diketahui_oleh_tanggal" value="<?= $value['diketahui_oleh_tanggal']; ?>" ></th>
                                            <th><input class="form-control input-sm" type="date" name="disetujui_oleh_tanggal" value="<?= $value['disetujui_oleh_tanggal']; ?>"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <?php if($indexAll == "all") : ?>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm" disabled title="tidak bisa melakukan perubahan">Simpan Perubahan</button>
                                <a href="<?= base_url(); ?>Training/index_all" class="btn btn-default btn-sm">Kembali</a>
                            <?php else : ?>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                                <a href="<?= base_url(); ?>Training" class="btn btn-default btn-sm">Kembali</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
