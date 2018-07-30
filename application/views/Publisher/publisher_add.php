<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Add New Publisher</h1>
	<form method="post"  action="<?php echo site_url()."publishers/save"?>">
		<?php
		 if ($this->session->flashdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <?php echo $this->session->flashdata('success');?>
			</div>
		<?php
		 }
		?>
		<div class="form-group">
			<label>Publisher Name</label>
			<input type="text" name="pname" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Publisher Address</label>
			<input type="text" name="paddress" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
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

				<option value="<?php echo $country->country_id?>"><?php echo $country->name?></option>

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