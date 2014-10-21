<div class="container">
	<form name="form" class="form-horizontal" method="POST" action="<?= BASEURL ?>employer/employer_login_validation" autocomplete="on">
		<div class="col-md-4 col-md-offset-4">
			<h3 id="signup-header">EMPLOYER ACCOUNT LOGIN</h3>
			<hr id="line">
			<div class="left-inner-addon ">
			    <i class="glyphicon glyphicon-user"></i>
			    <input type="text" class="form-control" placeholder="Username" name="email" autofocus>
				<?php echo form_error('email', '<span class="help-block" style="color:#ff6666;">', '</span>'); ?>
			</div>
			<div class="left-inner-addon ">
			    <i class="glyphicon glyphicon-lock"></i>
			    <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
		    	<?php echo form_error('password', '<span class="help-block" style="color:#ff6666;">', '</span>'); ?>
			</div>
        	<input type="checkbox" value="remember-me" id="remember-checkbox"> Remember me
        	<button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-submit">Sign in</button>
        	<p id="forgot-label">Forgot your password? <a href="#" id="click-label">Click here!</a><p>
		</div>
	</form>
</div>
<div id="signup-container"></div>