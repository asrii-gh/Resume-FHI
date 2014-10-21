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
            <li class="active panel dropdown" id="panel-dropdown">
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

    <h2>Post New Job</h2>
    <hr>

    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="<?= BASEURL ?>admin/job_add_update/<?= $emp_id ?>/<?= 'add' ?>" role="form">
                <br/>

                <input type="hidden" name="company_name"/>

                <div class="form-group">
                    <label class="col-md-2 control-label">Position</label>
                    <div class="col-md-9">
                        <input type="text" name="position" id="position" class="form-control" value="<?php echo set_value('position'); ?>" placeholder="Position"/>
                        <span class="error-modal-val" style="display: none;" id="error-label">Position is required</span>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" >Industry</label>
                    <div class="col-md-9">
                        <select class="form-control" name="industry" id="industry">
                            <option value="">Select Industry</option>
                            <option value="1" <?php echo set_select('industry', 'CS & PAYMENT'); ?> >CS &amp; PAYMENT</option>
                            <option value="2" <?php echo set_select('industry', 'HR & ADMIN'); ?> >HR &amp; ADMIN</option>
                            <option value="3" <?php echo set_select('industry', 'IT'); ?> >IT</option>
                            <option value="4" <?php echo set_select('industry', 'MANAGEMENT'); ?> >MANAGEMENT</option>
                            <option value="5" <?php echo set_select('industry', 'MARKETING'); ?> >MARKETING</option>
                        </select><span class="error-modal-val" style="display: none;" id="error-label">Industry is required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Job Description</label>
                    <div class="col-md-9">
                        <textarea name="job_description" id="job_description" class="form-control" style="height:270px;resize:none;" wrap="true"><?php echo set_value('job_description'); ?> </textarea>
                        <span class="error-modal-val" style="display: none;" id="error-label">Job description is required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-md-2 control-label" >Salary Range</label>
                    <div class="col-md-4">
                        <input type="number" name="range_min" id="range_min" value="<?php echo set_value('range_min'); ?>" class="form-control post_fields" placeholder="Minimum Salary range" step="1000.00" />
                        <span class="error-modal-val" style="display: none;" id="error-label">Minimum salary range is required</span>
                    </div>

                    <div class="col-md-4">
                        <input type="number" name="range_max" id="range_max" value="<?php echo set_value('range_max'); ?>" class="form-control post_fields" placeholder="Maximum Salary range" step="1000.00" />
                        <span class="error-modal-val" style="display: none;" id="error-label">Maximum salary range is required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" >Position Level</label>
                    <div class="col-md-9">
                        <select class="form-control" name="position_level" id="position_level">
                            <option value="">Select Position Level</option>
                            <option value="CEO/SVP/AVP/VPI/DIRECTOR" <?php echo set_select('position_level', 'CEO/SVP/AVP/VPI/DIRECTOR'); ?> >CEO/SVP/AVP/VPI/DIRECTOR</option>
                            <option value="Assistant Manager/Manager" <?php echo set_select('position_level', 'Assistant Manager/Manager'); ?> >Assistant Manager/Manager</option>
                            <option value="Supervisor/5 years and up of employee experience" <?php echo set_select('position_level', 'Supervisor/5 years and up of employee experience'); ?> >Supervisor/5 years and up of employee experience</option>
                            <option value="1-4 years of employee experience" <?php echo set_select('position_level', '1-4 years of employee experience'); ?> >1-4 years of employee experience</option>
                            <option value="Fresh Graduate < 1 year of employee experice" <?php echo set_select('position_level', 'Fresh Graduate < 1 year of employee experice'); ?> >Fresh Graduate < 1 year of employee experice</option>
                            <option value="Non-executive" <?php echo set_select('position_level', 'Non-executive'); ?> >Non-executive</option>   
                        </select><span class="error-modal-val" style="display: none;" id="error-label">Position level is required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" >Location</label>
                    <div class="col-md-9">
                        <input type="text" name="company_location" id="company_location" class="form-control" value="<?php echo set_value('company_location'); ?>" placeholder="Company Location"/>
                        <span class="error-modal-val" style="display: none;" id="error-label">Location is required</span>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Benefits</label>
                </div>
                    
                <div class="form-group" id="benefits_chk">
                <?php foreach ($benefits as $row) { ?>
                    <div class="col-md-4 col-md-offset-2">
                        <div class="input-group">
                            <input type="checkbox" value="<?php echo $row['benefits_list']; ?>" name="benefits_chk[]" <?php echo set_checkbox('benefits_chk[]', $row['benefits_list']); ?> />
                            <?php echo $row['benefits_list']; ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <span class="col-md-offset-2 error-modal-val" style="display: none;" id="error-label">You need to check at least one(1) benefits.</span>
                <hr/>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-10">
                        <input type="submit" name="update" id="jobUpdate-submit" value="UPDATE" class="btn btn-warning" />
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>