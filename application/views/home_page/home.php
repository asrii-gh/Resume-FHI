
<!-- 
	Description:	Home page
	Function:		Serve as an initial page for the website.
	Author:			Rhai/Rodge
 -->
<div id="content_wrapper_2">
	<div id="content_img_btn">
		<a href="<?= BASEURL . 'employer/registration' ?>" id="" ><img src="<?= IMAGEPATH_EXTRA . 'emplyr reg btn.png' ?>" class="inner-image" id="employer_img"></a>
		<a href="<?= BASEURL . 'register' ?>" id="" ><img src="<?= IMAGEPATH_EXTRA . 'applcnt reg btn.png' ?>" class="inner2-image"></a>
	</div>
	<h4 id="login-p"><a href="<?= BASEURL . 'login' ?>" id="login-text">Log in</a> to your account.</h4>
</div>
<div id="content_wrapper">
	<img src="<?= IMAGEPATH_EXTRA . 'FH HR Banner_1349x580.jpg' ?>" id="img_banner" >
	
</div>

<div class="container">
	<table id="category-table">
		<tr>
			<td><img src="<?= IMAGEPATH_EXTRA . 'cs icon.png' ?>" id="cs-icon" class="job_offer"></td>
			<td><img src="<?= IMAGEPATH_EXTRA . 'mrktg icon.png' ?>" id="mrktg-icon" class="job_offer"></td>
			<td><img src="<?= IMAGEPATH_EXTRA . 'it icon.png' ?>" id="it-icon" class="job_offer"></td>
			<td><img src="<?= IMAGEPATH_EXTRA . 'hr icon.png' ?>" id="hr-icon" class="job_offer"></td>
			<td><img src="<?= IMAGEPATH_EXTRA . 'mngmnt icon.png' ?>" id="mngmnt-icon" class="job_offer"></td>
		</tr>
	</table>
	<!-- <div id="category-table-2">
		<img src="<?= IMAGEPATH_EXTRA . 'cs icon.png' ?>" id="cs-icon" class="job_offer">
		<img src="<?= IMAGEPATH_EXTRA . 'mrktg icon.png' ?>" id="mrktg-icon" class="job_offer">
		<img src="<?= IMAGEPATH_EXTRA . 'it icon.png' ?>" id="it-icon" class="job_offer">
		<img src="<?= IMAGEPATH_EXTRA . 'hr icon.png' ?>" id="hr-icon" class="job_offer">
		<img src="<?= IMAGEPATH_EXTRA . 'mngmnt icon.png' ?>" id="mngmnt-icon" class="job_offer">
	</div> -->
</div>
<!-- Start of CS &ppayment offer -->
<div class="container switch_content" id="cs">
	<?php foreach ($result as $row){ ?>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> <?php echo $row['position']; ?><br>
					<span id="position-label">Requirements:</span><br>
					<div class="job_desc_txt"><?php echo $row['job_description']; ?></div>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> <?php echo $row['min_salary']; ?> - <?php echo $row['max_salary']; ?><br>
					<span id="position-label">Benefits:</span> 
					<?php
					echo $row['benefits'];
					 // 	$explode = explode(",", $row['benefits']);
					 // 	$spliter = preg_split('/ /', $explode);
						// foreach ($spliter as $key) {
							
						// 	echo $key; 
						// }					

					?>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- <div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div> -->
	<!-- <div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div> -->
</div>

<!-- Start of Markting offer -->

<div class="container switch_content" id="mrktg">
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-002</h4>
					<span id="position-label">Position:</span> Marketing<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Start of IT offer -->

<div class="container switch_content" id="it">
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-003</h4>
					<span id="position-label">Position:</span> IT<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Start of HR & Admin offer -->

<div class="container switch_content" id="hr_admin">
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-004</h4>
					<span id="position-label">Position:</span> Hr And Admin<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Start of Management offer -->

<div class="container switch_content" id="mngmnt">
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-005</h4>
					<span id="position-label">Position:</span> Management<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body" id="panelbody">
			<div class="row">
				<div class="col-md-3">
					<img src="" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 240px; height: 150px; margin: 10px 0 0 0;">
				</div>
				<div class="col-md-6">
					<h4 id="code-label">CODE-001</h4>
					<span id="position-label">Position:</span> CS<br>
					<span id="position-label">Requirements:</span><br>
					1. Lorem ipsum dolor sit amet<br>
					2. Morbi non finibus leo. Suspendisse<br>
					<a href="#" id="position-label">Read more >></a>
				</div>
				<div class="col-md-3" id="offer-label">
					<h4 id="code-label">Offer:</h4>
					<span id="position-label">Salary:</span> PHP 40,000/month<br>
					<span id="position-label">Housing Allowance:</span> Yes<br>
					<span id="position-label">Meal Allowance:</span> No
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-9">
					<a class="btn btn-warning" id="btn-apply" href="<?= BASEURL . 'login' ?>">APPLY</a>
					<button class="btn btn-warning" id="btn-favorite">FAVORITE</button>
				</div>
			</div>
		</div>
	</div>
</div>

