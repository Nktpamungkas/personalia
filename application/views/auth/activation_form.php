<div id="login-page">
    <div class="container">
        <div class="form-login">
            <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php endif; ?>
            <h2 class="form-login-heading">Aktivasi Akun Anda</h2>
            <div class="login-wrap">
                <form action="<?php echo base_url('auth/activate'); ?>" method="POST">

                    <div class="form-group">
                        <label for="activation_code">Kode Aktivasi:</label>
                        <input type="text" name="activation_code" id="activation_code" class="form-control" value=""
                            placeholder="Masukkan kode aktivasi" required>
                    </div>
                    <div class="form-group">
                        <p>New Password</p>
                        <input type="password" class="form-control form-control-user" id="password1" name="password1"
                            value="" placeholder="New Password" required>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <p>Confirm New Password</p>
                        <input type="password" class="form-control form-control-user" value="" id="password2"
                            name="password2" placeholder="Repeat New Password" required>
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<script>
// Form password validation before submit
$("form").on("submit", function(event) {
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();
    if (password1 !== password2) {
        event.preventDefault(); // Prevent form submission
        alert("Password and Confirm Password do not match!");
    }
});
</script>
