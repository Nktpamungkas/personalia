<div id="login-page">
    <div class="container">
        <form class="form-login" action="<?= base_url('auth/edit_password') ?>" method="post">
            <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php endif; ?>
            <h2 class="form-login-heading">Reset Password</h2>
            <div class="login-wrap">
                <div class="form-group">
                    <div class="border-box">
                        <p>Search by Username</p>
                        <input type="text" class="form-control form-control-user" id="Searchname1" name="Searchname1"
                            value="<?= set_value('name1') ?>" placeholder="Cari Username" required
                            onkeydown="checkEnter(event)">
                        <?= form_error('Searchname1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <p>Email: </p>
                        <input type="text" class="form-control form-control-user" id="email" name="email" value=""
                            placeholder="Email" readonly>
                        <input type="hidden" class="form-control form-control-user" id="id_" name="id_" value=""
                            placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <p>New Password</p>
                        <input type="password" class="form-control form-control-user" id="password1" name="password1"
                            placeholder="New Password" required>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <p>Confirm New Password</p>
                        <input type="password" class="form-control form-control-user" id="password2" name="password2"
                            placeholder="Repeat New Password" required>
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> Save New
                        Password</button>
                    <a href="<?= base_url('auth') ?>" class="btn btn-default btn-block">Back</a>
                </div>
        </form>
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
<script>
// Function untuk mengecek apakah tombol Enter ditekan
function checkEnter(event) {
    if (event.key === 'keydown' || event.key === 'Enter' || event.key === 'Tab') {
        searchusername(); // Panggil fungsi pencarian
    }
}

// Fungsi searchusername
function searchusername() {
    var username = document.getElementById('Searchname1').value;
    $.ajax({
        type: 'POST',
        url: '<?= base_url() . "auth/search_user" ?>/' + username,
        dataType: 'json',
        success: function(data) {
            if (data.length > 0) {
                document.getElementById('id_').value = data[0].id;
                document.getElementById('email').value = data[0].email;
            } else {
                document.getElementById('id_').value = '';
                document.getElementById('email').value = '';
                document.getElementById('password1').value = '';
                document.getElementById('password2').value = '';
                alert("User not found");
            }
        }
    });
}
</script>
