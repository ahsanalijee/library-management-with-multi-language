<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Update Author</h1>
	<form method="post"  action="<?php echo site_url()."authors/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->author_id; ?>">
		<div class="form-group">
			<label>Author Name</label>
			<input type="text" name="subject" required="required" value="<?php echo $data['0']->author_name; ?>" class="form-control">
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>