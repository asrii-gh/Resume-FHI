<div id="head-space"></div>
<div class="container">
	<div class="panel panel-default" id="head">
		<div class="panel-body" id="panel-body">
			<div class="row">
				<?php 
			  		$get_fullpath = explode('/',$information['picture_logo']);

			  		$folder_name = $get_fullpath[0];
			  		$image = $get_fullpath[1];
			  		// print_r($image); exit();
			  		// print_r(IMAGEPATH_EMPLOYER . $folder_name . "/" . $image);exit();
			  	?>
			<div class="col-md-3">
	  			<img id="image" src="<?= IMAGEPATH_EMPLOYER . $folder_name . "/" . $image ?>" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 190px; height: 190px; display:block;">
	  			<!-- <div class="contenthover" id="contenthover">
				    <center><a href="#changephoto-modal" data-toggle="modal" id="changephoto-btn"><span class="glyphicon glyphicon-camera"></span>&nbsp;Change photo</a></center>
				</div> -->
			</div>
			<div class="col-md-8" id="name-div">
				<h1><span id="name-label"><?= $information['company_name'] ?></span>&nbsp;&nbsp;<button type="button" class="btn btn-warning"><a href="<?= BASEURL . 'employer/post_job' ?>">Post New Job</a></button>&nbsp;&nbsp;<a href="#edit-personalstatus-modal" id="edit-personalstatus" data-toggle="modal" title="EDIT" data-placement="right"><span class="glyphicon glyphicon-pencil" id="glyphicon-pencil"></span></a></h1>
				<hr>						
			</div>
			<div class="table-responsive" id="status-table">
				<table>
					<tr>
						<td class="active col-md-1"><span id="title-label">Industry</span></td>
						<td class="active col-md-4"><span id="result-label"><?= $information['industry'] ?></span></td>
						<td class="active col-md-1"><span id="title-label">Email </span></td>
						<td class="col-md-4"><span id="result-label"><?= $information['email'] ?></span></td>
					</tr>
					<tr>
						<td class="active col-md-1"><span id="title-label">Phone</span></td>
						<td class="active col-md-4"><span id="result-label"><?= $information['phone'] ?></span></td>
						<td class="active col-md-1"><span id="title-label">Location</span></td>
						<td class="active col-md-4"><span id="result-label"><?= $information['country'] ?></span></td>
					</tr>
					<tr>
						<td class="active col-md-1"><span id="title-label">Mobile</span></td>
						<td class="active col-md-4"><span id="result-label"><?= $information['mobile'] ?></span></td>
						<td class="active col-md-1"><span id="title-label">Hometown</span></td>
						<td class="active col-md-4"><span id="result-label"><?= $information['city'] ?></span></td>
					</tr>
				</table>
			</div>
			</div>			
		</div>
	</div>
</div>

<div class="container">
	<div class="panel-body">

		<div class="row">
			<div class="list_title">
				<div class="col-md-2" style="float:right;">
					<select class="pull-right form-control col-md-1" id="sort_box" onchange="sorting()">
						<option value="">SORT</option>
						<option value="Date">Date</option>
						<option value="Industry">Industry</option>
					</select>
				</div>
				<h1>Previous job post</h1>
			</div>


			<div class="box_list">
				<?php foreach ($result as $row){ ?>
				<div class="box_wrapper">					
					<table>
						<tr>
							<td class="col-md-3 labels">Position</td>
							<td><?php echo $row['position']; ?></td>
						</tr>
						
						<tr>
							<td class="col-md-3 labels">Industry</td>
							<td><?php echo $row['industry']; ?></td>
						</tr>

						<tr>
							<td class="col-md-3 labels">Job Description</td>
							<td><div class="job_desc_txt"><?php echo $row['job_description']; ?></div></td>
						</tr>

						<tr>
							<td class="col-md-3 labels">Date</td>
							<td><div class="job_desc_txt"><?php echo $row['date_uploaded']; ?></div></td>
						</tr>

					</table>
					<div class="view_link">
						<span class="link"><a href="<?= BASEURL ?>employer/view_employer_job/<?= $row['job_id'] ?>">View</a></span>
					</div>
				</div>
				<?php } ?>				
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	function sorting(){
		var selected_option = document.getElementById("sort_box");
		var option_value = selected_option.options[selected_option.selectedIndex].value;

		window.location.href = "<?= BASEURL . 'employer/industry_sorter/' ?>" + option_value;
	}
</script>