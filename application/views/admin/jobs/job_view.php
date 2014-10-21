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

    <?php if (!null == ($this->session->flashdata('msg'))) { ?>
        <p class="alert alert-info" role="alert" id="admin-success-message"><?php echo $this->session->flashdata('msg');?></p>
    <?php } ?>

    <h2>Job Information</h2>
    <hr>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><?php echo $jobpost['position']; ?></h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td class="col-md-2" style="font-weight:bold;">Work Experience</td>
                        <td class="col-md-3"><?php echo $jobpost['position_level']; ?></td>
                        <td class="col-md-2" style="font-weight:bold;">Salary</td>
                        <td class="col-md-3"><?php echo $jobpost['min_salary']; ?>&nbsp;-&nbsp;<?php echo $jobpost['max_salary']; ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 " style="font-weight:bold;">Industry</td>
                        <td class="col-md-3"><?php echo $jobpost['industry']; ?></td>
                        <td class="col-md-2 " style="font-weight:bold;">Work Location</td>
                        <td class="col-md-10" colspan="3"><?php echo $jobpost['company_location']; ?></td>
                    </tr>
                    <tr class="details_hide">
                        <td class="col-md-12" colspan="4" style="font-weight:bold;">Job Description</td>
                    </tr>
                    <tr class="details_hide">
                        <td class="col-md-12" colspan="4"><?php echo $jobpost['job_description']; ?></td>
                    </tr>
                    <tr class="details_hide">
                        <td class="col-md-12" colspan="4" style="font-weight:bold;">Benefits</td>
                    </tr>
                    <tr class="details_hide">
                        <td class="col-md-12" colspan="4"><?php echo $jobpost['benefits']; ?></td>
                    </tr>
                </table>
                <?php $random = md5(mt_rand()) ?>
                <a class="btn btn-warning pull-right" href="<?= BASEURL ?>admin/job_update_form/<?= $jobpost['job_id'] . $random ?>">UPDATE</a>
            </div>
        </div>
    </div>

</div>