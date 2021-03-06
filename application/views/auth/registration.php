<div id="login-page">
    <div class="container">
        <form class="form-login" action="<?= base_url('auth/registration') ?>" method="post">
            <h2 class="form-login-heading">Registration Account</h2>
            <div class="login-wrap">
                <p>Please Contact Your Manager to Confirm Password.</p>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= set_value('name') ?>" placeholder="Full Name">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Email Address">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
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
                        <option value="4">Staff</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> Registration</button>
                <a href="<?= base_url('menu') ?>" class="btn btn-default btn-block">Back</a>
            </div>

        </form>
    </div>
</div> 