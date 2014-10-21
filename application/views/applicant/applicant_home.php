<?php if (!null == ($this->session->flashdata('success_msg'))) { ?>
	<p class="alert alert-warning" role="alert" id="success-message"><?php echo $this->session->flashdata('success_msg');?></p>
<?php } ?>

<div id="head-space"></div>
<div class="container">
	<div class="panel panel-default" id="head">
		<div class="panel-body" id="panel-body">
			<div class="row">
				<?php 
			  		$cnt = 1;
			  		$get_fullpath = explode('/',$result[0]['picture_path']);
			  		$folder_name = $get_fullpath[0];
			  		$slice_path = array_slice($get_fullpath, 2);
			  		$primary_img = array_slice($get_fullpath, 1);
			  		// print_r(count($primary_img));exit();
			  	?>
			<div class="well col-md-3" id="col-md-3-well">
				<?php if (count($primary_img) == 1) { ?>
					<div class="col-md-3" id="col-md-3-img">
			  			<img id="image" src="<?= IMAGEPATH_APPLICANT . $folder_name . "/" . $primary_img[0] ?>" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 190px; height: 190px; display:block;">
			  			<div class="contenthover" id="contenthover">
						    <center><a href="#changephoto-modal" data-toggle="modal" id="changephoto-btn"><span class="glyphicon glyphicon-camera"></span>&nbsp;Change photo</a></center>
						</div>
			  		</div>
			  		<div class="col-md-1" id="col-md-1-logo">
			  			<a href="#changephoto-modal" data-toggle="modal" id="addphoto-btn"><h1 id="camera-logo"></h1></a>
			  		</div>
				<?php } else { ?>
					<div class="col-md-3" id="col-md-3-img">
			  			<img id="image" src="<?= IMAGEPATH_APPLICANT . $folder_name . "/" . $primary_img[0] ?>" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 190px; height: 190px; display:block;">
			  			<div class="contenthover" id="contenthover">
						    <center><a href="#changephoto-modal" data-toggle="modal" id="changephoto-btn" ><span class="glyphicon glyphicon-camera"></span>&nbsp;Change photo</a></center>
						</div>
			  		</div>

					<?php foreach($slice_path as $img_path) { ?>
				  		<div class="col-md-1" id="col-md-1-img">
				  			<img id="<?= 'image' . $cnt ?>" onclick="imageChange(this.id)" src="<?= IMAGEPATH_APPLICANT . $folder_name. "/" . $img_path ?>" class="img-thumbnail img-responsive" style="width: 100%; align: left; valign= middle;margin: 0 1px 0 0; display:block;">
				  		</div>
			  		<?php } ?>
			  		
				<?php } ?>
			</div>
				<div class="col-md-8" id="name-div">
					<h1><span id="name-label"><?= $result[0]['firstname'] . " " . $result[0]['lastname'] ?></span>&nbsp;&nbsp;<a href="#edit-personalstatus-modal" id="edit-personalstatus" data-toggle="modal" title="EDIT" rel="tooltip" data-placement="right"><span class="glyphicon glyphicon-pencil" id="glyphicon-pencil"></span></a></h1>
					<hr>						
				</div>
				<div class="table-responsive" id="status-table">
					<table>
						<tr>
							<td class="active col-md-1"><span id="title-label">Position </span></td>
							<?php if ($result[0]['position_title'] == "") { ?>
								<td class="col-md-4"><span id="result-label">N/A</span></td>
							<?php } else { ?>
								<td class="active col-md-4"><span id="result-label"><?= $result[0]['position_title'] ?></span></td>
							<?php } ?>
							<td class="active col-md-2"><span id="title-label">Job Application </span></td>
							<td class="active col-md-4"><span id="badge-label" class="badge"> 0 </span></td>
						</tr>
						<tr>
							<td class="active col-md-3"><span id="title-label">Expected Salary </span></td>
							<?php if (($result[0]['expected_salary'] == "") || ($result[0]['expected_salary'] == 0)) { ?>
								<td class="active col-md-4"><span id="result-label">N/A</span></td>
							<?php } else { ?>
								<td class="active col-md-4"><span id="result-label">PHP <?= $result[0]['expected_salary'] ?>.00</span></td>
							<?php } ?>
							<td class="active col-md-3"><span id="title-label">Interview Request </span></td>
							<td class="active col-md-4"><span id="badge-label" class="badge"> 0 </span></td>
						</tr>
						<tr>
							<td class="active col-md-2"><span id="title-label">Status </span></td>
							<?php if ($result[0]['status'] == 3) { ?>
								<td class="active col-md-4"><span id="result-label">Open for interview</span></td>
							<?php } else if ($result[0]['status'] == 2) { ?>
								<td class="active col-md-4"><span id="result-label">Already hired</span></td>
							<?php } else { ?>
								<td class="active col-md-4"><span id="result-label">N/A</span></td>
							<?php } ?>
							
						</tr>
					</table>
				</div>
			</div>			
		</div>
	</div>
	<div>
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a id="matches-li" href="#tab1" data-toggle="tab">Job Matches</a></li>
			<li><a id="matches-li" href="#tab2" data-toggle="tab">Saved Jobs</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="tab1">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th id="header-title-table">Position Title</th>
										<th id="header-title-table">Company Name</th>
										<th id="header-title-table">Salary</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="#" id="company-label">Global Helpdesk</a></td>
										<td><a href="#" id="company-label">Actionlabs IT Services Phils Corp.</a></td>
										<td id="company-label">Around Expected Salary</td>
									</tr>
									<tr>
										<td><a href="#" id="company-label">Global Helpdesk</a></td>
										<td><a href="#" id="company-label">Actionlabs IT Services Phils Corp.</a></td>
										<td id="company-label">Around Expected Salary</td>
									</tr>
									<tr>
										<td><a href="#" id="company-label">Global Helpdesk</a></td>
										<td><a href="#" id="company-label">Actionlabs IT Services Phils Corp.</a></td>
										<td id="company-label">Around Expected Salary</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>					
			</div>
			<div class="tab-pane fade" id="tab2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th id="header-title-table">Position Title</th>
										<th id="header-title-table">Company Name</th>
										<th id="header-title-table">Salary</th>
										<th><input type="checkbox" name="selectAll-checkbox" id="selectAll-checkbox"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="#" id="company-label">Global Helpdesk</a></td>
										<td><a href="#" id="company-label">Actionlabs IT Services Phils Corp.</a></td>
										<td id="company-label">Around Expected Salary</td>
										<td><input type="checkbox" name="apply-checkbox"></td>
									</tr>
									<tr>
										<td><a href="#" id="company-label">Global Helpdesk</a></td>
										<td><a href="#" id="company-label">Actionlabs IT Services Phils Corp.</a></td>
										<td id="company-label">Around Expected Salary</td>
										<td><input type="checkbox" name="apply-checkbox"></td>
									</tr>
									<tr>
										<td><a href="#" id="company-label">Global Helpdesk</a></td>
										<td><a href="#" id="company-label">Actionlabs IT Services Phils Corp.</a></td>
										<td id="company-label">Around Expected Salary</td>
										<td><input type="checkbox" name="apply-checkbox"></td>
									</tr>
								</tbody>
							</table>
						</div>
						<button class="btn btn-warning pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;APPLY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div>
		<h3><span id="profile-label">Profile</span></h3>
		<hr id="line">
		<div id="profile-div">
			<div class="panel-group" id="accordion">

				<div class="panel panel-default" id="personal-panel">
					<div class="panel-heading">
						<h4 class="panel-title" id="title-label">
							<a href="#section1" data-toggle="collapse" data-parent="#accordion" id="personal-accor-header" >
								Personal Information&nbsp;
							</a>
							<a class="pull-right" id="personaltooltip" href="#personal-modal" data-toggle="modal" rel="tooltip" title="EDIT" data-placement="top">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</h4>
					</div>
					<div class="panel-collapse collapse in" id="section1">
						<div class="panel-body">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<tr>
											<td class="active col-md-2">Email</td>
											<td class="col-md-4"><?= $result[0]['email'] ?></td>
											<td class="active col-md-2">Gender</td>
											<td class="col-md-4"><?= $result[0]['gender'] ?></td>
										</tr>
										<tr>
											<td class="active col-md-2">Date of Birth</td>
											<td class="col-md-4"><?= $result[0]['birthdate'] ?></td>
											<td class="active col-md-2">Age</td>
											<td class="col-md-4"><?= $result[0]['age'] ?></td>
										</tr>
										<tr>
											<td class="active col-md-2">Height</td>
											<td class="col-md-4"><?= $result[0]['height'] ?></td>
											<td class="active col-md-2">Weight</td>
											<td class="col-md-4"><?= $result[0]['weight'] ?></td>
										</tr>
										<tr>
											<td class="active col-md-2">Mobile Number</td>
											<td class="col-md-4"><?= $result[0]['mobile'] ?></td>
											<td class="active col-md-2">Phone Number</td>
											<td class="col-md-4"><?= $result[0]['phone'] ?></td>
										</tr>
										<tr>
											<td class="active col-md-2">QQ Number</td>
											<td class="col-md-4"><?= $result[0]['qq'] ?></td>
											<td class="active col-md-2">Skype ID</td>
											<td class="col-md-4"><?= $result[0]['skype'] ?></td>
										</tr>
										<tr>
											<td class="active col-md-2">Location</td>
											<?php if ($result[0]['hometown'] == "") { ?>
												<td><?= $result[0]['location'] ?></td>
											<?php } else { ?>
												<td><?= $result[0]['hometown'] . ", " . $result[0]['location'] ?></td>
											<?php } ?>
											<td class="active col-md-2">VISA Type</td>
											<td class="col-md-4"><?= $result[0]['visa_type'] ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default" id="educ-panel">
					<div class="panel-heading">
						<h4 class="panel-title" id="title-label">
							<a href="#section3" data-toggle="collapse" data-parent="#accordion" id="educ-accor-header" >
								Educational Background&nbsp;
							</a>
							<a href="#education-modal" class="pull-right" id="eductooltip" data-toggle="modal" rel="tooltip" title="ADD" data-placement="top">
								<span class="glyphicon glyphicon-plus-sign"></span>
							</a>
						</h4>
					</div>
					<div class="panel-collapse collapse" id="section3">
						<div class="panel-body">
							<?php if ($educ_result[0]['educational_attainment'] == "") { ?>
								<center>No Educational Background</center>
							<?php } else { ?>
							<?php foreach($educ_result as $row) { ?>
								<?php $educ_id = $row['educ_id'] ?>
								<div class="col-md-12">
									<a href="#delete-education-modal-<?= $educ_id?>" class="pull-right" id="span-trashicon" data-toggle="modal" rel="tooltip" title="DELETE" data-placement="top">
										<span class="glyphicon glyphicon-trash"></span>
									</a>
									<a href="#edit-education-modal-<?= $educ_id?>" class="pull-right" id="span-edit" name="span-edit" data-toggle="modal" rel="tooltip" title="EDIT" data-placement="top" >
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
									<div class="table-responsive">
										<table class="table table-bordered table-hover">
											<tr>
												<td class="active col-md-2">School</td>
												<td class="col-md-4"><?= $row['school_name'] ?></td>
												<td class="active col-md-2">Field of Study</td>
												<td class="col-md-4"><?= $row['field_of_industry'] ?></td>
											</tr>
											<tr>
												<td class="active col-md-2">Educational Attainment</td>
												<td class="col-md-4"><?= $row['educational_attainment'] ?></td>
												<td class="active col-md-2">Major</td>
												<td class="col-md-4"><?= $row['major'] ?></td>
											</tr>
											<tr>
												<td class="active col-md-2">Year Graduated</td>
												<td class="col-md-4"><?= $row['year_graduated'] ?></td>
												<td class="active col-md-2">School Location</td>
												<td class="col-md-4"><?= $row['school_location'] ?></td>
											</tr>
										</table>
									</div>
								</div>

								<!-- Modal Edit Education Background -->
								<div class="modal fade" id="edit-education-modal-<?= $educ_id?>" tabinex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="custom-modal-header">
												<button type="button" class="close" data-dismiss="modal" id="btn-modalClose">
													<span aria-hidden="true">&times;</span><span class="sr-only"></span>
												</button>
												<h3 id="modal-header-label">Edit Educational Background</h3>
											</div>
											<div class="modal-body">
												<form class="form-horizontal" name="editeducationform" id="editeducationform" method="POST" action="<?= BASEURL ?>login/edit_education" autocomplete="on" >
													<div class="container">
														<!-- ID -->
														<input type="hidden" name="app_id" id="app_id" value="<?= $result[0]['app_id'] ?>" />
														<input type="hidden" name="educ_id" id="educ_id" value="<?= $row['educ_id'] ?>" />
														<!-- School -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">School</span>
																<input type="text" class="form-control" maxlength="100" placeholder="School Name" name="school_name" id="school_name" value="<?= $row['school_name'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">School name is required</span>
															</div>
														</div>
														<!-- Field of Study -->
														<div class="form-group">
															<div class="col-md-4" id="field_of_industry_div">
																<span id="label">Field of Study</span>
																<select class="form-control" id="field_of_industry" name="field_of_industry" onchange="showOtherFieldIndustry();">
																	<?php foreach (unserialize(FIELD_OF_STUDY_LIST) as $key) {  ?>
																		<option value="<?= $key?>" <?php echo ($row['field_of_industry'] == $key) ? ' selected="selected"' : ''; ?> ><?= $key?></option>
																	<?php } ?>
															  	</select>
																<span class="error-modal-val" style="display: none;" id="error-label">Field of study is required</span>
															</div>
															<!-- Other Field of Study -->
															<div class="col-md-2" id="field_of_industry_other_div" style="display: none;">
																<span id="label">Others</span>
																<input type="text" name="other_field_industry" id="other_field_industry" class="form-control" placeholder="Type here...">
																<span class="error-modal-val" style="display: none;" id="error-label">Field of study is required</span>
															</div>
														</div>
														<!-- Educational Attainment -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Educational Level</span>
																<select class="form-control" id="educ_level" name="educ_level">
																	<option value="High School Graduate" <?php echo ($row['educational_attainment'] == 'High School Graduate') ? ' selected="selected"' : ''; ?> >High School Graduate</option>
																	<option value="Bachelor/College Degree" <?php echo ($row['educational_attainment'] == 'Bachelor/College Degree') ? ' selected="selected"' : ''; ?> >Bachelor/College Degree</option>
																	<option value="Masteral Degree" <?php echo ($row['educational_attainment'] == 'Masteral Degree') ? ' selected="selected"' : ''; ?> >Masteral Degree</option>
																	<option value="Doctor of Philosopy (PhD)" <?php echo ($row['educational_attainment'] == 'Doctor of Philosopy (PhD)') ? ' selected="selected"' : ''; ?> >Doctor of Philosopy (PhD)</option>
															  	</select><span class="error-modal-val" style="display: none;" id="error-label">Educational level is required</span>
															</div>
														</div>
														<!-- Major -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Major</span>
																<input type="text" class="form-control" placeholder="Major" name="major" id="major" value="<?= $row['major'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">Major is required</span>
															</div>
														</div>
														<!-- Year Graduated -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Year Graduated</span>
																<input type="number" class="form-control" min="2000" placeholder="Year" name="year_graduated" id="year_graduated" value="<?= $row['year_graduated'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">Year graduated is required</span>
															</div>
														</div>

														<input type="hidden" name="schoolloc_result" id="schoolloc_result" value="<?= $row['school_location']?>">

														<!-- School Location -->
														<div class="form-group">
															<div class="col-md-4" id="school-country-div">
																<span id="label">School Location</span>
																<select class="form-control" id="school_country" name="school_location">
																	<?php foreach (unserialize(COUNTRY_LIST) as $key) {  ?>
																		<option value="<?= $key?>" <?php echo ($row['school_location'] == $key) ? ' selected="selected"' : ''; ?> ><?= $key?></option>
																	<?php } ?>
																</select>
																<span class="error-modal-val" style="display: none;" id="error-label">School location is required</span>
															</div>
														</div>
														<!-- Buttons -->
														<div class="form-group">
															<div class="col-md-4" id="btn-div">
																<a type="button" class="btn btn-default" data-dismiss="modal" >Close</a>
																<button type="submit" class="btn btn-warning" id="educ-submit" >Save</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<!-- Modal Delete Education Background -->
								<div class="modal fade" id="delete-education-modal-<?= $educ_id?>" tabinex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body">
												<form class="form-horizontal" name="editeducationform" id="editeducationform" method="POST" action="<?= BASEURL ?>login/delete_education" autocomplete="on">
													<p><span class="glyphicon glyphicon-exclamation-sign"></span> &nbsp;Are you sure you want to delete this education record?</p>
													<!-- ID -->
													<input type="hidden" name="educ_id" id="educ_id" value="<?= $row['educ_id'] ?>" />
													<!-- Buttons -->
													<div class="form-group">
														<div class="col-md-12" id="btn-delete-div">
															<button type="submit" class="btn btn-warning">Yes</button>
															<a type="button" class="btn btn-default" data-dismiss="modal" >Cancel</a>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="panel panel-default" id="work-panel">
					<div class="panel-heading">
						<h4 class="panel-title" id="title-label">
							<a href="#section4" data-toggle="collapse" data-parent="#accordion" id="work-accor-header" >
								Work Experience&nbsp;
							</a>
							<a href="#work-modal" class="pull-right" id="worktooltip" data-toggle="modal" rel="tooltip" title="ADD" data-placement="top">
								<span class="glyphicon glyphicon-plus-sign"></span>
							</a>
						</h4>
					</div>
					<div class="panel-collapse collapse" id="section4">
						<div class="panel-body">
							<?php if ($work_result[0]['position_title'] == "") { ?>
								<center>No Work Experience</center>
							<?php } else { ?>
							<?php foreach($work_result as $row) { ?>
							<?php $work_id = $row['work_id'] ?>
								<div class="col-md-12">
									<a href="#delete-work-modal-<?= $work_id?>" class="pull-right" id="span-trashicon" data-toggle="modal" rel="tooltip" title="DELETE" data-placement="top">
										<span class="glyphicon glyphicon-trash"></span>
									</a>
									<a href="#work-modal-<?= $work_id?>" class="pull-right" id="span-edit" data-toggle="modal" rel="tooltip" title="EDIT" data-placement="top">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
									<div class="table-responsive">
										<table class="table table-bordered table-hover">
											<tr>
												<td class="active col-md-2">Company</td>
												<td class="col-md-4"><?= $row['company_name'] ?></td>
												<td class="active col-md-2">Company Address</td>
												<td class="col-md-4"><?= $row['company_address'] ?></td>
											</tr>
											<tr>
												<td class="active col-md-2">Position Title</td>
												<td class="col-md-4"><?= $row['position_title']	 ?></td>
												<td class="active col-md-2">Years of Experience</td>
												<td class="col-md-4"><?= $row['years_of_experience'] ?></td>
											</tr>
											<tr>
												<td class="active col-md-2">Industry</td>
												<td class="col-md-4"><?= $row['work_industry'] ?></td>
												<td class="active col-md-2">Salary</td>
												<td class="col-md-4"><?= $row['salary'] ?></td>
											</tr>
											<tr>
												<td class="active col-md-2">Work Description</td>
												<td class="col-md-4"><?= $row['work_description'] ?></td>
											</tr>
										</table>
									</div>
								</div>

								<!-- Modal Edit Work Experience -->
								<div class="modal fade" id="work-modal-<?= $work_id?>" tabinex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="custom-modal-header">
												<button type="button" class="close" data-dismiss="modal" id="btn-modalClose">
													<span aria-hidden="true">&times;</span><span class="sr-only"></span>
												</button>
												<h3 id="modal-header-label">Edit Work Experience</h3>
											</div>
											<div class="modal-body">
												<form class="form-horizontal" name="editworkform" id="editworkform" method="POST" action="<?= BASEURL ?>login/edit_work" autocomplete="on" >
													<div class="container">
														<!-- ID -->
														<input type="hidden" name="app_id" id="app_id" value="<?= $result[0]['app_id'] ?>" />
														<input type="hidden" name="work_id" id="work_id" value="<?= $work_id ?>" />
														<!-- Company name -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Company</span>
																<input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" value="<?= $row['company_name'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">Company name is required</span>
															</div>
														</div>
														<!-- Company Address -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Company Address</span>
																<input type="text" class="form-control" placeholder="Address" name="company_address" id="company_address" value="<?= $row['company_address'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">Company address is required</span>
															</div>
														</div>
														<!-- Position Title -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Position Title</span>
																<input type="text" class="form-control" placeholder="Position Title" name="position_title" id="position_title" value="<?= $row['position_title'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">Position title is required</span>
															</div>
														</div>
														<!-- Year of Experience -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Year of Experience</span>
																<input type="number" class="form-control" placeholder="0" min="0"  name="years_of_experience" id="years_of_experience" value="<?= $row['years_of_experience'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">Year of experience is required</span>
															</div>
														</div>
														<!-- Work Industry -->
														<div class="form-group">
															<div class="col-md-4" id="work_industry_div">
																<span id="label">Industry</span>
																<select class="form-control" id="work_industry" name="work_industry" onchange="javascript:showOtherWorkIndustry();">
																	<?php foreach (unserialize(WORK_INDUSTRY_LIST) as $key) { ?>
																		<option value="<?= $key ?>" <?php echo ($row['work_industry'] == $key) ? ' selected="selected"' : ''; ?> ><?= $key ?></option>
																	<?php } ?>
														   		</select><span class="error-modal-val" style="display: none;" id="error-label">Industry is required</span>
															</div>
															<div class="col-md-2" id="work_industry_other_div" style="display:none;">
																<span id="label">Others</span>
																<input type="text" name="other_work_industry" id="other_work_industry" class="form-control" placeholder="Type here...">
																<span class="error-modal-val" style="display: none;" id="error-label">Industry is required</span>
															</div>
														</div>
														<!-- Salary -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Salary</span>
																<input type="number" class="form-control" placeholder="0.00" min="0.00" step="1000.00" name="salary" id="salary" value="<?= $row['salary'] ?>" />
																<span class="error-modal-val" style="display: none;" id="error-label">Salary is required</span>
															</div>
														</div>
														<!-- Work Description -->
														<div class="form-group">
															<div class="col-md-4">
																<span id="label">Work Description</span>
																<textarea class="form-control" col="10" placeholder="Description" name="work_description" id="work_description" wrap="true"><?= $row['work_description'] ?></textarea>
																<span class="error-modal-val" style="display: none;" id="error-label">Work Description is required</span>
															</div>
														</div>
														<!-- Buttons -->
														<div class="form-group">
															<div class="col-md-4" id="btn-div">
																<a type="button" class="btn btn-default" data-dismiss="modal" >Close</a>
																<button type="submit" class="btn btn-warning" id="work-submit" >Save</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<!-- Modal Delete Work Experience -->
								<div class="modal fade" id="delete-work-modal-<?= $work_id?>" tabinex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body">
												<form class="form-horizontal" name="editeducationform" id="editeducationform" method="POST" action="<?= BASEURL ?>login/delete_work" autocomplete="on">
													<p><span class="glyphicon glyphicon-exclamation-sign"></span> &nbsp;Are you sure you want to delete this work experience?</p>
													<!-- ID -->
													<input type="hidden" name="work_id" id="work_id" value="<?= $work_id ?>" />
													<!-- Buttons -->
													<div class="form-group">
														<div class="col-md-12" id="btn-delete-div">
															<button type="submit" class="btn btn-warning">Yes</button>
															<a type="button" class="btn btn-default" data-dismiss="modal" >Cancel</a>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>

			</div>
		</div>
 	</div>	
</div>

<!-- Modal Change Photo -->
<div class="modal fade" id="changephoto-modal" tabinex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="custom-modal-header">
				<button type="button" class="close" data-dismiss="modal" id="btn-modalClose">
					<span aria-hidden="true">&times;</span><span class="sr-only"></span>
				</button>
				<h3 id="modal-header-label">Profile Picture</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" name="changephotoform" id="changephotoform" method="POST" action="#" autocomplete="on" >
						<!-- ID -->
						<input type="hidden" name="app_id" id="app_id" value="<?= $result[0]['app_id'] ?>" />
						<ul class="nav nav-pills" role="tablist" id="nav-pills">
							<li id="primary-img"><a href="#" data-toggle="tab">Primary Picture</a></li>
							<li id="other-img"><a href="#" data-toggle="tab">Other Pictures</a></li>
						</ul>
						<!-- Buttons -->
						<div class="form-group">
							<div class="col-md-4" id="btn-div">
								<a type="button" class="btn btn-default" data-dismiss="modal" >Close</a>
								<button type="submit" class="btn btn-warning" >Save</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Personal Status -->
<div class="modal fade" id="edit-personalstatus-modal" tabinex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="custom-modal-header">
				<button type="button" class="close" data-dismiss="modal" id="btn-modalClose">
					<span aria-hidden="true">&times;</span><span class="sr-only"></span>
				</button>
				<h3 id="modal-header-label">Edit Personal Status</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" name="editpersonalstatusform" id="editpersonalstatusform" method="POST" action="<?= BASEURL ?>login/edit_personal_status" autocomplete="on" >
					<div class="container">
						<!-- ID -->
						<input type="hidden" name="app_id" id="app_id" value="<?= $result[0]['app_id'] ?>" />
						<!-- First name -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">First Name</span>
								<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="<?= $result[0]['firstname'] ?>" />
								<span class="error-modal-val" style="display: none;" id="error-label">First name is required</span>
							</div>
						</div>
						<!-- Last name -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Last Name</span>
								<input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="<?= $result[0]['lastname'] ?>" />
								<span class="error-modal-val" style="display: none;" id="error-label">Last name is required</span>
							</div>
						</div>
						<!-- Position title -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Position Title</span>
								<input type="text" class="form-control" placeholder="Position" maxlength="40" name="position_title" id="position_title" value="<?= $result[0]['position_title'] ?>" />
								<span class="error-modal-val" style="display: none;" id="error-label">Position title is required</span>
							</div>
						</div>
						<!-- Salary -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Expected Salary</span>
								<input type="number" class="form-control" placeholder="Salary" name="expected_salary" id="expected_salary" placeholder="0.00" min="0.00" step="1000.00" value="<?= $result[0]['expected_salary'] ?>" />
								<span class="error-modal-val" style="display: none;" id="error-label">Salary is required</span>
							</div>
						</div>
						<!-- Status -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Status</span>
								<select class="form-control" name="status">
									<option value="3" <?php echo ($result[0]['status'] == 3) ? ' selected="selected"' : ''; ?> >Open for interview</option>
									<option value="2" <?php echo ($result[0]['status'] == 2) ? ' selected="selected"' : ''; ?> >Already hired</option>
									<option value="1" <?php echo ($result[0]['status'] == 1) ? ' selected="selected"' : ''; ?> >N/A</option>
								</select>
								<span class="error-modal-val" style="display: none;" id="error-label">Status is required</span>
							</div>
						</div>
						<!-- Buttons -->
						<div class="form-group">
							<div class="col-md-4" id="btn-div">
								<a type="button" class="btn btn-default" data-dismiss="modal" >Close</a>
								<button type="submit" class="btn btn-warning" id="submit" >Save</button>
							</div>
						</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Personal Information -->
<div class="modal fade" id="personal-modal" tabinex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="custom-modal-header">
				<button type="button" class="close" data-dismiss="modal" id="btn-modalClose">
					<span aria-hidden="true">&times;</span><span class="sr-only"></span>
				</button>
				<h3 id="modal-header-label">Edit Personal Information</h3>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" name="editpersonalform" id="editpersonalform" method="POST" action="<?= BASEURL ?>login/edit_personal" autocomplete="on" >
				<div class="container">
					<!-- ID -->
					<input type="hidden" name="app_id" id="app_id" value="<?= $result[0]['app_id'] ?>" />
					<!-- Email -->
					<div class="form-group">
						<div class="col-md-4">
							<span id="label">Email</span>
							<input type="email" class="form-control" maxlength="100" placeholder="Email" name="email" id="email" value="<?= $result[0]['email'] ?>" />
							<span class="error-modal-val" style="display: none;" id="error-label">Email is required</span>
						</div>
					</div>
					<!-- Gender -->
					<div class="form-group">
						<div class="col-md-4">
							<span id="label">Gender</span>
							<select class="form-control" id="gender" name="gender">
								<option value="Male" <?php echo ($result[0]['gender'] == 'Male') ? ' selected="selected"' : ''; ?>>Male</option>
								<option value="Female" <?php echo ($result[0]['gender'] == 'Female') ? ' selected="selected"' : ''; ?>>Female</option>
							</select>
						</div>
					</div>
					<!-- Birthday -->
					<div class="form-group">
						<div class="col-md-4">
							<span id="label">Birthday</span>
							<input type="date" class="form-control" onchange="calculateAge(this.value);" name="birthdate" id="birthdate" max="2012-12-31" min="1920-01-01" value="<?= $result[0]['birthdate'] ?>" />
							<input type="hidden" name="age" id="age" value="<?= $result[0]['age'] ?>" />
						</div>
					</div>
					<!-- Height / Weight -->
					<div class="form-group">
						<div class="col-md-2">
							<span id="label">Height</span>
							<input type="number" name="height" id="height" class="form-control" placeholder="(cm)" min="80" max="200" value="<?= $result[0]['height'] ?>" />
							<span class="error-modal-val" style="display: none;" id="error-label">Height is required</span>
						</div>
						<div class="col-md-2">
							<span id="label">Weight</span>
							<input type="number" name="weight" id="weight" class="form-control" placeholder="(kg)" min="30" max="400" value="<?= $result[0]['weight'] ?>" />
							<span class="error-modal-val" style="display: none;" id="error-label">Weight is required</span>
						</div>
					</div>
					<!-- Mobile Number -->
					<div class="form-group">
						<div class="col-md-4">
							<span id="label">Mobile Number</span>
							<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" value="<?= $result[0]['mobile'] ?>" />
							<span class="error-modal-val" style="display: none;" id="error-label">Mobile is required</span>
						</div>
					</div>
					<!-- Phone Number -->
					<div class="form-group">
						<div class="col-md-4">
							<span id="label">Phone Number</span>
							<input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" value="<?= $result[0]['phone'] ?>" />
						</div>
					</div>
					<!-- QQ Number -->
					<div class="form-group">
						<div class="col-md-4">
							<span id="label">QQ Number</span>
							<input type="text" class="form-control" placeholder="QQ Number" name="qq" id="qq" value="<?= $result[0]['qq'] ?>" />
							<span class="error-modal-val" style="display: none;" id="error-label">QQ Number is required</span>
						</div>
					</div>
					<!-- Skype ID -->
					<div class="form-group">
						<div class="col-md-4">
							<span id="label">Skype ID</span>
							<input type="text" class="form-control" placeholder="Skype ID" name="skype" id="skype" value="<?= $result[0]['skype'] ?>" />
							<span class="error-modal-val" style="display: none;" id="error-label">Skype ID is required</span>
						</div>
					</div>
					<!-- Location -->
					<div class="form-group">
						<?php if ($result[0]['location'] == "China") { ?>
							<div class="col-md-4" id="country-div">
								<span id="label">Country</span>
								<select class="form-control" id="country" name="country" onchange="javascript:showCity();">
									<option value="China" <?php echo ($result[0]['location'] == 'China') ? ' selected="selected"' : ''; ?> <?php echo set_select('country', 'China'); ?> >China</option>
									<option value="Philippines" <?php echo ($result[0]['location'] == 'Philippines') ? ' selected="selected"' : ''; ?> <?php echo set_select('country', 'Philippines'); ?> >Philippines</option>
							  	</select>
							</div>
							<div class="col-md-2" style="display: none;" id="city-div">
								<span id="label">City</span>
								<select class="form-control" id="city-option" name="city">
									<option value="">Select City</option>
									<?php foreach (unserialize(PH_CITY_LIST) as $key => $value) { ?>
										<option value="<?= $key ?>" <?php echo ($result[0]['hometown'] == $key) ? ' selected="selected"' : ''; ?> ><?= $key ?></option>
									<?php } ?>
								</select><span class="error-modal-val" style="display: none;" id="error-label">City is required</span>
							</div>
						<?php } else { ?>
							<div class="col-md-2" id="country-div">
								<span id="label">Country</span>
								<select class="form-control" id="country" name="country" onchange="javascript:showCity();">
									<option value="China" <?php echo ($result[0]['location'] == 'China') ? ' selected="selected"' : ''; ?> <?php echo set_select('country', 'China'); ?> >China</option>
									<option value="Philippines" <?php echo ($result[0]['location'] == 'Philippines') ? ' selected="selected"' : ''; ?> <?php echo set_select('country', 'Philippines'); ?> >Philippines</option>
							  	</select>
							</div>
							<div class="col-md-2" style="display: block;" id="city-div">
								<span id="label">City</span>
								<select class="form-control" id="city-option" name="city">
									<option value="">Select City</option>
									<?php foreach (unserialize(PH_CITY_LIST) as $key => $value) {  ?>
										<option value="<?= $key ?>" <?php echo ($result[0]['hometown'] == $key) ? ' selected="selected"' : ''; ?> ><?= $key ?></option>
									<?php } ?>
								</select><span class="error-modal-val" style="display: none;" id="error-label">City is required</span>
							</div>
						<?php } ?>
					</div>
					<!-- VISA Type -->
					<div class="form-group">
						<div class="col-md-4" style="display: block;" id="visa-div">
							<span id="label">VISA Type</span>
							<input type="text" name="visa_type" id="visa_type" class="form-control" placeholder="Type here..." value="<?= $result[0]['visa_type'] ?>">
							<span class="error-modal-val" style="display: none;" id="error-label">VISA Type is required</span>
						</div>
					</div>
					<!-- Buttons -->
					<div class="form-group">
						<div class="col-md-4" id="btn-div">
							<a type="button" class="btn btn-default" data-dismiss="modal" >Close</a>
							<button type="submit" class="btn btn-warning" id="personal-submit" >Save</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Add Education Background -->
<div class="modal fade" id="education-modal" tabinex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="custom-modal-header">
				<button type="button" class="close" data-dismiss="modal" id="btn-modalClose">
					<span aria-hidden="true">&times;</span><span class="sr-only"></span>
				</button>
				<h3 id="modal-header-label">Add Educational Background</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" name="addeducationform" id="addeducationform" method="POST" action="<?= BASEURL ?>login/add_education" autocomplete="on" >
					<div class="container">
						<!-- ID -->
						<input type="hidden" name="app_id" id="app_id" value="<?= $result[0]['app_id'] ?>" />
						<!-- School -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">School</span>
								<input type="text" class="form-control" maxlength="100" placeholder="School Name" name="school_name" id="school_name" />
								<span class="error-modal-val" style="display: none;" id="error-label">School name is required</span>
							</div>
						</div>
						<!-- Field of Study -->
						<div class="form-group">
							<div class="col-md-4" id="field_of_industry_div1">
								<span id="label">Field of Study</span>
								<select class="form-control" id="field_of_industry1" name="field_of_industry1" onchange="showOtherFieldIndustry1();">
									<option value="">Select Field of Study</option>
									<?php foreach (unserialize(FIELD_OF_STUDY_LIST) as $key => $value) {  ?>
										<option value="<?= $key ?>"><?= $key ?></option>
									<?php } ?>
							  	</select>
								<span class="error-modal-val" style="display: none;" id="error-label">Field of study is required</span>
							</div>
							<!-- Other Field of Study -->
							<div class="col-md-2" id="field_of_industry_other_div1" style="display: none;">
								<span id="label">Others</span>
								<input type="text" name="other_field_industry1" id="other_field_industry1" class="form-control" placeholder="Type here...">
								<span class="error-modal-val" style="display: none;" id="error-label">Field of study is required</span>
							</div>
						</div>
						<!-- Educational Attainment -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Educational Level</span>
								<select class="form-control" id="educ_level" name="educ_level">
									<option value="">Select Educational Level</option>
									<option value="High School Graduate" >High School Graduate</option>
									<option value="Bachelor/College Degree" >Bachelor/College Degree</option>
									<option value="Masteral Degree" >Masteral Degree</option>
									<option value="Doctor of Philosopy (PhD)" >Doctor of Philosopy (PhD)</option>
							  	</select><span class="error-modal-val" style="display: none;" id="error-label">Educational level is required</span>
							</div>
						</div>
						<!-- Major -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Major</span>
								<input type="text" class="form-control" maxlength="100" placeholder="Major" name="major" id="major" />
								<span class="error-modal-val" style="display: none;" id="error-label">Major is required</span>
							</div>
						</div>
						<!-- Year Graduated -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Year Graduated</span>
								<input type="number" class="form-control" min="2000" placeholder="Year" name="year_graduated" id="year_graduated" />
								<span class="error-modal-val" style="display: none;" id="error-label">Year graduated is required</span>
							</div>
						</div>
						<!-- School Location -->
						<div class="form-group">
							<div class="col-md-4" id="school-country-div">
								<span id="label">School Location</span>
								<select class="form-control" id="school_country" name="school_country" onchange="javascript:showOtherCountry();">
									<option value="">Select Country</option>
									<?php foreach (unserialize(COUNTRY_LIST) as $key => $value) {  ?>
										<option value="<?= $key ?>"><?= $key ?></option>
									<?php } ?>
							  	</select>
								<span class="error-modal-val" style="display: none;" id="error-label">School location is required</span>
							</div>
						</div>
						<!-- Buttons -->
						<div class="form-group">
							<div class="col-md-4" id="btn-div">
								<a type="button" class="btn btn-default" data-dismiss="modal" >Close</a>
								<button type="submit" class="btn btn-warning" id="educ-submit" >Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Add Work Experience -->
<div class="modal fade" id="work-modal" tabinex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="custom-modal-header">
				<button type="button" class="close" data-dismiss="modal" id="btn-modalClose">
					<span aria-hidden="true">&times;</span><span class="sr-only"></span>
				</button>
				<h3 id="modal-header-label">Add Work Experience</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" name="addworkform" id="addworkform" method="POST" action="<?= BASEURL ?>login/add_work" autocomplete="on" >
					<div class="container">
						<!-- ID -->
						<input type="hidden" name="app_id" id="app_id" value="<?= $result[0]['app_id'] ?>" />
						<!-- Company name -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Company</span>
								<input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" />
								<span class="error-modal-val" style="display: none;" id="error-label">Company name is required</span>
							</div>
						</div>
						<!-- Company Address -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Company Address</span>
								<input type="text" class="form-control" placeholder="Address" name="company_address" id="company_address" />
								<span class="error-modal-val" style="display: none;" id="error-label">Company address is required</span>
							</div>
						</div>
						<!-- Position Title -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Position Title</span>
								<input type="text" class="form-control" placeholder="Position Title" name="position_title" id="position_title" />
								<span class="error-modal-val" style="display: none;" id="error-label">Position title is required</span>
							</div>
						</div>
						<!-- Year of Experience -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Year of Experience</span>
								<input type="number" class="form-control" placeholder="0" min="0"  name="years_of_experience" id="years_of_experience" />
								<span class="error-modal-val" style="display: none;" id="error-label">Year of experience is required</span>
							</div>
						</div>
						<!-- Work Industry -->
						<div class="form-group">
							<div class="col-md-4" id="work_industry_div">
								<span id="label">Industry</span>
								<select class="form-control" id="work_industry" name="work_industry" onchange="javascript:showOtherWorkIndustry();">
						   			<option value="">Select Industry</option>
									<option value="Accounting/Finance/Audit/Tax">Accounting/Finance/Audit/Tax</option>
									<option value="Advertising/Marketing/Public Relations">Advertising/Marketing/Public Relations</option>
									<option value="Banking/Financial Services">Banking/Financial Services</option>
									<option value="Call Center">Call Center</option>
									<option value="Design/Arts">Design/Arts</option>
									<option value="Engineering">Engineering</option>
									<option value="Food and Beverage/Catering/Restaurant">Food and Beverage/Catering/Restaurant</option>
									<option value="Hospitality">Hospitality</option>
									<option value="Human Resource Management">Human Resource Management</option>
									<option value="Information Technology">Information Technology</option>
									<option value="Insurance">Insurance</option>
									<option value="Law/Legal">Law/Legal</option>
									<option value="Management">Management</option>
									<option value="Media">Media</option>
									<option value="Medical">Medical</option>
									<option value="Merchandising and Purchasing">Merchandising and Purchasing</option>
									<option value="Professional Services">Professional Services</option>
									<option value="Property/Real Estates">Property/Real Estates</option>
									<option value="Sales, CS and Business Development">Sales, CS and Business Development</option>
									<option value="Telecommunications">Telecommunications</option>
									<option value="Transportation and Logistics">Transportation and Logistics</option>
									<option value="Others">Others</option>
						   		</select><span class="error-modal-val" style="display: none;" id="error-label">Industry is required</span>
							</div>
							<div class="col-md-2" id="work_industry_other_div" style="display:none;">
								<span id="label">Others</span>
								<input type="text" name="other_work_industry" id="other_work_industry" class="form-control" placeholder="Type here...">
								<span class="error-modal-val" style="display: none;" id="error-label">Industry is required</span>
							</div>
						</div>
						<!-- Salary -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Salary</span>
								<input type="number" class="form-control" placeholder="0.00" min="0.00" step="1000.00" name="salary" id="salary" />
								<span class="error-modal-val" style="display: none;" id="error-label">Salary is required</span>
							</div>
						</div>
						<!-- Work Description -->
						<div class="form-group">
							<div class="col-md-4">
								<span id="label">Work Description</span>
								<textarea class="form-control" col="10" placeholder="Description" name="work_description" id="work_description" wrap="true"></textarea>
								<span class="error-modal-val" style="display: none;" id="error-label">Work Description is required</span>
							</div>
						</div>
						<!-- Buttons -->
						<div class="form-group">
							<div class="col-md-4" id="btn-div">
								<a type="button" class="btn btn-default" data-dismiss="modal" >Close</a>
								<button type="submit" class="btn btn-warning" id="work-submit" >Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$('#personal-submit').click( function() {

		if ($('#email').val() == "") {
			$('#email').next('.error-modal-val').show();
			$('#email').focus();
			return false;
		}  else if ($('#height').val() == "" || $('#height').val() == 0) {
			$('#height').next('.error-modal-val').show();
			$('#height').focus();
			return false;
		} else if ($('#weight').val() == "" || $('#weight').val() == 0) {
			$('#weight').next('.error-modal-val').show();
			$('#weight').focus();
			return false;
		} else if ($('#mobile').val() == "") {
			$('#mobile').next('.error-modal-val').show();
			$('#mobile').focus();
			return false;
		} else if ($('#qq').val() == "") {
			$('#qq').next('.error-modal-val').show();
			$('#qq').focus();
			return false;
		} else if ($('#skype').val() == "") {
			$('#skype').next('.error-modal-val').show();
			$('#skype').focus();
			return false;
		}  else if ($('#country').val() == "Philippines") {
			if ($('#city-option').val() == "") {
				$('#city-option').next('.error-modal-val').show();
				$('#city-option').focus();
				return false;
			} 
		} else if ($('#visa_type').val() == "") {
			$('#visa_type').next('.error-modal-val').show();
			$('#visa_type').focus();
			return false;
		} else {
			$('#personal-submit').submit();
			return true;
		}
	});

	$('#educ-submit').click( function() {

		if ($('#school_name').val() == "") {
			$('#school_name').next('.error-modal-val').show();
			$('#school_name').focus();
			return false;
		} else if ($('#field_of_industry').val() == "") {
			$('#field_of_industry').next('.error-modal-val').show();
			$('#field_of_industry').focus();
			return false;
		} else if ($('#educ_level').val() == "") {
			$('#educ_level').next('.error-modal-val').show();
			$('#educ_level').focus();
			return false;
		} else if ($('#major').val() == "") {
			$('#major').next('.error-modal-val').show();
			$('#major').focus();
			return false;
		} else if ($('#year_graduated').val() == "") {
			$('#year_graduated').next('.error-modal-val').show();
			$('#year_graduated').focus();
			return false;
		} else if ($('#school_country').val() == "") {
			$('#school_country').next('.error-modal-val').show();
			$('#school_country').focus();
			return false;
		} else if ($('#school_country').val() == "Others") {
			if ($('#other-country').val() == "") {
				$('#other-country').next('.error-modal-val').show();
				$('#other-country').focus();
				return false;
				}
		} else {
			$('#educ-submit').submit();
			return true;
		}
	});

	$('#work-submit').click( function() {

		if ($('#company_name').val() == "") {
			$('#company_name').next('.error-modal-val').show();
			$('#company_name').focus();
			return false;
		} else if ($('#company_address').val() == "") {
			$('#company_address').next('.error-modal-val').show();
			$('#company_address').focus();
			return false;
		} else if ($('#position_title').val() == "") {
			$('#position_title').next('.error-modal-val').show();
			$('#position_title').focus();
			return false;
		} else if ($('#years_of_experience').val() == "") {
			$('#years_of_experience').next('.error-modal-val').show();
			$('#years_of_experience').focus();
			return false;
		} else if ($('#work_industry').val() == "") {
			$('#work_industry').next('.error-modal-val').show();
			$('#work_industry').focus();
			return false;
		} else if ($('#salary').val() == "") {
			$('#salary').next('.error-modal-val').show();
			$('#salary').focus();
			return false;
		} else if ($('#work_description').val() == "") { 
			$('#work_description').next('.error-modal-val').show();
			$('#work_description').focus();
			return false;
		} else {
			$('#work-submit').submit();
			return true;
		}
	});

	//Personal Edit Regex
	$('#height').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#weight').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#mobile').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#phone').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#visa_type').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '')
	});

	//Add Education Regex
	$('#school_name').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#major').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#other-country').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#year_graduated').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});

	//Add Work Regex
	$('#company_name').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s 0-9]/g, '');
	});
	$('#company_address').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s\.\,\'\- 0-9]/g, '');
	});
	$('#position_title').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#years_of_experience').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#salary').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]\./g, '');
	});
	$('#work_description').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s\.\,\'\ 0-9]/g, '');
	});

	$(document).ready(function () { 
		$("[rel='tooltip']").tooltip();
		$('#mypopover').popover();
	});

	$('#image').contenthover({
		// effect:'slide',
		slide_speed: 300,
		overlay_height: 25,
		slide_direction:'left',
		overlay_background: '#8B8B8B',
		overlay_opacity: 0.9
	});
	

</script>