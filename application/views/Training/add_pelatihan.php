 <script language="javascript">
    function tambahNama() {
        var idf = document.getElementById("idf").value;
        var stre = "<tr id='srow" + idf + "'><td><select class='input-sm select2' name='id_training[]' style='width:400px' required><option value=' ' disabled selected></option><?php $queryTraining = $this->db->query("SELECT * FROM training")->result_array(); ?><?php foreach ($queryTraining as $dt) : ?><option value='<?= $dt['id']; ?>'>TRN<?php echo sprintf("%04d", $dt['id']); ?> - <?= $dt['nama_training']; ?></option><?php endforeach; ?></select></td><td><select class='input-sm select2' name='level[]' style='width:100px' required><option value='' disabled selected></option><option value='Opr'>OPR</option><option value='GL'>GL</option><option value='Spv'>SPV</option><option value='GL, Opr'>GL + OPR</option><option value='Opr, Spv'>OPR + SPV</option><option value='Spv, GL'>SPV + GL</option><option value='Spv, Opr'>SPV + OPR</option><option value='Spv, GL, Opr'>SPV + GL + OPR</option></select><br></td><td><select class='input-sm select2' name='bulan[]' style='width:200px' required><option value='' disabled selected>Bulan</option><option value='Jan'>Januari</option><option value='Feb'>Februari</option><option value='Mar'>Maret</option><option value='Apr'>April</option><option value='Mei'>Mei</option><option value='Jun'>Juni</option><option value='Jul'>Juli</option><option value='Agt'>Agustus</option><option value='Sept'>September</option><option value='Okt'>Oktober</option><option value='Nov'>November</option><option value='Des'>Desember</option></select><select class='input-sm select2' name='mingguke[]' style='width:100px' required><option value='' disabled selected>Minggu Ke-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td><td><select class='input-sm select2' name='no_scan[]' style='width:300px' required><option value=' ' disabled selected></option><?php $queryMakar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif='1'")->result_array(); ?><?php foreach ($queryMakar as $dm) : ?><option value='<?= $dm['no_scan'] ?>'><?= $dm['nama'] ?></option><?php endforeach; ?></select></td><td><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></td></tr>";

        $("#divSite").append(stre);
        idf = (idf - 1) + 2;
        
        document.getElementById("idf").value = idf;

        $('.select2').select2()
    }

    function hapusElemen(idf) {
        $(idf).remove();
    }
</script>

<section id="main-content">
    <section class="wrapper">
    <h5><i class="fa fa-angle-right"></i><a href="<?= base_url('training'); ?>"> Training </a><i class="fa fa-angle-right"></i> <a href="<?= base_url('training/pelatihan'); ?>"> Ikut Pelatihan </a><i class="fa fa-angle-right"></i> Tambah peserta pelatihan</h5>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('Training/TambahTNA'); ?>/<?= $user['dept']; ?>" method="post">
                            <input id="idf" value="1" type="hidden">
                            <div class="adv-table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Training</th>
                                            <th>Level</th>
                                            <th><center>Rencana Pelaksanaan Kegiatan Pelatihan(Bulan/Minggu)</center></th>
                                            <!-- <th>Tanggal Pelatihan</th> -->
                                            <th>Nama Pelatih</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="divSite">
                                    
                                    </tbody>
                                </table>
                                <center>
                                    <button type="button" class="btn btn-default btn-xs" onclick="tambahNama(); return false;"><i class="fa fa-plus"></i></button>
                                </center>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><center>Diajukan Oleh :</center></th>
                                            <th><center>Diketahui Oleh :</center></th>
                                            <th><center>Disetujui Oleh :</center></th>
                                        </tr>
                                        <tr>
                                            <th><input class="form-control input-sm" type="text" name="diajukan_oleh_nama" placeholder="Nama yg mengajukan" required></th>
                                            <th><input class="form-control input-sm" type="text" name="diketahui_oleh_nama" placeholder="Nama yg mengetahui" required></th>
                                            <th><input class="form-control input-sm" type="text" name="disetujui_oleh_nama" placeholder="Nama yg menyetujui" required></th>
                                        </tr>
                                        <tr>
                                            <th><input class="form-control input-sm" type="text" name="diajukan_oleh_jabatan" placeholder="Jabatan yg mengajukan" required></th>
                                            <th><input class="form-control input-sm" type="text" name="diketahui_oleh_jabatan" placeholder="Jabatan yg mengetahui" required></th>
                                            <th><input class="form-control input-sm" type="text" name="disetujui_oleh_jabatan" placeholder="Jabatan yg menyetujui" required></th>
                                        </tr>
                                        <tr>
                                            <th><input class="form-control input-sm" type="date" name="diajukan_oleh_tanggal" required></th>
                                            <th><input class="form-control input-sm" type="date" name="diketahui_oleh_tanggal" required></th>
                                            <th><input class="form-control input-sm" type="date" name="disetujui_oleh_tanggal" required></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
                            <a href="<?= base_url(); ?>Training" class="btn btn-default btn-sm">Kembali</a>
                        </form>
                </div>
            </div>
        </div>
    </section>
</section>

