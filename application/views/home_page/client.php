<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form class="form-signin" role="form">
		        <h2 class="form-signin-heading">Please sign in</h2>
		        <input type="email" class="form-control" placeholder="Username" required autofocus>
		        <input type="password" class="form-control" placeholder="Password" required>
		        <label class="checkbox">
		        	<div class="col-sm-5">
		        		<input type="checkbox" value="remember-me">Remember me
					</div>
		        </label>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		        <a href="#myModal" class="btn btn-lg btn-success btn-block" type="button">Register</a>
		    </form>
		</div>
	</div>
</div>

<div class="alert alert-success" role="alert" id="alert-success" style="display:none;">
	Success!
</div>
<div class="alert alert-danger" role="alert" id="alert-error" style="display:none;">
	Error!
</div>

<? if($result == 0){ ?>
	<script type="text/javascript">
		document.getElementById('alert-success').style.display = 'block';
		document.getElementById('alert-error').style.display = 'none';
	</script>
<? } ?>

<? if($result == 1){ ?>
	<script type="text/javascript">
		document.getElementById('alert-error').style.display = 'block';
		document.getElementById('alert-success').style.display = 'none';
	</script>
<? } ?>