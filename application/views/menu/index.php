            <div class="col-sm-9">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4><a href="<?= base_url('auth/registration'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;New Account</a></h4>
                        <?= $this->session->flashdata('message'); ?>
                        <hr>
                        <thead>
                            <tr>
                                <th><i class="fa fa-user"></i> Nama</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
                                <th><i class="fa fa-bookmark"></i> Department</th>
                                <th><i class=" fa fa-edit"></i> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $queryManagement = "SELECT * FROM user ORDER BY id ASC";
                        $dataManagement = $this->db->query($queryManagement)->result_array();
                        ?>
                        <?php foreach ($dataManagement as $dm) : ?>
                            <tr>
                                <td>
                                <a href="#"><img src="img/profile/<?= $dm['image']; ?>" class="img-circle" width="25" height="25"> &nbsp; <?= $dm['name']; ?></a>
                                </td>
                                <td class="hidden-phone">
                                <?php
                                    if ($dm['role_id'] == 1) {
                                        echo "Administrator";
                                    } elseif ($dm['role_id'] == 2) {
                                        echo "Manager";
                                    } elseif ($dm['role_id'] == 3) {
                                        echo "Ast. Manager";
                                    } elseif ($dm['role_id'] == 4)  {
                                        echo "Staf Only";
                                    } elseif ($dm['role_id'] == 5)  {
                                        echo "Staf Master";
                                    } else {
                                        echo "Admin Department";
                                    }
                                ?>
                                </td>
                                <td><?= $dm['dept']; ?></td>
                                <td><span class=""><?php
                                        if ($dm['is_active'] == 1) {
                                            echo '<a href=' . base_url('auth/nonActivated/') . $dm['id'] . ' class="label label-success label-mini">Activated</a>';
                                        } else {
                                            echo '<a href=' . base_url('auth/activated/') . $dm['id'] . ' class="label label-warning label-mini">Click here to Activated</a>';
                                        } ?></span></td>
                                <!-- <td>
                                <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>