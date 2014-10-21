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

	<?php if (!null == ($this->session->flashdata('msg'))) { ?>
		<p class="alert alert-info" role="alert" id="admin-success-message"><?php echo $this->session->flashdata('msg');?></p>
	<?php } ?>

	<h2>Employer</h2>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			Employer List
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped" id="dataTables-example">
					<thead>
						<tr>
							<th>Company Name</th>
							<th>Industry</th>
							<th>Country</th>
							<th>City</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach($result as $row) { ?>
					<?php $emp_id = $row['emp_id'] ?>
					<?php $status = $row['status'] ?>
					<?php $random = md5(mt_rand()) ?>
						<tr>
							<td><a href="<?= BASEURL ?>admin/employer_profile/<?= $emp_id . $random ?>" id="text-decoration"><?= $row['company_name'] ?></a></td>
							<td><?= $row['industry'] ?></td>
							<td><?= $row['country'] ?></td>
							<td><?= $row['city'] ?></td>
							<td>
								<center>
									<a href="<?= BASEURL ?>admin/employer_change_status/<?= $emp_id ?>/active" class="btn btn-<?php echo ($row['status'] == 'active') ? 'warning' : 'default' ?> btn-sm">Active</a>
									<a href="<?= BASEURL ?>admin/employer_change_status/<?= $emp_id ?>/inactive" class="btn btn-<?php echo ($row['status'] == 'inactive') ? 'warning' : 'default' ?> btn-sm">Inactive</a>
								</center>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
	    $('#dataTables-example').dataTable();
	});
</script>