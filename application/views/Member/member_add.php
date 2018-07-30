<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Add New Member</h1>
	<form method="post"  action="<?php echo site_url()."members/save"?>">
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
			<label>Name</label>
			<input type="text" name="name" required="required" class="form-control">
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" name="address" required="required" class="form-control">
		</div>
		<div class="form-group">
			<label>Join Date</label>
			<input type="date" name="joindate" disabled value="<?php echo date("Y-m-d")?>" required="required" class="form-control">
		</div>
		<div class="form-group">
			<label>Expiry Date</label>
			<input disabled type="date" name="expirydate" value="<?php $dd=strtotime(date("Y-m-d")); echo date("Y-m-d",strtotime("+1month",$dd));?>"  required="required" class="form-control">
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>