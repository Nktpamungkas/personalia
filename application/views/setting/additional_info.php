            <div class="col-sm-9">
                <p><a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Additional Info</a></p>
                <p><?= $this->session->flashdata('message'); ?></p>
                <!-- Modal Add-->
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd">
                    <form role="form" action="<?= base_url('setting/add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title">Add new additional info</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('kode'); ?>" name="kode" type="text" required>
                                        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan (Wajib)</label>
                                        <input class="form-control input-sm" value="<?= set_value('jabatan'); ?>" name="jabatan" type="text" required>
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
                                        <th width="100">Kode</th>
                                        <th width="400">Jabatan</th>
                                        <th width="250">Option</th>
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
        tampil_data_additional_info();   //pemanggilan fungsi tampil additional info.
         
        $('#mydata').dataTable();
          
        //fungsi tampil employee
        function tampil_data_additional_info(){
            $.ajax({
                type  : 'ajax',
                url   : '<?= base_url()?>setting/data_additional_info',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i = 0; i < data.length; i++){
                        html += '<tr class="gradeX">'+
                                '<td>'+data[i].kode+'</td>'+
                                '<td>'+data[i].jabatan+'</td>'+
                                `<td><a href="#" data-toggle="modal" data-target="#modalEdit`+data[i].id+`"><i class="fa fa-edit"></i>Edit</a>
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="modalEdit`+data[i].id+`" tabindex="-1" role="dialog" aria-labelledby="modalEdit"">
                                        <form role="form" action="<?= base_url('setting/add_edit/') . $user['name']; ?>" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h3 class="modal-title">Edit additional info</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                            <label class="">Kode (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="`+data[i].kode+`" name="kode" type="text" required>
                                                            <br><br>
                                                            <label class="">Jabatan (Wajib)</label>
                                                            <input class="form-control input-sm" size="90" value="`+data[i].jabatan+`" name="jabatan" type="text" required>
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
                                        <form role="form" action="<?= base_url('setting/add_delete/') . $user['name'];  ?>" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                    </div>
                                                    <input class="form-control input-sm" value="`+data[i].kode+`" name="kode" type="hidden">
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