<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Employee Information | Data seragam </h4>
        <div class="col-md-6">
            <p>
                <?php if ($user['dept'] == "HRD") : ?>
                    <a href="<?= base_url('Data_karyawan/ExportSeragam'); ?>" class="btn btn-default btn-sm">Export to Excel</a>
                <?php endif; ?>
                <form method="post" action="<?= base_url('Data_karyawan/updateseragam'); ?>">
                    <span>Status Edit Ukuran Seragam:</span>
                    <select name="disabled_ub" class="select2">
                        <option value="" disabled selected>----------------------------</option>
                        <?php $queryUb = $this->db->get('disabled_ub')->result_array(); ?>
                        <?php foreach ($queryUb as $dr) : ?>
                            <option value="<?= $dr['deskripsi'] ?>" <?php if ($dr['deskripsi'] == set_value('deskripsi')) { echo "SELECTED"; } ?>><?= $dr['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="status" placeholder="disabled ub" required>
                    <input class="btn btn-info btn-sm" type="submit" value="Submit">
                </form>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Scan</th>
                                <th>Nama Karyawan</th>
                                <th>Jenis Kelamin</th>
                                <th>Department</th>
                                <th>Bagian</th>
                                <th>Jabatan</th>
                                <th style="font-size: 10px; text-align: center;">Uk. Baju Polo</th>
                                <th style="font-size: 10px; text-align: center;">Uk. Baju T-Shirt</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        
                        </tbody>
                    </table>
                    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
                    <script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
                    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            tampil_data_employee();   //pemanggilan fungsi tampil employee.
                            
                            $('#mydata').dataTable({
                                "aoColumnDefs": [{
                                "bSortable": true,
                                "aTargets": [0]
                                }],
                                "aaSorting": [
                                    [2, 'asc']
                                ]
                            });
                            
                            //fungsi tampil employee
                            function tampil_data_employee() {
								$.ajax({
									type: 'GET',
									url: '<?= base_url()?>data_karyawan/data_employee_seragam/<?= $user['dept']; ?>',
									async: false,
									dataType: 'json',
									success: function(data) {
										console.log("AJAX call success:", data); // Debugging line
										var html = '';
										var no = 1;
										for (var i = 0; i < data.length; i++) {
											var disabledAttribute = data[i].disabled_ub === 'disabled' ? 'disabled' : '';
											html += '<tr class="gradeX">' +
												'<td>' + no++ + '</td>' +
												'<td>' + data[i].no_scan + '</td>' +
												'<td>' + data[i].nama + '</td>' +
												'<td>' + data[i].jenis_kelamin + '</td>' +
												'<td>' + data[i].dept + '</td>' +
												'<td>' + data[i].bagian + '</td>' +
												'<td>' + data[i].jabatan + '</td>' +
												'<td>' + data[i].ukuran_baju_polo + '</td>' +
												'<td>' + data[i].ukuran_baju_shirt + '</td>' +
												'<td>' +
													'<a href="#" data-toggle="modal" data-target="#modalSeragam' + data[i].no_scan + '"><i class="fa fa-pencil"></i> Masukan Ukuran Seragam</a>' +
													'<div class="modal fade" id="modalSeragam' + data[i].no_scan + '" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">' +
														'<form role="form" action="<?= base_url('data_karyawan/addseragam'); ?>" method="POST">' +
															'<div class="modal-dialog">' +
																'<div class="modal-content">' +
																	'<div class="modal-header">' +
																		'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
																		'<h4 class="modal-title"><i class="fa fa-users"></i> Ukuran Seragam</h4>' +
																	'</div>' +
																	'<div class="modal-body">' +
																		'<div class="row">' +
																			'<div class="col-lg-6">' +
																				'<label class="control-label col-lg-12">Masukan Ukuran Seragam Polo</label>' +
																			'</div>' +
																			'<div class="col-lg-6">' +
																				'<input value="' + data[i].no_scan + '" name="no_scan" type="hidden">' +
																				'<select class="form-control input-sm" name="ukuran_baju_polo" required ' + disabledAttribute + '>' +
																					'<option value="" disabled selected>---------------------------------------------------</option>' +
																					<?php $querypolo = $this->db->get('ukuran')->result_array(); ?>
																					<?php foreach ($querypolo as $dsp) : ?>
																						'<option value="<?= $dsp['ukuran'] ?>"' +
																						(data[i].ukuran_baju_polo == '<?= $dsp['ukuran'] ?>' ? 'selected' : '') +
																						'><?= $dsp['ukuran'] ?></option>' +
																					<?php endforeach; ?>
																				'</select>' +
																			'</div>' +
																			'<div class="col-lg-6">' +
																				'<label class="control-label col-lg-12">Masukan Ukuran Seragam T-Shirt</label>' +
																			'</div>' +
																			'<div class="col-lg-6">' +
																				'<select class="form-control input-sm" name="ukuran_baju_shirt" required ' + disabledAttribute + '>' +
																					'<option value="" disabled selected>---------------------------------------------------</option>' +
																					<?php $queryshirt = $this->db->get('ukuran')->result_array(); ?>
																					<?php foreach ($queryshirt as $dsh) : ?>
																						'<option value="<?= $dsh['ukuran'] ?>"' +
																						(data[i].ukuran_baju_shirt == '<?= $dsh['ukuran'] ?>' ? 'selected' : '') +
																						'><?= $dsh['ukuran'] ?></option>' +
																					<?php endforeach; ?>
																				'</select>' +
																			'</div>' +
																		'</div>' +
																	'</div>' +
																	'<div class="modal-footer">' +
																		'<label style="font-size:11px;">*Catatan: Perubahan ukuran baju hanya bisa dilakukan oleh HRD. Silahkan hubungi departemen terkait.</label><br>' +
																		'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
																		'<button type="submit" class="btn btn-primary" ' + disabledAttribute + '>Save changes</button>' +
																	'</div>' +
																'</div>' +
															'</div>' +
														'</form>' +
													'</div>' +
												'</td>' +
											'</tr>';
										}
										$('#show_data').html(html);
									},
									error: function(xhr, status, error) {
										console.error("AJAX call error:", status, error); // Log any error
									}
								});
							}
                        });
                    </script> 
                    <!-- <label>*Note : Klik nama karyawan untuk membuat <b>PERJANJIAN KERJA WAKTU TERTENTU</b></label> -->
                </div>
            </div>
        </div>
    </section>
</section>
