<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Dashboard <i class="fa fa-angle-right"></i> Data Atasan Dept </h4>
        <div class="col-md-6">
            <p>
                <center>
                    <h4><b>DATA ATASAN DEPARTEMEN</b></h4>
                </center>
            </p>
        </div>
        <div class="modal fade" id="modalExportdept" tabindex="-1" role="dialog" aria-labelledby="modalResign"
            aria-hidden="true">
            <form action="" method="POST">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Detail Atasan Dept</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="control-label">Kode Dept</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <input type="hidden" class="form-control input-sm" name="id_dept"
                                                    id="id_dept">
                                                <input class="form-control input-sm" name="kode_dept" id="kode_dept"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control input-sm" name="dept_name" id="dept_name"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="control-label">Jabatan</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <select class="select2" data-placeholder="Pilih Satu Jabatan" name="jabatan"
                                            required style="width: 100%;">
                                            <option value="" disabled selected>
                                                ------------------------------------------------------------------------------------
                                            </option>
                                            <?php
											$code_d = $code_dept;										
											$queryJab = $this->db->where_not_in('golongan', ['BOD', 'Expat'])->get('golongan')->result_array();
											?>
                                            <?php foreach ($queryJab as $dj): ?>
                                            <option value="<?= $dj['golongan']; ?>" <?php if ($dj['golongan'] == set_value('golongan')) {
													  echo "SELECTED";
												  } ?>>
                                                <?= $dj['golongan']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo $code_d; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="control-label">Atasan 1</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <select class="select2" data-placeholder="Atasan 1" name="atasan1" id="atasan1"
                                            required style="width: 100%;">
                                            <option value="" disabled selected>
                                                ------------------------------------------------------------------------------------
                                            </option>
                                            <?php
											$queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 AND NOT status_karyawan = 'perubahan_status' and GOLONGAN not in ('OPERATOR', 'STAFF' , 'DRIVER','SECURITY','ADMIN','Specialist') ORDER BY nama")->result_array();
											?>
                                            <?php foreach ($queryShift as $dk): ?>
                                            <option value="<?= $dk['nama'] ?>" <?php if ($dk['nama'] == set_value('nama')) {
													  echo "SELECTED";
												  } ?>>
                                                <?= $dk['nama'] . ' - ' . $dk['dept'] . ' ' . $dk['jabatan']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="control-label">Atasan 2</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <select class="select2" data-placeholder="Atasan 2" name="atasan2" id="atasan2"
                                            required style="width: 100%;">
                                            <option value="" disabled selected>
                                                ------------------------------------------------------------------------------------
                                            </option>
                                            <?php
											$queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 AND NOT status_karyawan = 'perubahan_status' and GOLONGAN not in ('OPERATOR', 'STAFF' , 'DRIVER','SECURITY','ADMIN','Specialist') ORDER BY nama")->result_array();
											?>
                                            <?php foreach ($queryShift as $dk): ?>
                                            <option value="<?= $dk['nama'] ?>" <?php if ($dk['nama'] == set_value('nama')) {
													  echo "SELECTED";
												  } ?>>
                                                <?= $dk['nama'] . ' - ' . $dk['dept'] . ' ' . $dk['jabatan']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="control-label">Atasan 3</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <select class="select2" data-placeholder="Atasan 3" name="atasan3" id="atasan3"
                                            required style="width: 100%;">
                                            <option value="" disabled selected>
                                                ------------------------------------------------------------------------------------
                                            </option>
                                            <?php
											$kode_dept = $this->input->post('kode_dept');
											$queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 AND NOT status_karyawan = 'perubahan_status' and GOLONGAN not in ('OPERATOR', 'STAFF' , 'DRIVER','SECURITY','ADMIN','Specialist') ORDER BY nama")->result_array();
											?>
                                            <?php foreach ($queryShift as $dk): ?>
                                            <option value="<?= $dk['nama'] ?>" <?php if ($dk['nama'] == set_value('nama')) {
													  echo "SELECTED";
												  } ?>>
                                                <?= $dk['nama'] . ' - ' . $dk['dept'] . ' ' . $dk['jabatan']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mb col-sm-12">
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered"
                        id="table-pemohon">
                        <thead>
                            <tr>
                                <th width="25">ID DEPT</th>
                                <th width="125">KODE DEPT</th>
                                <th width="300">NAMA DEPT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$data = $this->db->query("SELECT * FROM dept where not code ='BOD' ORDER BY dept_name ASC;")->result_array();
							foreach ($data as $result): ?>
                            <tr class="gradey">
                                <td><?= $result['id'] ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modalExportdept"
                                        data-id="<?= $result['id'] ?>" data-code="<?= $result['code'] ?>"
                                        data-deptname="<?= $result['dept_name'] ?>">
                                        <?= $result['code'] ?>
                                    </a>

                                </td>
                                <td><?= $result['dept_name'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js">
</script>
<script>
$(document).ready(function() {

    $('.select2').select2();
    // Event listener for the link
    $('a[data-toggle="modal"]').on('click', function() {
        // Get data from data attributes
        var id = $(this).data('id');
        var code_dept = $(this).data('code');
        var dept_name = $(this).data('deptname'); // Change this line

        // Populate the modal inputs
        $('#id_dept').val(id);
        $('#kode_dept').val(code_dept);
        $('#dept_name').val(dept_name);

    });

});
</script>
