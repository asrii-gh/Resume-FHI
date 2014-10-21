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

    <h2>Profile</h2>
    <hr>

    <div class="panel panel-default" id="admin-head">
        <div class="panel-body" id="admin-panel-body">
            <div class="row">

                <?php 
                    $get_fullpath = explode('/', $information['picture_logo']);
                    $folder_name = $get_fullpath[0];
                    $image = $get_fullpath[1];
                ?>

                <div class="col-md-4" id="admin-col-md-4">
                    <img id="image1" src="<?= IMAGEPATH_EMPLOYER . $folder_name . "/" . $image ?>" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 190px; height: 190px; display:block;">
                </div>

                <div class="col-md-8" id="admin-name-div">
                    <h2><span id="name-label"><?= $information['company_name'] ?></span>&nbsp;&nbsp;<a href="#edit-personalstatus-modal" id="edit-personalstatus" data-toggle="modal" title="EDIT" data-placement="right"><span class="glyphicon glyphicon-pencil" id="admin-glyphicon-pencil"></span></a></h2>
                    <hr>                        
                </div>
                <div class="table-responsive" id="status-table">
                    <table>
                        <tr>
                            <td class="active col-md-1"><span id="admin-title-label">Username</span></td>
                            <td class="col-md-4"><span id="admin-result-label"><?= $information['username'] ?></span></td>
                            <td class="active col-md-1"><span id="admin-title-label">Password </span></td>
                            <td class="col-md-4"><span id="admin-result-label">*******</span></td>
                        </tr>
                        <tr>
                            <td class="active col-md-1"><span id="admin-title-label">Industry</span></td>
                            <td class="col-md-4"><span id="admin-result-label"><?= $information['industry'] ?></span></td>
                            <td class="active col-md-1"><span id="admin-title-label">Email </span></td>
                            <td class="col-md-4"><span id="admin-result-label"><?= $information['email'] ?></span></td>
                        </tr>
                        <tr>
                            <td class="active col-md-1"><span id="admin-title-label">Phone</span></td>
                            <td class="active col-md-4"><span id="admin-result-label"><?= $information['phone'] ?></span></td>
                            <td class="active col-md-1"><span id="admin-title-label">Location</span></td>
                            <td class="col-md-4"><span id="admin-result-label"><?= $information['country'] ?></span></td>
                        </tr>
                        <tr>
                            <td class="active col-md-1"><span id="admin-title-label">Mobile</span></td>
                            <td class="active col-md-4"><span id="admin-result-label"><?= $information['mobile'] ?></span></td>
                            <td class="active col-md-1"><span id="admin-title-label">Hometown</span></td>
                            <td class="col-md-4"><span id="admin-result-label"><?= $information['city'] ?></span></td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <?php $random = md5(mt_rand()); ?>

    <?php if ($jobpost == null) { ?>
        <a class="btn btn-warning" href="<?= BASEURL . 'admin/job_new_post/' . $information['emp_id'] . $random ?>">Post New Job</a>
    <?php } else { ?>
        <h3>Previous job post<a class="btn btn-warning pull-right" href="<?= BASEURL . 'admin/job_new_post/' . $information['emp_id'] . $random ?>">Post New Job</a></h3>
        <hr>

        <div class="panel panel-default">
            <div class="panel-heading">
                Job Posted
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Posted</th>
                                <th>Position</th>
                                <th>Total Application</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $cnt = 0; ?>
                            <?php foreach ($jobpost as $row){ ?>
                                <?php $cnt++; ?>
                                <?php $date_uploaded = substr($row['date_uploaded'], 0, -9); ?>
                                <?php $job_id = $row['job_id'] ?>
                                <?php $random = md5(mt_rand()) ?>
                                <tr>
                                    <td><?= $cnt; ?></td>
                                    <td><?= $date_uploaded; ?></td>
                                    <td><a href="<?= BASEURL ?>admin/job_information/<?= $job_id . $random ?>" id="text-decoration"><?= $row['position']; ?></a></td>
                                    <td></td>
                                </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Modal Edit Information -->
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
                <form class="form-horizontal" name="editpersonalstatusform" id="editpersonalstatusform" method="POST" action="<?= BASEURL ?>admin/edit_personal_status" autocomplete="on" >
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

<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>