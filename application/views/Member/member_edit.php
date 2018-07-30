<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Update Member</h1>
	<form method="post"  action="<?php echo site_url()."members/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->member_id; ?>">
		<div class="form-group">
			<label>Name</label>
			<input type="text" value="<?php echo $data['0']->member_name; ?>" name="name" required="required" class="form-control">
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $data['0']->member_address; ?>" required="required" class="form-control">
		</div>
		<div class="form-group">
			<label>Join Date</label>
			<input type="date" name="joindate" disabled value="<?php $dd=$data['0']->join_date; echo date("Y-m-d",strtotime($dd));?>" required="required" class="form-control">
		</div>
		<div class="form-group">
			<label>Expiry Date</label>
			<input disabled type="date" name="expirydate" value="<?php $dd=$data['0']->expiry_date; echo date("Y-m-d",strtotime($dd));?>"  required="required" class="form-control">
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>