<div class="container" id="head-space"></div>
<form class="form-horizontal" name="form" id="form" method="POST" action="<?= BASEURL ?>register/profile3" autocomplete="on" enctype="multipart/form-data" >
	<div class="container" id="content">
		<div class="row">
			<center><img src="<?= IMAGEPATH_EXTRA . 'applicant signup.png' ?>" id="img-signup" class="img-responsive"></center>
			<div class="col-md-11 col-md-offset-1">
				<!-- Icon steps -->
				<div class="row">
					<div class="col-md-12" id="icon-steps">
						<div class="col-md-7 col-md-offset-2">
							<img src="<?= IMAGEPATH_EXTRA . 'registration/icon steps9.png' ?>" class="img-responsive">
						</div>
					</div>
				</div>

				<div class="panel panel-default col-md-7 col-md-offset-2" id="image-panel">
					<div class="panel-body">
						<div class="col-md-6">
							<img id="image1" src="<?= IMAGEPATH_EXTRA ?>default_image.png" alt="image" class="img-thumbnail img-responsive" style="align: left; valign= middle; width: 150px; height: 150px; margin: 0 1px 0 0; display:block;"/>
						</div>
						<div class="col-md-6 col-md-pull-2">
							<input class="form-control" type="file" name='image1' id="image1id" onchange="readURL(this);" value="<?php echo set_value('image1'); ?>" />
							<?php echo form_error('image1'); ?>
							<span id="image-label">You may upload the following image types:<br/>
							JPG, JPEG, GIF, PNG (5 MB max file size)</span>
						</div>
					</div>
				</div>

				<div class="col-md-7 col-md-offset-2">
					<div class="form-group">
						<div class="pull-left">
							<button class="btn btn-warning" id="backbutton" name="backbutton" onclick="goBack()">Back</button>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-warning pull-right" id="nextbutton" name="nextbutton" >Next</button>
						</div>
					</div>

					<div class="form-group">
						<div class="pull-left">
							<a href="<?= BASEURL ?>register/skip" id="skipbutton" name="skipbutton"><u>Skip this</u></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="container" id="foot-space"></div>

<script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + input.name).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function goBack() {
		window.history.back()
	}

</script>