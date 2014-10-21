<!-- 
	Description:	View applied applicant page/Post new job page
	Function:		This page allows Employer to post new job.
	Author:			Rodge
 -->

<div class="container">
	<div class="panel-body">

		<div class="row">
			<div class="list_title">
				<h1>Post New Job</h1>
			</div>
			<form method="POST" action="<?= BASEURL ?>employer/post_job_validation" role="form">
				<div class="new_job_post">
					<div class="box_wrapper">

						<div class="form-group ">
						   <label for="position" class="col-md-2 control-label" >Position:</label>
						   <div class="col-md-10">
						     <input type="text" name="position" id="position" class="form-control post_fields" value="<?php echo set_value('position'); ?>" placeholder="Position" required/><?php echo form_error('position'); ?>
						   </div>
						</div>

						<div class="form-group">
						   <label for="industry" class="col-md-2 control-label" >Industry:</label>
						   <div class="col-md-10">
						     <select name="industry" class="form-control post_fields" required>
								<option value="1" <?php echo set_select('industry', 'CS & PAYMENT'); ?> >CS & PAYMENT</option>
								<option value="2"<?php set_select('industry', 'MARKETING'); ?> >MARKETING</option>
								<option value="3" <?php set_select('industry', 'IT'); ?> >IT</option>
								<option value="4" <?php set_select('industry', 'HR & ADMIN'); ?> >HR & ADMIN</option>
								<option value="5" <?php echo set_select('industry', 'MANAGEMENT'); ?> >MANAGEMENT</option>
							</select><?php echo form_error('industry'); ?>
						   </div>
						</div>

						<div class="form-group ">
						   <label for="job_description" class="col-md-12 control-label" >Job Description:</label>
						   <div class="col-md-12 job_desc_content">
						     <textarea name="job_description" placeholder="Post new job" class="form-control post_fields" required ><?php echo set_value('job_description'); ?></textarea><?php echo form_error('job_description'); ?>
						   </div>
						</div>

						<div class="form-group">
						   <label  class="col-md-2 control-label" >Salary Range:</label>
						   <div class="col-md-5">
						     <input type="number" name="range_min" value="<?php echo set_value('range_min'); ?>" class="form-control post_fields" placeholder="Minimum Salary range" required/><?php echo form_error('range_min'); ?>
						   </div>
						   
						   <div class="col-md-5">
						     <input type="number" name="range_max" value="<?php echo set_value('range_max'); ?>" class="form-control post_fields" placeholder="Maximum Salary range" required/><?php echo form_error('range_max'); ?>
						   </div>
						</div>

						<div class="form-group">
						   <label for="position_level" class="col-md-2 control-label" >Position Level:</label>
						   <div class="col-md-10">
						     <select name="position_level" class="form-control post_fields" required>
								<option value="Fresh Graduate < 1 year of employee experice" <?php echo set_select('position_level', 'Fresh Graduate < 1 year of employee experice'); ?> >Fresh Graduate < 1 year of employee experice</option>
								<option value="1-4 years of employee experience"<?php set_select('position_level', '1-4 years of employee experience'); ?> >1-4 years of employee experience</option>
								<option value="Non-executive" <?php set_select('position_level', 'Non-executive'); ?> >Non-executive</option>
								<option value="Supervisor/5 years and up of employee experience" <?php set_select('position_level', 'Supervisor/5 years and up of employee experience'); ?> >Supervisor/5 years and up of employee experience</option>
								<option value="Assistant Manager/Manager" <?php echo set_select('position_level', 'Assistant Manager/Manager'); ?> >Assistant Manager/Manager</option>
								<option value="CEO/SVP/AVP/VPI/DIRECTOR" <?php echo set_select('position_level', 'CEO/SVP/AVP/VPI/DIRECTOR'); ?> >CEO/SVP/AVP/VPI/DIRECTOR</option>
							</select><?php echo form_error('position_level'); ?>
						   </div>
						</div>

						<div class="form-group">
						   <label for="company_location" class="col-md-2 control-label" >Company Location</label>
						   <div class="col-md-10">
						    	<input type="text" name="company_location" value="<?php echo set_value('company_location'); ?>" class="form-control post_fields" placeholder="Work Location" required /><?php echo form_error('company_location'); ?>
						   </div>
						</div>


						<div class="col-md-12 sub_title_1">
							<h1>Benefits</h1><?php echo form_error('benefits_chk[]'); ?>
						</div>
						
						<?php foreach ($rows as $row) { ?>
						<div class="col-lg-4 benefits_list">
						    <div class="input-group">
						      <span class="check_boxes"><input type="checkbox" value="<?php echo $row['benefits_list']; ?>" name="benefits_chk[]" <?php echo set_checkbox('benefits_chk[]', $row['benefits_list'] ); ?> ></span>
						      <label for="benefits_chk" class="control-label"><?php echo $row['benefits_list']; ?></label>
						    </div>
						</div>

						<?php } ?>
						<div class="col-lg-4 benefits_list">
						    <div class="input-group">
						      <label for="benefits_chk" class="control-label" >Others</label>
						      <span class="check_boxes"><input type="text" class="form-control post_fields" name="benefits_others" value="<?php echo set_value('benefits_others'); ?>" placeholder="Others"></span>
						    </div>
						</div>
						<div id="clearer"></div>
						
					</div>
				</div>

				<div id="new_job_post_btn">
					<input type="reset" name="reset" id="edit_btn"/>
					<input type="submit" name="submit" value="Submit" id="submit_btn"/>
				</div>
			</form>
		</div>
	</div>
</div>

