    <div id="login-page">
        <div class="container">
            <div class="form-login">
			<link href="../sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="../sweetalert/sweetalert2.min.js"></script>
                <h2 class="form-login-heading">sign in now</h2>
                <?= $this->session->flashdata('message'); ?>
                <div class="login-wrap">
                    <form action="<?= base_url('auth'); ?>" method="post">
                        <input name="name" id="name" type="text" class="form-control" onkeyup="this.value = this.value.toLowerCase();" placeholder="Enter Name..." value="<?= set_value('name') ?>" autofocus>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        <br>
                        <span class="pull-right">
                        </span>
                        <div class="input-group bootstrap-timepicker">
                            <input name="password" id="password" type="password" onkeyup="this.value = this.value.toLowerCase();" class="form-control timepicker-default" placeholder="Password...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" title="tampilkan password" id="tampilkan-password"><i class="fa fa-eye"></i></button>
                            </span>
                        </div>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        <script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $("#tampilkan-password").click(function(){

                                    // mendapatkan attribut type
                                    let tipeSaatIni = $("#password").attr('type');

                                    // untuk menyimpan type yang baru
                                    let tipeBaru = '';

                                    if(tipeSaatIni == 'text'){
                                        tipeBaru = 'password';
                                    } else if (tipeSaatIni == 'password'){
                                        tipeBaru = 'text';
                                    }
                                    
                                    // setting input dengan TIPE BARU
                                    $("#password").attr("type", tipeBaru);
                                    
                                });
                            });
                        </script>

                        <label class="checkbox">
                            <span class="pull-right">
                            </span>
                        </label>
                        <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> SIGN IN</button><br>
                        <center>Your IP Address : <?php $ipaddress = $_SERVER['REMOTE_ADDR']; echo gethostbyaddr($ipaddress); ?></center>
                    </form>
					<div class="download-link">
						<br>
						<label>Panduan Pnggunaan :</label><a href="<?= base_url('auth/download'); ?>" download>Klik disini</a>
					</div>
                </div>
            </div>
        </div>
    </div> 
	<script>
			swal({
				title: 'Kartu kerja untuk operasi ".$_GET['operation']." sudah di proses.',   
				text: 'Klik Ok untuk input data kembali',
				type: 'warning',
			}).then((result) => {
				if (result.value) {
					window.location.href = 'http://online.indotaichen.com/finishing2-new/masuk/?typekk=NOW'; 
				}
			});
	</script>
