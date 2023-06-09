<script language="javascript">
    function tambahNama() {
        var idf = document.getElementById("idf").value;
        var stre = "<tr id='srow" + idf + "'><td><select class='input-sm select2' name='id_training[]' style='width:400px' required><option value='' disabled selected></option><?php $queryTraining = $this->db->query("SELECT a.id_training, SUBSTRING( b.nama_training, 1, 60 ) AS nama_training, a.level, a.bulan, a.mingguke FROM training_needs_analiysis a JOIN ( SELECT * FROM training b) b ON b.id = a.id_training WHERE a.dept = '$dept'ORDER BY a.id_training")->result_array(); ?><?php foreach ($queryTraining as $dt) : ?><option value='<?= $dt['id_training'] ?>'>TR<?php echo sprintf("%04d", $dt['id_training']); ?> - <?= $dt['nama_training'] ?>...(<?= $dt['level'] ?>) <?= $dt['bulan'] ?>  <?= $dt['mingguke'] ?></option><?php endforeach; ?></select></td><td><input type='date' name='tanggal_training[]' class='form-control input-sm'></td><td><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></td></tr>";

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
        <h5><i class="fa fa-angle-right"></i><a href="<?= base_url('training/index_training_program'); ?>"> Training Program</a> <i class="fa fa-angle-right"></i> Buat Training Program</h5>

        <!-- FORM VALIDATION -->
        <div class="row">
            <div class="col-md-8">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('Training/TambahTP'); ?>" method="post">
                            <input type="text" class="form-control input-sm" name="dept" value="<?= $dept; ?>" readonly>
                            <input id="idf" value="1" type="hidden">
                            <div class="adv-table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Training</th>
                                            <th>Tanggal Training</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="divSite">
                                    
                                    </tbody>
                                </table>
                                <center>
                                    <button type="button" class="btn btn-default btn-xs" onclick="tambahNama(); return false;"><i class="fa fa-plus"></i></button>
                                </center>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
                            <a href="<?= base_url(); ?>Training/index_training_program" class="btn btn-default btn-sm">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-panel">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped table-condensed" id="table-list-pelatihan">
                            <thead>
                                <tr>
                                    <th><label style="font-size: 10px;">Topik Training</label></th>
                                    <th><label style="font-size: 10px;">Dept</label></th>
                                    <th><label style="font-size: 10px;">Tanggal Training</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $dept = $user['dept'];
                                    $query = $this->db->query("SELECT a.id, a.kode_training, b.nama_training, a.dept, a.tanggal_training
                                                                    FROM training_program a
                                                                JOIN (SELECT * FROM training b ) b ON b.id = a.kode_training 
                                                                WHERE a.dept = '$dept'
                                                                ORDER BY a.tanggal_training DESC")->result_array(); 
                                ?>
                                <?php foreach($query AS $result) : ?>
                                <tr>
                                    <td>
                                        <label style="font-size: 10px;"><?= $result['nama_training']; ?></label>
                                    </td>
                                    <td>
                                        <label style="font-size: 10px;"><?= $result['dept']; ?></label>
                                    </td>
                                    <td>
                                        <label style="font-size: 10px;"><?= $result['tanggal_training']; ?></label>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
</section>

