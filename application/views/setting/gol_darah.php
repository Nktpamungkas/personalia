            <div class="col-sm-9">
                <p><a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Golongan Darah</a></p>
                <p><?= $this->session->flashdata('message'); ?></p>
                <!-- Modal Add-->
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd">
                    <form role="form" action="<?= base_url('setting/gol_darah_add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title">Add new golongan darah</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Golongan Darah (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('gol_darah'); ?>" name="gol_darah" type="text" required autofocus> 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <section class="panel">
                    <div class="panel-body minimal">
                        <div class="table-inbox-wrap">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                            <thead>
                                <tr>
                                    <th width="75">No</th>
                                    <th width="500">Golongan Darah</th>
                                    <th width="">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CLASS GRADE gradeC, gradeA, gradeU, gradeX -->
                                <?php
                                $queryGolDar = "SELECT * FROM gol_darah ORDER BY id ASC";
                                $dataGolDar = $this->db->query($queryGolDar)->result_array();
                                $no = 1;
                                ?>
                                <?php foreach ($dataGolDar as $dgd) : ?>
                                <tr class="gradeX">
                                    <td><?= $no++ ?></td>
                                    <td><?= $dgd['gol_darah'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#modalEdit<?= $dgd['id']; ?>"><i class="fa fa-edit"></i>Edit</a>
                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="modalEdit<?= $dgd['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                            <form role="form" action="<?= base_url('setting/gol_darah_edit/') . $user['name']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="modal-title">Edit golongan darah</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                                <input value="<?= $dgd['id']; ?>" name="id" type="hidden">
                                                                <label class="">Golongan Darah (Wajib)</label>
                                                                <input class="form-control input-sm" size="90" value="<?= $dgd['gol_darah']; ?>" name="gol_darah" type="text" autofocus required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        |
                                        <a href="#" data-toggle="modal" data-target="#modalDelete<?= $dgd['id']; ?>"><i class="fa fa-trash"></i>Delete</a>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="modalDelete<?= $dgd['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                                            <form role="form" action="<?= base_url('setting/gol_darah_delete/') . $user['name'];  ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                        </div>
                                                        <input value="<?= $dgd['id']; ?>" name="id" type="hidden">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr> 
                                <?php endforeach; ?> </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>