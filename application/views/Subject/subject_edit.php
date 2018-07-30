<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Update Subject</h1>
	<form method="post"  action="<?php echo site_url()."subjects/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->subject_id; ?>">
		<div class="form-group">
			<label>Subject Name</label>
			<input type="text" name="subject" required="required" value="<?php echo $data['0']->subject_name; ?>" class="form-control">
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>