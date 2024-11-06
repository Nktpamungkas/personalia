<style>
	.table td,
	.table th {
		padding: 0.3rem;
	}
</style>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-9 main-chart">
				<div class="border-head">
					<h3>Human Resources Information System</h3>
				</div>

				<!-- User Information Panel -->
				<div class="row mt">
					<div class="col-md-6 col-sm-4 mb">
						<div class="white-panel">
							<div class="white-header">
								<h4 class="mb-2 fs-15">Information</h4>
							</div>
							<p class="centered">
								<a href="<?= base_url('auth/profile'); ?>">
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
									data-target="#changePasswordModal">
									Change Password
								</button>
								</p>
							</div>

							<!-- Change Password Modal -->
							<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
								aria-labelledby="changePasswordModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<?= form_open('profile/change_password', ['class' => 'user', 'enctype' => 'multipart/form-data']); ?>
											<div class="form-group">
												<input name="new_password" id="new_password" type="password"
													class="form-control" placeholder="Enter your new password" required>
												<?= form_error('new_password'); ?>
											</div>
											<div class="form-group">
												<input name="new_password_confirmation" id="new_password_confirmation"
													type="password" class="form-control"
													placeholder="Confirm new password" required>
												<?= form_error('new_password_confirmation'); ?>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary"
												data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save</button>
											<?= form_close(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</section>
