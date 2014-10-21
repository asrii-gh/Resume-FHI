<div class="container">
	<?php if (isset($rows)){?>
		<?php foreach ($rows as $row) { ?>
			<div class="title">
				<h1>Job Information</h1>
			</div>
			<table class="table table-bordered">
				<tr>
					<td class="col-md-2 title">Position</td>
					<td class="col-md-5"><?php echo $row['position']; ?></td>
					<td class="col-md-2 title">Salary</td>
					<td class="col-md-3"><?php echo $row['min_salary']; ?>&nbsp;-&nbsp;<?php echo $row['max_salary']; ?></td>
				</tr>
				<tr>
					<td class="col-md-2 title">Industry</td>
					<td class="col-md-5"><?php echo $row['industry']; ?></td>
					<td class="col-md-2 title">Work Experience</td>
					<td class="col-md-3"><?php echo $row['position_level']; ?></td>
				</tr>
				<tr class="details_hide">
					<td class="col-md-2 title">Work Location</td>
					<td class="col-md-10" colspan="3"><?php echo $row['company_location']; ?></td>
				</tr>
				<tr class="details_hide">
					<td class="col-md-12 title" colspan="4">Job Description</td>
				</tr>
				<tr class="details_hide">
					<td class="col-md-12" colspan="4"><?php echo $row['job_description']; ?></td>
				</tr>
				<tr class="details_hide">
					<td class="col-md-12 title" colspan="4">Benefits</td>
				</tr>
				<tr class="details_hide">
					<td class="col-md-12" colspan="4"><?php echo $row['benefits']; ?></td>
				</tr>
			</table>
			<button id="full_btn" class="btn btn-success">See Full Details</button>
			<button class="btn btn-primary"><a href="<?= BASEURL ?>employer/update_job/<?= $row['job_id']; ?>">Update</a></button>
		<?php } ?>
	<?php }else{

			redirect('employer/login/', 'refresh');
		} ?>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$(".details_hide").hide();
	$("#full_btn").click(function(){
		$(".details_hide").toggle(1000);
	});
});
</script>

<div class="container">
	<div class="panel-body">

		<div class="row">
			<div class="list_title">
				<h1>Applicant List</h1>
			</div>

			<div class="applicant_list">
				<span id="select">Select</span>
				<div class="list_wrapper">

					<table>
						<tr>
							<td>
							<h2 class="applicant_name">Jocelyn Yabes</h2>	
							</td>
						</tr>
						<tr>
							<td class="col-md-4">Up Campus Diliman, Quezon City </td>
							<td class="col-md-2">Age: 25</td>
							<td class="col-md-4">Working since 2012</td>
							<td class="col-md-4">View Resume</td>
							<td class="col-md-2"><input type="checkbox" name="applicant_list" value="" /></td>
						</tr>
					</table>
				</div>
				<div class="list_wrapper">					
					<table>
						<tr>
							<td>
							<h2 class="applicant_name">Jocelyn Yabes</h2>	
							</td>
						</tr>
						<tr>
							<td class="col-md-4">Up Campus Diliman, Quezon City </td>
							<td class="col-md-2">Age: 25</td>
							<td class="col-md-4">Working since 2012</td>
							<td class="col-md-4">View Resume</td>
							<td class="col-md-2"><input type="checkbox" name="applicant_list" value="" /></td>
						</tr>
					</table>
				</div>
				<div class="list_wrapper">					
					<table>
						<tr>
							<td>
							<h2 class="applicant_name">Jocelyn Yabes</h2>	
							</td>
						</tr>
						<tr>
							<td class="col-md-4">Up Campus Diliman, Quezon City </td>
							<td class="col-md-2">Age: 25</td>
							<td class="col-md-4">Working since 2012</td>
							<td class="col-md-4">View Resume</td>
							<td class="col-md-2"><input type="checkbox" name="applicant_list" value="" /></td>
						</tr>
					</table>
				</div>
				<div class="list_wrapper">					
					<table>
						<tr>
							<td>
							<h2 class="applicant_name">Jocelyn Yabes</h2>	
							</td>
						</tr>
						<tr>
							<td class="col-md-4">Up Campus Diliman, Quezon City </td>
							<td class="col-md-2">Age: 25</td>
							<td class="col-md-4">Working since 2012</td>
							<td class="col-md-4">View Resume</td>
							<td class="col-md-2"><input type="checkbox" name="applicant_list" value="" /></td>
						</tr>
					</table>
				</div>
				<div class="list_wrapper">					
					<table>
						<tr>
							<td>
							<h2 class="applicant_name">Jocelyn Yabes</h2>	
							</td>
						</tr>
						<tr>
							<td class="col-md-4">Up Campus Diliman, Quezon City </td>
							<td class="col-md-2">Age: 25</td>
							<td class="col-md-4">Working since 2012</td>
							<td class="col-md-4">View Resume</td>
							<td class="col-md-2"><input type="checkbox" name="applicant_list" value="" /></td>
						</tr>
					</table>
				</div>
				<div class="list_wrapper">					
					<table>
						<tr>
							<td>
							<h2 class="applicant_name">Jocelyn Yabes</h2>	
							</td>
						</tr>
						<tr>
							<td class="col-md-4">Up Campus Diliman, Quezon City </td>
							<td class="col-md-2">Age: 25</td>
							<td class="col-md-4">Working since 2012</td>
							<td class="col-md-4">View Resume</td>
							<td class="col-md-2"><input type="checkbox" name="applicant_list" value="" /></td>
						</tr>
					</table>
				</div>
				<div class="list_wrapper">					
					<table>
						<tr>
							<td>
							<h2 class="applicant_name">Jocelyn Yabes</h2>	
							</td>
						</tr>
						<tr>
							<td class="col-md-4">Up Campus Diliman, Quezon City </td>
							<td class="col-md-2">Age: 25</td>
							<td class="col-md-4">Working since 2012</td>
							<td class="col-md-4">View Resume</td>
							<td class="col-md-2"><input type="checkbox" name="applicant_list" value="" /></td>
						</tr>
					</table>
				</div>
			</div>

			<div id="applicant_list_btn">
				<button id="interview_btn">Interview</button>
				<button id="unqulified_btn">Unqualified</button>
			</div>

		</div>
	</div>
</div>