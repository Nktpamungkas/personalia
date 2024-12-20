<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<!-- Tambahkan library atau CSS lain yang diperlukan -->
</head>

<body>

	<section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-lg-9 main-chart">
					<div class="border-head">
						<h3>Human Resources Information System</h3>
					</div>
					<?= $this->session->flashdata('message'); ?>
					<!-- User Information Panel -->
					<div class="row mt">
						<div class="col-md-6 col-sm-4 mb">
							<div class="white-panel">
								<div class="white-header">
									<h4 class="mb-2 fs-15">Information</h4>
								</div>
								<p class="centered">
									<a href="<?= base_url('home/editprofile'); ?>">
										<img src="<?= base_url('img/profile/') . $user['image']; ?>" class="img-circle"
											width="80" alt="Profile Image">
									</a>
								</p>
								<h4 class="mt-2 mb-0"><?= htmlspecialchars($user['name']); ?></h4>
								<div class="mt-4 pt-2 border-top">
									<div class="table-responsive">
										<table class="table table-borderless mb-0 text-muted">
											<tbody>
												<tr>
													<th scope="row" class="text-left">Email</th>
													<td class="text-left"><?= htmlspecialchars($user['email']); ?></td>
												</tr>
												<tr>
													<th scope="row" class="text-left">Department</th>
													<td class="text-left"><?= htmlspecialchars($user['dept']); ?></td>
												</tr>
											</tbody>
										</table>
									</div>
									<p class="left"></p>
									<button type="button" class="btn btn-primary" data-toggle="modal"
										data-target="#registrationModal">
										Change Password
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>

	<!-- Modal for Registration -->
	<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="modalResign"
		aria-hidden="true">
		<form role="form" action="<?= base_url('home/edit_Password/' . $user['no_scan']); ?>" method="POST">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">Change Password</h4>
						<?php if ($this->session->flashdata('message')): ?>
							<div id="errorMessage"><?php echo $this->session->flashdata('message'); ?></div>
						<?php endif; ?>
					</div>
					<div class="modal-body">
						<div class="login-wrap">
							<div class="form-group">
								<p>Username</p>
								<input type="text" class="form-control form-control-user" id="name1" name="name1"
									value="<?= $user['name']; ?>" placeholder="Nama" readonly>
							</div>
							<div class="form-group">
								<p>No Scan</p>
								<input type="text" class="form-control form-control-user" id="no_scan" name="no_scan"
									value="<?= $user['no_scan']; ?>" placeholder="No Scan" readonly>
							</div>
							<div class="form-group">
								<p>Department</p>
								<input type="text" class="form-control form-control-user" id="dept" name="dept"
									value="<?= $user['dept']; ?>" placeholder="Department" readonly>
							</div>
							<div class="form-group">
								<p>Email</p>
								<input type="email" class="form-control form-control-user" id="email" name="email"
									value="<?= $user['email']; ?>" placeholder="email" readonly>
							</div>
							<div class="form-group">
								<p>Old Password</p>
								<input type="hidden" class="form-control form-control-user" id="name" name="name"
									value="<?= $user['name']; ?>" placeholder="Username" readonly>
								<input type="password" class="form-control form-control-user" id="old_password"
									name="old_password" placeholder="Old Password" required>
								<?= form_error('old_password', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<p>Password</p>
								<input type="password" class="form-control form-control-user" id="password1"
									name="password1" placeholder="New Password" required>
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<p>Confirm Password</p>
								<input type="password" class="form-control form-control-user" id="password2"
									name="password2" placeholder="Repeat New Password" required>
								<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i>
								Save</button>
							<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Back</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
	<script>
		document.querySelector("form").addEventListener("submit", function (event) {
			// Get values of password fields
			var password1 = document.getElementById("password1").value;
			var password2 = document.getElementById("password2").value;

			// Check if passwords match
			if (password1 !== password2) {
				// Prevent form submission
				event.preventDefault();

				// Show alert
				alert("Password and Confirm Password do not match!");
			}
		});
	</script>
	<!-- <script>
	$(document).ready(function() {
		if ($('#errorMessage').length > 0) {
			$('#registrationModal').modal('show'); // Open the modal if there's a flash message
		}
	});
	</script> -->
	<script>
		$('#registrationModal').modal('show');
		document.forms['my_form'].submit();
	</script>
</body>

</html>