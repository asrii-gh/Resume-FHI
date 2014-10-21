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
	<h2>Applicants</h2>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			Applicant List
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped" id="dataTables-example">
					<thead>
						<tr>
							<th>Name</th>
							<th>Gender</th>
							<th>Location</th>
							<th>Position Title</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach($result as $row) { ?>
					<?php $app_id = $row['app_id'] ?>
					<?php $random = md5(mt_rand()) ?>
						<tr>
							<td><a href="<?= BASEURL ?>admin/applicant_profile/<?= $app_id . $random ?>" id="text-decoration"><?= $row['firstname'] . " " . $row['lastname'] ?></a></td>
							<td><?= $row['gender'] ?></td>
							<td><?= $row['location'] ?></td>
							<td><?= $row['position_title'] ?></td>
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