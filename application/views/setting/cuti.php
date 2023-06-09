            <div class="col-sm-9">
                <p><a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></p>
                <p><?= $this->session->flashdata('message'); ?></p>
                <!-- Modal Add-->
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd">
                    <form role="form" action="<?= base_url('setting/cuti_add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title">Tambah keterangan cuti</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Cuti</label>
                                        <input class="form-control input-sm" value="<?= set_value('kode_cuti'); ?>" name="kode_cuti" type="text" placeholder="Tidak diperbolehkan menggunakan 'spasi'." required autofocus> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nama Cuti</label>
                                        <input class="form-control input-sm" value="<?= set_value('nama_cuti'); ?>" name="nama_cuti" type="text" > 
                                    </div>
                                    <div class="form-group">
                                        <label>Lama Cuti</label>
                                        <input class="form-control input-sm" value="<?= set_value('lama_cuti'); ?>" name="lama_cuti" type="number"> 
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
                                    <th>No</th>
                                    <th>Kode Cuti</th>
                                    <th>Cuti</th>
                                    <th>Lama Cuti</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CLASS GRADE gradeC, gradeA, gradeU, gradeX -->
                                <?php
                                $queryCuti = "SELECT * FROM cuti ORDER BY id ASC";
                                $dataCuti = $this->db->query($queryCuti)->result_array();
                                $no = 1;
                                ?>
                                <?php foreach ($dataCuti as $dg) : ?>
                                <tr class="gradeX">
                                    <td><?= $no++ ?></td>
                                    <td><?= $dg['kode_cuti'] ?></td>
                                    <td><?= $dg['cuti'] ?></td>
                                    <td><?= $dg['lama_cuti'] ?> <?= $dg['days_or_month'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#modalEdit<?= $dg['id']; ?>"><i class="fa fa-edit"></i>Edit</a>
                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="modalEdit<?= $dg['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                            <form role="form" action="<?= base_url('setting/cuti_edit') ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="modal-title">Edit keterangan cuti</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Kode Cuti</label>
                                                                <input class="form-control input-sm" value="<?= $dg['id']; ?>" name="id" type="hidden"> 
                                                                <input class="form-control input-sm" value="<?= $dg['kode_cuti']; ?>" name="kode_cuti" type="text" readonly> 
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Nama Cuti</label>
                                                                <input class="form-control input-sm" value="<?= $dg['cuti']; ?>" name="nama_cuti" type="text"> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Lama Cuti</label>
                                                                <input class="form-control input-sm" value="<?= $dg['lama_cuti']; ?>" name="lama_cuti" type="number" > 
                                                            </div>
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
                                        <a href="#" data-toggle="modal" data-target="#modalDelete<?= $dg['id']; ?>"><i class="fa fa-trash"></i>Delete</a>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="modalDelete<?= $dg['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                                            <form role="form" action="<?= base_url('setting/cuti_delete');  ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                        </div>
                                                        <input value="<?= $dg['id']; ?>" name="id" type="hidden">
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