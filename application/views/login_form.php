<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<div class="container" style="margin: 100px auto">
	<h1 align="center">Welcome To Library</h1>
	<form method="post"  action="<?php echo site_url()."librarian/validate"?>">
		<h4>Login Now</h4>
		<?php
		 if ($this->session->flashdata('error')) {
		?>
			<div class="alert alert-success alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <?php echo $this->session->flashdata('error');?>
			</div>
		<?php
		 }
		?>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
			<?php echo form_error('email'); ?>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control">
			<?php echo form_error('password'); ?>
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>
</div>

</body>
</html>