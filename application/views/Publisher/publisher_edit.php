<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Update Subject</h1>
	<?php
		//print_r($data);
		//exit();
	?>
	<form method="post"  action="<?php echo site_url()."publishers/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->publisher_id; ?>">
		<div class="form-group">
			<label>Publisher Name</label>
			<input type="text" name="pname" required="required" value="<?php echo $data['0']->publisher_name; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Publisher Address</label>
			<input type="text" name="paddress" required="required" value="<?php echo $data['0']->publisher_address; ?>" class="form-control">
		</div>
		<?php
			//print_r($countrys);
		?>
		<div class="form-group">
			<label>Publisher Country</label>
			<select class="form-control" required="required" name="country">
				<option value="">Select One</option>
				<?php
					foreach ($countrys as $country) {
				?>

				<option value="<?php echo $country->country_id?>" <?php 
				if ($data['0']->country_id==$country->country_id) {
				 	echo "selected";
				 }  ?>><?php echo $country->name?></option>

				<?php
					}
				?>
			</select>
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>