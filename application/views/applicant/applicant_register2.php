<div class="container" id="head-space"></div>
	<form class="form-horizontal" role="form" method="POST" action="<?= BASEURL ?>register/profile2" autocomplete="on" enctype="multipart/form-data">
		<div class="container" id="content">
			<div class="row">
				<center><img src="<?= IMAGEPATH_EXTRA . 'applicant signup.png' ?>" id="img-signup" class="img-responsive"></center>
				<div class="col-md-11 col-md-offset-1">
					<!-- Icon steps -->
					<div class="row">
						<div class="col-md-12" id="icon-steps">
							<div class="col-md-7 col-md-offset-2">
								<img src="<?= IMAGEPATH_EXTRA . 'registration/icon steps7.png' ?>" class="img-responsive">
							</div>
						</div>
					</div>

					<h4 class="col-md-9 col-md-offset-1" id="personal-header"><b>Personal Information</b></h4>

					<!-- Birthday -->
					<div class="form-group" id="form-group">
						<label for="birthday" class="col-md-3 control-label" id="label">Birthdate</label>
						<div class="col-md-5" id="birthdate_div">
							<input type="date" class="form-control" name="birthdate" id="birthdate" max="2012-12-31" min="1920-01-01" value="<?php echo set_value('birthdate'); ?>" autofocus>
							<?php echo form_error('birthdate'); ?>
							<input type="hidden" name="age" id="age" value="<?php echo set_value('age'); ?>"/>
						</div>
					</div>

					<!-- Gender -->
					<div class="form-group" id="form-group">
						<label for="gender" class="col-md-3 control-label" id="label">Gender</label>
						<div class="col-md-4" id="gender1_div">
							<label class="radio-inline" id="maleRadio" id="label">
								<input type="radio" name="genderRadio" checked value="Male"/> Male
							</label>
							<label class="radio-inline" id="femaleRadio" id="label">
								<input type="radio" name="genderRadio" value="Female"/> Female
							</label>
						</div>
					</div>

					<!-- Height/Weight -->
					<div class="form-group" id="form-group">
						<label for="height" class="col-md-3 control-label" id="label">Height</label>
						<div class="col-md-2" id="height_div">
							<input type="number" name="height" class="form-control" placeholder="(cm)" min="80" max="200" value="<?php echo set_value('height'); ?>">
							<?php echo form_error('height'); ?>
						</div>
						<label for="height" class="col-md-1 control-label" id="label">Weight</label>
						<div class="col-md-2" id="weight_div">
							<input type="number" name="weight" class="form-control" placeholder="(kg)" min="30" max="400" value="<?php echo set_value('weight'); ?>">
							<?php echo form_error('weight'); ?>
						</div>
					</div>

					<!-- VISA Type -->
					<div class="form-group" id="form-group">
						<label for="visa_type" class="col-sm-3 control-label" id="label">VISA Type</label>
						<div class="col-sm-5" id="visa_div">
							<select class="form-control" id="visa_type" name="visa_type" onchange="javascript:checkVisaType();" >
								<option value="">Select VISA type</option>
								<option value="Tourist Visa (Personal)" <?php echo set_select('visa_type', 'Tourist Visa (Personal)'); ?> >Tourist Visa (Personal)</option>
								<option value="Tourist Visa (Agency)" <?php echo set_select('visa_type', 'Tourist Visa (Agency)'); ?> >Tourist Visa (Agency)</option>
								<option value="Student Visa" <?php echo set_select('visa_type', 'Student Visa'); ?> >Student Visa</option>
								<option value="9G Wording Visa" <?php echo set_select('visa_type', '9G Wording Visa'); ?> >9G Wording Visa</option>
								<option value="Ceza Wording Visa" <?php echo set_select('visa_type', 'Ceza Wording Visa'); ?> >Ceza Wording Visa</option>
								<option value="Others" <?php echo set_select('visa_type', 'Others'); ?> >Others</option>
						  	</select><?php echo form_error('visa_type'); ?>
						</div>
					</div>

					<!-- VISA Others -->
					<div class="form-group" style="display:none;" id="visa_others_div">
						<div class="col-sm-5 col-sm-offset-3">
							<input type="text" name="visa_others" id="visa_others" class="form-control" placeholder="Type here...">
						</div>
					</div> 

					<h4 class="col-md-9 col-md-offset-1" id="contact-header"><b>Contact Information</b></h4>

					<!-- Country -->
					<div class="form-group" id="form-group">
						<label for="country" class="col-sm-3 control-label" id="label">Country</label>
						<div class="col-sm-5" id="location_div">
							<select class="form-control" id="country" name="country" onchange="javascript:checkLocation();">
								<option value="">Select Country</option>
								<option value="China" <?php echo set_select('country', 'China'); ?> >China</option>
								<option value="Philippines" <?php echo set_select('country', 'Philippines'); ?> >Philippines</option>
						  	</select><?php echo form_error('country'); ?>
						</div>
					</div>

					<!-- City -->
					<div class="form-group" style="display:none;" id="city_div">
						<label for="country" class="col-sm-3 control-label" id="label">City</label>
						<div class="col-sm-5">
							<select class="form-control" id="city_option" name="city">
								<option value="">Select City</option>
								<option value="Caloocan City">Caloocan City</option>
								<option value="Las Piñas City">Las Piñas City</option>
								<option value="Makati City">Makati City</option>
								<option value="Malabon City">Malabon City</option>
								<option value="Mandaluyong City">Mandaluyong City</option>
								<option value="Manila City">Manila City</option>
								<option value="Marikina City">Marikina City</option>
								<option value="Muntinlupa City">Muntinlupa City</option>
								<option value="Navotas City">Navotas City</option>
								<option value="Parañaque City">Parañaque City</option>
								<option value="Pasay City">Pasay City</option>
								<option value="Pasig City">Pasig City</option>
								<option value="Pateros City">Pateros City</option>
								<option value="Quezon City">Quezon City</option>
								<option value="San Juan City">San Juan City</option>
								<option value="Taguig City">Taguig City</option>
								<option value="Valenzuela City">Valenzuela City</option>
							</select>
						</div>
					</div>

					<!-- Contact number -->
					<div class="form-group" id="form-group">
						<label for="mobile" class="col-sm-3 control-label" id="label">Mobile number</label>
						<div class="col-sm-5" id="cell_div">
							<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile number" value="<?php echo set_value('mobile'); ?>" ><?php echo form_error('mobile'); ?>
						</div>
					</div>

					<!-- QQ number -->
					<div class="form-group" id="form-group">
						<label for="qq" class="col-sm-3 control-label" id="label">QQ number</label>
						<div class="col-sm-5" id="qq_div">
							<input type="text" name="qq" id="qq" class="form-control" placeholder="QQ number" value="<?php echo set_value('qq'); ?>" ><?php echo form_error('qq'); ?>
						</div>
					</div>

					<!-- Skype ID -->
					<div class="form-group" id="form-group">
						<label for="skype" class="col-sm-3 control-label" id="label">Skype ID</label>
						<div class="col-sm-5" id="qq_div">
							<input type="text" name="skype" id="skype" class="form-control" placeholder="Skype ID" value="<?php echo set_value('skype'); ?>" ><?php echo form_error('skype'); ?>
						</div>
					</div>

					<h4 class="col-md-9 col-md-offset-1" id="contact-header" id="label"><b>Additional Information</b></h4>

					<!-- Preferred Industry to work to -->
					<div class="form-group" id="form-group">
						<label for="preferred-industry" class="col-sm-3 control-label" id="label">Preferred Industry</label>
						<div class="col-sm-5">
							<select class="form-control" id="preferred-industry" name="preferred-industry">
								<option value="">Select Industry</option>
								<?php foreach (unserialize(FIELD_OF_STUDY_LIST) as $key) {  ?>
	                                <option value="<?= $key?>"><?= $key?></option>
	                            <?php } ?>
						  	</select><?php echo form_error('preferred-industry'); ?>
						</div>
					</div>

					<!-- Position Title -->
					<div class="form-group" id="form-group">
						<label for="position" class="col-sm-3 control-label" id="label">Position</label>
						<div class="col-sm-5">
							<input type="text" name="position" class="form-control" placeholder="Job Title" value="<?php echo set_value('position'); ?>" ><?php echo form_error('position'); ?>
						</div>
					</div>

					<!-- Expected Salary -->
					<div class="form-group" id="form-group">
						<label for="expected-salary" class="col-sm-3 control-label" id="label">Expected Salary</label>
						<div class="col-sm-5">
							<input type="number" name="expected-salary" class="form-control" placeholder="0.00" value="<?php echo set_value('expected-salary'); ?>" ><?php echo form_error('expected-salary'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-1 col-md-offset-7">
							<button class="btn btn-warning btn-block" type="submit">NEXT</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>
<div class="container" id="foot-space"></div>