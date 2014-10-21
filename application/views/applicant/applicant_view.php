<center><h2>Applicant's Information</h2></center>
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-body">

		<div class="row">
		  <div class="col-md-4">
		  	<img src="<?= IMAGEPATH_APPLICANT . $result[0]['picture_path'] ?>" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 200%; height: 200%; margin: 10px 0 0 0;">
		  </div>
		 	<div class="col-md-6">
			  	<div class="table-responsive">
			  		<h4>Personal Information <a class="btn btn-primary btn-sm" href="" role="button">Edit Profile</a></h4>
					<table class="table table-bordered table-hover">
						<tr>
							<td class="active">Name: </td>
							<td><?= $result[0]['firstname'] ?> <?= $result[0]['lastname'] ?></td>
							<td class="active">Gender: </td>
							<td><?= $result[0]['gender'] ?></td>
						</tr>
						<tr>
							<td class="active">Birthdate: </td>
							<td><?= $result[0]['birthdate'] ?></td>
							<td class="active">Age: </td>
							<td><?= $result[0]['age'] ?></td>
						</tr>
						<tr>
							<td class="active">Height: </td>
							<td><?= $result[0]['height'] ?></td>
							<td class="active">Weight: </td>
							<td><?= $result[0]['weight'] ?></td>
						</tr>
						<tr>
							<td class="active">Visa Type: </td>
							<td><?= $result[0]['visa_type'] ?></td>
						</tr>
					</table>
					<h4>Contact Information</h4>
					<table class="table table-bordered table-hover">
						<tr>
							<td class="active">Country: </td>
							<td><?= $result[0]['country'] ?></td>
						</tr>
						<tr>
							<td class="active">City: </td>
							<td colspan="3"><?= $result[0]['city'] ?></td>
						</tr>
						<tr>
							<td class="active">Phone Number: </td>
							<td colspan="3"><?= $result[0]['phone'] ?></td>
						</tr>
						<tr>
							<td class="active">Mobile Number: </td>
							<td colspan="3"><?= $result[0]['mobile'] ?></td>
						</tr>
						<tr>
							<td class="active">QQ Number: </td>
							<td colspan="3"><?= $result[0]['qq'] ?></td>
						</tr>
						<tr>
							<td class="active">Skype: </td>
							<td colspan="3"><?= $result[0]['skype'] ?></td>
						</tr>
					</table>
					<h4>Educational Information</h4>
					<table class="table table-bordered table-hover">
						<tr>
							<td class="active">Educational Attainment: </td>
							<td colspan="3"><?= $educational_attainment ?></td>
						</tr>
						<tr>
							<td class="active">Industry: </td>
							<td colspan="3"><?= $industry ?></td>
						</tr>
						<tr>
							<td class="active">Year Graduated: </td>
							<td colspan="3"><?= $year_graduated ?></td>
						</tr>
						<tr>
							<td class="active">School Name: </td>
							<td colspan="3"><?= $school_name ?></td>
						</tr>
						<tr>
							<td class="active">School Location: </td>
							<td colspan="3"><?= $school_location ?></td>
						</tr>
					</table>
					<h4>Work Information</h4>
					<table class="table table-bordered table-hover">
						<tr>
							<td class="active">Position Title: </td>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td class="active">Years of Experience: </td>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td class="active">Work Description: </td>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td class="active">Salary: </td>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td class="active">Company Name: </td>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td class="active">Industry: </td>
							<td colspan="3"></td>
						</tr>
					</table>
		 		</div>
			</div>
		</div>
		</div>
		</div>

<script type="text/javascript">
	
	function imageChange(id)
	{
		var imageToReplacesrc = document.getElementById(id).src;
		var imagesrc = document.getElementById('image1').src

		document.getElementById('image1').src = imageToReplacesrc;
		document.getElementById(id).src = imagesrc;
	}

</script>