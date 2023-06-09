            <div class="col-sm-9">
                <p>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalTambah"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Tambah Daftar Training</a>
                    <!-- START MODAL TAMBAH DAFTAR TRAINING -->
                        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                            <form role="form" action="<?= base_url('Setting/materi_training_add/') . $user['dept'];  ?>" method="POST">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Daftar Training</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="control-label col-lg-12">Masukan Nama Training
                                                        <input type="text" class="form-control" name="nama_training">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <!-- END MODAL TAMBAH DAFTAR TRAINING -->
                </p>
                <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                <center><label style="font-size: 15px; color: Blue; font-weight: bold;">Daftar / List Nama Training</label></center>
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-list-training">
                        <thead>
                            <tr>
                                <th>Kode Training</th>
                                <th>Nama Training</th>
                                <th>Departement</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                $query = $this->db->query("SELECT * FROM training")->result_array(); 
                            ?>
                            <?php foreach($query AS $result) : ?>
                            <tr>
                                <td style="font-size: 12px;"><a href="#" style="text-decoration: underline;">TRN<?php echo sprintf("%04d", $result['id']); ?></a></td>
                                <td style="font-size: 12px;"><?= $result['nama_training']; ?></td>
                                <td style="font-size: 12px;"><?= $result['dept']; ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modalEdit<?= $result['id'] ?>" title="Edit"><i class="fa fa-edit"></i> </a>
                                    <!-- START MODAL EDIT -->
                                    <div class="modal fade" id="modalEdit<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                        <form role="form" action="<?= base_url('Setting/materi_training_edit/'). $user['dept']; ?>" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Nama Training</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label class="control-label">Masukan Nama Training<br>
                                                                    <input type="hidden" name="id" value="<?= $result['id']; ?>">
                                                                    <textarea class="form-control" name="nama_training" cols="70"><?= $result['nama_training']; ?></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    | 
                                    <a href="#" data-toggle="modal" data-target="#modalDelete" title="Delete"><i class="fa fa-trash"></i> </a>
                                    <!-- START MODAL DELETE -->
                                        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                            <form role="form" action="<?= base_url('setting/materi_training_delete');  ?>/<?= $result['id']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Apakah Anda yakin menghapus data ini ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <!-- END MODAL DELETE -->
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