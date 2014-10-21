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
            <li class="panel dropdown" id="panel-dropdown">
            	<a data-toggle="collapse" href="#employer">Employers</a>
            	<ul class="panel-collapse collapse" id="employer">
            		<li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/employer_registration' ?>">Sign up</a></li>
                    <li class="nav"><a id="employer-li" href="<?= BASEURL . 'admin/employer_list' ?>">Employer List</a></li>
            	</ul>
            </li>
            <li class="active"><a href="<?= BASEURL . 'admin/jobs_list' ?>">Job Posts</a></li>
        </ul>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<h2>Job Posts</h2>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			Jobs Posted List
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped" id="dataTables-example">
					<thead>
                        <tr>
                            <th>#</th>
                            <th>Position</th>
                            <th>Date Posted</th>
                            <th>Company Name</th>
                            <th>Total Application</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $cnt = 0; ?>
                        <?php foreach ($jobpost as $row){ ?>
                            <?php $cnt++; ?>
                            <?php $date_uploaded = substr($row['date_uploaded'], 0, -9); ?>
                            <?php $emp_id = $row['emp_id'] ?>
                            <?php $job_id = $row['job_id'] ?>
                            <?php $random = md5(mt_rand()) ?>
                            <tr>
                                <td><?= $cnt; ?></td>
                                <td><a href="<?= BASEURL ?>admin/job_information/<?= $job_id . $random ?>" id="text-decoration"><?= $row['position']; ?></a></td>
                                <td><?= $date_uploaded; ?></td>
                                <td><a href="<?= BASEURL ?>admin/employer_profile/<?= $emp_id . $random ?>" id="text-decoration"><?= $row['company_name']?></a></td>
                                <td></td>
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