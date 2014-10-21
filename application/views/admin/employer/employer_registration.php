<div class="row">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li><a href="<?= BASEURL . 'admin/admin_index' ?>">Home</a></li>
            <li class="panel dropdown" id="panel-dropdown">
            	<a data-toggle="collapse" href="#applicant">Applicants</a>
            	<ul class="panel-collapse collapse" id="applicant">
            		<li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/applicant_registration' ?>">Sign up</a></li>
            		<li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/applicant_list' ?>">Applicant List</a></li>
            	</ul>
            </li>
            <li class="panel dropdown active" id="panel-dropdown">
            	<a data-toggle="collapse" href="#employer">Employers</a>
            	<ul class="panel-collapse collapse" id="employer">
            		<li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/employer_registration' ?>">Sign up</a></li>
                    <li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/employer_list' ?>">Employer List</a></li>
            	</ul>
            </li>
            <li><a href="<?= BASEURL . 'admin/jobs_list' ?>">Job Posts</a></li>
        </ul>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<form class="form-horizontal" role="form" method="POST" action="<?= BASEURL ?>admin/employer_validation" enctype="multipart/form-data" >

		<h2>Employer Registration</h2>
		<hr>

		<div class="panel panel-default">
        	<div class="panel-body">

				<div class="col-md-12 col-md-offset-1">
					<div class="col-md-3">
						<img id="picture_logo" src="<?= IMAGEPATH_EXTRA ?>default_image.png" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 150px; height: 150px; margin: 10px 0 0 0;" >
					</div>
					<div class="col-md-5">
						<input type="file" name="picture_logo" id="picture_logo" class="form-control" onchange="readURL(this);" value="<?php echo set_value('picture_logo'); ?>" /> <?php echo form_error('picture_logo'); ?>
						<p id="para-upload">
							You may upload the following image types:<br/>
							JPG, JPEG, GIF, PNG (2 MB maximum file size)
						</p>
					</div>
				</div>

				<div class="col-md-offset-1">
					<div class="form-group col-md-9">
						<br>
					   	<label for="company_name" class="control-label" >Company Name:</label>
					   	<div>
					     	<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo set_value('company_name'); ?>" />
					     	<?php echo form_error('company_name'); ?>
					   	</div>
					</div>

					<div class="form-group col-md-9">
					   <label for="industry" class="control-label">Industry: </label>
					   <div>
					   		<select class="form-control" id="industry" name="industry" >
					   			<option value="">Select Industry</option>
								<option value="Accounting/Finance/Audit/Tax" <?php echo set_select('industry', 'Accounting/Finance/Audit/Tax'); ?> >Accounting/Finance/Audit/Tax</option>
								<option value="Advertising/Marketing/Public Relations" <?php echo set_select('industry', 'Advertising/Marketing/Public Relations'); ?> >Advertising/Marketing/Public Relations</option>
								<option value="Banking/Financial Services" <?php echo set_select('industry', 'Banking/Financial Services'); ?> >Banking/Financial Services</option>
								<option value="Call Center" <?php echo set_select('industry', 'Call Center'); ?> >Call Center</option>
								<option value="Design/Arts" <?php echo set_select('industry', 'Design/Arts'); ?> >Design/Arts</option>
								<option value="Engineering" <?php echo set_select('industry', 'Engineering'); ?> >Engineering</option>
								<option value="Hospitality" <?php echo set_select('industry', 'Hospitality'); ?> >Hospitality</option>
								<option value="Human Resource Management" <?php echo set_select('industry', 'Human Resource Management'); ?> >Human Resource Management</option>
								<option value="Information Technology" <?php echo set_select('industry', 'Information Technology'); ?> >Information Technology</option>
								<option value="Insurance" <?php echo set_select('industry', 'Insurance'); ?> >Insurance</option>
								<option value="Law/Legal" <?php echo set_select('industry', 'Law/Legal'); ?> >Law/Legal</option>
								<option value="Management" <?php echo set_select('industry', 'Management'); ?> >Management</option>
								<option value="Media" <?php echo set_select('industry', 'Media'); ?> >Media</option>
								<option value="Medical" <?php echo set_select('industry', 'Medical'); ?> >Medical</option>
								<option value="Merchandising and Purchasing" <?php echo set_select('industry', 'Merchandising and Purchasing'); ?> >Merchandising and Purchasing</option>
								<option value="Professional Services" <?php echo set_select('industry', 'Professional Services'); ?> >Professional Services</option>
								<option value="Property/Real Estates" <?php echo set_select('industry', 'Property/Real Estates'); ?> >Property/Real Estates</option>
								<option value="Sales, CS and Business Development" <?php echo set_select('industry', 'Sales, CS and Business Development'); ?> >Sales, CS and Business Development</option>
								<option value="Telecommunications" <?php echo set_select('industry', 'Telecommunications'); ?> >Telecommunications</option>
								<option value="Transportation and Logistics" <?php echo set_select('industry', 'Transportation and Logistics'); ?> >Transportation and Logistics</option>
								<option value="Others" <?php echo set_select('industry', 'Others'); ?> >Others</option>
					   		</select><?php echo form_error('industry'); ?>
					   </div>
					</div>
					<div class="form-group col-md-9">
						<label for="country" class="control-label">Location:</label>
						<div>
							<select class="form-control" id="country" name="country">
								<option value="">Select Country</option>
								<?php foreach (unserialize(COUNTRY_LIST) as $key) {  ?>
									<option value="<?= $key?>"><?= $key?></option>
								<?php } ?>
							</select><?php echo form_error('country'); ?>
						</div>
					</div>

					<div class="form-group col-md-9">
						<label for="city"  class="control-label" >Hometown:</label>
						<div>
							<input type="text" name="city" class="form-control" placeholder="Hometown" value="<?php echo set_value('city'); ?>" /> <?php echo form_error('city'); ?>
						</div>
					</div>
					        
					<div class="form-group col-md-9">
						<label for="phone" class="control-label" >Phone Number:</label>
						<div>
							<input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo set_value('phone'); ?>" /> <?php echo form_error('phone'); ?>
						</div>
					</div>

					<div class="form-group col-md-9">
						<label for="mobile" class="control-label" >Mobile Number:</label>
						<div>
							<input type="text" name="mobile" class="form-control" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" /> <?php echo form_error('mobile'); ?>
						</div>
					</div>

					<div class="form-group col-md-9">
						<label for="email" class="control-label" >E-mail:</label>
						<div>
							<input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo set_value('email'); ?>" /> <?php echo form_error('email'); ?>
						</div>
					</div>

					<div class="form-group col-md-9">
						<label for="username" class="control-label" >Username:</label>
						<div>
							<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" /> <?php echo form_error('username'); ?>
						</div>
					</div>

					<div class="form-group col-md-9">
						<label for="password" class="control-label" >Password:</label>
						<div>
							<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" /> <?php echo form_error('password'); ?>
						</div>
					</div>

					<div class="form-group col-md-9">
						<label for="confirm_password" class="control-label" >Confirm Password:</label>
						<div>
							<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('confirm_password'); ?>" /> <?php echo form_error('confirm_password'); ?>
						</div>
					</div>

					<div class="form-group col-md-9">
						<div><br>
							<button class="btn btn-warning pull-right" type="submit" id="btn-submit">SUBMIT</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>
</div>
