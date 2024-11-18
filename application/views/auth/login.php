<div id="login-page">
    <div class="container">
        <div class="form-login">
            <h2 class="form-login-heading">Sign In Now</h2>
            <?= $this->session->flashdata('message'); ?>
            <div class="login-wrap">
                <form action="<?= base_url('auth'); ?>" method="post">
                    <!-- Name Input -->
                    <input name="name" id="name" type="text" class="form-control"
                        onkeyup="this.value = this.value.toLowerCase();" placeholder="Enter Name..."
                        value="<?= set_value('name') ?>" autofocus>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

                    <br>

                    <!-- Password Input -->
                    <div class="input-group bootstrap-timepicker">
                        <input name="password" id="password" type="password" class="form-control"
                            placeholder="Password...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" title="Show Password"
                                id="tampilkan-password"><i class="fa fa-eye"></i></button>
                        </span>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

                    <br>

                    <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> Sign
                        In</button><br>

                    <center>Your IP Address:
                        <?php
						$ipaddress = $_SERVER['REMOTE_ADDR'];
						echo gethostbyaddr($ipaddress);
						?>
                    </center>
                </form>
                <span align="left">
                    <a href="<?= base_url('auth/forgot_password') ?>" data-bs-toggle="modal"
                        data-bs-target="#registrationModal">Forgot Password</a>
                </span>
            </div>
        </div>
    </div>
</div>
