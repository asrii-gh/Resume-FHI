<div class="row">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li><a href="<?= BASEURL . 'admin/admin_index' ?>">Home</a></li>
            <li class="active panel dropdown" id="panel-dropdown">
            	<a data-toggle="collapse" href="#applicant">Applicants</a>
            	<ul class="panel-collapse collapse" id="applicant">
            		<li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/applicant_registration' ?>">Sign up</a></li>
            		<li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/applicant_list' ?>">Applicant List</a></li>
            	</ul>
            </li>
            <li class="panel dropdown" id="panel-dropdown">
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

    <h2>Applicant Registration</h2>
    <hr>

    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="<?= BASEURL ?>admin/applicant_validation" enctype="multipart/form-data">

                <div class="col-md-12 col-md-offset-1">
                    <div class="col-md-3">
                        <img id="image" src="<?= IMAGEPATH_EXTRA ?>default_image.png" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 150px; height: 150px; margin: 10px 0 30px 0;" >
                    </div>
                    <div class="col-md-5">
                        <input type="file" name="image" id="image" class="form-control" onchange="readURL(this);" value="<?php echo set_value('image','image'); ?>" /> <?php echo form_error('image'); ?>
                        <p id="para-upload">
                            You may upload the following image types:<br/>
                            JPG, JPEG, GIF, PNG (2 MB maximum file size)
                        </p>
                    </div>
                </div>
                
                <h4>Account Information</h4>

                <div class="form-group">
                    <label class="col-md-2 control-label">Full Name</label>
                    <div class="col-md-4">
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php echo set_value('firstname'); ?>" />
                        <?php echo form_error('firstname'); ?>
                   </div>
                   <div class="col-md-4">
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo set_value('lastname'); ?>" />
                        <?php echo form_error('lastname'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" />
                        <?php echo form_error('email'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" />
                        <?php echo form_error('password'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Confirm</label>
                    <div class="col-md-8">
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('confirmpassword'); ?>" />
                        <?php echo form_error('confirmpassword'); ?>
                   </div>
                </div>

                <hr/>
                <h4>Personal Information</h4>

                <div class="form-group">
                    <label class="col-md-2 control-label">Birthday</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="birthdate" id="birthdate" max="2012-12-31" min="1920-01-01" value="<?php echo set_value('birthdate'); ?>" />
                        <?php echo form_error('birthdate'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Gender</label>
                    <div class="col-md-8">
                        <label class="radio-inline" id="maleRadio" id="label">
                            <input type="radio" name="genderRadio" checked value="Male"/> Male
                        </label>
                        <label class="radio-inline" id="femaleRadio" id="label">
                            <input type="radio" name="genderRadio" value="Female"/> Female
                        </label>
                   </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-2 control-label">Height/Weight</label>
                    <div class="col-md-4">
                        <input type="number" name="height" class="form-control" placeholder="(cm)" min="80" max="200" value="<?php echo set_value('height'); ?>">
                        <?php echo form_error('height'); ?>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="weight" class="form-control" placeholder="(kg)" min="30" max="400" value="<?php echo set_value('weight'); ?>">
                        <?php echo form_error('weight'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" >VISA Type</label>
                    <div class="col-md-8">
                        <select class="form-control" id="visa_type" name="visa_type" onchange="javascript: checkVisaType();">
                            <option value="">Select VISA type</option>
                            <option value="Tourist Visa (Personal)" <?php echo set_select('visa_type', 'Tourist Visa (Personal)'); ?> >Tourist Visa (Personal)</option>
                            <option value="Tourist Visa (Agency)" <?php echo set_select('visa_type', "Tourist Visa (Agency)"); ?> >Tourist Visa (Agency)</option>
                            <option value="Student Visa" <?php echo set_select('visa_type', 'Student Visa'); ?> >Student Visa</option>
                            <option value="9G Wording Visa" <?php echo set_select('visa_type', '9G Wording Visa'); ?> >9G Wording Visa</option>
                            <option value="Ceza Wording Visa" <?php echo set_select('visa_type', 'Ceza Wording Visa'); ?> >Ceza Wording Visa</option>
                            <option value="Others" <?php echo set_select('visa_type', 'Others'); ?> >Others</option>
                        </select><?php echo form_error('visa_type'); ?>
                    </div>
                </div>

                <div class="form-group" style="display:none;" id="visa_others_div">
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" name="visa_others" id="visa_others" class="form-control" placeholder="Type here...">
                    </div>
                </div> 

                <hr/>
                <h4>Contact Information</h4>

                <div class="form-group">
                    <label class="col-md-2 control-label" >Location</label>
                    <div class="col-md-8">
                        <select class="form-control" id="country" name="country" onchange="javascript:checkLocation();">
                            <option value="">Select Country</option>
                            <?php foreach (unserialize(COUNTRY_LIST) as $key) {  ?>
                                <option value="<?= $key?>"><?= $key?></option>
                            <?php } ?>
                        </select><?php echo form_error('country'); ?>
                   </div>
                </div>

                <div class="form-group" style="display:none;" id="city_div">
                    <label class="col-md-2 control-label" >City</label>
                    <div class="col-md-8">
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

                <div class="form-group">
                    <label class="col-md-2 control-label">Mobile Number</label>
                    <div class="col-md-8">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" value="<?php echo set_value('mobile'); ?>" >
                        <?php echo form_error('mobile'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">QQ Number</label>
                    <div class="col-md-8">
                        <input type="text" name="qq" id="qq" class="form-control" placeholder="QQ number" value="<?php echo set_value('qq'); ?>" >
                        <?php echo form_error('qq'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Skype ID</label>
                    <div class="col-md-8">
                        <input type="text" name="skype" id="skype" class="form-control" placeholder="Skype ID" value="<?php echo set_value('skype'); ?>" >
                        <?php echo form_error('skype'); ?>
                   </div>
                </div>

                <hr/>
                <h4>Additional Information</h4>

                <div class="form-group">
                    <label class="col-md-2 control-label" >Industry</label>
                    <div class="col-md-8">
                        <select class="form-control" id="preferred-industry" name="preferred-industry">
                            <option value="">Select Preferred Industry</option>
                            <?php foreach (unserialize(FIELD_OF_STUDY_LIST) as $key) {  ?>
                                <option value="<?= $key?>"><?= $key?></option>
                            <?php } ?>
                        </select><?php echo form_error('preferred-industry'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Position</label>
                    <div class="col-md-8">
                        <input type="text" name="position" id="position" class="form-control" placeholder="Position" value="<?php echo set_value('position'); ?>" ><?php echo form_error('position'); ?>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Expected Salary</label>
                    <div class="col-md-8">
                        <input type="number" name="expected-salary" class="form-control" placeholder="0.00" step="1000.00" value="<?php echo set_value('expected-salary'); ?>" ><?php echo form_error('expected-salary'); ?>
                   </div>
                </div>

                <hr/>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-10">
                        <input type="submit" name="submit" value="SUBMIT" class="btn btn-warning" />
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>