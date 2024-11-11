<div class="col-sm-9">
	<div class="content-panel">
		<table class="table table-striped table-advance table-hover">
			<h4><a href="<?= base_url('auth/registration'); ?>" class="btn btn-info"><i
						class=" fa fa-plus"></i>&nbsp;&nbsp;New Account</a></h4>
			<?= $this->session->flashdata('message'); ?>
			<hr>
			<thead>
				<tr>
					<th><i class="fa fa-user"></i> Nama</th>
					<th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
					<th><i class="fa fa-bookmark"></i> Department</th>
					<th><i class=" fa fa-edit"></i> Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$queryManagement = "SELECT * FROM user ORDER BY id ASC";
				$dataManagement = $this->db->query($queryManagement)->result_array();
				?>
				<?php foreach ($dataManagement as $dm): ?>
					<tr>
						<td>
							<a href="#"><img src="img/profile/<?= $dm['image']; ?>" class="img-circle" width="25"
									height="25"> &nbsp; <?= $dm['name']; ?></a>
						</td>
						<td class="hidden-phone">
							<?php
							if ($dm['role_id'] == 1) {
								echo "Administrator";
							} elseif ($dm['role_id'] == 2) {
								echo "Manager";
							} elseif ($dm['role_id'] == 3) {
								echo "Ast. Manager";
							} elseif ($dm['role_id'] == 4) {
								echo "Staf Only";
							} elseif ($dm['role_id'] == 5) {
								echo "Staf Master";
							} else {
								echo "Admin Department";
							}
							?>
						</td>
						<td><?= $dm['dept']; ?></td>
						<td><span class=""><?php
						if ($dm['is_active'] == 1) {
							echo '<a href=' . base_url('auth/nonActivated/') . $dm['id'] . ' class="label label-success label-mini">Activated</a>';
						} else {
							echo '<a href=' . base_url('auth/activated/') . $dm['id'] . ' class="label label-warning label-mini">Click here to Activated</a>';
						} ?></span></td>
						<td>
							<?php if ($user['no_scan'] == 5221): ?>
								<!-- Button to trigger password change modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal"
									data-target="#registrationModal<?= $dm['id']; ?>">
									Change Password
								</button>
							<?php endif; ?>
						</td>
						<!-- <td>
								<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
								<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
								</td> -->
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
</section>
</section>
<!-- Modal for changing password -->
<?php foreach ($dataManagement as $dm): ?>
	<div class="modal fade" id="registrationModal<?= $dm['id']; ?>" tabindex="-1" role="dialog"
		aria-labelledby="modalResign" aria-hidden="true">
		<form role="form" action="<?= base_url('Menu/edit_Password/' . $dm['no_scan']); ?>" method="POST">
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
								<input type="text" class="form-control form-control-user" name="name1"
									value="<?= $dm['name']; ?>" readonly>
							</div>
							<div class="form-group">
								<p>No Scan</p>
								<input type="text" class="form-control form-control-user" name="no_scan"
									value="<?= $dm['no_scan']; ?>" readonly>
							</div>
							<div class="form-group">
								<p>Department</p>
								<input type="text" class="form-control form-control-user" name="dept"
									value="<?= $dm['dept']; ?>" readonly>
							</div>
							<div class="form-group">
								<p>Email</p>
								<input type="email" class="form-control form-control-user" name="email"
									value="<?= $dm['email']; ?>" required>
							</div>
							<div class="form-group">
								<p>Old Password</p>
								<input type="password" class="form-control form-control-user" name="old_password"
									placeholder="Old Password" required>
								<?= form_error('old_password', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<p>New Password</p>
								<input type="password" class="form-control form-control-user" name="password1"
									placeholder="New Password" required>
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<p>Confirm Password</p>
								<input type="password" class="form-control form-control-user" name="password2"
									placeholder="Repeat New Password" required>
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

<?php endforeach; ?>