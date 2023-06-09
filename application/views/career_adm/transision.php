<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Career Transition</h4>
        <div class="col-md-6">
            <p class="inline">
                <?php if($user['dept'] == "HRD" || $user['dept'] == "DIT") : ?>
                    <a href="<?= base_url('Career_adm/AddCareerTransition'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Career Transition</a></<a>
                    <a href="<?= base_url('Career_adm/ExportTransition'); ?>" class="btn btn-default btn-sm">Export to Excel</a>
                <?php endif; ?>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-index-discipline">
                        <thead>
                            <tr>
                                <th><i class="fa fa-gear"></i></th>
                                <th>No Scan</th>
                                <th>Nama</th>
                                <th>Proses</th>
                                <th>Tgl Efektif</th>
                                <th>Dept Lama</th>
                                <th>Dept Baru</th>
                                <th>Bagian Lama</th>
                                <th>Bagian Baru</th>
                                <th>Golongan Lama</th>
                                <th>Golongan Baru</th>
                                <th>Jabatan Lama</th>
                                <th>Jabatan Baru</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = $this->db->query("SELECT a.id as idcareer,a.*,b.* FROM career_transition a
                                                            LEFT JOIN ( SELECT * FROM tbl_makar b) b ON b.no_scan = a.no_scan
                                                            where not a.no_scan = '4780'")->result_array(); 
                                
                            ?>
                            <?php foreach($query AS $result) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('career_adm/EditCareerTransition/').$result['no_scan'] ?>"><i class=" fa fa-pencil"></i>&nbsp;&nbsp;Edit</a> <br>
                                    
                                    <a href="#" data-toggle="modal" data-target="#modalDelete<?= $result['idcareer'] ?>"><i class=" fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                    <div class="modal fade" id="modalDelete<?= $result['idcareer'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                        <form action="<?= base_url('career_adm/delete/') ?><?= $result['idcareer'] ?>" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Anda ingin menghapus data ini ? </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <b><?= $result['nama']; ?></b><?= $result['idcareer'] ?>
                                                        </center>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td><?= $result['no_scan']; ?></td>
                                <td><?= $result['nama']; ?></td>
                                <td><?= $result['proses']; ?></td>
                                <td><?= $result['tgl_efektif']; ?></td>
                                <td><?= $result['dept_lama']; ?></td>
                                <td><?= $result['dept_baru']; ?></td>
                                <td><?= $result['bagian_lama']; ?></td>
                                <td><?= $result['bagian_baru']; ?></td>
                                <td><?= $result['golongan_lama']; ?></td>
                                <td><?= $result['golongan_baru']; ?></td>
                                <td><?= $result['jabatan_lama']; ?></td>
                                <td><?= $result['jabatan_baru']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>