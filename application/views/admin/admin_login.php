<div class="container">
	<div id="head-space-login"></div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="<?= BASEURL ?>admin/verify_login" autocomplete="on">
                        <div class="form-group">
                            <div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</div>
								<input class="form-control" type="text" name="username" placeholder="Username" />
							</div>
							<?php echo form_error('username', '<span class="help-block" style="color:#ff6666;">', '</span>'); ?>
                        </div>
                        <div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</div>
								<input class="form-control" type="password" name="password" placeholder="Password" />
							</div>
							<?php echo form_error('password', '<span class="help-block" style="color:#ff6666;">', '</span>'); ?>
						</div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="signup-container"></div>