<div class="container" id="head-space"></div>
<form class="form-horizontal" role="form" id="client" method="POST" action="<?= BASEURL ?>register/profile" autocomplete="on" enctype="multipart/form-data">
	<div class="container" id="content">
		<div class="row">
			<center><img src="<?= IMAGEPATH_EXTRA . 'applicant signup.png' ?>" id="img-signup" class="img-responsive"></center>
			<div class="col-md-11 col-md-offset-1">
				<!-- Icon steps -->
				<div class="row">
					<div class="col-md-12" id="icon-steps">
						<div class="col-md-7 col-md-offset-2">
							<img src="<?= IMAGEPATH_EXTRA . 'registration/icon steps8.png' ?>" class="img-responsive">
						</div>
					</div>
				</div>
				<!-- Last name -->
				<div class="form-group" id="fullname">
					<div class="col-md-5 col-md-offset-3">
						<span id="fullname-label">Full Name </span>
						<input type="text" class="form-control" maxlength="30" placeholder="Name" name="fullname" value="<?php echo set_value('fullname'); ?>" />
						<?php echo form_error('fullname'); ?>
					</div>
				</div>
				<!-- Email -->
				<div class="form-group" id="email">
					<div class="col-md-5 col-md-offset-3">
						<span id="email-label">Email </span>
						<input type="email" class="form-control" maxlength="100" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" />
						<?php echo form_error('email'); ?>
					</div>
				</div>
				<!-- Password -->
				<div class="form-group" id="password">
					<div class="col-md-5 col-md-offset-3">
						<span id="password-label" />Password </span>
						<input type="password" class="form-control" min="6" maxlength="20" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" />
						<?php echo form_error('password'); ?>
					</div>
				</div>
				<!-- Confirm Password -->
				<div class="form-group">
					<div class="col-md-5 col-md-offset-3">
						<span id="confpass-label">Confirm Password </span>
						<input type="password" class="form-control" min="6" maxlength="20" placeholder="Password" name="confirmpassword" />
						<?php echo form_error('confirmpassword'); ?>
					</div>
				</div>
				<!-- Remember me -->
				<div class="form-group">
					<div class="col-md-5 col-md-offset-3">
						<span id="remember-label1">By clicking the submit button, I have read and agreed to HR Philippines </span><a id="remember-label2" href="#">Terms</a><span id="remember-label3"> and </span><a id="remember-label4" href="#">Privacy Policy</a>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-5 col-md-offset-3">
						<button class="btn btn-warning" type="submit">SUBMIT</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>