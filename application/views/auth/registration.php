<style>
	.border-box {
		border: 1px solid #ccc;
		/* Warna dan ketebalan garis */
		padding: 15px;
		/* Ruang di dalam kotak */
		border-radius: 5px;
		/* Sudut yang membulat (opsional) */
		margin: 10px 0;
		/* Ruang di luar kotak */
		background-color: #f9f9f9;
		/* Warna latar belakang (opsional) */
	}
</style>
<div id="login-page">
	<div class="container">
		<form class="form-login" action="<?= base_url('auth/registration') ?>" method="post">
			<h2 class="form-login-heading">Registration Account</h2>
			<div class="login-wrap">
				<p>Please Contact Your Manager to Confirm Password.</p>
				<div class="form-group">
					<select class="form-control form-control-user" name="name" id="name" onchange="updateFields()"
						required>
						<option value="" disabled selected>Pilih Karyawan</option>
						<?php
						$queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 AND NOT status_karyawan = 'perubahan_status' ORDER BY nama")->result_array();
						foreach ($queryShift as $dk): ?>
							<option value="<?= $dk['no_scan'] ?>" data-dept="<?= $dk['dept'] ?>"
								data-nama="<?= $dk['nama'] ?>">
								<?= $dk['nama'] . ' - ' . $dk['dept'] . ' ' . $dk['jabatan']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<div class="border-box">
						<p>Automatic generate Username</p>
						<input type="text" class="form-control form-control-user" id="name1" name="name1"
							value="<?= set_value('name1') ?>" placeholder="nama" readonly>
						<?= form_error('name1', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="no_scan" name="no_scan"
						value="<?= set_value('no_scan') ?>" placeholder="No Scan" readonly>
					<?= form_error('no_scan', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="email" name="email"
						value="@indotaichen.com" placeholder="Email Address" readonly>
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control-user" id="password1" name="password1"
						placeholder="Password">
					<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control-user" id="password2" name="password2"
						placeholder="Repeat Password">
				</div>
				<div class="form-group">
					<select class="form-control form-control-user" name="male" id="male" required>
						<option value="" disabled selected>Gender</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control form-control-user" name="role_id" id="role_id" required>
						<option value="" disabled selected>Role</option>
						<option value="2">Manager</option>
						<option value="3">Ast. Manager</option>
						<option value="4">Supervisor</option>
						<option value="4">Ast. Supervisor</option>
						<option value="9">Leader</option>
						<option value="10">Staff</option>
						<option value="5">Staff Master</option>
						<option value="6">Admin Department</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control form-control-user" name="application" required>
						<option value="" disabled selected>Application</option>
						<option value="HRIS">HRIS</option>
						<option value="ReqApp">ReqApp</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="dept" name="dept"
						value="<?= set_value('dept') ?>" placeholder="Department" readonly>
					<?= form_error('dept', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> Registration</button>
				<a href="<?= base_url('menu') ?>" class="btn btn-default btn-block">Back</a>
			</div>
		</form>
	</div>
</div>
<script>
	function updateFields() {
		const select = document.getElementById('name');
		const selectedOption = select.options[select.selectedIndex];
		const noScan = selectedOption.value;
		const dept = selectedOption.getAttribute('data-dept');
		let nama = selectedOption.getAttribute('data-nama');

		// Memisahkan nama menjadi array kata
		const kataArray = nama.split(' ');

		// Ambil dua suku kata pertama jika ada lebih dari dua suku kata
		if (kataArray.length > 2) {
			nama = kataArray[0] + '.' + kataArray[1]; // Mengambil dua suku kata pertama dan menggabungkannya dengan titik
		} else {
			nama = kataArray.join('.'); // Jika kurang dari atau sama dengan dua, tetap gunakan nama asli dengan titik
		}

		document.getElementById('no_scan').value = noScan;
		document.getElementById('dept').value = dept;
		document.getElementById('name1').value = nama;

		// Menampilkan nama yang telah dimodifikasi
		console.log("Nama yang dipilih: " + nama);
	}
</script>