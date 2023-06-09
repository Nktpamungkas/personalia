<section id="main-content">
    <section class="wrapper">
        <h5><i class="fa fa-angle-right"></i> Training</h5>
        
        <div class="mb col-lg-12">
            <p>
                <a href="<?= base_url(); ?>Training/pelatihan" class="btn btn-primary btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Buat TNA</a>
                <?php if($user['dept'] == "HRD" OR $user['dept'] == "GAC" OR $user['dept'] == "DIT") : ?>
                    <a href="<?= base_url(); ?>Training/index_all" class="btn btn-success btn-sm"><i class=" fa fa-eye"></i>&nbsp;&nbsp;Lihat semua data</a>
                <?php endif; ?>
            </p>
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped table-condensed" id="table-list-pelatihan">
                        <thead>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <th>Dept</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                $query = $this->db->query("SELECT a.id, a.diajukan_oleh_tanggal, a.id_training, a.dept, c.nama_training FROM training_needs_analiysis a
                                                            LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan 
                                                            LEFT JOIN (SELECT * FROM training c) c ON c.id = a.id_training
                                                            WHERE a.dept = '$dept'
                                                            GROUP BY a.diajukan_oleh_tanggal")->result_array(); 
                            ?>
                            <?php foreach($query AS $result) : ?>
                            <tr>
                                <td>
                                    <?= $result['diajukan_oleh_tanggal']; ?>
                                </td>
                                <td>
                                    <?= $result['dept']; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>Training/viewEdit/<?= $result['diajukan_oleh_tanggal']; ?>/<?= $result['dept']; ?>" style="text-decoration: underline;" title="Lihat data"><i class="fa fa-eye"></i></a>

                                    <a href="<?= base_url(); ?>Training/print_fakp/<?= $result['diajukan_oleh_tanggal']; ?>/<?= $user['dept']; ?>" style="text-decoration: underline;" title="Print Formulir Analisis Kebutuhan Pelatihan"><i class="fa fa-print"></i></a>
                                    
                                    <a href="<?= base_url(); ?>Training/print_pelatih/<?= $result['diajukan_oleh_tanggal']; ?>/<?= $user['dept']; ?>" style="text-decoration: underline;" title="Print Daftar Usulan Pelatih"><i class="fa fa-print"></i></a>

                                    <a href="#" style="text-decoration: underline;" data-toggle="modal" data-target="#Hapus<?= $result['diajukan_oleh_tanggal']; ?>" title="Hapus Formulir Analisis Kebutuhan Pelatihan"><i class="fa fa-trash"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="Hapus<?= $result['diajukan_oleh_tanggal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= base_url(); ?>Training/deleteTNA/<?= $result['diajukan_oleh_tanggal']; ?>/<?= $user['dept']; ?>" method="post">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Anda Yakin Menghapus Data ini ?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <b>Tanggal Pengajuan Training : </b> <?= $result['diajukan_oleh_tanggal']; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit" class="btn btn-danger">Hapus TNA</button>
                                                    </div>
                                                </form>
                                                <!-- <center>SEDANG DALAM PROSES PERBAIKAN SISTEM.<br> HUBUNGI DIT 859 - NILO.</center> -->
                                            </div>
                                        </div>
                                    </div>
                                    
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