            <div class="col-sm-9">
                <p><a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Alamat</a></p>
                <p><?= $this->session->flashdata('message'); ?></p>
                <!-- Modal Add-->
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd">
                    <form role="form" action="<?= base_url('setting/alamat_add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title">Add new alamat</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kecamatan (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('kecamatan'); ?>" name="kecamatan" type="text" required autofocus> 
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('kabupaten'); ?>" name="kabupaten" type="text" required> 
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('provinsi'); ?>" name="provinsi" type="text" required> 
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('kode_pos'); ?>" name="kode_pos" type="number" required> 
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
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="alamat">
                            <thead>
                                <tr>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Provinsi</th>
                                    <th>Kode Pos</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CLASS GRADE gradeC, gradeA, gradeU, gradeX -->
                                <?php
                                $queryAlamat = "SELECT * FROM kec_kab_pro ORDER BY kode ASC";
                                $dataAlamat = $this->db->query($queryAlamat)->result_array();
                                ?>
                                <?php foreach ($dataAlamat as $da) : ?>
                                <tr class="gradeX">
                                    <td><?= $da['provinsi'] ?></td>
                                    <td><?= $da['kabupaten'] ?></td>
                                    <td><?= $da['kecamatan'] ?></td>
                                    <td><?= $da['kode_pos'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#modalEdit<?= $da['kode']; ?>"><i class="fa fa-edit"></i>Edit</a>
                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="modalEdit<?= $da['kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                            <form role="form" action="<?= base_url('setting/alamat_edit/') . $user['name']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="modal-title">Edit Alamat</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input value="<?= $da['kode']; ?>" name="kode" type="hidden">
                                                            <label class="">Kabupaten (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="<?= $da['kabupaten']; ?>" name="kabupaten" type="text" autofocus required>
                                                            <input value="<?= $da['kode']; ?>" name="kode" type="hidden" >
                                                            <br><br>
                                                            <input value="<?= $da['kode']; ?>" name="kode" type="hidden">
                                                            <label class="">Kecamatan (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="<?= $da['kecamatan']; ?>" name="kecamatan" type="text" autofocus required>
                                                            <br><br>
                                                            <input value="<?= $da['kode']; ?>" name="kode" type="hidden">
                                                            <label class="">Provinsi (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="<?= $da['provinsi']; ?>" name="provinsi" type="text" autofocus required>
                                                            <br><br>
                                                            <input value="<?= $da['kode']; ?>" name="kode" type="hidden">
                                                            <label class="">Kode Pos (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="<?= $da['kode_pos']; ?>" name="kode_pos" type="text" autofocus required>
                                                            <br><br>
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
                                        <a href="#" data-toggle="modal" data-target="#modalDelete<?= $da['kode']; ?>"><i class="fa fa-trash"></i>Delete</a>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="modalDelete<?= $da['kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                                            <form role="form" action="<?= base_url('setting/alamat_delete/') . $user['name'];  ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                        </div>
                                                        <input value="<?= $da['kode']; ?>" name="kode" type="hidden">
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