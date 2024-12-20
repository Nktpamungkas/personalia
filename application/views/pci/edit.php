<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
	function searchsisacuti() {
		var _no_scan = document.getElementById('no_scan').value;
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1; //January is 0!
		var yyyy = today.getFullYear();
		if (dd < 10) {
			dd = '0' + dd
		}
		if (mm < 10) {
			mm = '0' + mm
		}
		today = yyyy + '-' + mm + '-' + dd;

		$.ajax({
			type: 'POST',
			url: '<?= base_url() . "pci/search_noscan" ?>/' + _no_scan,
			dataType: 'json',
			success: function (data) {
				document.getElementById('pemohon_nama').value = data[0].nama;
				document.getElementById('pemohon_jabatan').value = data[0].jabatan;
				if (data[0].status_karyawan === "Tetap") {
					const awal = new Date(data[0].periode_awal)
					var ye_awal = new Intl.DateTimeFormat('en', {
						year: 'numeric'
					}).format(awal)
					var mo_awal = new Intl.DateTimeFormat('en', {
						month: '2-digit'
					}).format(awal)
					var da_awal = new Intl.DateTimeFormat('en', {
						day: '2-digit'
					}).format(awal)

					const akhir = new Date(data[0].periode_akhir)
					var ye_akhir = new Intl.DateTimeFormat('en', {
						year: 'numeric'
					}).format(akhir)
					var mo_akhir = new Intl.DateTimeFormat('en', {
						month: '2-digit'
					}).format(akhir)
					var da_akhir = new Intl.DateTimeFormat('en', {
						day: '2-digit'
					}).format(akhir)

					if (ye_awal != ye_akhir) {
						var ye_akhir = yyyy + 1
					} else {
						var ye_akhir = yyyy
					}

					document.getElementById("tgl_mulai").setAttribute("min", yyyy + '-' + mo_awal + '-' +
						da_awal);
					document.getElementById("tgl_mulai").setAttribute("max", ye_akhir + '-' + mo_akhir + '-' +
						da_akhir);
					document.getElementById("tgl_selesai").setAttribute("min", yyyy + '-' + mo_awal + '-' +
						da_awal);
					document.getElementById("tgl_selesai").setAttribute("max", ye_akhir + '-' + mo_akhir + '-' +
						da_akhir);

					if (data[0].sisa_cuti) {
						document.getElementById('sisa_cuti').innerHTML = "Sisa cuti karyawan sebanyak <b>" +
							data[0].sisa_cuti + " Hari.</b> Periode pengambilan cuti yaitu bulan <b>" + data[0]
								.awal + "</b> s/d bulan <b>" + data[0].akhir +
							".</b> Diluar periode bulan yang sudah ditentukan, maka cuti tidak berlaku (ganti keterangan menjadi izin)."
					} else {
						document.getElementById('sisa_cuti').innerHTML =
							"Sisa cuti karyawan belum di update. Silahkan hubungi Departemen HRD/Personalia."
					}
				} else {
					document.getElementById("tgl_mulai").setAttribute("min", "");
					document.getElementById("tgl_mulai").setAttribute("max", "");
					document.getElementById("tgl_selesai").setAttribute("min", "");
					document.getElementById("tgl_selesai").setAttribute("max", "");
					document.getElementById('sisa_cuti').innerHTML = ""
				}
			}
		});
	}


	function searchsisacuti_disabled() {
		var _no_scan = document.getElementById('no_scan').value;
		$.ajax({
			type: 'POST',
			url: '<?= base_url() . "pci/search_noscan" ?>/' + _no_scan,
			dataType: 'json',
			success: function (data) {
				document.getElementById('pemohon_nama').value = data[0].nama;
				document.getElementById('pemohon_jabatan').value = data[0].jabatan;
			}
		});
	}

	$(document).ready(function () {
		$('#no_scan').change(function () {
			var ket = document.getElementById('ket').value;
			if (ket) {
				searchsisacuti();
			} else {
				alert("SILAHKAN ISI KETERANGAN TERLEBIH DAHULU.")
			}
		});

		$('#ket').change(function () {
			var _ket = document.getElementById('ket').value;

			$.ajax({
				type: 'POST',
				url: '<?= base_url() . "pci/search_cuti" ?>/' + _ket,
				dataType: 'json',
				success: function (data) {
					if (_ket == "Mangkir") {
						$('#disetujui_nama_1').attr('readonly', true);
						$('#disetujui_nama_2').attr('readonly', true);
						$('#mengetahui_nama').attr('readonly', true);
						$('#disetujui_jabatan_1').attr('readonly', true);
						$('#disetujui_jabatan_2').attr('readonly', true);
						$('#mengetahui_jabatan').attr('readonly', true);
						$('#tgl_diset_mengetehui').attr('readonly', true);
					} else {
						$('#disetujui_nama_1').removeAttr("readonly");
						$('#disetujui_nama_2').removeAttr("readonly");
						$('#mengetahui_nama').removeAttr("readonly");
						$('#disetujui_jabatan_1').removeAttr("readonly");
						$('#disetujui_jabatan_2').removeAttr("readonly");
						$('#mengetahui_jabatan').removeAttr("readonly");
						$('#tgl_diset_mengetehui').removeAttr("readonly");
					}
					if (_ket == "Cuti_Menikah") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti_Anak_Menikah") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti_Khitanan_Anak") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti_Istri_Melahirkan") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti_Baptis") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti_Keluarga_Meninggal") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti_Saudara_Meninggal") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti_KeluargaBesar_Meninggal") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Dispen_Hamil") {
						document.getElementById('lama_izin').value = data[0].lama_cuti;
						searchsisacuti_disabled();
					} else if (_ket == "Cuti") {
						document.getElementById('lama_izin').value = null;
						searchsisacuti();
					} else if (_ket == "Izin") {
						document.getElementById('lama_izin').value = null;
						searchsisacuti_disabled();
					} else if (_ket == "Sakit") {
						document.getElementById('lama_izin').value = null;
						searchsisacuti_disabled();
					} else if (_ket == "Mangkir") {
						document.getElementById('lama_izin').value = null;
						searchsisacuti_disabled();
					}
				}
			});
		});

		$('#tgl_mulai').change(function () {
			var _lama_izin = document.getElementById('lama_izin').value;
			var _days_or_month = document.getElementById('days_or_month').value;

			if (_lama_izin == 1) {
				if (_days_or_month == "Hari") {
					$('#tgl_selesai').attr('readonly', true);
					document.getElementById('tgl_selesai').value = document.getElementById('tgl_mulai')
						.value;
				} else {
					$('#tgl_selesai').removeAttr("readonly");
				}
			} else {
				$('#tgl_selesai').removeAttr("readonly");
			}
		});

		$('#lama_izin').change(function () {
			var _lama_izin = document.getElementById('lama_izin').value;
			var _days_or_month = document.getElementById('days_or_month').value;

			if (_lama_izin == 1) {
				if (_days_or_month == "Hari") {
					$('#tgl_selesai').attr('readonly', true);
					document.getElementById('tgl_selesai').value = document.getElementById('tgl_mulai')
						.value;
				} else {
					$('#tgl_selesai').removeAttr("readonly");
				}
			} else {
				$('#tgl_selesai').removeAttr("readonly");
			}
		});

		$('#days_or_month').change(function () {
			var _lama_izin = document.getElementById('lama_izin').value;
			var _days_or_month = document.getElementById('days_or_month').value;

			if (_lama_izin == 1) {
				if (_days_or_month == "Hari") {
					$('#tgl_selesai').attr('readonly', true);
					document.getElementById('tgl_selesai').value = document.getElementById('tgl_mulai')
						.value;
				} else {
					$('#tgl_selesai').removeAttr("readonly");
				}
			} else {
				$('#tgl_selesai').removeAttr("readonly");
			}
		});
	});
</script>
<section id="main-content">
	<section class="wrapper">
		<!-- FORM VALIDATION -->
		<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i><a href="<?= base_url('pci'); ?>"> Time Attendance </a><i
						class="fa fa-angle-right"></i> <a href="<?= base_url('pci'); ?>"> Form Izin Cuti </a><i
						class="fa fa-angle-right"></i> Add Form Izin Cuti</h4>
				<?= $this->session->flashdata('message'); ?>
				<div class="form-panel">
					<div class="form">
						<form class="cmxform form-horizontal style-form"
							action="<?= base_url('pci/edit/') . $user['dept']; ?>" method="post">
							<div class="form-group ">
								<label class="control-label col-lg-2">Kode Cuti</label>
								<div class="col-lg-10">
									<label class="control-label col-lg-4"><b>FIC-YYYYMMDD-XXXXXXX</b></label>
									<input type="hidden" name="id" value="<?= $dpci->id; ?>">
								</div>
							</div>
							<div class="form-group ">
								<label class="control-label col-lg-2">Keterangan</label>
								<div class="col-lg-2">
									<select name="ket" class="form-control input-sm" id="ket">
										<option value="" disabled selected>-Pilih Keterangan-</option>
										<?php
										$queryCuti = $this->db->query("SELECT * FROM cuti")->result_array();
										?>
										<?php foreach ($queryCuti as $dc): ?>
											<option value="<?= $dc['kode_cuti'] ?>" <?php if ($dc['kode_cuti'] == $dpci->ket) {
												  echo "SELECTED";
											  } ?>><?= $dc['cuti']; ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-lg-4">
									<label class="control-label col-lg-12" style="color: #26b72b;"><b><i>Note: *Cuti
												Khusus: tidak memotong cuti tahunan.</i></b></label>
								</div>
							</div>
							<div class="form-group ">
								<label class="control-label col-lg-2">NIP</label>
								<div class="col-lg-10">
									<input type="hidden" name="dept" value="<?= $user['dept']; ?>">
									<select class="form-control input-sm select2"
										data-placeholder="Pilih NIP Karyawan..." tabindex="2" name="no_scan"
										id="no_scan">
										<option value="" disabled selected></option>
										<?php
										$queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_aktif = 0 AND NOT status_karyawan = 'perubahan_status' ORDER BY nama")->result_array();
										?>
										<?php foreach ($queryShift as $dk): ?>
											<option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == $dpci->nip) {
												  echo "SELECTED";
											  } ?>><?= $dk['no_scan'] . ' - ' . $dk['nama']; ?></option>
										<?php endforeach ?>
									</select><br>
									<label class="control-label col-lg-12" style="color: red;" id="sisa_cuti"></label>
								</div>
							</div>
							<div class="form-group ">
								<label class="control-label col-lg-2">Personnel Penggati</label>
								<div class="col-lg-10">
									<select class="form-control input-sm select2"
										data-placeholder="Pilih Personnel Pengganti..." tabindex="2"
										name="pengganti_kerja" required>
										<option value="" disabled selected></option>
										<option value="-" <?php if ("-" == $dpci->pengganti_kerja) {
											echo "SELECTED";
										} ?>>-</option>
										<?php
										$queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' AND NOT status_karyawan = 'perubahan_status' ORDER BY nama")->result_array();
										?>
										<?php foreach ($queryShift as $dk): ?>
											<option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == $dpci->pengganti_kerja) {
												  echo "SELECTED";
											  } ?>>
												<?= $dk['no_scan'] . ' - ' . $dk['nama']; ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group ">
								<label class="control-label col-lg-2">Mulai Tanggal</label>
								<div class="col-lg-2">
									<input type="date" name="tgl_mulai" class="form-control input-sm" id="tgl_mulai"
										value="<?= $dpci->tgl_mulai; ?>" required>
								</div>
								<label class="control-label col-lg-2">Lama Izin/Cuti</label>
								<div class="col-lg-1">
									<input type="text" name="lama_izin" class="form-control input-sm" id="lama_izin"
										value="<?= $dpci->lama_izin; ?>" required>
								</div>
								<div class="col-lg-1">
									<select name="days_or_month" class="form-control input-sm" id="days_or_month">
										<option value="Hari" <?php if ("Hari" == $dpci->days_or_month) {
											echo "SELECTED";
										} ?>>Hari</option>
										<option value="Bulan" <?php if ("Bulan" == $dpci->days_or_month) {
											echo "SELECTED";
										} ?>>Bulan</option>
									</select>
								</div>
								<label class="control-label col-lg-2">Selesai Tanggal</label>
								<div class="col-lg-2">
									<input type="date" name="tgl_selesai" class="form-control input-sm"
										value="<?= $dpci->tgl_selesai; ?>" id="tgl_selesai" required>
								</div>
							</div>
							<?php if ($dpci->ket == "A16" || $dpci->ket == "A17"): ?>
								<div class="form-group" id="jam-group">
									<label class="control-label col-lg-2" for="jam_mulai">Jam Mulai</label>
									<div class="col-lg-2">
										<input type="time" name="jam_mulai" class="form-control input-sm" id="jam_mulai"
											value="<?= $dpci->jam_mulai; ?>">
									</div>
									<label class="control-label col-lg-2" for="jam_selesai">Jam Selesai</label>
									<div class="col-lg-2">
										<input type="time" name="jam_selesai" class="form-control input-sm" id="jam_selesai"
											value="<?= $dpci->jam_selesai; ?>">
									</div>
								</div>
							<?php endif; ?>

							<div class="form-group">
								<label class="control-label col-lg-2">Alasan</label>
								<div class="col-lg-10">
									<textarea class="form-control input-sm"
										name="alasan"><?= $dpci->alasan; ?></textarea>
									<input type="hidden" name="id" value="<?= $dpci->id; ?>">

								</div>
							</div>
							<hr>
							<div class="form-group">
								<label class="control-label col-lg-2"></label>
								<label class="control-label col-lg-2">
									<center>Pemohon : </center>
								</label>
								<label class="control-label col-lg-4">
									<center>Disetujui Oleh :</center>
								</label>
								<label class="control-label col-lg-2">
									<center>Mengetahui</center>
								</label>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-2">Nama</label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->pemohon_nama; ?>" name="pemohon_nama" type="text"
										readonly></label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->disetujui_nama_1; ?>" name="disetujui_nama_1" type="text"
										readonly></label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->disetujui_nama_2; ?>" name="disetujui_nama_2" type="text"
										readonly></label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->mengetahui_nama; ?>" name="mengetahui_nama" type="text"
										readonly></label>
							</div>
							<div class="form-group">

								<label class="control-label col-lg-2">Jabatan</label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->pemohon_jabatan; ?>" name="pemohon_jabatan" type="text"
										readonly></label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->disetujui_jabatan_1; ?>" name="disetujui_jabatan_1"
										type="text" readonly></label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->disetujui_jabatan_2; ?>" name="disetujui_jabatan_2"
										type="text" readonly></label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->mengetahui_jabatan; ?>" name="mengetahui_jabatan" type="text"
										readonly></label>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-2">Tanggal</label>
								<label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
										value="<?= $dpci->tgl_surat_pemohon; ?>" name="tgl_surat_pemohon" type="date"
										required></label>
								<!-- PEMBATASAN HAK AKSES EDIT -->
								<?php if ($user['name'] == "Wati" || $user['name'] == "Dessi"): ?>
									<label class="control-label col-lg-6"><input class="form-control input-sm col-lg-2"
											value="<?= $dpci->tgl_diset_mengetehui; ?>" name="tgl_diset_mengetehui"
											type="date" required></label>
								<?php else: ?>
									<label class="control-label col-lg-6"><input class="form-control input-sm col-lg-2"
											value="<?= $dpci->tgl_diset_mengetehui; ?>" name="tgl_diset_mengetehui"
											type="date" readonly><i>*Yg bisa merubah hanya Mba Wati atau Dessi.</i></label>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<?php if ($user['name'] == "Wati"): ?>
										<label>
											<?php if ($dpci->status == "Printed"): ?>
												<input type="checkbox" name="verifikasi"><b> VERIFIKASI SEKARANG</b>
											<?php else: ?>
												<b><i>TERVERIFIKASI</i></b>
											<?php endif; ?>
										</label>
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<input value=" <?php echo $this->session->name; ?>" name="username" type="hidden">
									<button class="btn btn-primary" type="submit" name="submit">Save</button>
									<!-- PEMBATASAN HAK AKSES EDIT -->
									<?php if ($user['name'] == "Wati"): ?>
										<a href="<?= base_url('pci/index_all'); ?>" class="btn btn-theme04">Cancel</a>
									<?php else: ?>
										<a href="<?= base_url('pci'); ?>" class="btn btn-theme04">Cancel</a>
									<?php endif; ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</s ect ion>
		</sec ti on>