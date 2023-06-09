<section id="main-content">
    <section class="wrapper">
        <h5><i class="fa fa-angle-right"></i> Training</h5>
        
        <div class="mb col-lg-12">
            <p>
                <a href="<?= base_url(); ?>Training/pelatihan" class="btn btn-primary btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Buat TNA</a>
                <a href="<?= base_url(); ?>Training" class="btn btn-default btn-sm"><i class=" fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
            </p>
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped table-condensed" id="table-list-pelatihan">
                        <thead>
                            <tr>
                                <th>Kode Training</th>
                                <th>Topik Training</th>
                                <th>Dept</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                $query = $this->db->query("SELECT a.id,
                                                                    a.diajukan_oleh_tanggal,
                                                                    a.id_training,
                                                                    a.dept,
                                                                    c.nama_training 
                                                                FROM
                                                                    training_needs_analiysis a
                                                                    LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan
                                                                    LEFT JOIN ( SELECT * FROM training c ) c ON c.id = a.id_training")->result_array(); 
                            ?>
                            <?php foreach($query AS $result) : ?>
                            <tr>
                                <td>
                                    TRN<?php echo sprintf("%04d", $result['id_training']); ?>
                                </td>
                                <td>
                                    <?= $result['nama_training']; ?>
                                </td>
                                <td>
                                    <?= $result['dept']; ?>
                                </td>
                                <td>
                                    <?= $result['diajukan_oleh_tanggal']; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>Training/viewEdit/<?= $result['diajukan_oleh_tanggal']; ?>/<?= $result['dept']; ?>/all" style="text-decoration: underline;" title="Lihat data"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>