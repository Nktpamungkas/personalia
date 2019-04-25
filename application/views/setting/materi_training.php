            <div class="col-sm-9">
                <p><a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Materi Training</a></p>
                <p><?= $this->session->flashdata('message'); ?></p>
                <!-- Modal Add-->
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd">
                    <form role="form" action="<?= base_url('setting/materi_training_add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title">Add new materi training</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('kode'); ?>" name="kode" type="text" required autofocus> 
                                        <br>
                                        <label>Materi Training (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('materi_training'); ?>" name="materi_training" type="text" required > 
                                        <br>
                                        <label>Jenis Training (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('jenis_training'); ?>" name="jenis_training" type="text" required > 
                                        <br>
                                        <label>Penyelenggara (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('penyelenggara'); ?>" name="penyelenggara" type="text" required > 
                                        <br>
                                        <label>Tempat (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('tempat'); ?>" name="tempat" type="text" required > 
                                        <br>
                                        <label>Sertifikat (Wajib)</label>
                                        <select class="form-control" name="sertifikat" required>
                                            <option value="" disabled selected>Select Sertifikat</option>
                                            <?php
                                                $querySertifikat = $this->db->get('sertifikat')->result_array();
                                            ?>
                                            <?php foreach ($querySertifikat as $ds) : ?>
                                                <option value="<?= $ds['sertifikat'] ?>" <?php if ($ds['sertifikat'] == set_value('sertifikat')) {
                                                    echo "SELECTED";
                                                } ?>><?= $ds['sertifikat'] ?></option>
                                            <?php endforeach ?>
                                        </select>
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
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                            <thead>
                                <tr>
                                    <th widht="75">Kode</th>
                                    <th widht="150">Materi Training</th>
                                    <th widht="100">Jenis Training</th>
                                    <th widht="150">Penyelenggara</th>
                                    <th widht="100">Tempat</th>
                                    <th widht="175">Sertifikat</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                                    
                            </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_training();   //pemanggilan fungsi tampil employee.
         
        $('#mydata').dataTable();
          
        //fungsi tampil employee
        function tampil_data_training(){
            $.ajax({
                type  : 'ajax',
                url   : '<?= base_url()?>setting/data_training',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i = 0; i < data.length; i++){
                        html += '<tr class="gradeX">'+
                                '<td>'+data[i].kode+'</td>'+
                                '<td>'+data[i].materi_training+'</td>'+
                                '<td>'+data[i].jenis_training+'</td>'+
                                '<td>'+data[i].penyelenggara+'</td>'+
                                '<td>'+data[i].tempat+'</td>'+
                                '<td>'+data[i].sertifikat+'</td>'+
                                `<td><a href="#" data-toggle="modal" data-target="#modalEdit`+data[i].id+`"><i class="fa fa-edit"></i>Edit</a>
                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="modalEdit`+data[i].id+`" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                            <form role="form" action="<?= base_url('setting/materi_training_edit/') . $user['name']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="modal-title">Edit Materi Training</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input value="`+data[i].id+`" name="id" type="hidden">
                                                            <label class="">Kode (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="`+data[i].kode+`" name="jabatan" type="text" readonly>
                                                            <br><br>
                                                            <label class="">Materi Training (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="`+data[i].materi_training+`" name="materi_training" type="text" autofocus required>
                                                            <br><br>
                                                            <label class="">Jenis Training (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="`+data[i].jenis_training+`" name="jenis_training" type="text" required>
                                                            <br><br>
                                                            <label class="">Penyelenggara (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="`+data[i].penyelenggara+`" name="penyelenggara" type="text" required>
                                                            <br><br>
                                                            <label class="">Tempat (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="`+data[i].tempat+`" name="tempat" type="text" required>
                                                            <br><br>
                                                            <label class="">Sertifikat (Wajib)</label><br>
                                                            <select class="form-control input-sm" name="sertifikat" required>
                                                                <option value="" disabled selected>Select Sertifikat</option>
                                                                <?php
                                                                    $querySertifikat = $this->db->get('sertifikat')->result_array();
                                                                ?>
                                                                <?php foreach ($querySertifikat as $ds) : ?>
                                                                    <option value="<?= $ds['sertifikat'] ?>" <?php if ($ds['sertifikat'] == ' ?> `+data[i].sertifikat+` <?php ') ?> <?php {
                                                                        echo "SELECTED";
                                                                    } ?>><?= $ds['sertifikat'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
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
                                        <a href="#" data-toggle="modal" data-target="#modalDelete`+data[i].id+`"><i class="fa fa-trash"></i>Delete</a>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="modalDelete`+data[i].id+`" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                                            <form role="form" action="<?= base_url('setting/materi_training_delete/') . $user['name'];  ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                        </div>
                                                        <input value="`+data[i].id+`" name="id" type="hidden">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </td>`
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

    });
</script> 