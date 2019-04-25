    <div id="login-page">
        <div class="container">
            <div class="form-login">
                <h2 class="form-login-heading">sign in now</h2>
                <?= $this->session->flashdata('message'); ?>
                <div class="login-wrap">
                    <form action="<?= base_url('auth'); ?>" method="post">
                        <input name="name" id="name" type="text" class="form-control" placeholder="Enter Name..." value="<?= set_value('name') ?>" autofocus>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        <br>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password...">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        <label class="checkbox">
                            <span class="pull-right">

                                <a data-toggle="modal" href="login.html#ForgotPassword"> Forgot Password?</a>
                            </span>
                        </label>

                        <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> SIGN IN</button>
                    </form>
                </div>

                <!-- Modal Forgot Password-->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ForgotPassword" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Silahkan hubungi department informatika- PT. Indo Taichen Textile Industri. (Ext. 859)</p>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Forgot Password-->
            </div>
        </div>
    </div> 