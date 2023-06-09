            <div class="col-sm-9">
                <div class="showback">
                    <h4><i class="fa fa-angle-right"></i> Log History</h4>
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <a href="<?= base_url('history/login'); ?>" class="btn btn-theme01">Login</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/logout'); ?>" class="btn btn-theme">Logout</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/new_employee1'); ?>" class="btn btn-theme">New employee 1</a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= base_url('history/new_employee2'); ?>" class="btn btn-theme">New employee 2</a>
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
                    <?php if($user['role_id'] != 1) : ?>
                    <div class="container">
                        <div class="col-lg-4 col-lg-offset-4">
                            <div class="lock-screen">
                                <h4><img src="<?= base_url() ?>img/unlock-icon.png"></h4>
                                <p>LOCKED</p>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="row mt">
                        <div class="col-lg-12">
                            <h4><i class="fa fa-angle-right"></i> Log Login</h4>
                            <div class="content-panel">
                                <div class="adv-table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-h-login">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Nama Departemen</th>
                                                <th>Ip Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- CLASS GRADE gradeC, gradeA, gradeU, gradeX -->
                                            <?php
                                            $log = "SELECT * FROM log_login";
                                            $dataLog = $this->db->query($log)->result_array();
                                            ?>
                                            <?php foreach ($dataLog as $dl) : ?>
                                            <tr class="gradeX">
                                                <td><?= date('d F Y, H:i:s', $dl['date_login']);  ?></td>
                                                <td><?= $dl['username'] ?></td>
                                                <td><?= $dl['keterangan'] ?></td>
                                            </tr> <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
</section>
        