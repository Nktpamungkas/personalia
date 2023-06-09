<section id="main-content">
    <section class="wrapper">
        <h5><i class="fa fa-angle-right"></i> Training Program</h5>
        
        <div class="mb col-lg-12">
            <?php if($user['dept'] == "HRD" OR $user['dept'] == "GAC") : ?>
                <p>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Buat"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Buat Training Program</a>
                    <a href="<?= base_url(); ?>Training/index_training_program_all" class="btn btn-success btn-sm"><i class=" fa fa-eye"></i>&nbsp;&nbsp;Lihat semua data</a>
                    <!-- Modal -->
                    <div class="modal fade" id="Buat" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?= base_url(); ?>Training/training_program" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Silahkan pilih departemen.</h4>
                                    </div>
                                    <div class="modal-body">
                                        <select class='input-sm select2' name='dept' style='width:450px' required>
                                            <option value='' disabled selected></option>
                                            <option value='All'>All</option>
                                            <?php $queryTraining = $this->db->query("SELECT * FROM training_needs_analiysis GROUP BY dept")->result_array(); ?>
                                            <?php foreach ($queryTraining as $dt) : ?>
                                                <option value='<?= $dt['dept'] ?>'><?= $dt['dept'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label>*Note : Departemen tidak akan muncul jika belum mengisi Training Need Analysis</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Next</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </p>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped table-condensed" id="table-list-pelatihan">
                        <thead>
                            <tr>
                                <th>Kode Training</th>
                                <th>Topik Training</th>
                                <th>Dept</th>
                                <th>Tanggal Training</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                $query = $this->db->query("SELECT
                                a.id,
                                a.kode_training,
                                b.nama_training,
                                a.dept,
                                a.tanggal_training 
                            FROM
                                training_program a
                                JOIN ( SELECT * FROM training b ) b ON b.id = a.kode_training 
                            WHERE
                                a.dept LIKE '%$dept%' OR a.dept LIKE '%ALL%'")->result_array(); 
                            ?>
                            <?php foreach($query AS $result) : ?>
                            <tr>
                                <td>
                                    TRN<?php echo sprintf("%04d", $result['kode_training']); ?>
                                </td>
                                <td>
                                    <?= $result['nama_training']; ?>
                                </td>
                                <td>
                                    <?= $result['dept']; ?>
                                </td>
                                <td>
                                    <?= $result['tanggal_training']; ?>
                                </td>
                                <td>
                                    <?php if($user['dept'] == "HRD" OR $user['dept'] == "GAC") : ?>
                                        <a href="#" title="Lihat data" data-toggle="modal" data-target="#edit<?= $result['id']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                    <?php endif; ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= base_url(); ?>Training/edit_training_program" method="post">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Silahkan pilih departemen.</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Kode Training : TRN<?php echo sprintf("%04d", $result['kode_training']); ?></label>
                                                        <br>
                                                        <label>Nama Training : <?= $result['nama_training']; ?></label>
                                                        <br>
                                                        <label>Tanggal Training : 
                                                            <input type="date" class="form-control input-sm" value="<?= $result['tanggal_training']; ?>" name="tanggal_training" required>
                                                            <input type="hidden" value="<?= $result['id']; ?>" name="id">
                                                        </label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
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