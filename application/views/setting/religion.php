            <div class="col-sm-9">
                <p><a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Religion</a></p>
                <p><?= $this->session->flashdata('message'); ?></p>
                <!-- Modal Add-->
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd">
                    <form role="form" action="<?= base_url('setting/religion_add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title">Add new religion</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Religion (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('religion'); ?>" name="religion" type="text" required autofocus> 
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
                                    <th widht="250">Religion</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CLASS GRADE gradeC, gradeA, gradeU, gradeX -->
                                <?php
                                $queryReligion = "SELECT * FROM religion ORDER by id ASC";
                                $dataReligion = $this->db->query($queryReligion)->result_array();
                                ?>
                                <?php foreach ($dataReligion as $dr) : ?>
                                <tr class="gradeX">
                                    <td><?= $dr['religion'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#modalEdit<?= $dr['id']; ?>"><i class="fa fa-edit"></i>Edit</a>
                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="modalEdit<?= $dr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                            <form role="form" action="<?= base_url('setting/religion_edit/') . $user['name']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="modal-title">Edit religion</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input value="<?= $dr['id']; ?>" name="id" type="hidden">
                                                            <label class="">Religion (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="<?= $dr['religion']; ?>" name="religion" type="text">
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
                                        <a href="#" data-toggle="modal" data-target="#modalDelete<?= $dr['id']; ?>"><i class="fa fa-trash"></i>Delete</a>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="modalDelete<?= $dr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                                            <form role="form" action="<?= base_url('setting/religion_delete/') . $user['name'];  ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                        </div>
                                                        <input value="<?= $dr['id']; ?>" name="id" type="hidden">
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
                                <?php endforeach; ?> 
                            </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>