<center><h2>Preview Application</h2></center><br>

	<form class="form-horizontal" role="form" name="form" id="form" method="POST" action="<?= BASEURL ?>register/login" autocomplete="on" enctype="multipart/form-data">

	<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
		<font color="red">* Please review/verify the following information and click confirm button if you don't have any changes. *</font>
	</div>

	<div class="panel-body">
		<div class="row">

		<div class="table-responsive">
			<div class="col-md-7">
				

				<h3>Personal Information</h3>

				<table class="table table-stripped">

					<!-- NAME -->
					<tr>
						<td>Name: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('lastname'); ?>" name="lastname"><label><?= $this->session->userdata('firstname'); ?> <?= $this->session->userdata('lastname'); ?></label></td>
						<input type="hidden" value="" name="firstname">
					</tr>

					<!-- GENDER -->
					<tr>
						<td>Gender: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('genderRadio'); ?>" name="gender"><label><?= $this->session->userdata('genderRadio'); ?></label></td>
					</tr>

					<!-- BIRTHDAY -->
					<tr>
						<td>Birthday: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('birthdate'); ?>" name="birthdate" id="birthdate"><label><?= $this->session->userdata('birthdate'); ?></label></td>
					</tr>

					<!-- AGE -->
					<tr>
						<td>Age: </td>
						<td class="active"><input type="hidden" name="age" id="age" value="<?= $this->session->userdata('age'); ?>"><label><?= $this->session->userdata('age'); ?> y/o</label></td>
					</tr>

					<!-- HEIGHT -->
					<tr>
						<td>Height: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('height'); ?>" name="height"><label><?= $this->session->userdata('height'); ?> cm</label></td>
					</tr>

					<!-- WEIGHT -->
					<tr>
						<td>Weight: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('weight'); ?>" name="weight"><label><?= $this->session->userdata('weight'); ?> kg</label></td>
					</tr>

					<!-- VISA TYPE -->
					<tr>
						<td>Visa Type: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('visa_type'); ?>" name="visa_type"><label><?= $this->session->userdata('visa_type'); ?></label></td>
					</tr>

				</table>
							
				<h3>Contact Information</h3>

				<table class="table table-stripped">
					
					<!-- COUNTRY -->
					<tr>
						<td>Country: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('country'); ?>" name="country" /><label><?= $this->session->userdata('country'); ?></label></td>
					</tr>

					<!-- CITY -->
					<tr>
						<td>City: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('city'); ?>" name="city"><label><?= $this->session->userdata('city'); ?></label></td>
					</tr>

					<!-- MOBILE -->
					<tr>
						<td>Mobile: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('mobile'); ?>" name="mobile" /><label><?= $this->session->userdata('mobile'); ?></label></td>
					</tr>

					<!-- QQ NUMBER -->
					<tr>
						<td>QQ Number: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('qq'); ?>" name="qq"><label><?= $this->session->userdata('qq'); ?></label></td>
					</tr>

					<!-- Skype -->
					<tr>
						<td>Skype ID: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('skype'); ?>" name="skype"><label><?= $this->session->userdata('skype'); ?></label></td>
					</tr>

					<!-- EMAIL -->
					<tr>
						<td>Email-Address: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('email'); ?>" name="email"><label><?= $this->session->userdata('email'); ?></label></td>
					</tr>

				</table>

				<h3>Additional Information</h3>

				<table class="table table-stripped">

					<!-- PREFERRED INDUSTRY -->
					<tr>
						<td>Preferred Industry: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('preferred_industry'); ?>" name="preferred_industry"><label><?= $this->session->userdata('preferred_industry'); ?></label></td>
					</tr>

					<!-- POSITION TITLE -->
					<tr>
						<td>Position: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('position_title'); ?>" name="position_title"><label><?= $this->session->userdata('position_title'); ?></label></td>
					</tr>

					<!-- EXPECTED SALARY -->
					<tr>
						<td>Expected Salary: </td>
						<td class="active"><input type="hidden" value="<?= $this->session->userdata('expected_salary'); ?>" name="expected_salary"><label><?= $this->session->userdata('expected_salary'); ?></label></td>
					</tr>

				</table>
			</div>
		</div>
		<!-- IMAGE -->
			<div class="col-md-5">
				<?php if ($this->session->userdata('picture_path') == null) { ?>
					<img src="<?= IMAGEPATH_EXTRA . 'default_image.png' ?>" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 150%; height: 150%; margin: 10px 0 0 0;">
				<?php } else {?>
					<img src="<?= IMAGEPATH_APPLICANT . $this->session->userdata('picture_path') ?>" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 150%; height: 150%; margin: 10px 0 0 0;">
				<?php }?>
			</div>
		</div>

			<!-- BUTTONS -->
			<br>
			<div class="col-md-4 col-md-offset-5">
 					<button class="btn btn-default" >Back</button>
 					<button type="submit" class="btn btn-success">Finish</button>
 				</center>
			</div>

	</div>
	</div>
	</div>
	</form>

<script type="text/javascript">

	function goBack()
	{
		window.history.back()
	}

		function imageChange(id)
	{
		var imageToReplacesrc = document.getElementById(id).src;
		var imagesrc = document.getElementById('image1').src

		document.getElementById('image1').src = imageToReplacesrc;
		document.getElementById(id).src = imagesrc;
	}

		

</script>
