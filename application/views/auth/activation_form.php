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
                        <input type="text" name="activation_code" id="activation_code" class="form-control"
                            placeholder="Masukkan kode aktivasi" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Aktivasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
