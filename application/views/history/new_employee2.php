            <div class="col-sm-9">
                <div class="showback">
                    <h4><i class="fa fa-angle-right"></i> Log History</h4>
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <a href="<?= base_url('history/login'); ?>" class="btn btn-theme">Login</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/logout'); ?>" class="btn btn-theme">Logout</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/new_employee1'); ?>" class="btn btn-theme">New employee 1</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/new_employee2'); ?>" class="btn btn-theme01">New employee 2</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/update_employee'); ?>" class="btn btn-theme">Update employee</a>
                        </div>
                    </div>
                    <br>
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <a href="<?= base_url('history/delete_employee'); ?>" class="btn btn-theme">Delete employee</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/resign'); ?>" class="btn btn-theme">Resign</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/new_training'); ?>" class="btn btn-theme">New training</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/update_training'); ?>" class="btn btn-theme">Update training</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/delete_training'); ?>" class="btn btn-theme">Delete training</a>
                        </div>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------ -->
                    <div class="row mt">
                        <div class="col-lg-12">
                            <h4><i class="fa fa-angle-right"></i> Log New Employee 1</h4>
                            <div class="content-panel">
                                <div class="adv-table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>No Scan</th>
                                                <th>Date</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- CLASS GRADE gradeC, gradeA, gradeU, gradeX -->
                                            <?php
                                            $log = "SELECT * FROM log_new_employee_2 ORDER BY id DESC";
                                            $dataLog = $this->db->query($log)->result_array();
                                            $no = 1;
                                            ?>
                                            <?php foreach ($dataLog as $dl) : ?>
                                            <tr class="gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= $dl['username'] ?></td>
                                                <td><?= $dl['no_scan'] ?></td>
                                                <td><?= date('H:i:s, d F Y', $dl['tgl']); ?></td>
                                                <td><?= $dl['keterangan'] ?></td>
                                            </tr> <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>